<?php
/**
* @version 2.0 stable $Id: default.php yannick berges
* @package Joomla
* @subpackage FLEXIcontent
* @copyright (C) 2016 Berges Yannick - www.com3elles.com
* @license GNU/GPL v2

* special thanks to ggppdk and emmanuel dannan for flexicontent
* special thanks to my master Marc Studer

* FLEXIadmin module is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
**/

//blocage des accés directs sur ce script
defined('_JEXEC') or die('Accés interdit');

JHtml::_('bootstrap.tooltip');
JHTML::_('behavior.modal');
JHtml::_('stylesheet', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
$document = JFactory::getDocument();
$document->addStyleSheet("./modules/mod_flexiadmin/assets/css/style.css",'text/css',"screen");
JHtml::_('stylesheet', 'media/mod_joomadmin/css/bootstrap-iconpicker.css');

//extrafield
require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_flexicontent'.DS.'defineconstants.php');
require_once (JPATH_SITE.DS.'components'.DS.'com_flexicontent'.DS.'helpers'.DS.'route.php');
require_once (JPATH_SITE.DS.'components'.DS.'com_flexicontent'.DS.'classes'.DS.'flexicontent.helper.php');
require_once (JPATH_SITE.DS.'components'.DS.'com_flexicontent'.DS.'classes'.DS.'flexicontent.fields.php');
require_once (JPATH_SITE.DS.'components'.DS.'com_flexicontent'.DS.'classes'.DS.'flexicontent.categories.php');
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_flexicontent'.DS.'tables');
require_once (JPATH_SITE.DS.'components'.DS.'com_flexicontent'.DS.'models'.DS.'item.php');

$itemmodel_name = FLEXI_J16GE ? 'FlexicontentModelItem' : 'FlexicontentModelItems';
$itemmodel = new $itemmodel_name();

//module config
$hiddefeatured       = $params->get('hiddefeatured', '1' );
$hiddepending        = $params->get('hiddepending', '1' );
$hidderevised        = $params->get('hidderevised', '1' );
$hiddeinprogess      = $params->get('hiddeinprogess', '1' );
$hiddedraft          = $params->get('hiddedraft', '1' );
$hiddeyouritem       = $params->get('hiddeyouritem', '1' );
$hiddetrashed        = $params->get('hiddetrashed', '1' );
$actionsloglist	     = $params->get('actionsloglist', '1' );
$displaycustomtab    = $params->get('displaycustomtab', '1' );
$displaycreattab     = $params->get('displaycreattab', '1' );
$displaymanagetab    = $params->get('displaymanagetab', '1' );
$displayadmintab     = $params->get('displayadmintab', '1' );
$displayfreetab      = $params->get('displayfreetab', '1' );
$displayconfigmodule = $params->get('displayconfigmodule', '1' );
$forceheightblock    = $params->get('forceheightblock', '' );
$displaycustomtext   = $params->get('displaycustomtext','');
$customtext          = $params->get('customtext','');
$displayinfosystem   = $params->get('displayinfosystem','1');
$displayinfosystem   = $params->get('displayinfosystem','1');
$featurewidth      = $params->get('featuredwidth','46');
$pendingwidth      = $params->get('pendingwidth','46');
$revisedwidth    = $params->get('revisedwidth','46');
$inprogessdwidth    = $params->get('inprogessdwidth','46');
$draftwidth    = $params->get('draftwidth','46');
$youritemwidth       = $params->get('youritemwidth','46');
$trashedwidth     = $params->get('trashedlogwidth','46');
$archivedwidth       = $params->get('archivedwidth','46');
$actionslogwidth     = $params->get('actionslogwidth','46');
$iconsize     = $params->get('iconsize','fa-2x');

//customtab
$nametab = $params->get('nametab', 'FLEXI_ADMIN_CUSTOM_TAB_NAME' );

//Get Buttom Sections
$hiddebuttonmanageitems      = $params->get('hiddebuttonmanageitems'     , '1');
$hiddebuttonmanagecategories = $params->get('hiddebuttonmanagecategories', '1');
$hiddebuttonmanagetypes      = $params->get('hiddebuttonmanagetypes'     , '1');
$hiddebuttonmanagetags       = $params->get('hiddebuttonmanagetags'      , '1');
$hiddebuttonmanagefields     = $params->get('hiddebuttonmanagefields'    , '1');
$hiddebuttonmanageauthors    = $params->get('hiddebuttonmanageauthors'   , '1');
$hiddebuttonmanagegroups     = $params->get('hiddebuttonmanagegroups'    , '1');
$hiddebuttonmanagefiles      = $params->get('hiddebuttonmanagefiles'     , '1');
$hiddebuttonimportcontent    = $params->get('hiddebuttonimportcontent'   , '1');
$hiddebuttonstats            = $params->get('hiddebuttonstats'           , '1');
$hiddebuttonindex            = $params->get('hiddebuttonindex'           , '1');
$hiddebuttonaddtypes         = $params->get('hiddebuttonaddtypes'        , '1');
$hiddebuttonaddfields        = $params->get('hiddebuttonaddfields'       , '1');
$hiddebuttonadmin            = $params->get('hiddebuttonadmin'           , '1');
$hiddebuttonadditem          = $params->get('hiddebuttonadditem'         , '1');
$hiddebuttonaddcategory      = $params->get('hiddebuttonaddcategory'     , '1');
$hiddebuttonaddtag           = $params->get('hiddebuttonaddtag'          , '1');
$hiddebuttonadduser          = $params->get('hiddebuttonadduser'         , '1');
$hiddebuttonaddgroup         = $params->get('hiddebuttonaddgroup'        , '1');
$hiddebuttonprivacy          = $params->get('hiddebuttonprivacy'        , '1');
$hiddebuttonlogs             = $params->get('hiddebuttonlogs'       , '1');

$displayauthoronly           = $params->get('displayauthoronly' , '0');

$user = JFactory::getUser();

//freetab
$freenametab = $params->get('freenametab', 'FLEXI_ADMIN_FREE_TAB_NAME' );


jimport( 'joomla.application.component.controller' );
// Check if component is installed
if ( !JComponentHelper::isEnabled( 'com_flexicontent', true) ) {
   echo 'This modules requires component FLEXIcontent!';
   return;
}
?>


<div class="row-fluid">
<?php if ($displayinfosystem || $displayconfigmodule ) : ?>
	<div class="info-bar top">
	<ul class="breadcrumb">
		<?php if ($displayinfosystem) : ?>
	<?php foreach ($systme_buttons as $sys_buttons) :?>
				<?php //echo '<pre>' ,print_r($sys_buttons),'</pre>';?>
		<?php foreach ($sys_buttons as $sys_button) :?>
			<li id="<?php echo $sys_button['id']; ?>" class="list-group-item">
				<a href="<?php echo $sys_button['link']; ?>">
					<span class="<?php echo $sys_button['icon_class']; ?>" aria-hidden="true"></span> <span class="j-links-link"><?php echo $sys_button['text']; ?></span>
				</a>
					<span class="divider">|</span>
				</li>
			<?php endforeach; ?>
	<?php endforeach; ?>
	<?php endif; ?>
		<?php if ($displayconfigmodule) : ?>
	<li>
		<a href="index.php?option=com_modules&task=module.edit&id=<?php echo $module->id;?>">
				<span class="icon-small icon-options" aria-hidden="true"></span><span class="j-links-link"><?php echo JText::_('FLEXI_ADMIN_DISPLAY_CONFIG_MODULE_TEXT'); ?></span>
		</a>
	</li>
			<?php endif; ?>
	</ul>
	</div>
	<?php endif; ?>
            <?php if ($displaycustomtext) : ?>
                <div class="modulemessage span12">
                    <?php echo $customtext; ?>
                </div>
    <?php endif; ?>



<?php if ($displaycustomtab || $displaycreattab || $displaymanagetab || $displayadmintab || $displayfreetab) : ?>
    <div class="action span12">

	<ul class="nav nav-tabs" role="tablist" id="myTab">
	<?php if ($displaycustomtab) : ?><li class=""><a href="#custom<?php echo $module->id;?>" data-toggle="tab"><?php echo JText::_($nametab); ?></a></li> <?php endif; ?>
	<?php if ($displaycreattab) : ?><li class=""><a href="#create<?php echo $module->id;?>" data-toggle="tab"><?php echo JText::_('FLEXI_ADMIN_TAB_CREATE_D'); ?></a></li>  <?php endif; ?>
	<?php if ($displaymanagetab) : ?><li class=""><a href="#manage<?php echo $module->id;?>" data-toggle="tab"><?php echo JText::_('FLEXI_ADMIN_TAB_MANAGE_D'); ?></a></li>  <?php endif; ?>
	<?php if ($displayadmintab) : ?><li class=""><a href="#admin<?php echo $module->id;?>" data-toggle="tab"><?php echo JText::_('FLEXI_ADMIN_TAB_ADMIN_D'); ?></a></li>  <?php endif; ?>
	<?php if ($displayfreetab) : ?>
      <?php $list_freebuttons = $params->get('free_button');
      if ($list_freebuttons): ?>
      <?php foreach( $list_freebuttons as $list_freebuttons_idx => $free_buttons ) :?>
      <li class=""><a href="#free<?php $tabname = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','', $free_buttons->freenametab)); echo $module->id.''.$tabname;?>" data-toggle="tab"><?php echo JText::_($free_buttons->freenametab); ?></a></li>
      <?php endforeach; ?>
   <?php endif; ?>
   <?php endif; ?>
</ul>

		<div class="tab-content">
				<?php if ($displaycustomtab) : ?>
					<div class="tab-pane fade in active" id="custom<?php echo $module->id;?>">
                  <?php $list_buttons = $params->get('add_button');
              foreach( $list_buttons as $list_buttons_idx => $add_button ) :?>

                 <a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $add_button->button_type;?>&maincat=<?php echo $add_button->catid; ?>&filter_lang=<?php echo $add_button->button_lang; ?>" >
                          <button type="button" class="btn btn-default btn-lg itemlist">
                             <i class="fa <?php echo $add_button->iconbutton; ?> <?php echo $iconsize; ?> "></i><br/>
                          <?php echo JText::_($add_button->button_name); ?>
                          </button>
                    </a>
                    <?php if ($add_button->displayline) : ?><hr /><?php endif; ?>
              <?php endforeach; ?>
              <?php $list_catbuttons = $params->get('add_cat_button');
              foreach( $list_catbuttons as $list_catbuttons_idx => $cat_button ) :?>

				<?php if ($cat_button->displayauthoronly == 1){
				$filter_byauthor ='&amp;filter_author='.$user->id;
				} else {
				$filter_byauthor='';
				}
				?>
				<?php if (!empty($cat_button->button_type)){
					$filter_by_type = '&filter_type='.$cat_button->button_type;
				} else {
					$filter_by_type='';
				}
				?>
				
              <a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $cat_button->filtercatids; ?>&filter_lang=<?php echo $cat_button->button_lang; ?><?php echo $filter_byauthor; ?><?php echo $filter_by_type;?>" >
                    <button type="button" class="btn btn-default btn-lg itemlist">
                       <i class="fa <?php echo $cat_button->iconbutton; ?> <?php echo $iconsize; ?> "></i><br/>
                    <?php echo JText::_($cat_button->namecatfilter); ?>
                    </button>
              </a>
<?php if ($cat_button->displayline) : ?><hr /><?php endif; ?>
              <?php endforeach; ?>
              <?php $list_edititembuttons = $params->get('edit_item_button');
              foreach( $list_edititembuttons as $list_edititembuttons_idx => $edit_item_button ) :?>
              <a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $edit_item_button->itemid; ?>" >
                    <button type="button" class="btn btn-default btn-lg itemlist">
                       <i class="fa <?php echo $edit_item_button->iconbutton; ?> <?php echo $iconsize; ?> "></i><br/>
                    <?php echo JText::_($edit_item_button->nameitemedit); ?>
                    </button>
              </a>
<?php if ($edit_item_button->displayline) : ?><hr /><?php endif; ?>
              <?php endforeach; ?>
					</div>
					<?php endif; ?>
										<?php if ($displaycreattab) : ?>
										<div class="tab-pane fade" id="create<?php echo $module->id;?>">
										<?php if($hiddebuttonadditem): ?>
											<?php
											$add_item_url = JUri::base(true) . '/index.php?option=com_flexicontent&view=types&tmpl=component&layout=typeslist&action=new';
 											$window_title = flexicontent_html::encodeHTML(JText::_('FLEXI_TYPE'), 2);
 											$add_button_js = 'var url = jQuery(this).attr(\'href\'); ' .
  											' fc_showDialog(url, \'fc_modal_popup_container\', 0, 1200, 0, false, {\'title\': \'" . $window_title . "\'}); ' .
  											' return false;';
 											echo '<a  href=' . $add_item_url . '  onclick="' . $add_button_js . '"> ' . JText::_('FLEXI_NEW') . '</a>'; ?>
													<button type="button" class="btn btn-default btn-lg itemlist">
														<i class="fa fa-plus-circle <?php echo $iconsize; ?>"></i><br/>
													<?php echo JText::_( 'FLEXI_ADMIN_ADDITEM' ); ?>
													</button>
											</a>
											<?php endif; ?>
											<?php if($hiddebuttonaddcategory): ?>
											<a href="index.php?option=com_flexicontent&view=category">
												<button type="button" class="btn btn-default btn-lg itemlist">
												<i class="fa fa-folder-open <?php echo $iconsize; ?> "></i><br/>
												<?php echo JText::_( 'FLEXI_ADMIN_ADDCATEGORY' ); ?>
												</button>
											</a>
											<?php endif; ?>
											<?php if($hiddebuttonaddtag): ?>
											<a href="index.php?option=com_flexicontent&view=tag">
												<button type="button" class="btn btn-default btn-lg itemlist">
												<i class="fa fa-tags <?php echo $iconsize; ?>"></i><br/>
												<?php echo JText::_( 'FLEXI_ADMIN_ADDTAG' ); ?>
												</button>
											</a>
											<?php endif; ?>
											<?php if($hiddebuttonadduser): ?>
											<a href="index.php?option=com_flexicontent&task=users.add">
												<button type="button" class="btn btn-default btn-lg itemlist">
												<i class="fa fa-user <?php echo $iconsize; ?> "></i><br/>
												<?php echo JText::_( 'FLEXI_ADMIN_ADDAUTHOR' ); ?>
												</button>
											</a>
											<?php endif; ?>
											<?php if($hiddebuttonaddgroup): ?>
											<a href="index.php?option=com_flexicontent&view=groups.add">
												<button type="button" class="btn btn-default btn-lg itemlist">
												<i class="fa fa-users <?php echo $iconsize; ?>"></i><br/>
												<?php echo JText::_( 'FLEXI_ADMIN_ADDGROUPS' ); ?>
												</button>
											</a>
											<?php endif; ?>

										</div>
										<?php endif; ?>
										<?php if ($displaymanagetab) : ?>
										<div class="tab-pane fade" id="manage<?php echo $module->id;?>">
											<?php if($hiddebuttonmanageitems): ?>
												<a href="index.php?option=com_flexicontent&view=items">
													<button type="button" class="btn btn-default btn-lg itemlist">
														<i class="fa fa-th-list <?php echo $iconsize; ?> "></i><br/>
														<?php echo JText::_( 'FLEXI_ADMIN_ITEMLIST' ); ?>
													</button>
												</a>
											<?php endif;?>
											<?php if($hiddebuttonmanagecategories): ?>
												<a href="index.php?option=com_flexicontent&view=categories">
													<button type="button" class="btn btn-default btn-lg itemlist">
														<i class="fa fa-folder-open <?php echo $iconsize; ?> "></i><br/>
														<?php echo JText::_( 'FLEXI_ADMIN_CATLIST' ); ?>
													</button>
												</a>
												<?php endif; ?>
											<?php if($hiddebuttonmanagetags): ?>
								<a href="index.php?option=com_flexicontent&view=tags">
									<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="fa fa-tags <?php echo $iconsize; ?> "></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_TAGLIST' ); ?>
									</button>
								</a>
								<?php endif; ?>
								<?php if($hiddebuttonmanageauthors): ?>
								<a href="index.php?option=com_flexicontent&view=users">
									<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="fa fa-user <?php echo $iconsize; ?>"></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_AUTHORLIST' ); ?>
									</button>
								</a>
								<?php endif; ?>

								<?php if($hiddebuttonmanagegroups): ?>
								<a href="index.php?option=com_flexicontent&view=groups">
									<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="fa fa-users <?php echo $iconsize; ?> "></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_GROUPSLIST' ); ?>
									</button>
								</a>
								<?php endif; ?>

								<?php if($hiddebuttonmanagefiles): ?>
								<a href="index.php?option=com_flexicontent&view=filemanager">
									<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="fa fa-upload <?php echo $iconsize; ?> "></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_FILEMANAGER' ); ?>
									</button>
								</a>
								<?php endif; ?>

										</div>
										<?php endif; ?>
								<?php if ($displayadmintab) : ?>
			<!-- start admin tabs-->
			<div class="tab-pane fade" id="admin<?php echo $module->id;?>">
            <?php if($hiddebuttonprivacy): ?>
            <a href="index.php?option=com_privacy">
               <button type="button" class="btn btn-default btn-lg itemlist">
                  <i class="fa fa-lock <?php echo $iconsize; ?> "></i><br/>
                  <?php echo JText::_( 'FLEXI_ADMIN_PRIVACY' ); ?>
               </button>
            </a>
            <?php endif; ?>
         <?php if($hiddebuttonlogs): ?>
         <a href="index.php?option=com_actionlogs">
            <button type="button" class="btn btn-default btn-lg itemlist">
            <i class="fa fa-list-alt <?php echo $iconsize; ?> "></i><br/>
            <?php echo JText::_( 'FLEXI_ADMIN_LOGS' ); ?>
            </button>
         </a>
         <?php endif; ?>

<?php if($hiddebuttonprivacy || $hiddebuttonlogs): ?>
<hr>
<?php endif; ?>
										<?php if($hiddebuttonmanagetypes): ?>
										<a href="index.php?option=com_flexicontent&view=types">
											<button type="button" class="btn btn-default btn-lg itemlist">
												<i class="fa fa-book <?php echo $iconsize; ?>"></i><br/>
												<?php echo JText::_( 'FLEXI_ADMIN_TYPELIST' ); ?>
											</button>
										</a>
										<?php endif; ?>
									<?php if($hiddebuttonaddtypes): ?>
									<a href="index.php?option=com_flexicontent&view=type">
										<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="fa fa-plus-circle <?php echo $iconsize; ?> "></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_ADDTYPE' ); ?>
										</button>
									</a>
									<?php endif; ?>
									<?php if($hiddebuttonmanagefields): ?>
									<a href="index.php?option=com_flexicontent&view=fields">
										<button type="button" class="btn btn-default btn-lg itemlist">
											<i class="fa fa-th-list <?php echo $iconsize; ?> "></i><br/>
											<?php echo JText::_( 'FLEXI_ADMIN_FIELDLIST' ); ?>
										</button>
									</a>
									<?php endif; ?>
									<?php if($hiddebuttonaddfields): ?>
									<a href="index.php?option=com_flexicontent&view=field">
										<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="fa fa-plus-circle <?php echo $iconsize; ?> "></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_ADDFIELD' ); ?>
										</button>
									</a>
									<?php endif; ?>
						<?php if($hiddebuttonimportcontent): ?>
						<a href="index.php?option=com_flexicontent&view=import">
							<button type="button" class="btn btn-default btn-lg itemlist">
								<i class="fa fa-download <?php echo $iconsize; ?>"></i> <br/>
								<?php echo JText::_( 'FLEXI_ADMIN_IMPORT' ); ?>
							</button>
						</a>
						<?php endif; ?>
						<?php if($hiddebuttonstats): ?>
						<a href="index.php?option=com_flexicontent&view=stats">
							<button type="button" class="btn btn-default btn-lg itemlist">
								<i class="fa fa-pie-chart <?php echo $iconsize; ?>"></i> <br/>
								<?php echo JText::_( 'FLEXI_ADMIN_STATS' ); ?>
							</button>
						</a>
				<?php endif; ?>
				<?php if($hiddebuttonindex): ?>
					<a href="index.php?option=com_flexicontent&view=search">
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="fa fa-search <?php echo $iconsize; ?>"></i><br/>
						<?php echo JText::_( 'FLEXI_ADMIN_SEARCH' ); ?>
						</button>
					</a>
				<?php endif; ?>
						<?php if($hiddebuttonadmin): ?>
					<a href="index.php?option=com_flexicontent">
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="fa fa-cogs <?php echo $iconsize; ?>"></i><br/>
						<?php echo JText::_( 'FLEXI_ADMIN_GEN' ); ?>
						</button>
					</a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<!-- end of admin tabs-->
         <?php if ($displayfreetab && $list_freebuttons) : ?>
            <?php foreach( $list_freebuttons as $list_freebuttons_idx => $free_buttons ) :?>
         <div class="tab-pane fade" id="free<?php $tabname = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','', $free_buttons->freenametab)); echo $module->id.''.$tabname;?>">
               <?php foreach( $free_buttons->free_button as $free_button_idx => $free_button ) :?>
            <a href="<?php echo $free_button->linkbutton; ?>" target="<?php echo $free_button->targetlink; ?>" >
                  <button type="button" class="btn btn-default btn-lg itemlist">
                     <i class="fa <?php echo $free_button->iconbutton; ?> <?php echo $iconsize; ?> "></i><br/>
                  <?php echo JText::_($free_button->freebutton); ?>
                  </button>
            </a>
   <?php if ($free_button->displayline) : ?><hr /><?php endif; ?>
         <?php endforeach; ?>
         </div>
         <?php endforeach; ?>
         <?php endif; ?>


      </div>
      <?php endif; ?>
		<!-- end tabs -->


	</div>
	<!-- end tabs zone -->
</div>
</div>
</div>

<!--start pending block -->
<div class="contentbloc">

<?php if ($hiddefeatured) : ?>
    <div class="block featured well well-small" style="width:<?php echo $featurewidth; ?>%">
	<h3 class="module-title nav-header"><i class="icon-large icon-featured"></i> <?php echo JText::_( 'FLEXI_ADMIN_FEATURED' ); ?></h3>

	<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_featured=1'; ?>
	<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );
		echo "</a></div>";	?>
			<div class="row-striped" style="height:<?php echo $forceheightblock; ?>">
				<?php foreach ($listFeatured as $itemFeatured) : ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
							<a href="<?php echo $itemFeatured->link; ?>"><?php echo $itemFeatured->title; ?>
							<i class="icon-large icon-edit"></i></a>
						</div>
						<div class="span3" style="margin-left: 0 !important;">
							<span class="small">
							<i class="icon-user"></i>
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemFeatured->name; ?>"><?php echo $itemFeatured->name;?> </small>
							</span>
						</div>
						<div class="span3">
							<span class="small">
							<i class="icon-calendar"></i> <?php echo JHtml::date($itemFeatured->modified, 'd M Y'); ?>
							</span>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
	</div>
	<?php endif; ?>
