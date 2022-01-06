<?php
/**
* @version 0.5.0 stable $Id: iconpicker.php yannick berges
* @package Joomla
* @copyright (C) 2018 Berges Yannick - www.com3elles.com
* @license GNU/GPL v2

* special thanks to my master Marc Studer
* Elisa Foltyn coolcat-creations

* JOOMLA admin module by Com3elles is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
**/

defined('JPATH_PLATFORM') or die;
require_once(JPATH_ROOT.DS.'components'.DS.'com_flexicontent'.DS.'classes'.DS.'flexicontent.helper.php');

jimport('joomla.filesystem.folder');  // JFolder
jimport('joomla.filesystem.file');    // JFile

jimport('cms.html.html');      // JHtml
jimport('cms.html.select');    // JHtmlSelect
jimport('joomla.form.field');  // JFormField
jimport('joomla.form.helper'); // JFormHelper
JFormHelper::loadFieldClass('list');   // JFormFieldList
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Registry\Registry;
JHtml::_('stylesheet', 'media/mod_flexiadmin/css/admin-style.css');


class JFormFieldIconpicker extends JFormField {
                       protected $type = 'Iconpicker';
	// getLabel() left out
	public function getInput() {
                       
                       //JHtml::_('bootstrap.framework');
                       //JHtml::_('jquery.framework');


                       $module = JModuleHelper::getModule('mod_flexiadmin');
                       $moduleParams = new JRegistry;
                       $moduleParams->loadString($module->params);
                       //$useCDN = $moduleParams->get('usecdn', '1'); 
                       //echo $useCDN;
                       $useCDN = 1;//$this->params->get('usecdn', '1');
                       if ($useCDN == 1){
                        JHtml::_('stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
                        JHtml::_('stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/css/bootstrap-iconpicker.min.css');
                        JHtml::_('script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
                        JHtml::_('script', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker-iconset-all.min.js');
                        JHtml::_('script', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker.min.js');

                       } else {
                        //JHtml::_('stylesheet', 'media/mod_flexiadmin/css/font-awesome.min.css');
                        JHtml::_('stylesheet', 'media/mod_flexiadmin/css/bootstrap-iconpicker.min.css');
                        JHtml::_('script', 'media/mod_flexiadmin/bootstrap.min.js');
                        JHtml::_('script', 'media/mod_flexiadmin/bootstrap-iconpicker-iconset-all.min.js');
                        JHtml::_('script', 'media/mod_flexidmin/bootstrap-iconpicker.min.js');
                       }
                      

                       $iconlist = ' <button id="'. $this->id .'-wrapper" class="btn btn-secondary"/></button>';
                       $iconlist .="
                       <script>
                       (function ($) {
                       $('#". $this->id ."-wrapper').iconpicker({
                       align: 'left',
                       arrowClass: 'btn-success',
                       arrowPrevIconClass: 'fa fa-arrow-left',
                       arrowNextIconClass: 'fa fa-arrow-right',
                       cols: 5,
                       rows:5,
                       footer: true,
                       header: true,
                       iconset: 'fontawesome',
                       labelHeader: '" . JText::sprintf( 'FLEXI_ADMIN_ICONLINK_PAGESINDEX', '{0}', '{1}' ) . "',
                       labelFooter: '" . JText::sprintf( 'FLEXI_ADMIN_ICONLINK_ICONSINDEX', '{0}', '{1}', '{2}' ) . "',
                       placement: 'bottom',
                       search: true,
                       searchText: '". JText::_('FLEXI_ADMIN_ICONLINK_SEARCHTEXT') . "',
                       selectedClass: 'btn-primary',
                       unselectedClass: 'btn-default',
                       iconClass: 'fontawesome',
                       iconClassFix: 'fa fa-',
                       icon:'" . $this->value . "'
                       });

                       var myfield = $('#" . $this->id . "-wrapper'),
                       input = $('input', myfield);
                       input.attr({'id': '" . $this->id . "', 'name': '" . $this->name . "'});
                       input.val('" . $this->value . "');

                       })(jQuery);
                       </script>
                       ";
                       return $iconlist;
                       }
}
