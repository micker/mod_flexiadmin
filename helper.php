<?php
//blocage des accés directs sur ce script
defined('_JEXEC') or die('Accés interdit');
abstract class modFlexiadminHelper
{
	public static function getPending(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryPending = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE state = -3 LIMIT '. (int) $params->get('count');
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
		$queryRevised = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE state = -5 OR state = 1 LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryRevised );
		$itemsRevised = $db->loadObjectList();
		foreach ($itemsRevised as &$itemRevised) {
			$itemRevised->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemRevised->id);
		}
		return $itemsRevised;
	}
	public static function getInprogress(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryInprogress = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE state = -5 LIMIT '. (int) $params->get('count'); 
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
		$queryDraft = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE state = -4 LIMIT '. (int) $params->get('count');
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
		$queryUseritem = 'SELECT id, title, catid, created, created_by, modified, modified_by, state FROM #__content WHERE created_by = '.$user->id.' LIMIT '. (int) $params->get('count');
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
					$itemUseritem->state=JText::_('FLEXI_TO_WRITE');
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
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE catid='.(int) $params->get('catidlist1').' AND state = 1 ORDER BY modified ASC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist );
		$itemsCustomlist = $db->loadObjectList();
		foreach ($itemsCustomlist as &$itemCustomlist) {
			$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
		}
		return $itemsCustomlist;
	}
	public static function getCustomlist2(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist2 = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE catid='.(int) $params->get('catidlist2').' AND state = 1 ORDER BY modified ASC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist2 );
		$itemsCustomlist2 = $db->loadObjectList();
		foreach ($itemsCustomlist2 as &$itemCustomlist2) {
			$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
		}
		return $itemsCustomlist2;
	}
	public static function getCustomlist3(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist3 = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE catid='.(int) $params->get('catidlist3').' AND state = 1 ORDER BY modified ASC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist3 );
		$itemsCustomlist3 = $db->loadObjectList();
		foreach ($itemsCustomlist3 as &$itemCustomlist3) {
			$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
		}
		return $itemsCustomlist3;
	}
	public static function getCustomlist4(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist4 = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE catid='.(int) $params->get('catidlist4').' AND state = 1 ORDER BY modified ASC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist4 );
		$itemsCustomlist4 = $db->loadObjectList();
		foreach ($itemsCustomlist4 as &$itemCustomlist4) {
			$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
		}
		return $itemsCustomlist4;
	}
	public static function getCustomlist5(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist5 = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE catid='.(int) $params->get('catidlist5').' AND state = 1 ORDER BY modified ASC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist5 );
		$itemsCustomlist5 = $db->loadObjectList();
		foreach ($itemsCustomlist5 as &$itemCustomlist5) {
			$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
		}
		return $itemsCustomlist5;
	}
	public static function getCustomlist6(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist6 = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE catid='.(int) $params->get('catidlist6').' AND state = 1 ORDER BY modified ASC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist6 );
		$itemsCustomlist6 = $db->loadObjectList();
		foreach ($itemsCustomlist6 as &$itemCustomlist6) {
			$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
		}
		return $itemsCustomlist6;
	}
	public static function getCustomlist7(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist7 = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE catid='.(int) $params->get('catidlist7').' AND state = 1 ORDER BY modified ASC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist7 );
		$itemsCustomlist7 = $db->loadObjectList();
		foreach ($itemsCustomlist7 as &$itemCustomlist7) {
			$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
		}
		return $itemsCustomlist7;
	}
	public static function getCustomlist8(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist8 = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE catid='.(int) $params->get('catidlist8').' AND state = 1 ORDER BY modified ASC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist8 );
		$itemsCustomlist8 = $db->loadObjectList();
		foreach ($itemsCustomlist8 as &$itemCustomlist8) {
			$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
		}
		return $itemsCustomlist8;
	}
	public static function getCustomlist9(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist9 = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE catid='.(int) $params->get('catidlist9').' AND state = 1 ORDER BY modified ASC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist9 );
		$itemsCustomlist9 = $db->loadObjectList();
		foreach ($itemsCustomlist9 as &$itemCustomlist9) {
			$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
		}
		return $itemsCustomlist9;
	}
	public static function getCustomlist10(&$params)
	{
		// recupere la connexion à la BD
		$db = JFactory::getDbo();
		$queryCustomlist10 = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE catid='.(int) $params->get('catidlist10').' AND state = 1 ORDER BY modified ASC LIMIT '. (int) $params->get('count');
		$db->setQuery( $queryCustomlist10 );
		$itemsCustomlist10 = $db->loadObjectList();
		foreach ($itemsCustomlist10 as &$itemCustomlist10) {
			$itemCustomlist->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]='.$itemCustomlist->id);
		}
		return $itemsCustomlist10;
	}
}