<?php if ($hiddepending) : ?>
    <div class="block pending well well-small" style="width:<?php echo $pendingwidth; ?>%">
	<h3 class="module-title nav-header"><i class="icon-large icon-thumbs-down"></i> <?php echo JText::_( 'FLEXI_ADMIN_PENDING' ); ?></h3>

	<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=PE'; ?>
	<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );
		echo "</a></div>";	?>
			<div class="row-striped" style="height:<?php echo $forceheightblock; ?>">
				<?php foreach ($listPending as $itemPending) : ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
							<a href="<?php echo $itemPending->link; ?>"><?php echo $itemPending->title; ?>
							<i class="icon-large icon-edit"></i></a>
						</div>
						<div class="span3" style="margin-left: 0 !important;">
							<span class="small">
							<i class="icon-user"></i>
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemPending->name; ?>"><?php echo $itemPending->name;?> </small>
							</span>
						</div>
						<div class="span3">
							<span class="small">
							<i class="icon-calendar"></i> <?php echo JHtml::date($itemPending->modified, 'd M Y'); ?>
							</span>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
	</div>
	<?php endif; ?>

	<?php if ($hidderevised) : ?>

	<div class="block revised well well-small" style="width:<?php echo $revisedwidth; ?>%">
		<h3 class="module-title nav-header"><i class="icon-large icon-thumbs-up"></i> <?php echo JText::_( 'FLEXI_ADMIN_REVISED' ); ?></h3>
		<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=RV'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );
		echo "</a></div>";	?>
			<div class="row-striped" style="height:<?php echo $forceheightblock; ?>">
				<?php foreach ($listRevised as $itemRevised) : ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
							<a href="<?php echo $itemRevised->link; ?>"><?php echo $itemRevised->title; ?>
							<i class="icon-large icon-edit"></i></a>
						</div>
						<div class="span3" style="margin-left: 0 !important;">
							<span class="small">
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemRevised->name; ?>"><i class="icon-user"></i> <?php echo $itemRevised->name; ?></small>
							</span>
						</div>
						<div class="span3">
							<span class="small">
							<i class="icon-calendar"></i> <?php echo JHtml::date($itemRevised->modified, 'd M Y'); ?>
							</span>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
	</div>
