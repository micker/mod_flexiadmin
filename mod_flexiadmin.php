<?php
/**
* @version 0.9.5 stable $Id: default.php yannick berges
* @package Joomla
* @subpackage FLEXIcontent
* @copyright (C) 2017 Berges Yannick - www.com3elles.com
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
jimport( 'joomla.application.component.controller' );
// Check if component is installed
if ( !JComponentHelper::isEnabled( 'com_flexicontent', true) ) {
   echo 'This modules requires component FLEXIcontent!';
   return;
}
// Inclut les méthodes du script de soutien
require_once dirname(__FILE__).'/helper.php';
$listPending      = modFlexiadminHelper::getPending($params);
$listRevised      = modFlexiadminHelper::getRevised($params);
$listInprogress   = modFlexiadminHelper::getInprogress($params);
$listDraft        = modFlexiadminHelper::getDraft($params);
$listUseritem     = modFlexiadminHelper::getUseritem($params);
$listCustomlist1  = modFlexiadminHelper::getCustomlist1($params);
$listCustomlist2  = modFlexiadminHelper::getCustomlist2($params);
$listCustomlist3  = modFlexiadminHelper::getCustomlist3($params);
$listCustomlist4  = modFlexiadminHelper::getCustomlist4($params);
$listCustomlist5  = modFlexiadminHelper::getCustomlist5($params);
$listCustomlist6  = modFlexiadminHelper::getCustomlist6($params);
$listCustomlist7  = modFlexiadminHelper::getCustomlist7($params);
$listCustomlist8  = modFlexiadminHelper::getCustomlist8($params);
$listCustomlist9  = modFlexiadminHelper::getCustomlist9($params);
$listCustomlist10 = modFlexiadminHelper::getCustomlist10($params);
$moduleclass_sfx  = htmlspecialchars($params->get('moduleclass_sfx'));

// Get Joomla Layout
require JModuleHelper::getLayoutPath('mod_flexiadmin', $params->get('layout', 'default'));
