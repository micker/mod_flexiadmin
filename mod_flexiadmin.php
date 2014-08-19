<?php
//blocage des accés directs sur ce script
defined('_JEXEC') or die('Accés interdit');
// Inclut les méthodes du script de soutien
require_once dirname(__FILE__).'/helper.php';
$listPending = modFlexiadminHelper::getPending($params);
$listRevised = modFlexiadminHelper::getRevised($params);
$listInprogress = modFlexiadminHelper::getInprogress($params);
$listDraft = modFlexiadminHelper::getDraft($params);
$listUseritem = modFlexiadminHelper::getUseritem($params);
$listCustomlist1 = modFlexiadminHelper::getCustomlist1($params);
$listCustomlist2 = modFlexiadminHelper::getCustomlist2($params);
$listCustomlist3 = modFlexiadminHelper::getCustomlist3($params);
$listCustomlist4 = modFlexiadminHelper::getCustomlist4($params);
$listCustomlist5 = modFlexiadminHelper::getCustomlist5($params);
$listCustomlist6 = modFlexiadminHelper::getCustomlist6($params);
$listCustomlist7 = modFlexiadminHelper::getCustomlist7($params);
$listCustomlist8 = modFlexiadminHelper::getCustomlist8($params);
$listCustomlist9 = modFlexiadminHelper::getCustomlist9($params);
$listCustomlist10 = modFlexiadminHelper::getCustomlist10($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_flexiadmin', $params->get('layout', 'default'));