<?php endif; ?>
<?php if ($hiddeinprogess) : ?>
	<div class="block inprogress well well-small" style="width:<?php echo $inprogessdwidth; ?>%">
		<h3 class="module-title nav-header"><i class="icon-large icon-checkin"></i> <?php echo JText::_( 'FLEXI_ADMIN_INPROGRESS' ); ?></h3>
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=IP'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );
		echo "</a></div>";	?>
			<div class="row-striped" style="height:<?php echo $forceheightblock; ?>">
				<?php foreach ($listInprogress as $itemInprogress) : ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
							<a href="<?php echo $itemInprogress->link; ?>"><?php echo $itemInprogress->title; ?>
							<i class="icon-large icon-edit"></i></a>
						</div>
						<div class="span3" style="margin-left: 0 !important;">
							<span class="small">
							<i class="icon-user"></i>
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemInprogress->name; ?>"><?php echo $itemInprogress->name;?> </small>
							</span>
						</div>
						<div class="span3">
							<span class="small"> <i class="icon-calendar"></i> <?php echo JHtml::date($itemInprogress->modified, 'd M Y'); ?></span>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
	</div>
<?php endif; ?>
<?php if ($hiddedraft) : ?>
	<div class="block draft well well-small" style="width:<?php echo $draftwidth; ?>%">
	<h3 class="module-title nav-header"><i class="icon-large icon-file"></i> <?php echo JText::_( 'FLEXI_ADMIN_DRAFT' ); ?></h3>
	<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=OQ'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );
		echo "</a></div>";	?>
	<div class="row-striped" style="height:<?php echo $forceheightblock; ?>">
		<?php foreach ($listDraft as $itemDraft) : ?>
		<div class="row-fluid">
			<div class="span12">
				<div class="span6">
					<a href="<?php echo $itemDraft->link; ?>"><?php echo $itemDraft->title; ?>
					<i class="icon-large icon-edit"></i></a>
				</div>
				<div class="span3" style="margin-left: 0 !important;">
					<span class="small">

					<i class="icon-user"></i><small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemDraft->name; ?>"><?php echo $itemDraft->name;?> </small>
					</span>
				</div>
				<div class="span3">
					<span class="small">
					<i class="icon-calendar"></i> <?php echo JHtml::date($itemDraft->modified, 'd M Y'); ?>
					</span>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>
