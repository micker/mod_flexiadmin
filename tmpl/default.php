<?php

/**
 * @version       2.0 stable $Id: default.php yannick berges
 * @package       Joomla
 * @subpackage    FLEXIcontent
 * @copyright (C) 2016 Berges Yannick - www.com3elles.com
 * @license       GNU/GPL v2
 * special thanks to ggppdk and emmanuel dannan for flexicontent
 * special thanks to my master Marc Studer
 * FLEXIadmin module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 **/

//blocage des accés directs sur ce script
defined('_JEXEC') or die('Accés interdit');

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

$document = JFactory::getDocument();
$app      = JFactory::getApplication();
$user     = JFactory::getUser();
$userId   = $user->get('id');

//JHtml::_('stylesheet', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
JHtml::_('stylesheet', 'media/mod_flexiadmin/css/style.css');
JHtml::_('stylesheet', 'media/mod_flexiadmin/css/bootstrap-iconpicker.css');
JHtml::_('stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

$force_fullwidth = $params->get('force_fullwidth', '1');

if ($force_fullwidth)
{
	$style = ".card-columns {
		grid-template-columns: 1fr !important;
	}";
	$document->addStyleDeclaration($style);
}


//extrafield
require_once(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_flexicontent' . DS . 'defineconstants.php');
require_once(JPATH_SITE . DS . 'components' . DS . 'com_flexicontent' . DS . 'helpers' . DS . 'route.php');
require_once(JPATH_SITE . DS . 'components' . DS . 'com_flexicontent' . DS . 'classes' . DS . 'flexicontent.helper.php');
require_once(JPATH_SITE . DS . 'components' . DS . 'com_flexicontent' . DS . 'classes' . DS . 'flexicontent.fields.php');
require_once(JPATH_SITE . DS . 'components' . DS . 'com_flexicontent' . DS . 'classes' . DS . 'flexicontent.categories.php');
JTable::addIncludePath(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_flexicontent' . DS . 'tables');
require_once(JPATH_SITE . DS . 'components' . DS . 'com_flexicontent' . DS . 'models' . DS . 'item.php');

$itemmodel_name = FLEXI_J16GE ? 'FlexicontentModelItem' : 'FlexicontentModelItems';
$itemmodel      = new $itemmodel_name();

//module config
$hiddefeatured       = $params->get('hiddefeatured', '1');
$hiddepending        = $params->get('hiddepending', '1');
$hidderevised        = $params->get('hidderevised', '1');
$hiddeinprogess      = $params->get('hiddeinprogess', '1');
$hiddedraft          = $params->get('hiddedraft', '1');
$hiddeyouritem       = $params->get('hiddeyouritem', '1');
$hiddetrashed        = $params->get('hiddetrashed', '1');
$actionsloglist      = $params->get('actionsloglist', '1');
$displaycustomtab    = $params->get('displaycustomtab', '1');
$displaycreattab     = $params->get('displaycreattab', '1');
$displaymanagetab    = $params->get('displaymanagetab', '1');
$displayadmintab     = $params->get('displayadmintab', '1');
$displayfreetab      = $params->get('displayfreetab', '1');
$displayconfigmodule = $params->get('displayconfigmodule', '1');
$forceheightblock    = $params->get('forceheightblock', '');
$displaycustomtext   = $params->get('displaycustomtext', '');
$customtext          = $params->get('customtext', '');
$displayinfosystem   = $params->get('displayinfosystem', '1');
$displayinfosystem   = $params->get('displayinfosystem', '1');
$featurewidth        = $params->get('featuredwidth', '46');
$pendingwidth        = $params->get('pendingwidth', '46');
$revisedwidth        = $params->get('revisedwidth', '46');
$inprogessdwidth     = $params->get('inprogessdwidth', '46');
$draftwidth          = $params->get('draftwidth', '46');
$youritemwidth       = $params->get('youritemwidth', '46');
$trashedwidth        = $params->get('trashedlogwidth', '46');
$archivedwidth       = $params->get('archivedwidth', '46');
$actionslogwidth     = $params->get('actionslogwidth', '46');
$iconsize            = $params->get('iconsize', 'fa-2x');

//customtab
$nametab = $params->get('nametab', 'FLEXI_ADMIN_CUSTOM_TAB_NAME');

//Get Buttom Sections
$hiddebuttonmanageitems      = $params->get('hiddebuttonmanageitems', '1');
$hiddebuttonmanagecategories = $params->get('hiddebuttonmanagecategories', '1');
$hiddebuttonmanagetypes      = $params->get('hiddebuttonmanagetypes', '1');
$hiddebuttonmanagetags       = $params->get('hiddebuttonmanagetags', '1');
$hiddebuttonmanagefields     = $params->get('hiddebuttonmanagefields', '1');
$hiddebuttonmanageauthors    = $params->get('hiddebuttonmanageauthors', '1');
$hiddebuttonmanagegroups     = $params->get('hiddebuttonmanagegroups', '1');
$hiddebuttonmanagefiles      = $params->get('hiddebuttonmanagefiles', '1');
$hiddebuttonimportcontent    = $params->get('hiddebuttonimportcontent', '1');
$hiddebuttonstats            = $params->get('hiddebuttonstats', '1');
$hiddebuttonindex            = $params->get('hiddebuttonindex', '1');
$hiddebuttonaddtypes         = $params->get('hiddebuttonaddtypes', '1');
$hiddebuttonaddfields        = $params->get('hiddebuttonaddfields', '1');
$hiddebuttonadmin            = $params->get('hiddebuttonadmin', '1');
$hiddebuttonadditem          = $params->get('hiddebuttonadditem', '1');
$hiddebuttonaddcategory      = $params->get('hiddebuttonaddcategory', '1');
$hiddebuttonaddtag           = $params->get('hiddebuttonaddtag', '1');
$hiddebuttonadduser          = $params->get('hiddebuttonadduser', '1');
$hiddebuttonaddgroup         = $params->get('hiddebuttonaddgroup', '1');
$hiddebuttonprivacy          = $params->get('hiddebuttonprivacy', '1');
$hiddebuttonlogs             = $params->get('hiddebuttonlogs', '1');

$displayauthoronly = $params->get('displayauthoronly', '0');

$user = JFactory::getUser();

//freetab
$freenametab = $params->get('freenametab', 'FLEXI_ADMIN_FREE_TAB_NAME');

//Analytics tab
$displayanalytics         = $params->get('displayanalytics');
$analytics_url            = $params->get('analytics_site_url');
$analytics_siteid         = $params->get('analytics_siteid');
$analytics_period         = $params->get('analytics_period', 'week');
$analytics_date           = $params->get('analytics_date', 'yesterday');
$analytics_height         = $params->get('analytics_height', '500');
$analytics_tab_name       = $params->get('analytics_tabname', 'FLEXI_ADMIN_TAB_ANALYTICS');
$analytics_button_name    = $params->get('analytics_button', 'FLEXI_ADMIN_LINK_ANALYTICS');
$analytics_token_auth     = $params->get('analytics_site_token_auth');
$analytics_use_token_auth = $params->get('analytics_use_token');


jimport('joomla.application.component.controller');
// Check if component is installed
if (!JComponentHelper::isEnabled('com_flexicontent', true))
{
	echo 'This modules requires component FLEXIcontent!';

	return;
}
?>


<div class="row-fluid <?php echo $moduleclass_sfx; ?>">

    <div class="headerblock">
		<?php if ($displayinfosystem && $displayconfigmodule) : ?>
            <div class="info-bar top list-group-item">
                <ul class="breadcrumb">
					<?php if ($displayinfosystem || $displayconfigmodule) : ?>
						<?php if ($displayinfosystem) : ?>
							<?php foreach ($system_buttons as $sys_buttons) : ?>
                                <li id="<?php echo $sys_buttons['id']; ?>" class="">
                                    <a href="<?php echo $sys_buttons['link']; ?>">
                                        <span class="<?php echo $sys_buttons['image']; ?>" aria-hidden="true"></span>
                                        <span class="j-links-link"><?php echo $sys_buttons['text']; ?></span>
                                    </a>
                                    <span class="divider"> | </span>
                                </li>
							<?php endforeach; ?>
						<?php endif; ?>
					<?php endif; ?>
                </ul>
            </div>
		<?php endif; ?>

		<?php if ($displaycustomtext) : ?>
            <div class="modulemessage ">
				<?php echo $customtext; ?>
            </div>
		<?php endif; ?>

		<?php if ($displaycustomtab || $displaycreattab || $displaymanagetab || $displayadmintab || $displayfreetab) : ?>
            <div class="action">

				<?php echo HTMLHelper::_('uitab.startTabSet', 'myTab', array('active' => 'general')); ?>

				<?php if ($displaycustomtab) : ?>
					<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'custom', Text::_($nametab)); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="quick-icons dashboard" aria-label="Quick custom link">
                                <ul class="flex-wrap2">

									<?php $list_buttons = $params->get('add_button');
									foreach ($list_buttons as $list_buttons_idx => $add_button) : ?>
                                        <li class="quickicon quickicon-single col <?php echo $add_button->displayline ? 'newlinegrid' : ''; ?>">
                                            <a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $add_button->button_type; ?>&maincat=<?php echo $add_button->catid; ?>&filter_lang=<?php echo $add_button->button_lang; ?>">
                                                <div class="quickicon-icon d-flex align-items-end big">
													<?php
													$icon  = !empty($add_button->iconbutton) ? $add_button->iconbutton : 'fa-plus-circle';
													$style = !empty($add_button->coloricon) ? 'color: ' . $add_button->coloricon . ';' : '';
													?>
                                                    <i class="fas <?php echo $icon . ' ' . $iconsize; ?>"
                                                       style="<?php echo $style; ?>"
                                                    ></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo Text::_($add_button->button_name); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endforeach; ?>

									<?php $list_catbuttons = $params->get('add_cat_button'); ?>
									<?php foreach ($list_catbuttons as $list_catbuttons_idx => $cat_button) : ?>
										<?php
										$filter_byauthor = $cat_button->displayauthoronly == 1 ? '&amp;filter_author=' . $user->id : '';
										$filter_by_type  = !empty($cat_button->button_type) ? '&amp;filter_type=' . $cat_button->button_type : '';
										?>
                                        <li class="quickicon quickicon-single col <?php echo $cat_button->displayline ? 'newlinegrid' : ''; ?>">
                                            <a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $cat_button->filtercatids; ?>&filter_lang=<?php echo $cat_button->button_lang; ?><?php echo $filter_byauthor; ?><?php echo $filter_by_type; ?>">
                                                <div class="quickicon-icon d-flex align-items-end big">
													<?php
													$icon  = !empty($cat_button->iconbutton) ? $cat_button->iconbutton : 'fa-th-list';
													$style = !empty($cat_button->coloricon) ? 'color: ' . $cat_button->coloricon . ';' : '';
													?>
                                                    <i class="fas <?php echo $icon . ' ' . $iconsize; ?>"
                                                       style="<?php echo $style; ?>"></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo Text::_($cat_button->namecatfilter); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endforeach; ?>

									<?php $list_edititembuttons = $params->get('edit_item_button'); ?>
									<?php foreach ($list_edititembuttons as $list_edititembuttons_idx => $edit_item_button) : ?>
                                        <li class="quickicon quickicon-single col <?php echo $edit_item_button->displayline ? 'newlinegrid' : ''; ?>">
                                            <a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $edit_item_button->itemid; ?>">
                                                <div class="quickicon-icon d-flex align-items-end big">
													<?php
													$icon  = !empty($edit_item_button->iconbutton) ? $edit_item_button->iconbutton : 'fa-th-list';
													$style = !empty($edit_item_button->coloricon) ? 'color: ' . $edit_item_button->coloricon . ';' : '';
													?>
                                                    <i class="fas <?php echo $icon . ' ' . $iconsize; ?>"
                                                       style="<?php echo $style; ?>"></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo Text::_($edit_item_button->nameitemedit); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endforeach; ?>

                                </ul>
                            </nav>
                        </div>
                    </div>

					<?php echo HTMLHelper::_('uitab.endTab'); ?>
				<?php endif; ?>

				<?php if ($displaycreattab) : ?>
					<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'create', Text::_('FLEXI_ADMIN_TAB_CREATE_D')); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="quick-icons dashboard" aria-label="Quick links creation">
                                <ul class="flex-wrap">

									<?php if ($hiddebuttonadditem) : ?>
                                        <li class="quickicon quickicon-single col ">
											<?php
											$add_item_url  = JUri::base(true) . '/index.php?option=com_flexicontent&view=types&tmpl=component&layout=typeslist&action=new';
											$window_title  = flexicontent_html::encodeHTML(JText::_('FLEXI_TYPE'), 2);
											$add_button_js = 'var url = jQuery(this).attr(\'href\'); ' .
												' fc_showDialog(url, \'fc_modal_popup_container\', 0, 1200, 0, false, {\'title\': \'" . $window_title . "\'}); ' .
												' return false;';
											echo '<a  href=' . $add_item_url . '  onclick="' . $add_button_js . '"> '; ?>
                                            <div class="quickicon-icon d-flex align-items-end big">
                                                <i class="fas fa-plus-circle <?php echo $iconsize; ?> "></i>
                                            </div>
                                            <div class="quickicon-name d-flex align-items-center">
												<?php echo Text::_('FLEXI_ADMIN_ADDITEM'); ?>
                                            </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonaddcategory) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=category">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-folder-open <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_ADDCATEGORY'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonaddtag) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=tag">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-tags <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_ADDTAG'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonadduser) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&task=users.add">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-user <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_ADDAUTHOR'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonaddgroup) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=groups.add">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-users <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_ADDGROUPS'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

                                </ul>
                            </nav>
                        </div>
                    </div>

					<?php echo HTMLHelper::_('uitab.endTab'); ?>
				<?php endif; ?>

				<?php if ($displaymanagetab) : ?>
					<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'manage', Text::_('FLEXI_ADMIN_TAB_MANAGE_D')); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="quick-icons dashboard" aria-label="Quick links creation">
                                <ul class="flex-wrap">

									<?php if ($hiddebuttonmanageitems) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=items">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-th-list <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_ITEMLIST'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonmanagecategories) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=categories">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-folder-open <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_CATLIST'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonmanagetags) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=tags">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-tags <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_TAGLIST'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonmanageauthors) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=users">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-user <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_AUTHORLIST'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonmanagegroups) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=groups">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-users <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_GROUPSLIST'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonmanagefiles) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=filemanager">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-upload <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_FILEMANAGER'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

                                </ul>
                            </nav>
                        </div>
                    </div>

					<?php echo HTMLHelper::_('uitab.endTab'); ?>
				<?php endif; ?>

				<?php if ($displayadmintab) : ?>
					<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'admin', Text::_('FLEXI_ADMIN_TAB_ADMIN_D')); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="quick-icons dashboard" aria-label="Quick links creation">
                                <ul class="flex-wrap">

									<?php if ($hiddebuttonprivacy) : ?>
                                        <li class="quickicon quickicon-single col">
                                            <a href="index.php?option=com_privacy">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-lock <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_PRIVACY'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonlogs) : ?>
                                        <li class="quickicon quickicon-single col">
                                            <a href="index.php?option=com_actionlogs">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-list-alt <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_LOGS'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonprivacy || $hiddebuttonlogs) : ?>
									<?php endif; ?>

									<?php if ($hiddebuttonmanagetypes) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=types">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-book <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_TYPELIST'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonaddtypes) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=type">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-th-list <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_ADDTYPE'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonmanagefields) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=fields">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fas fa-th-list <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_FIELDLIST'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonaddfields) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=field">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fa fa-plus-circle <?php echo $iconsize; ?> "></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_ADDFIELD'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonimportcontent) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=import">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fa fa-download <?php echo $iconsize; ?>"></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_IMPORT'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonstats) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=stats">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fa fa-pie-chart <?php echo $iconsize; ?>"></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_STATS'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonindex) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent&view=search">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fa fa-search <?php echo $iconsize; ?>"></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_SEARCH'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

									<?php if ($hiddebuttonadmin) : ?>
                                        <li class="quickicon quickicon-single col ">
                                            <a href="index.php?option=com_flexicontent">
                                                <div class="quickicon-icon d-flex align-items-end big">
                                                    <i class="fa fa-cogs <?php echo $iconsize; ?>"></i>
                                                </div>
                                                <div class="quickicon-name d-flex align-items-center">
													<?php echo JText::_('FLEXI_ADMIN_GEN'); ?>
                                                </div>
                                            </a>
                                        </li>
									<?php endif; ?>

                                </ul>
                            </nav>
                        </div>
                    </div>

					<?php echo HTMLHelper::_('uitab.endTab'); ?>
				<?php endif; ?>

				<?php if ($displayfreetab) : ?>

					<?php $list_freebuttons = $params->get('free_button'); ?>
					<?php if ($list_freebuttons) : ?>

						<?php foreach ($list_freebuttons as $list_freebuttons_idx => $free_buttons) : ?>
							<?php $tabname = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/', '', $free_buttons->freenametab)); ?>
							<?php echo HTMLHelper::_('uitab.addTab', 'myTab', $tabname, Text::_($free_buttons->freenametab)); ?>

                            <div class="row">
                                <div class="col-lg-12">
                                    <nav class="quick-icons dashboard" aria-label="Quick links creation">
                                        <ul class="flex-wrap">

											<?php foreach ($free_buttons->free_button as $free_button_idx => $free_button) : ?>
                                                <li class="quickicon quickicon-single col <?php echo $free_button->displayline ? 'newlinegrid' : ''; ?>">
                                                    <a href="<?php echo $free_button->linkbutton; ?>"
                                                       target="<?php echo $free_button->targetlink; ?>">
                                                        <div class="quickicon-icon d-flex align-items-end big">
															<?php
															$icon  = !empty($free_button->iconbutton) ? $free_button->iconbutton : 'fa-edit';
															$style = !empty($free_button->coloricon) ? 'color: ' . $free_button->coloricon . ';' : '';
															?>
                                                            <i class="fas <?php echo $icon . ' ' . $iconsize; ?>"
                                                               style="<?php echo $style; ?>"
                                                            ></i>
                                                        </div>
                                                        <div class="quickicon-name d-flex align-items-center">
															<?php echo Text::_($free_button->freebutton); ?>
                                                        </div>
                                                    </a>
                                                </li>
											<?php endforeach; ?>

											<?php echo !empty($edit_item_button->displayline) ? 'newlinegrid' : ''; ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

							<?php echo HTMLHelper::_('uitab.endTab'); ?>
						<?php endforeach; ?>

					<?php endif; ?>
				<?php endif; ?>

				<?php if ($displayanalytics && $analytics_url) : ?>
					<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'create', Text::_($analytics_tab_name)); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div style="float:right">
                                <a href="<?php echo $analytics_url; ?>" target="_blank" class="btn btn-primary">
									<?php echo Text::_($analytics_button_name); ?>
                                </a>
                            </div>

							<?php if ($analytics_token_auth && $analytics_use_token_auth == 1) : ?>
                                <iframe
                                        src="<?php echo $analytics_url; ?>/index.php?module=Widgetize&action=iframe&moduleToWidgetize=Dashboard&actionToWidgetize=index&idSite=<?php echo $analytics_siteid; ?>&period=<?php echo $analytics_period; ?>&date=<?php echo $analytics_date; ?>&token_auth=<?php echo $analytics_token_auth; ?>"
                                        frameborder="0"
                                        marginheight="0"
                                        marginwidth="0"
                                        width="100%"
                                        height="<?php echo $analytics_height; ?>px"
                                ></iframe>
							<?php elseif ($analytics_use_token_auth == 0) : ?>
                                <iframe
                                        src="<?php echo $analytics_url; ?>/index.php?module=Widgetize&action=iframe&moduleToWidgetize=Dashboard&actionToWidgetize=index&idSite=<?php echo $analytics_siteid; ?>&period=<?php echo $analytics_period; ?>&date=<?php echo $analytics_date; ?>"
                                        frameborder="0"
                                        marginheight="0"
                                        marginwidth="0"
                                        width="100%"
                                        height="<?php echo $analytics_height; ?>px"
                                ></iframe>
							<?php else : ?>
								<?php echo Text::_('MOD_DASHBOARD_TOKEN_MESSAGE'); ?>
							<?php endif; ?>

                        </div>
                    </div>

					<?php echo HTMLHelper::_('uitab.endTab'); ?>
				<?php endif; ?>

				<?php echo HTMLHelper::_('uitab.endTabSet'); ?>

            </div>
		<?php endif; ?>
    </div>

    <div class="sep"></div>

    <!--start pending block -->
    <div class="contentbloc">
		<?php if ($hiddefeatured) : ?>
            <div class="block featured card" style="width:<?php echo $featurewidth; ?>%">
                <div class="card-header">
					<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_featured=1'; ?>
                    <h3 class="module-title">
                        <i class="icon-large icon-featured"></i>
						<?php echo JText::_('FLEXI_ADMIN_FEATURED'); ?>
                    </h3>
                    <div class="module-actions">
                        <a href='<?php echo $show_all_link ?>' class='adminlink'>
							<?php echo JText::_('FLEXI_ADMIN_ALL'); ?>
                        </a>
                    </div>
                </div>

                <div class="card-body" style="height:<?php echo $forceheightblock; ?>">
                    <table class="table" id="<?php echo str_replace(' ', '', $module->title) . $module->id; ?>">

                        <thead>
                        <tr>
                            <th scope="col" class="w-40"><?php echo Text::_('JGLOBAL_TITLE'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JAUTHOR'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JDATE'); ?></th>
                        </tr>
                        </thead>

                        <tbody>
						<?php foreach ($listFeatured as $itemFeatured) :
							$canEdit = $user->authorise('core.edit', 'com_content.article.' . $itemFeatured->id);
							$canCheckin = $user->authorise('core.manage', 'com_checkin') || $itemFeatured->checked_out == $userId || $itemFeatured->checked_out == 0;
							$canEditOwn = $user->authorise('core.edit.own', 'com_content.article.' . $itemFeatured->id) && $itemFeatured->created_by == $userId;
							$canChange = $user->authorise('core.edit.state', 'com_content.article.' . $itemFeatured->id) && $canCheckin;
							?>

							<?php if ($canChange) : ?>
                            <tr>
                                <td>
                                    <a href="<?php echo $itemFeatured->link; ?>"><?php echo $itemFeatured->title; ?>
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                            <span class="small">
                                                <i class="fa fa-user"></i>
                                                <?php echo $itemFeatured->author; ?>
                                            </span>
                                </td>
                                <td>
                                            <span class="small">
                                                <i class="fas fa-calendar"></i>
                                                <?php echo JHtml::date($itemFeatured->modified, 'd M Y'); ?>
                                            </span>
                                </td>
                            </tr>
						<?php endif; ?>

						<?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
		<?php endif; ?>

		<?php if ($hiddepending) : ?>
            <div class="block pending card" style="width:<?php echo $pendingwidth; ?>%">
                <div class="card-header">
					<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=PE'; ?>
                    <h3 class="module-title">
                        <i class="fa fa-spinner"></i>
						<?php echo JText::_('FLEXI_ADMIN_PENDING'); ?>
                    </h3>
                    <div class="module-actions">
                        <a href="<?php echo $show_all_link; ?>" class="adminlink">
							<?php echo JText::_('FLEXI_ADMIN_ALL'); ?>
                        </a>
                    </div>
                </div>

                <div class="card-body" style="height:<?php echo $forceheightblock; ?>">
                    <table class="table" id="<?php echo str_replace(' ', '', $module->title) . $module->id; ?>">
                        <thead>
                        <tr>
                            <th scope="col" class="w-40"><?php echo Text::_('JGLOBAL_TITLE'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JAUTHOR'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JDATE'); ?></th>
                        </tr>
                        </thead>

                        <tbody>
						<?php foreach ($listPending as $itemPending) : ?>
                            <tr>
                                <td>
                                    <a href="<?php echo $itemPending->link; ?>"><?php echo $itemPending->title; ?>
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fa fa-user"></i>
										<?php echo $itemPending->author; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fas fa-calendar"></i>
										<?php echo JHtml::date($itemPending->modified, 'd M Y'); ?>
                                    </div>
                                </td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
		<?php endif; ?>

		<?php if ($hidderevised) : ?>
            <div class="block revised card" style="width:<?php echo $revisedwidth; ?>%">
                <div class="card-header">
					<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=RV'; ?>
                    <h3 class="module-title">
                        <i class="icon-large icon-thumbs-up"></i>
						<?php echo JText::_('FLEXI_ADMIN_REVISED'); ?>
                    </h3>
                    <div class="module-actions">
                        <a href='<?php echo $show_all_link ?>' class='adminlink'>
							<?php echo JText::_('FLEXI_ADMIN_ALL'); ?>
                        </a>
                    </div>
                </div>

                <div class="card-body" style="height:<?php echo $forceheightblock; ?>">
                    <table class="table" id="<?php echo str_replace(' ', '', $module->title) . $module->id; ?>">
                        <thead>
                        <tr>
                            <th scope="col" class="w-40"><?php echo Text::_('JGLOBAL_TITLE'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JAUTHOR'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JDATE'); ?></th>
                        </tr>
                        </thead>

                        <tbody>
						<?php foreach ($listRevised as $itemRevised) : ?>
                            <tr>
                                <td>
                                    <a href="<?php echo $itemRevised->link; ?>"><?php echo $itemRevised->title; ?>
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fa fa-user"></i>
										<?php echo $itemRevised->author; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fas fa-calendar"></i>
										<?php echo JHtml::date($itemRevised->modified, 'd M Y'); ?>
                                    </div>
                                </td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
		<?php endif; ?>

		<?php if ($hiddeinprogess) : ?>
            <div class="block inprogress card" style="width:<?php echo $inprogessdwidth; ?>%">
                <div class="card-header">
					<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=IP'; ?>
                    <h3 class="module-title">
                        <i class="icon-large icon-checkin"></i>
						<?php echo JText::_('FLEXI_ADMIN_INPROGRESS'); ?>
                    </h3>
                    <div class="module-actions">
                        <a href='<?php echo $show_all_link ?>' class='adminlink'>
							<?php echo JText::_('FLEXI_ADMIN_ALL'); ?>
                        </a>
                    </div>
                </div>

                <div class="card-body" style="height:<?php echo $forceheightblock; ?>">
                    <table class="table" id="<?php echo str_replace(' ', '', $module->title) . $module->id; ?>">
                        <thead>
                        <tr>
                            <th scope="col" class="w-40"><?php echo Text::_('JGLOBAL_TITLE'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JAUTHOR'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JDATE'); ?></th>
                        </tr>
                        </thead>

                        <tbody>
						<?php foreach ($listInprogress as $itemInprogress) : ?>
                            <tr>
                                <td>
                                    <a href="<?php echo $itemInprogress->link; ?>">
										<?php echo $itemInprogress->title; ?>
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fa fa-user"></i>
										<?php echo $itemInprogress->author; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fas fa-calendar"></i>
										<?php echo JHtml::date($itemInprogress->modified, 'd M Y'); ?>
                                    </div>
                                </td>
                            </tr>
						<?php endforeach; ?>
                        <tbody>
                    </table>
                </div>
            </div>
		<?php endif; ?>

		<?php if ($hiddedraft) : ?>
            <div class="block draft card" style="width:<?php echo $draftwidth; ?>%">
                <div class="card-header">
					<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=OQ'; ?>
                    <h3 class="module-title">
                        <i class="icon-large icon-file"></i>
						<?php echo JText::_('FLEXI_ADMIN_DRAFT'); ?>
                    </h3>
                    <div class="module-actions">
                        <a href='<?php echo $show_all_link ?>' class='adminlink'>
							<?php echo JText::_('FLEXI_ADMIN_ALL'); ?>
                        </a>
                    </div>
                </div>

                <div class="card-body" style="height:<?php echo $forceheightblock; ?>">
                    <table class="table" id="<?php echo str_replace(' ', '', $module->title) . $module->id; ?>">
                        <thead>
                        <tr>
                            <th scope="col" class="w-40"><?php echo Text::_('JGLOBAL_TITLE'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JAUTHOR'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JDATE'); ?></th>
                        </tr>
                        </thead>

                        <tbody>
						<?php foreach ($listDraft as $itemDraft) : ?>
                            <tr>
                                <td>
                                    <a href="<?php echo $itemDraft->link; ?>"><?php echo $itemDraft->title; ?>
                                        <i class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fa fa-user"></i> <?php echo $itemDraft->author; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fas fa-calendar"></i>
										<?php echo JHtml::date($itemDraft->modified, 'd M Y'); ?>
                                    </div>
                                </td>
                            </tr>
						<?php endforeach; ?>
                        <tbody>
                    </table>
                </div>
            </div>
		<?php endif; ?>

		<?php if ($hiddeyouritem) : ?>
            <div class="block youritems card" style="width:<?php echo $youritemwidth; ?>%">
                <div class="card-header">
					<?php $user = JFactory::getUser(); ?>
					<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_author=' . $user->id . ''; ?>
                    <h3 class="module-title">
                        <i class="fa fa-user"></i>
						<?php echo JText::_('FLEXI_YOUR_ITEM'); ?> : <?php echo $user->name; ?>
                    </h3>
                    <div class="module-actions">
                        <a href='<?php echo $show_all_link ?>' class='adminlink'>
							<?php echo JText::_('FLEXI_ADMIN_ALL'); ?>
                        </a>
                    </div>
                </div>

                <div class="card-body" style="height:<?php echo $forceheightblock; ?>">
                    <table class="table" id="<?php echo str_replace(' ', '', $module->title) . $module->id; ?>">
                        <thead>
                        <tr>
                            <th scope="col"
                                class="w-40"><?php echo Text::_('JGLOBAL_TITLE'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JAUTHOR'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JSTATES'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JDATE'); ?></th>
                        </tr>
                        </thead>

                        <tbody>
						<?php foreach ($listUseritem as $itemUseritem) : ?>
                            <tr>
                                <td>
                                    <a href="<?php echo $itemUseritem->link; ?>"><?php echo $itemUseritem->title; ?>
                                        <i class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fa fa-user"></i>

                                        <div class="hasTooltip" title=""
                                             data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY') . " " . $user->name; ?>">
											<?php echo $user->name; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
									<?php echo $itemUseritem->state; ?>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fas fa-calendar"></i>
										<?php echo JHtml::date($itemUseritem->modified, 'd M Y'); ?>
                                    </div>
                                </td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
		<?php endif; ?>

		<?php if ($hiddetrashed) : ?>
            <div class="block trashed card" style="width:<?php echo $trashedwidth; ?>%">
                <div class="card-header">
					<?php
					//TODO filtrage trashed
					$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=T';
					?>
                    <h3 class="module-title">
                        <i class="fa fa-trash"></i>
						<?php echo JText::_('FLEXI_ADMIN_TRASHED'); ?>
                    </h3>
                    <div class="module-actions">
                        <a href='<?php echo $show_all_link ?>' class='adminlink'>
							<?php echo JText::_('FLEXI_ADMIN_ALL'); ?>
                        </a>
                    </div>
                </div>

                <div class="card-body" style="height:<?php echo $forceheightblock; ?>">
                    <table class="table" id="<?php echo str_replace(' ', '', $module->title) . $module->id; ?>">
                        <thead>
                        <tr>
                            <th scope="col"
                                class="w-40"><?php echo Text::_('JGLOBAL_TITLE'); ?></th>
                            <th scope="col" class="w-40"><?php echo Text::_('JAUTHOR'); ?></th>
                            <th scope="col" class="w-20"><?php echo Text::_('JDATE'); ?></th>
                        </tr>
                        </thead>

                        <tbody>
						<?php foreach ($listTrashed as $itemTrashed) : ?>
							<?php
							$canEdit    = $user->authorise('core.edit', 'com_content.article.' . $itemTrashed->id);
							$canCheckin = $user->authorise('core.manage', 'com_checkin') || $itemTrashed->checked_out == $userId || $itemTrashed->checked_out == 0;
							$canEditOwn = $user->authorise('core.edit.own', 'com_content.article.' . $itemTrashed->id) && $itemTrashed->created_by == $userId;
							$canChange  = $user->authorise('core.edit.state', 'com_content.article.' . $itemTrashed->id) && $canCheckin;
							?>
							<?php if ($canChange) : ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo $itemTrashed->link; ?>">
											<?php echo $itemTrashed->title; ?>
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="small">
                                            <i class="fa fa-user"></i><?php echo $user->name; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small">
                                            <i class="fas fa-calendar"></i>
											<?php echo JHtml::date($itemTrashed->modified, 'd M Y'); ?>
                                        </div>
                                    </td>
                                </tr>
							<?php endif; ?>
						<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
		<?php endif; ?>

		<?php if ($actionsloglist) : ?>
            <div class="block actionlog card" style="width:<?php echo $actionslogwidth; ?>%">
                <div class="card-header">
                    <h3 class="module-title ">
                        <i class="fa fa-list-alt"></i>
						<?php echo Text::_('FLEXI_ADMIN_ACTIONLOGS_BLOCK_NAME'); ?> :
                    </h3>
                    <div class="module-actions"> <?php $show_all_link = 'index.php?option=com_actionlogs'; ?>
                        <a href='<?php echo $show_all_link ?>' class='adminlink'>
							<?php echo Text::_('FLEXI_ADMIN_ALL'); ?>
                        </a>
                    </div>
                </div>

                <div class="card-body" style="height:<?php echo $forceheightblock; ?>">
					<?php if (count($actionlist)) : ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"
                                    class="w-80"><?php echo Text::_('FLEXI_LATEST_ACTIONS'); ?></th>
                                <th scope="col"
                                    class="w-20"><?php echo Text::_('JDATE'); ?></th>
                            </tr>
                            </thead>

                            <tbody>
							<?php foreach ($actionlist as $i => $item) : ?>
                                <tr>
                                    <td>
										<?php echo $item->message; ?>
                                    </td>
                                    <td>
                                        <div class="small">
                                            <i class="fas fa-calendar" aria-hidden="true"></i>
											<?php echo JHtml::_('date', $item->log_date, Text::_('DATE_FORMAT_LC5')); ?>
                                        </div>
                                    </td>
                                </tr>
							<?php endforeach; ?>
                            </tbody>
                        </table>
					<?php else : ?>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="alert">
									<?php echo Text::_('MOD_LATEST_ACTIONS_NO_MATCHING_RESULTS'); ?>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
		<?php endif; ?>

		<?php foreach ($listCustomlist as $listCustomlist_idx => $customblock) : ?>
            <div class="block customblock card" style="width:<?php echo $customblock->width; ?>%">
                <div class="card-header">
					<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats=' . $customblock->catidlist; ?>
                    <h3 class="module-title">
                        <i class="fa fa-list-alt"></i>
						<?php echo JText::_($customblock->nameblockcustom); ?> :
                    </h3>
                    <div class="module-actions">
                        <a href='<?php echo $show_all_link ?>' class='adminlink'>
							<?php echo JText::_('FLEXI_ADMIN_ALL'); ?>
                        </a>
                    </div>
                </div>

                <div class="card-body" style="height:<?php echo $forceheightblock; ?>">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
								<?php echo JText::_('FLEXI_ADMIN_TITLE'); ?>
                            </th>

							<?php if ($customblock->displautblock) : ?>
                                <th>
									<?php echo JText::_('FLEXI_ADMIN_AUTHOR'); ?>
                                </th>
							<?php endif; ?>

							<?php if (!empty($customblock->extrafieldlist) && !empty($customblock->listitems->id)) : ?>
								<?php
								$item  = $itemmodel->getItem($customblock->listitems->id, $check_view_access = false);
								$items = array(&$item);
								// Get fields values from the DB,
								FlexicontentFields::getFields($items);
								$arrayExtrafield = explode(',', $customblock->extrafieldlist);
								?>

								<?php if (isset($arrayExtrafield[0])): ?>
									<?php foreach ($arrayExtrafield as $extrafield): ?>

										<?php FlexicontentFields::getFieldDisplay($item, $extrafield); ?>
										<?php if (isset($item->fields[$extrafield]->label)): ?>
                                            <th>
												<?php echo JText::_($item->fields[$extrafield]->label); ?>
                                            </th>
										<?php endif; ?>

									<?php endforeach; ?>
								<?php endif; ?>

							<?php endif; ?>

							<?php if ($customblock->displdateblock) : ?>
                                <th>
									<?php echo JText::_('FLEXI_ADMIN_DATE'); ?>
                                </th>
							<?php endif; ?>
                        </tr>
                        </thead>

                        <tbody>
						<?php foreach ($customblock->listitems as $itemcustomblock) : ?>

                            <tr>
                                <td>
                                    <a href="<?php echo $itemcustomblock->link; ?>">
										<?php echo $itemcustomblock->title; ?>
                                        <i class="icon-large icon-edit"></i>
                                    </a>
                                </td>

								<?php if ($customblock->displautblock) : ?>
                                    <td>
                                        <div class="small">
                                            <i class="icon-user"></i>

                                            <div class="hasTooltip" title=""
                                                 data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY') . " " . $itemcustomblock->name; ?>">
												<?php echo $itemcustomblock->name; ?>
                                            </div>
                                        </div>
                                    </td>
								<?php endif; ?>

								<?php if (!empty($customblock->extrafieldlist)) : ?>
									<?php
									$item            = $itemmodel->getItem($itemcustomblock->id, $check_view_access = false);
									$items           = array(&$item);
									$arrayExtrafield = explode(',', $customblock->extrafieldlist);
									?>

									<?php if (isset($arrayExtrafield[0])): ?>
										<?php foreach ($arrayExtrafield as $extrafield) : ?>

											<?php FlexicontentFields::getFieldDisplay($item, $extrafield); ?>
											<?php if (isset($item->fields[$extrafield]->display)): ?>
                                                <td>
													<?php echo $item->fields[$extrafield]->display; ?>
                                                </td>
											<?php endif; ?>

										<?php endforeach; ?>
									<?php endif; ?>

								<?php endif; ?>


								<?php if ($customblock->displdateblock) : ?>
                                    <td>
                                        <div class="small">
                                            <i class="icon-calendar"></i> <?php echo JHtml::date($itemcustomblock->modified, 'd M Y'); ?>
                                        </div>
                                    </td>
								<?php endif; ?>
                            </tr>

						<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
		<?php endforeach; ?>
    </div>


    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#myTab<?php echo $module->id; ?> a:first').tab('show');
        });
    </script>
</div>
