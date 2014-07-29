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
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_flexiadmin', $params->get('layout', 'default'));