<?php if ($hiddeyouritem) : ?>
	<div class="block youritems well well-small" style="width:<?php echo $youritemwidth; ?>%">
		<?php $user = JFactory::getUser();		?>
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i>
		<?php echo JText::_( 'FLEXI_YOUR_ITEM' ); ?> : <?php echo $user->name; ?></h3>
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_author='.$user->id.''; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );
		echo "</a></div>";	?>
		<div class="row-striped" style="height:<?php echo $forceheightblock; ?>">
			<?php foreach ($listUseritem as $itemUseritem) : ?>
			<div class="row-fluid">
				<div class="span12">
					<div class="span6">
						<a href="<?php echo $itemUseritem->link; ?>"><?php echo $itemUseritem->title; ?>
						<i class="icon-large icon-edit"></i></a>
					</div>
					<div class="span3" style="margin-left: 0 !important;">
						<span class="small">
							<i class="icon-user"></i>

							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $user->name; ?>"><?php echo $user->name; ?> </small>
						</span>
					</div>
					<div class="span3">
					<?php echo $itemUseritem->state;?>
					<span class="small">
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemUseritem->modified, 'd M Y'); ?>
					</span>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>
<?php if ($hiddetrashed) : ?>
	<div class="block trashed well well-small" style="width:<?php echo $trashedwidth; ?>%">
	<h3 class="module-title nav-header"><i class="icon-large icon-trash"></i>
	<?php echo JText::_( 'FLEXI_ADMIN_TRASHED' ); ?></h3>
	<?php //TODO filtrage trashed
	$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=T'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );
		echo "</a></div>";	?>
      <div class="row-striped" style="height:<?php echo $forceheightblock; ?>">
         <?php foreach ($listTrashed as $itemTrashed) : ?>
         <div class="row-fluid">
            <div class="span12">
               <div class="span6">
                  <a href="<?php echo $itemTrashed->link; ?>"><?php echo $itemTrashed->title; ?>
                  <i class="icon-large icon-edit"></i></a>
               </div>
               <div class="span3" style="margin-left: 0 !important;">
                  <span class="small">
                     <i class="icon-user"></i>

                     <small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $user->name; ?>"><?php echo $user->name; ?> </small>
                  </span>
               </div>
               <div class="span3">
               <?php //echo $itemTrashed->state;?>
               <span class="small">
                  <i class="icon-calendar"></i> <?php echo JHtml::date($itemTrashed->modified, 'd M Y'); ?>
               </span>
               </div>
            </div>
         </div>
         <?php endforeach; ?>
   </div>
	</div>
