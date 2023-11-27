<?php
/**
 * @version       2.0 stable $Id: default.php yannick berges
 * @package       Joomla
 * @subpackage    FLEXIcontent
 * @copyright (C) 2015 Berges Yannick - www.com3elles.com
 * @license       GNU/GPL v2
 *
 * special thanks to ggppdk and emmanuel dannan for flexicontent
 * special thanks to my master Marc Studer
 *
 * FLEXIadmin module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 **/

//blocage des accés directs sur ce script
defined('_JEXEC') or die('Accés interdit');

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Actionlogs\Administrator\Helper\ActionlogsHelper;
use Joomla\Component\Actionlogs\Administrator\Model\ActionlogsModel;
use Joomla\Database\DatabaseInterface;
use Joomla\Database\ParameterType;
use Joomla\Module\Quickicon\Administrator\Event\QuickIconsEvent;
use Joomla\Registry\Registry;

class modFlexiadminHelper
{
	// todo clear FLEXIcontent items list state, otherwise "ALL" link doesn't make much sense

	private static $stateAliases = [
		'U'  => 0,
		'P'  => 1,
		'A'  => 2,
		'T'  => -2,
		'PE' => -3,
		'OQ' => -4,
		'IP' => -5,
	];

	public static function getItems($customBlocks)
	{
		$items = [];

		/** @var DatabaseInterface $db */
		$db    = Factory::getContainer()->get(DatabaseInterface::class);
		$query = $db->getQuery(true);
		$user  = Factory::getApplication()->getIdentity();

		if (empty($customBlocks) || !is_array($customBlocks))
		{
			throw new Exception('No data or wrong data provided');
		}

		foreach ($customBlocks as $key => $customBlock)
		{
			$extraFields = explode(',', $customBlock->extra_field_list) ?: [];

			// get action logs
			if ($customBlock->type_of_block === 'action_logs')
			{
				$customBlock->showAllLink = Route::_('index.php?option=com_actionlogs');
				$customBlock->items       = self::getActionlogList((int) $customBlock->count_action);
				$items[$key]              = $customBlock;

				continue;
			}

			$showAllLink = 'index.php?option=com_flexicontent&view=items';

			// get custom block records
			$limit = (int) $customBlock->count ?: 5; // default = 5

			// create query
			$query
				->clear()
				->select(
					$db->qn([
						'a.id',
						'a.title',
						'a.catid',
						'a.created',
						'a.created_by',
						'a.modified',
						'a.modified_by',
						'a.featured',
						'a.state'
					])
				)
				->select($db->qn('b.name', 'author'))
				->select($db->qn('c.title', 'category'))
				->from($db->qn('#__content', 'a'))
				->join(
					'LEFT',
					$db->qn('#__users', 'b') . 'ON' . $db->qn('a.created_by') . '=' . $db->qn('b.id')
				)
				->join(
					'LEFT',
					$db->qn('#__categories', 'c') . 'ON' . $db->qn('a.catid') . '=' . $db->qn('c.id')
				);

			// Filter by category
			if (!empty($customBlock->cat_id_list) && is_array($customBlock->cat_id_list))
			{
//				$showAllLink .= '&filter_cats[]=' . implode('&filter_cats[]=', $customBlock->cat_id_list); // Unable to filter by multiple categories

				if (count($customBlock->cat_id_list) === 1)
				{
					$showAllLink .= '&filter_cats=' . $customBlock->cat_id_list[0];
				}

				$query
					->whereIn($db->qn('a.catid'), $customBlock->cat_id_list);
			}

			// Filter by featured
			if ((int) $customBlock->featured_only)
			{
				$showAllLink .= '&filter_featured=1';
				$featured    = 1;
				$query
					->where($db->qn('a.featured') . '= :featured')
					->bind(':featured', $featured, ParameterType::INTEGER);
			}

			// Filter by state
			if (is_numeric($customBlock->state))
			{
				if (!in_array((int) $customBlock->state, array_values(self::$stateAliases)))
				{
					throw new Exception('Invalid State');
				}

				// add state to fields to show
				if (empty($customBlock->extra_field_list) || !in_array('state', $extraFields))
				{
					$extraFields[] = 'state';
				}

				// get state alias
				foreach (self::$stateAliases as $alias => $state)
				{
					if ((int) $customBlock->state === $state)
					{
						$showAllLink .= '&filter_state=' . $alias;
					}
				}

				$query
					->where($db->qn('a.state') . ' = :state')
					->bind(':state', $customBlock->state, ParameterType::INTEGER);
			}

			// only get items created by user
			if ((int) $customBlock->author_only)
			{
				$showAllLink .= '&filter_author=' . $user->id;
				$query
					->where($db->qn('a.created_by') . ' = :userId')
					->bind(':userId', $user->id, ParameterType::INTEGER);
			}

			// order & limit
			$query
				->order($db->qn('a.modified') . ' DESC')
				->setLimit($limit);

			$db->setQuery($query);
			$customBlock->items = $db->loadObjectList();

			if (!empty($customBlock->items))
			{
				foreach ($customBlock->items as $record)
				{
					// create edit link for each record
					$record->link = '';

					if ($user->authorise('core.edit', 'com_flexicontent.' . $record->id))
					{
						$record->link = Route::_('index.php?option=com_flexicontent&task=items.edit&cid[]=' . $record->id);
					}

					// get extra field data
					if (!empty($extraFields))
					{
						$record->extraFields = self::getExtraFields($record->id, $extraFields);
					}
				}
			}

			// clear filter by state
			$customBlock->showAllLink = Route::_($showAllLink);
			$items[$key]              = $customBlock;
		}

		return $items;
	}

