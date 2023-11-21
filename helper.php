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
use Joomla\Component\Actionlogs\Administrator\Helper\ActionlogsHelper;
use Joomla\Component\Actionlogs\Administrator\Model\ActionlogsModel;
use Joomla\Database\ParameterType;
use Joomla\Module\Quickicon\Administrator\Event\QuickIconsEvent;
use Joomla\Registry\Registry;

class modFlexiadminHelper
{
	public static function getItems(&$params, $featured = false, $userOnly = false, $state = null)
	{
		// récupère la connexion à la BD
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$user  = Factory::getUser();
		$limit = (int) $params->get('count', 5);

		// create query
		$query
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
			->from($db->qn('#__content', 'a'))
			->join(
				'LEFT',
				$db->qn('#__users', 'b') . 'ON' . $db->qn('a.created_by') . '=' . $db->qn('b.id')
			);

		// get featured
		if ($featured)
		{
			$featured = 1;
			$query
				->where($db->qn('a.featured') . '= :featured')
				->bind(':featured', $featured, ParameterType::INTEGER);
		}

		// get by state
		if (is_numeric($state))
		{
			if (!in_array((int) $state, [0, 1, 2, -2, -3, -4, -5]))
			{
				throw new Exception('Invalid State');
			}

			$query
				->where($db->qn('a.state') . ' = :state')
				->bind(':state', $state, ParameterType::INTEGER);
		}

		// only get items created by user
		if ($userOnly)
		{
			$query
				->where($db->qn('a.created_by') . ' = :userId')
				->bind(':userId', $user->id, ParameterType::INTEGER);
		}

		// order & limit
		$query
			->order($db->qn('a.modified') . ' DESC')
			->setLimit($limit);

		$db->setQuery($query);
		$items = $db->loadObjectList();

		if (!empty($items))
		{
			foreach ($items as $item)
			{
				$item->link = '';

				if ($user->authorise('core.edit', 'com_flexicontent.' . $item->id))
				{
					$item->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]=' . $item->id);
				}

				if ($userOnly)
				{
					switch ($item->state)
					{
						case 0:
							$item->state = JText::_('FLEXI_UNPUBLISHED');
							break;
						case 1:
							$item->state = JText::_('FLEXI_PUBLISHED');
							break;
						case 2:
							$item->state = JText::_('FLEXI_ARCHIVED');
							break;
						case -2:
							$item->state = JText::_('FLEXI_TRASHED');
							break;
						case -3:
							$item->state = JText::_('FLEXI_PENDING');
							break;
						case -4:
							$item->state = JText::_('FLEXI_DRAFT');
							break;
						case -5:
							$item->state = JText::_('FLEXI_IN_PROGRESS');
							break;
					}
				}
			}
		}

		return $items;
	}

	public static function getRevised(&$params)
	{
		// récupère la connexion à la BD
		$db = JFactory::getDbo();
//		$query = $db->getQuery(true);
//
//		$published = 1;
//		$inProgress   = -5;
//		$limit     = $params->get('count', 5);
//
//		$query
//			->select(
//				$db->qn([
//					'c.id',
//					'c.version',
//					'c.title',
//					'c.catid',
//					'c.created',
//					'c.created_by',
//					'c.modified',
//					'c.modified_by',
//					'cr.name'
//				])
//			)
//			->select('MAX(' . $db->qn('fv.version_id') . ') as max_version')
//			->from($db->qn('#__flexicontent_items_tmp', ' c'))
//			->join(
//				'LEFT',
//				$db->qn('#__flexicontent_versions', 'fv') . 'ON' . $db->qn('c.id') . '=' . $db->qn('fv.item_id')
//			)
//			->join(
//				'LEFT',
//				$db->qn('#__users', 'cr') . 'ON' . $db->qn('c.created_by') . '=' . $db->qn('cr.id')
//			)
//			->join(
//				'LEFT',
//				$db->qn('#__users', 'mr') . 'ON' . $db->qn('c.modfied_by') . '=' . $db->qn('mr.id')
//			)
//			->where([
//				$db->qn('c.state') . ' = :published',
//				$db->qn('c.state') . ' = :pending'
//			], 'OR')
//			->bind(':published', $published, ParameterType::INTEGER)
//			->bind(':pending', $inProgress, ParameterType::INTEGER)
//			->group($db->qn('fv.item_id'))
//			->having($db->qn(c . version) . ' <> ' . $db->qn('max_version'))
//			->order($db->qn('c.modified') . ' DESC')
//			->limit($limit);
//
//		$db->setQuery($query);

		$queryRevised = "SELECT c.id, c.version, c.title, c.catid, c.created, c.created_by, c.modified, c.modified_by,cr.name, MAX(fv.version_id) 
							FROM #__flexicontent_items_tmp as c 
							    LEFT JOIN #__flexicontent_versions AS fv ON c.id=fv.item_id 
							    LEFT JOIN #__users AS cr ON cr.id = c.created_by 
							    LEFT JOIN #__users AS mr ON mr.id = c.modified_by 
							WHERE c.state = -5 OR c.state = 1 
							GROUP BY fv.item_id 
							HAVING c.version<>MAX(fv.version_id) 
							ORDER BY c.modified DESC LIMIT " . (int) $params->get('count');

		$db->setQuery($queryRevised);
		$items = $db->loadObjectList();

		foreach ($items as $item)
		{
			$item->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]=' . $item->id);
		}

		return $items;
	}

	public static function getCustomlist(&$params)
	{
		$list_customblocks = $params->get('add_customblock');
		//print_r ($list_customblocks);
		$db = JFactory::getDbo();
		global $globalcats;
		// loop your result
		foreach ($list_customblocks as $list_customblocks_idx => $customblock)
		{
			$_catid          = $customblock->catidlist;
			$catlist         = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;
			$catids_join     = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
			$catids_where    = ' rel.catid IN (' . $catlist . ') ';
			$queryCustomlist = 'SELECT DISTINCT  a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id ' . $catids_join . 'WHERE ' . $catids_where . ' AND state = 1 ORDER BY modified DESC LIMIT ' . (int) $params->get('count');
			$db->setQuery($queryCustomlist);
			$itemsCustomlist = $db->loadObjectList();
			//print_r ($itemsCustomlist) ;
			foreach ($itemsCustomlist as &$itemCustomlist)
			{
				$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]=' . $itemCustomlist->id);
			}
			$customblock->listitems = $itemsCustomlist;
		}

		return $list_customblocks;
	}

	public static function getIconFromPlugins(Registry $params, CMSApplication $application = null)
	{
		$key         = (string) $params;
		$context     = (string) $params->get('context', 'update_quickicon');
		$application = Factory::getApplication();
		PluginHelper::importPlugin('quickicon');
		$buttons[$key] = [];
		$arrays        = (array) $application->triggerEvent(
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

	public static function getActionlogList(&$params)
	{
		$model = new ActionlogsModel(['ignore_request' => true]);

		// Set the Start and Limit
		$model->setState('list.start', 0);
		$model->setState('list.limit', $params->get('count', 5));
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
}