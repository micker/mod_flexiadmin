<?php
/**
 * @version       2.5 stable $Id: default.php yannick berges
 * @package       Joomla
 * @subpackage    FLEXIcontent
 * @copyright (C) 2022 Berges Yannick - www.com3elles.com
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

//blocage des accès directs sur ce script
defined('_JEXEC') or die('Accès interdit');
jimport('joomla.application.component.controller');

// Check if component is installed
if (!JComponentHelper::isEnabled('com_flexicontent'))
{
	echo 'This modules requires component FLEXIcontent!';

	return;
}
// Inclut les méthodes du script de soutien
require_once dirname(__FILE__) . '/helper.php';

$listFeatured   = modFlexiadminHelper::getItems($params, true);
$listUseritem   = modFlexiadminHelper::getItems($params, false, true);
$listTrashed    = modFlexiadminHelper::getItems($params, false, false, -2);
$listPending    = modFlexiadminHelper::getItems($params, false, false, -3);
$listDraft      = modFlexiadminHelper::getItems($params, false, false, -4);
$listInprogress = modFlexiadminHelper::getItems($params, false, false, -5);
$listRevised     = modFlexiadminHelper::getRevised($params);
$listCustomlist  = modFlexiadminHelper::getCustomlist($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$system_buttons  = modFlexiadminHelper::getIconFromPlugins($params);
$actionlist      = modFlexiadminHelper::getActionlogList($params);

// Get Joomla Layout
require JModuleHelper::getLayoutPath('mod_flexiadmin', $params->get('layout', 'default'));
