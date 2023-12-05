<?php

/**
 * @version       3.0 stable $Id: default.php yannick berges
 * @package       Joomla
 * @subpackage    FLEXIcontent
 * @copyright (C) 2016 Berges Yannick - www.com3elles.com
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

//blocage des accés directs sur ce script
defined('_JEXEC') or die('Accés interdit');

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

$app      = Factory::getApplication();
$document = $app->getDocument();
$user     = $app->getIdentity();
$userId   = $user->id;

//HTMLHelper::_('stylesheet', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
HTMLHelper::_('stylesheet', 'media/mod_flexiadmin/css/style.css');
HTMLHelper::_('stylesheet', 'media/mod_flexiadmin/css/bootstrap-iconpicker.css');
HTMLHelper::_('stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

$force_fullwidth = $params->get('force_fullwidth', '1');

if ($force_fullwidth)
{
	$style = ".card-columns {
		grid-template-columns: 1fr !important;
	}";
	$document->addStyleDeclaration($style);
}

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
$nametab = $params->get('nametab', 'MOD_FLEXI_ADMIN_CUSTOM_TAB_NAME');

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

//freetab
$freenametab = $params->get('freenametab', 'MOD_FLEXI_ADMIN_FREE_TAB_NAME');

//Analytics tab
$displayanalytics         = $params->get('displayanalytics');
$analytics_url            = $params->get('analytics_site_url');
$analytics_siteid         = $params->get('analytics_siteid');
$analytics_period         = $params->get('analytics_period', 'week');
$analytics_date           = $params->get('analytics_date', 'yesterday');
$analytics_height         = $params->get('analytics_height', '500');
$analytics_tab_name       = $params->get('analytics_tabname', 'MOD_FLEXI_ADMIN_TAB_ANALYTICS');
$analytics_button_name    = $params->get('analytics_button', 'MOD_FLEXI_ADMIN_LINK_ANALYTICS');
$analytics_token_auth     = $params->get('analytics_site_token_auth');
$analytics_use_token_auth = $params->get('analytics_use_token');

jimport('joomla.application.component.controller');
// Check if component is installed
if (!ComponentHelper::isEnabled('com_flexicontent', true))
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
    <?php //echo HTMLHelper::_('uitab.addTab', 'myTab', 'custom', Text::_($nametab));?>
    <?php $list_freebuttons = $params->get('free_tab'); ?>
    <?php if ($list_freebuttons) : ?>
        <?php foreach ($list_freebuttons as $list_freebuttons_idx => $free_tab) : ?>
            <?php $tabname = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/', '', $free_tab->freenametab)); ?>
            <?php echo HTMLHelper::_('uitab.addTab', 'myTab', $tabname, Text::_($free_tab->freenametab)); ?>
            <div class="row">
                <div class="col-lg-12">
                    <nav class="quick-icons dashboard" aria-label="Quick links creation">
                        <ul class="nav flex-wrap">
                            <?php foreach ($free_tab->free_button as $free_button_idx => $free_button) : ?>
                                <li class="quickicon quickicon-single col <?php echo $free_button->displayline ? 'newlinegrid' : ''; ?>">
                                    <!-- ici boucle de calcul des liens -->
                                    <?php $filter_byauthor = ($free_button->displayauthoronly == 1) ? '&amp;filter[author_id]=' . $user->id : ''; ?>
                                    <?php
                                    switch ($free_button->displayButtonTypeOption)
                                    {
                                        case 1: //add item
                                            $url_button = "index.php?option=com_flexicontent&controller=items&task=items.add&typeid=$free_button->button_type&maincat=$free_button->catid&language=$free_button->button_lang";
                                            break;
                                        case 2: //edit item
                                            $url_button = "index.php?option=com_flexicontent&task=items.edit&cid[]=$free_button->itemid";
                                            break;
                                        case 3: //cat link
                                            $url_button = "index.php?option=com_flexicontent&view=items&filter_cats=$free_button->catidlist&filter_lang=$free_button->button_lang $filter_byauthor";
                                            break;
                                        case 4: //custom link
                                            $url_button = $free_button->linkbutton;
                                            break;
                                    }
                                    ?>
                                    <a href="<?php echo $url_button; ?>"
                                       target="<?php echo $free_button->targetlink; ?>"
                                       class="align-items-center">
                                        <div class="quickicon-icon d-flex align-items-center big">
                                            <?php
                                            $icon  = !empty($free_button->iconbutton) ? $free_button->iconbutton : 'fa-edit';
                                            $style = !empty($free_button->coloricon) ? 'style="color: ' . $free_button->coloricon . '"' : '';
                                            ?>
                                            <i class="fa <?php echo $icon . ' ' . $iconsize; ?>" <?php echo $style; ?>></i>
                                        </div>
                                        <div class="quickicon-name d-flex align-items-center">
                                            <?php echo Text::_($free_button->button_name); ?>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <?php echo HTMLHelper::_('uitab.endTab'); ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php //echo HTMLHelper::_('uitab.endTab');
    ?>
<?php endif; ?>

				<?php if ($displaycreattab) : ?>
					<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'create', Text::_('MOD_FLEXI_ADMIN_TAB_CREATE_D')); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="quick-icons dashboard" aria-label="Quick links creation">
                                <ul class="flex-wrap">

									<?php if ($hiddebuttonadditem) : ?>
                                        <li class="quickicon quickicon-single col ">
											<?php
											$add_item_url  = Uri::base(true) . '/index.php?option=com_flexicontent&view=types&tmpl=component&layout=typeslist&action=new';
											$window_title  = flexicontent_html::encodeHTML(Text::_('FLEXI_TYPE'), 2);
											$add_button_js = 'var url = jQuery(this).attr(\'href\'); ' .
												' fc_showDialog(url, \'fc_modal_popup_container\', 0, 1200, 0, false, {\'title\': \'" . $window_title . "\'}); ' .
												' return false;';
											echo '<a  href=' . $add_item_url . '  onclick="' . $add_button_js . '"> '; ?>
                                            <div class="quickicon-icon d-flex align-items-end big">
                                                <i class="fas fa-plus-circle <?php echo $iconsize; ?> "></i>
                                            </div>
                                            <div class="quickicon-name d-flex align-items-center">
												<?php echo Text::_('MOD_FLEXI_ADMIN_ADDITEM'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_ADDCATEGORY'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_ADDTAG'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_ADDAUTHOR'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_ADDGROUPS'); ?>
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
					<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'manage', Text::_('MOD_FLEXI_ADMIN_TAB_MANAGE_D')); ?>

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
													<?php echo Text::_('MOD_FLEXI_ADMIN_ITEMLIST'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_CATLIST'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_TAGLIST'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_AUTHORLIST'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_GROUPSLIST'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_FILEMANAGER'); ?>
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
					<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'admin', Text::_('MOD_FLEXI_ADMIN_TAB_ADMIN_D')); ?>

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
													<?php echo Text::_('MOD_FLEXI_ADMIN_PRIVACY'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_LOGS'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_TYPELIST'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_ADDTYPE'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_FIELDLIST'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_ADDFIELD'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_IMPORT'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_STATS'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_SEARCH'); ?>
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
													<?php echo Text::_('MOD_FLEXI_ADMIN_GEN'); ?>
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

    <div class="contentbloc">
		<?php if (!empty($customBlocks)): ?>
			<?php foreach ($customBlocks as $customBlock) : ?>
                <div class="block customblock card" style="width:<?php echo $customBlock->width; ?>%">
                    <div class="card-header">
						<?php $style = !empty($customBlock->icon_color) ? 'color: ' . $customBlock->icon_color : ''; ?>
                        <h3 class="module-title">
                            <i class="fa <?php echo $customBlock->icon ?>" style="<?php echo $style; ?>"></i>
							<?php echo Text::_($customBlock->block_title); ?> :
                        </h3>
                        <div class="module-actions">
                            <a href="<?php echo $customBlock->showAllLink; ?>" class="adminlink">
								<?php echo Text::_('MOD_FLEXI_ADMIN_ALL'); ?>
                            </a>
                        </div>
                    </div>

					<?php $height = !empty($customBlock->fixed_height) ? 'height: ' . $customBlock->fixed_height . 'px' : ''; ?>
                    <div class="card-body" style="overflow: auto; <?php echo $height; ?>">
						<?php if ($customBlock->type_of_block === 'action_logs'): ?>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
										<?php echo Text::_('MOD_FLEXI_ADMIN_ACTION'); ?>
                                    </th>
                                    <th>
										<?php echo Text::_('MOD_FLEXI_ADMIN_DATE'); ?>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
								<?php foreach ($customBlock->items as $actionLog) : ?>
                                    <tr>
                                        <td>
											<?php echo $actionLog->message; ?>
                                        </td>
                                        <td>
                                            <div class="small">
                                                <i class="icon-calendar"></i> <?php echo HTMLHelper::date($actionLog->log_date, 'd M Y'); ?>
                                            </div>
                                        </td>
                                    </tr>
								<?php endforeach; ?>
                                </tbody>
                            </table>
						<?php else: ?>
							<?php
							$displayExtraFields = !empty($customBlock->items[0]->extraFields);
							$fieldsToCenter     = [
								'state',
								'version',
								'form_lang'
							];
							?>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="min-width: 150px;">
										<?php echo Text::_('MOD_FLEXI_ADMIN_TITLE'); ?>
                                    </th>
                                    <th>
										<?php echo Text::_('MOD_FLEXI_ADMIN_CAT'); ?>
                                    </th>

									<?php if ((int) $customBlock->display_author) : ?>
                                        <th>
											<?php echo Text::_('MOD_FLEXI_ADMIN_AUTHOR'); ?>
                                        </th>
									<?php endif; ?>

									<?php if ($displayExtraFields): ?>
										<?php foreach ($customBlock->items[0]->extraFields as $extraField): ?>
                                            <th class="<?php echo in_array($extraField->name, $fieldsToCenter) ? 'text-center' : '' ?>">
												<?php echo Text::_($extraField->label); ?>
                                            </th>
										<?php endforeach; ?>
									<?php endif; ?>

									<?php if ((int) $customBlock->display_date) : ?>
                                        <th>
											<?php echo Text::_('MOD_FLEXI_ADMIN_DATE'); ?>
                                        </th>
									<?php endif; ?>
                                </tr>
                                </thead>

                                <tbody>
								<?php foreach ($customBlock->items as $item) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo $item->link; ?>">
												<?php echo $item->title; ?>
                                                <i class="icon-large icon-edit"></i>
                                            </a>
                                        </td>
                                        <td>
											<?php echo $item->category; ?>
                                        </td>

										<?php if ($customBlock->display_author) : ?>
                                            <td>
                                                <div class="small d-flex align-items-center">
                                                    <i class="icon-user me-2"></i>

                                                    <div class="hasTooltip" title=""
                                                         data-original-title="<?php echo HTMLHelper::tooltipText('MOD_FLEXI_ADMIN_MODIFIED_BY') . " " . $item->author; ?>">
														<?php echo $item->author; ?>
                                                    </div>
                                                </div>
                                            </td>
										<?php endif; ?>

										<?php if ($displayExtraFields): ?>
											<?php foreach ($item->extraFields as $extraField): ?>
                                                <td class="<?php echo in_array($extraField->name, $fieldsToCenter) ? 'text-center' : '' ?>">
													<?php echo !empty($extraField->display) ? Text::_($extraField->display) : 'N/A'; ?>
                                                </td>
											<?php endforeach; ?>
										<?php endif; ?>

										<?php if ($customBlock->display_date) : ?>
                                            <td>
                                                <div class="small">
                                                    <i class="icon-calendar"></i> <?php echo HTMLHelper::date($item->modified, 'd M Y'); ?>
                                                </div>
                                            </td>
										<?php endif; ?>
                                    </tr>
								<?php endforeach; ?>
                                </tbody>
                            </table>
						<?php endif; ?>
                    </div>
                </div>
			<?php endforeach; ?>
		<?php endif; ?>
    </div>


    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#myTab<?php echo $module->id; ?> a:first').tab('show');
        });
    </script>
</div>
