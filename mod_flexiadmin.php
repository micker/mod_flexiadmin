<?php
/**
 * @version       3.0 stable $Id: default.php yannick berges
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

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;

// Check if component is installed
if (!ComponentHelper::isEnabled('com_flexicontent'))
{
	echo 'This modules requires component FLEXIcontent!';

	return;
}

// Inclut les méthodes du script de soutien
require_once dirname(__FILE__) . '/helper.php';

// Charger les fichiers de langue de FLEXIcontent
$lang = Factory::getApplication()->getLanguage();
$lang->load('com_flexicontent', JPATH_ADMINISTRATOR, $lang->getTag());

// Clear FLEXIcontent state variables
modFlexiadminHelper::clearState();

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$system_buttons  = modFlexiadminHelper::getIconFromPlugins($params);
$customBlocks    = [];

if (!empty($params->get('add_customblock', [])))
{
	$customBlocks = modFlexiadminHelper::getItems((array) $params->get('add_customblock'));
}

// Get Joomla Layout
require ModuleHelper::getLayoutPath('mod_flexiadmin', $params->get('layout', 'default'));
