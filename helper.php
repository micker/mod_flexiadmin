<?php
/**
* @version 0.8.0 stable $Id: default.php yannick berges
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
		$queryRevised = 'SELECT c.id, c.version, c.title,catid, c.created, c.created_by, c.modified, c.modified_by,cr.name, MAX(fv.version_id) FROM #__flexicontent_items_tmp as c LEFT JOIN #__flexicontent_versions AS fv ON c.id=fv.item_id LEFT JOIN #__users AS cr ON cr.id = c.created_by LEFT JOIN #__users AS mr ON mr.id = c.modified_by WHERE c.state = -5 OR c.state = 1 GROUP BY fv.item_id HAVING c.version<>MAX(fv.version_id) ORDER BY c.modified DESC LIMIT '. (int) $params->get('count');		$db->setQuery( $queryRevised );
		$db->setQuery( $queryRevised );
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
	public static function getCustomlist1(&$params)
	{
        global $globalcats;
        $_catid = (int) $params->get('catidlist1');
        $catlist = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;

        $catids_join = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
        $catids_where = ' rel.catid IN ('.$catlist.') ';
        
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id '.$catids_join.'WHERE '.  $catids_where.' AND state = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist );
		$itemsCustomlist = $db->loadObjectList();
		//print_r ($itemsCustomlist) ;
		foreach ($itemsCustomlist as &$itemCustomlist) {
			$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
		}
		return $itemsCustomlist;
	}
	public static function getCustomlist2(&$params)
	{
        global $globalcats;
        $_catid = (int) $params->get('catidlist2');
        $catlist = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;

        $catids_join = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
        $catids_where = ' rel.catid IN ('.$catlist.') ';
        
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist2 = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id '.$catids_join.'WHERE '.  $catids_where.' AND state = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist2 );
		$itemsCustomlist2 = $db->loadObjectList();
		foreach ($itemsCustomlist2 as &$itemCustomlist2) {
			$itemCustomlist2->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist2->id);
		}
		return $itemsCustomlist2;
	}
	public static function getCustomlist3(&$params)
	{
        global $globalcats;
        $_catid = (int) $params->get('catidlist3');
        $catlist = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;

        $catids_join = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
        $catids_where = ' rel.catid IN ('.$catlist.') ';
        
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist3 = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id '.$catids_join.'WHERE '.  $catids_where.' AND state = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist3 );
		$itemsCustomlist3 = $db->loadObjectList();
		foreach ($itemsCustomlist3 as &$itemCustomlist3) {
			$itemCustomlist3->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist3->id);
		}
		return $itemsCustomlist3;
	}
	public static function getCustomlist4(&$params)
	{
		 global $globalcats;
        $_catid = (int) $params->get('catidlist4');
        $catlist = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;

        $catids_join = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
        $catids_where = ' rel.catid IN ('.$catlist.') ';
        
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist4 = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id '.$catids_join.'WHERE '.  $catids_where.' AND state = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist4 );
		$itemsCustomlist4 = $db->loadObjectList();
		foreach ($itemsCustomlist4 as &$itemCustomlist4) {
			$itemCustomlist4->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist4->id);
		}
		return $itemsCustomlist4;
	}
	public static function getCustomlist5(&$params)
	{
		 global $globalcats;
        $_catid = (int) $params->get('catidlist5');
        $catlist = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;

        $catids_join = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
        $catids_where = ' rel.catid IN ('.$catlist.') ';
        
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist5 = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id '.$catids_join.'WHERE '.  $catids_where.' AND state = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist5 );
		$itemsCustomlist5 = $db->loadObjectList();
		foreach ($itemsCustomlist5 as &$itemCustomlist5) {
			$itemCustomlist5->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist5->id);
		}
		return $itemsCustomlist5;
	}
	public static function getCustomlist6(&$params)
	{
		 global $globalcats;
        $_catid = (int) $params->get('catidlist6');
        $catlist = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;

        $catids_join = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
        $catids_where = ' rel.catid IN ('.$catlist.') ';
        
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist6 = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id '.$catids_join.'WHERE '.  $catids_where.' AND state = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist6 );
		$itemsCustomlist6 = $db->loadObjectList();
		foreach ($itemsCustomlist6 as &$itemCustomlist6) {
			$itemCustomlist6->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist6->id);
		}
		return $itemsCustomlist6;
	}
	public static function getCustomlist7(&$params)
	{
		 global $globalcats;
        $_catid = (int) $params->get('catidlist7');
        $catlist = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;

        $catids_join = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
        $catids_where = ' rel.catid IN ('.$catlist.') ';
        
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist7 = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id '.$catids_join.'WHERE '.  $catids_where.' AND state = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist7 );
		$itemsCustomlist7 = $db->loadObjectList();
		foreach ($itemsCustomlist7 as &$itemCustomlist7) {
			$itemCustomlist7->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist7->id);
		}
		return $itemsCustomlist7;
	}
	public static function getCustomlist8(&$params)
	{
		 global $globalcats;
        $_catid = (int) $params->get('catidlist8');
        $catlist = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;

        $catids_join = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
        $catids_where = ' rel.catid IN ('.$catlist.') ';
        
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist8 = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id '.$catids_join.'WHERE '.  $catids_where.' AND state = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist8 );
		$itemsCustomlist8 = $db->loadObjectList();
		foreach ($itemsCustomlist8 as &$itemCustomlist8) {
			$itemCustomlist8->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist8->id);
		}
		return $itemsCustomlist8;
	}
	public static function getCustomlist9(&$params)
	{
		 global $globalcats;
        $_catid = (int) $params->get('catidlist9');
        $catlist = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;

        $catids_join = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
        $catids_where = ' rel.catid IN ('.$catlist.') ';
        
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist9 = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id '.$catids_join.'WHERE '.  $catids_where.' AND state = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist9 );
		$itemsCustomlist9 = $db->loadObjectList();
		foreach ($itemsCustomlist9 as &$itemCustomlist9) {
			$itemCustomlist9->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist9->id);
		}
		return $itemsCustomlist9;
	}
	public static function getCustomlist10(&$params)
	{
		 global $globalcats;
        $_catid = (int) $params->get('catidlist10');
        $catlist = !empty($globalcats[$_catid]->descendants) ? $globalcats[$_catid]->descendants : $_catid;

        $catids_join = ' JOIN #__flexicontent_cats_item_relations AS rel ON rel.itemid = a.id ';
        $catids_where = ' rel.catid IN ('.$catlist.') ';
        
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist10 = 'SELECT a.id,b.name, a.title, a.catid, a.created, a.created_by, a.modified, a.modified_by FROM #__content AS a LEFT JOIN #__users AS b ON a.created_by = b.id '.$catids_join.'WHERE '.  $catids_where.' AND state = 1 ORDER BY modified DESC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist10 );
		$itemsCustomlist10 = $db->loadObjectList();
		foreach ($itemsCustomlist10 as &$itemCustomlist10) {
			$itemCustomlist10->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist10->id);
		}
		return $itemsCustomlist10;
	}
}