<?php endif; ?>

<?php if($actionsloglist) : ?>
<div class="block actionlog well well-small"  style="width:<?php echo $actionslogwidth; ?>%">
   <h3 class="module-title nav-header">
   <i class="fa fa-list-alt"></i>
   <?php echo JText::_('FLEXI_ADMIN_ACTIONLOGS_BLOCK_NAME'); ?> : </h3>
   <?php		$show_all_link = 'index.php?option=com_actionlogs'; ?>
   <div style='text-align:right;'>
   <a href='<?php echo $show_all_link ?>' class='adminlink'>
   <?php
   echo JText::_( 'FLEXI_ADMIN_ALL' );
   echo "</a></div>";	?>
<div class="row-striped" style="height:<?php echo $forceheightblock; ?>">
	<?php if (count($actionlist)) : ?>
		<?php foreach ($actionlist as $i => $item) : ?>
			<div class="row-fluid">
				<div class="span8 truncate">
					<?php echo $item->message; ?>
				</div>
				<div class="span4">
					<div class="small pull-right hasTooltip" title="<?php echo JHtml::_('tooltipText', 'JGLOBAL_FIELD_CREATED_LABEL'); ?>">
						<span class="icon-calendar" aria-hidden="true"></span> <?php echo JHtml::_('date', $item->log_date, JText::_('DATE_FORMAT_LC5')); ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<div class="row-fluid">
			<div class="span12">
				<div class="alert"><?php echo JText::_('MOD_LATEST_ACTIONS_NO_MATCHING_RESULTS');?></div>
			</div>
		</div>
	<?php endif; ?>
