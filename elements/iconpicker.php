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


use Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Form\FormHelper;
use \Joomla\CMS\Form\FormField;
FormHelper::loadFieldClass('list');   // JFormFieldList
HTMLHelper::_('stylesheet', 'media/mod_flexiadmin/css/admin-style.css');
HTMLHelper::_('stylesheet', 'media/mod_flexiadmin/css/style.css');
HTMLHelper::_('script', 'media/mod_flexiadmin/js/universal-icon-picker.min.js');


class JFormFieldIconpicker extends FormField
{
  protected $type = 'Iconpicker';
  // getLabel() left out
  public function getInput()
  {

    $iconlist = ' <div class="input-group mb-3">
    <span class="input-group-text" id="' . $this->id . '-icon">
    <i class="fa '.$this->value.'"></i>
    </span>
    <input id="' . $this->id . '-wrapper" value="'.$this->value.'" name="' . $this->name . '-wrapper"  class="form-control"/><button id="' . $this->id . '-clear" class="btn btn-outline-secondary">
    Reset
    </button></div>';
    $iconlist .= "
    <script>
        document.addEventListener('DOMContentLoaded', function(event) {
        var uip = new UniversalIconPicker('#" . $this->id . "-wrapper', {
            iconLibraries: [
              'font-awesome.min.json'
            ],
            iconLibrariesCss: [
            '../../../media/mod_flexiadmin/css/font-awesome.min.css'
            ],
            resetSelector: '#" . $this->id . "-clear',  // must be an ID or '' if no reset button
            onSelect: function(jsonIconData) {
            document.getElementById('" . $this->id . "-wrapper').value = jsonIconData.iconClass;
            document.getElementById('" . $this->id . "-icon').innerHTML = jsonIconData.iconHtml;
            },
            onReset: function() {
              document.getElementById('" . $this->id . "-wrapper').value = '';
            }
            });
        });
    </script>
 ";
    return $iconlist;
  }
}
