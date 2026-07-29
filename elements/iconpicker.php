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

// JPATH_PLATFORM has been removed in Joomla 6, use the regular entry point guard
defined('_JEXEC') or die;

use Joomla\CMS\Form\FormField;
use Joomla\CMS\HTML\HTMLHelper;

class JFormFieldIconpicker extends FormField
{
  protected $type = 'Iconpicker';
  // getLabel() left out
  public function getInput()
  {
    HTMLHelper::_('stylesheet', 'media/mod_flexiadmin/css/admin-style.css');
    HTMLHelper::_('stylesheet', 'media/mod_flexiadmin/css/style.css');
    HTMLHelper::_('script', 'media/mod_flexiadmin/js/universal-icon-picker.min.js');

    $id    = htmlspecialchars($this->id, ENT_QUOTES, 'UTF-8');
    $name  = htmlspecialchars($this->name, ENT_QUOTES, 'UTF-8');
    $value = htmlspecialchars((string) $this->value, ENT_QUOTES, 'UTF-8');

    $iconlist = ' <div class="input-group mb-3">
    <span class="input-group-text" id="' . $id . '-icon">
    <i class="fa '.$value.'"></i>
    </span>
    <input id="' . $id . '-wrapper" value="'.$value.'" name="' . $name . '-wrapper"  class="form-control"/><button type="button" id="' . $id . '-clear" class="btn btn-outline-secondary">
    Reset
    </button></div>';
    $iconlist .= "
    <script>
        document.addEventListener('DOMContentLoaded', function(event) {
        var uip = new UniversalIconPicker('#" . $id . "-wrapper', {
            iconLibraries: [
              'font-awesome.min.json'
            ],
            iconLibrariesCss: [
            '../../../media/mod_flexiadmin/css/font-awesome.min.css'
            ],
            resetSelector: '#" . $id . "-clear',  // must be an ID or '' if no reset button
            onSelect: function(jsonIconData) {
            document.getElementById('" . $id . "-wrapper').value = jsonIconData.iconClass;
            document.getElementById('" . $id . "-icon').innerHTML = jsonIconData.iconHtml;
            },
            onReset: function() {
              document.getElementById('" . $id . "-wrapper').value = '';
            }
            });
        });
    </script>
 ";
    return $iconlist;
  }
}
