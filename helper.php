<?php
/**
* @version 0.9.3 stable $Id: default.php yannick berges
* @package Joomla
* @subpackage FLEXIcontent
* @copyright (C) 2015 Berges Yannick - www.com3elles.com
* @license GNU/GPL v2

* special thanks to ggppdk and emmanuel dannan for flexicontent
* special thanks to my master Marc Studer

* FLEXIadmin module is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
**/

//blocage des accés directs sur ce script
defined('_JEXEC') or die('Accés interdit');
abstract class modFlexiadminHelper
{
	public static function getFeatured(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryFeatured = 'SELECT a.id, a.title, b.name , a.catid, a.created, a.created_by, a.modified, a.modified_by, a.featured FROM #__content  AS a LEFT JOIN #__users AS b ON a.created_by = b.id WHERE featured = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');		
		$db->setQuery( $queryFeatured );
		$itemsFeatured = $db->loadObjectList();
		//print_r ($itemsRevised) ;
		foreach ($itemsFeatured as &$itemFeatured) {
			$itemFeatured->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemFeatured->id);
		}
		return $itemsFeatured;
	}
	public static function getPending(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryPending = 'SELECT a.id, a.title, b.name , a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content  AS a LEFT JOIN #__users AS b ON a.created_by = b.id WHERE state = -3 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryPending );
		$itemsPending = $db->loadObjectList();
		foreach ($itemsPending as &$itemPending) {
			$itemPending->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemPending->id);
		}
		return $itemsPending;
	}
	public static function getRevised(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryRevised = 'SELECT c.id, c.version, c.title, c.catid, c.created, c.created_by, c.modified, c.modified_by,cr.name, MAX(fv.version_id) FROM #__flexicontent_items_tmp as c LEFT JOIN #__flexicontent_versions AS fv ON c.id=fv.item_id LEFT JOIN #__users AS cr ON cr.id = c.created_by LEFT JOIN #__users AS mr ON mr.id = c.modified_by WHERE c.state = -5 OR c.state = 1 GROUP BY fv.item_id HAVING c.version<>MAX(fv.version_id) ORDER BY c.modified DESC LIMIT '. (int) $params->get('count');		$db->setQuery( $queryRevised );
		$itemsRevised = $db->loadObjectList();
		//print_r ($itemsRevised) ;
		foreach ($itemsRevised as &$itemRevised) {
			$itemRevised->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemRevised->id);
		}
		return $itemsRevised;
	}
	public static function getInprogress(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryInprogress = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id WHERE state = -5 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryInprogress );
		$itemsInprogress = $db->loadObjectList();
		foreach ($itemsInprogress as &$itemInprogress) {
			$itemInprogress->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemInprogress->id);
		}
		return $itemsInprogress;
	}
	public static function getDraft(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryDraft = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id WHERE state = -4 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryDraft );
		$itemsDraft = $db->loadObjectList();
		foreach ($itemsDraft as &$itemDraft) {
			$itemDraft->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemDraft->id);
		}
		return $itemsDraft;
	}
	public static function getTrashed(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryTrashed = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id WHERE state = -2 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryTrashed );
		$itemsTrashed = $db->loadObjectList();
		foreach ($itemsTrashed as &$itemTrashed) {
			$itemTrashed->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemTrashed->id);
		}
		return $itemsTrashed;
	}
	public static function getUseritem(&$params)
	{
		$user = JFactory::getUser();
		$userid = $user->id;
		//recupére la connexion à la BD
		$db = JFactory::getDbo();
		$queryUseritem = 'SELECT id, title, catid, created, created_by, modified, modified_by, state FROM #__content WHERE created_by = '.$user->id.' ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryUseritem );
		$itemsUseritem = $db->loadObjectList();
		foreach ($itemsUseritem as &$itemUseritem) {
			$itemUseritem->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemUseritem->id);
			switch ($itemUseritem->state){
				case 0:
					$itemUseritem->state=JText::_('FLEXI_UNPUBLISHED');
				break;
				case 1:
					$itemUseritem->state=JText::_('FLEXI_PUBLISHED');
				break;
				case 2:
					$itemUseritem->state=JText::_('FLEXI_ARCHIVED');
				break;
				case -2:
					$itemUseritem->state=JText::_('FLEXI_TRASHED');
				break;
				case -3:
					$itemUseritem->state=JText::_('FLEXI_PENDING');
				break;
				case -4:
					$itemUseritem->state=JText::_('FLEXI_DRAFT');
				break;
				case -5:
					$itemUseritem->state=JText::_('FLEXI_IN_PROGRESS');
				break;
			}
		}
		return $itemsUseritem;
	}
	public static function getCustomlist(&$params)
	{
		$list_customblocks = $params->get('add_customblock');
		//print_r ($list_customblocks);
		$db = JFactory::getDbo();
		global $globalcats;
		// loop your result
		foreach( $list_customblocks as $list_customblocks_idx => $customblock ){
        		$_catid = $customblock->catidlist;
        		$catlist = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;
        		$catids_join = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
       			$catids_where = ' rel.catid IN ('.$catlist.') ';
			$queryCustomlist = 'SELECT DISTINCT  a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id '.$catids_join.'WHERE '.  $catids_where.' AND state = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
			$db->setQuery( $queryCustomlist );
			$itemsCustomlist = $db->loadObjectList();
			//print_r ($itemsCustomlist) ;
			foreach ($itemsCustomlist as &$itemCustomlist) {
				$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
			}
			$customblock->listitems = $itemCustomlist;
		}
		return $list_customblocks;
	}
}
