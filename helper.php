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
		//$user = JFactory::getUser();		//$userid = $user->id;
		// recupére la connexion à la BD
		//$db = JFactory::getDbo();
		//$queryUseritem = 'SELECT id, title, catid, created, created_by, modified, modified_by FROM #__content WHERE created_by = '.$user->id.' LIMIT '. (int) $params->get('count');
		//$db->setQuery( $queryUseritem );
		//$itemsUseritem = $db->loadObjectList();		
		//foreach ($itemsUseritem as &$itemUseritem) {
		//	$itemUseritem->link = JRoute::_('index.php?option=com_flexicontent&task=items.edit&cid[]=');
		//}
		//return $itemsUseritem;
	}

}