</div>
</div>
<?php endif; ?>

<?php
// loop your result
foreach( $listCustomlist as $listCustomlist_idx => $customblock ) :?>

<div class="block customblock well well-small" style="width:<?php echo $customblock->width; ?>%">
   <h3 class="module-title nav-header">
   <i class="icon-large icon-user"></i>
   <?php echo JText::_($customblock->nameblockcustom); ?> : </h3>
   <?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$customblock->catidlist; ?>
   <div style='text-align:right;'>
   <a href='<?php echo $show_all_link ?>' class='adminlink'>
   <?php
   echo JText::_( 'FLEXI_ADMIN_ALL' );
   echo "</a></div>";	?>
   <div class="row-striped" style="height:<?php echo $forceheightblock; ?>">
      <table class="table table-hover">
         <thead>
            <tr>
            <th><?php echo JText::_( 'FLEXI_ADMIN_TITLE' ); ?></th>
            <?php if ($customblock->displautblock) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_AUTHOR' ); ?></th><?php endif; ?>
            <?php
            if(!empty($customblock->extrafieldlist) || !empty($customblock->listitems->id) ) {
               $item = $itemmodel->getItem($customblock->listitems->id, $check_view_access=false);
               $items = array(&$item);
                 // Get fields values from the DB,
               FlexicontentFields::getFields($items);
                $arrayExtrafield = explode(',', $customblock->extrafieldlist);
               if(isset($arrayExtrafield[0])) {
               foreach ($arrayExtrafield as $extrafield){
                  FlexicontentFields::getFieldDisplay($item, $extrafield);
                  $label= $item->fields[$extrafield]->label;
                  echo '<th>';
                  echo JText::_($label);
                  echo '</th>';
               }
             }
           }
            ?>
            <?php if ($customblock->displdateblock) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_DATE' ); ?></th><?php endif; ?>
            </tr>
         </thead>

         <tbody>
         <?php foreach ($customblock->listitems as $itemcustomblock) : ?>
            <tr>
            <td>
               <a href="<?php echo $itemcustomblock->link; ?>"><?php echo $itemcustomblock->title; ?>
               <i class="icon-large icon-edit"></i></a>
            </td>
            <?php if ($customblock->displautblock) : ?><td>
               <span class="small">
                  <i class="icon-user"></i>

                  <small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemcustomblock->name; ?>"><?php echo $itemcustomblock->name;?> </small>
               </span>
            </td>
            <?php endif; ?>
            <?php
            if(!empty($customblock->extrafieldlist)) {
               $item = $itemmodel->getItem($itemcustomblock->id, $check_view_access=false);
               $items = array(&$item);
               $arrayExtrafield = explode(',', $customblock->extrafieldlist);
               if(isset($arrayExtrafield[0])) {
               foreach ($arrayExtrafield as $extrafield){
                 FlexicontentFields::getFieldDisplay($item, $extrafield);
                  $value= $item->fields[$extrafield]->display;
                  echo '<td>';
                  echo $value;
                  echo '</td>';
               }
             }
           }
            ?>
            <?php if ($customblock->displdateblock) : ?>
            <td>
            <span class="small">
               <i class="icon-calendar"></i> <?php echo JHtml::date($itemcustomblock->modified, 'd M Y'); ?>
            </span>
            </td>
            <?php endif; ?>
         </tr>
      <?php endforeach; ?>
                  </tbody>
      </table>
</div>
</div>

<?php endforeach; ?>
<?php //endif; ?>
</div>



<script  type="text/javascript">
jQuery(document).ready(function($){
$('#myTab<?php echo $module->id;?> a:first').tab('show');
});
</script>
