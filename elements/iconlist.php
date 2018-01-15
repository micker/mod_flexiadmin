<?php
/**
 * @version 0.6.0 stable $Id: default.php yannick berges
 * @package Joomla
 * @subpackage FLEXIcontent
 * @copyright (C) 2015 Berges Yannick - www.com3elles.com
 * @license GNU/GPL v2

 * special thanks to ggppdk and emmanuel dannan for flexicontent
 * special thanks to my master Marc Studer

 * FLEXIadmin module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 **/
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldIconlist extends JFormField {

	protected $type = 'iconlist';

	// getLabel() left out

	public function getInput() {
		/*making sure jQuery is loaded first */
		JHtml::_('jquery.framework');
		JHtml::_('bootstrap.framework');

		JHtml::_('stylesheet', '/modules/mod_flexiadmin/assets/css/bootstrap-iconpicker.min.css');
		JHtml::_('stylesheet', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		JHtml::_('script', '/modules/mod_flexiadmin/assets/js/bootstrap-iconpicker-iconset-all.min.js');
		JHtml::_('script', '/modules/mod_flexiadmin/assets/js/bootstrap-iconpicker.min.js');

		$return = ' <button id="'. $this->id .'-wrapper" class="btn btn-default" role="iconpicker" /></div>';
		$return .= "<script>
			$(document).ready(function() {
				$('#". $this->id ."-wrapper').iconpicker({
             	align: 'left',
    			arrowClass: 'btn-success',
					arrowPrevIconClass: 'fa fa-arrow-left',
				 arrowNextIconClass: 'fa fa-arrow-right',
			    cols: 5,
			    rows:2,
			    footer: true,
			    header: true,
			    iconset: 'fontawesome',
			    labelHeader: '" . JText::sprintf( 'PLG_FIELDS_ICONLINK_PAGESINDEX', '{0}', '{1}' ) . "',
			    labelFooter: '" . JText::sprintf( 'PLG_FIELDS_ICONLINK_ICONSINDEX', '{0}', '{1}', '{2}' ) . "',
			    placement: 'bottom',
			    search: true,
			    searchText: '". JText::_('PLG_FIELDS_ICONLINK_SEARCHTEXT') . "',
			    selectedClass: 'btn-primary',
			    unselectedClass: 'btn-default',
			    iconClass: 'fontawesome',
          iconClassFix: 'fa fa-'
				});

				var myfield = $('#" . $this->id . "-wrapper'),
					input = $('input', myfield);
					input.attr({'id': '" . $this->id . "', 'name': '" . $this->name . "'});
					input.val('" . $this->value . "');

			})(jQuery);
		</script>";
		return $return;
	}
}
?>