	public static function clearState()
	{
		$app = Factory::getApplication();

		$filters = [
			'author',
			'tag',
			'type',
			'lang',
			'state',
			'access',
			'meta',
			'cats',
			'subcats',
			'featured',
			'catsinstate',
			'id'
		];

		foreach ($filters as $filter)
		{
			$app->setUserState('com_flexicontent.items_default.filter_' . $filter, '');
		}
	}

	public static function getIconFromPlugins(Registry $params, CMSApplication $application = null)
	{
		$key         = (string) $params;
		$context     = (string) $params->get('context', 'update_quickicon');
		$application = Factory::getApplication();

		PluginHelper::importPlugin('quickicon');
		$buttons[$key] = [];

		$arrays = (array) $application->triggerEvent(
			'onGetIcons',
			new QuickIconsEvent('onGetIcons', ['context' => $context])
		);

		foreach ($arrays as $response)
		{
			if (!\is_array($response))
			{
				continue;
			}

			foreach ($response as $icon)
			{
				$default = array(
					'link'    => null,
					'image'   => null,
					'text'    => null,
					'name'    => null,
					'linkadd' => null,
					'access'  => true,
					'class'   => null,
					'group'   => 'MOD_QUICKICON',
				);

				$icon = array_merge($default, $icon);

				if (!\is_null($icon['link']) && !\is_null($icon['text']))
				{
					$buttons[$key][] = $icon;
				}
			}
		}

		return $buttons[$key];
	}

	private static function getActionlogList($limit = 5)
	{
		$model = new ActionlogsModel(['ignore_request' => true]);

		// Set the Start and Limit
		$model->setState('list.start', 0);
		$model->setState('list.limit', $limit);
		$model->setState('list.ordering', 'a.id');
		$model->setState('list.direction', 'DESC');

		$rows = $model->getItems();

		// Load all actionlog plugins language files
		ActionlogsHelper::loadActionLogPluginsLanguage();

		foreach ($rows as $row)
		{
			$row->message = ActionlogsHelper::getHumanReadableLogMessage($row);
		}

		return $rows;
	}

	private static function getExtraFields($recordId, $fieldsToRetrieve = [])
	{
		$extraFields = [];

		if (empty($recordId) || empty($fieldsToRetrieve))
		{
			return [];
		}

		// get necessary helpers and classes
		require_once(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_flexicontent' . DS . 'defineconstants.php');
		require_once(JPATH_SITE . DS . 'components' . DS . 'com_flexicontent' . DS . 'helpers' . DS . 'route.php');
		require_once(JPATH_SITE . DS . 'components' . DS . 'com_flexicontent' . DS . 'classes' . DS . 'flexicontent.helper.php');
		require_once(JPATH_SITE . DS . 'components' . DS . 'com_flexicontent' . DS . 'classes' . DS . 'flexicontent.fields.php');
		require_once(JPATH_SITE . DS . 'components' . DS . 'com_flexicontent' . DS . 'classes' . DS . 'flexicontent.categories.php');
		JTable::addIncludePath(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_flexicontent' . DS . 'tables');
		require_once(JPATH_SITE . DS . 'components' . DS . 'com_flexicontent' . DS . 'models' . DS . 'item.php');

		$flexiItemModelName = FLEXI_J16GE ? 'FlexicontentModelItem' : 'FlexicontentModelItems';
		$flexiItemModel     = new $flexiItemModelName();

		$item = $flexiItemModel->getItem($recordId, false);

		if (!empty($item))
		{
			foreach ($fieldsToRetrieve as $field)
			{
				if (empty($field)) continue;

				FlexicontentFields::getFieldDisplay($item, $field);

				$extraField = $item->fields[$field];

				if (!empty((array) $extraField))
				{
					$extraFields[$field] = $extraField;
				}
			}
		}

		return $extraFields;
	}
}