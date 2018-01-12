<?php
/**
* @version 0.9.3 stable $Id: default.php yannick berges
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
$document = JFactory::getDocument();
$document->addStyleSheet("./modules/mod_flexiadmin/assets/css/style.css",'text/css',"screen");

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
$hiddefeatured   = $params->get('hiddefeatured', '1' );
$hiddepending    = $params->get('hiddepending', '1' );
$hidderevised    = $params->get('hidderevised', '1' );
$hiddeinprogess  = $params->get('hiddeinprogess', '1' );
$hiddedraft      = $params->get('hiddedraft', '1' );
$hiddeyouritem   = $params->get('hiddeyouritem', '1' );
$hiddetrashed    = $params->get('hiddetrashed', '1' );
$column          = $params->get('column', '4' );
$displaycustomtab= $params->get('displaycustomtab', '1' );
$displaycreattab = $params->get('displaycreattab', '1' );
$displaymanagetab= $params->get('displaymanagetab', '1' );
$displayadmintab = $params->get('displayadmintab', '1' );
$displayfreetab  = $params->get('displayfreetab', '1' );
$displayconfigmodule= $params->get('displayconfigmodule', '1' );
$forceheightblock= $params->get('forceheightblock', '' );
$displaycustomtext = $params->get('displaycustomtext','');
$customtext=$params->get('customtext','');

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
$hiddebuttonaddgroup         = $params->get('hiddebuttonaddgroup'         , '1');

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
    <?php if ($displayconfigmodule) : ?>
	<a href="index.php?option=com_modules&task=module.edit&id=<?php echo $module->id;?>" style="float:right;margin-top: -30px;">
		<button type="button" class="btn btn-default">
			<i class="icon-small icon-options"></i>
		</button>
	</a>
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
	<?php if ($displayfreetab) : ?><li class=""><a href="#free<?php echo $module->id;?>" data-toggle="tab"><?php echo JText::_($freenametab); ?></a></li> <?php endif; ?>
	</ul>

		<div class="tab-content">
				<?php if ($displaycustomtab) : ?>
					<div class="tab-pane fade in active" id="custom<?php echo $module->id;?>">
                  <?php $list_buttons = $params->get('add_button');
               //print_r ($list_buttons);
              // loop your result
              foreach( $list_buttons as $list_buttons_idx => $add_button ) :?>

                 <a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $add_button->button_type;?>&maincat=<?php echo $add_button->button_type; ?>&filter_lang=<?php echo $add_button->button_lang; ?>" >
                          <button type="button" class="btn btn-default btn-lg itemlist">
                             <i class="icon-large icon-plus"></i><br/>
                          <?php echo JText::_($add_button->button_name); ?>
                          </button>
                    </a>

              <?php endforeach; ?>
              <?php if ($params->get('displayline1')) : ?><hr /><?php endif; ?>
              <?php $list_catbuttons = $params->get('add_cat_button');
              //print_r ($list_catbuttons);
              // loop your result
              foreach( $list_catbuttons as $list_catbuttons_idx => $cat_button ) :?>

              <a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $cat_button->filtercatids; ?>&filter_lang=<?php echo $cat_button->button_lang; ?>" >
                    <button type="button" class="btn btn-default btn-lg itemlist">
                       <i class="icon-large icon-list"></i><br/>
                    <?php echo JText::_($cat_button->namecatfilter); ?>
                    </button>
              </a>

              <?php endforeach; ?>

             <?php if ($params->get('displayline2')) : ?> <hr /><?php endif; ?>
              <?php $list_edititembuttons = $params->get('edit_item_button');
              //print_r ($list_edititembuttons);
              // loop your result
              foreach( $list_edititembuttons as $list_edititembuttons_idx => $edit_item_button ) :?>

              <a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $edit_item_button->itemid; ?>" >
                    <button type="button" class="btn btn-default btn-lg itemlist">
                       <i class="icon-large icon-pencil"></i><br/>
                    <?php echo JText::_($edit_item_button->nameitemedit); ?>
                    </button>
              </a>

              <?php endforeach; ?>
					</div>
					<?php endif; ?>
										<?php if ($displaycreattab) : ?>
										<div class="tab-pane fade" id="create<?php echo $module->id;?>">
										<?php if($hiddebuttonadditem): ?>
											<a href="index.php?option=com_flexicontent&view=types&format=raw"
														class="modal"
														rel="{size: {x: 700, y: 300}, closable: true}">
													<button type="button" class="btn btn-default btn-lg itemlist">
														<i class="icon-large icon-file-plus"></i><br/>
													<?php echo JText::_( 'FLEXI_ADMIN_ADDITEM' ); ?>
													</button>
											</a>
											<?php endif; ?>
											<?php if($hiddebuttonaddcategory): ?>
											<a href="index.php?option=com_flexicontent&view=category">
												<button type="button" class="btn btn-default btn-lg itemlist">
												<i class="icon-large icon-list"></i><br/>
												<?php echo JText::_( 'FLEXI_ADMIN_ADDCATEGORY' ); ?>
												</button>
											</a>
											<?php endif; ?>
											<?php if($hiddebuttonaddtag): ?>
											<a href="index.php?option=com_flexicontent&view=tag">
												<button type="button" class="btn btn-default btn-lg itemlist">
												<i class="icon-large icon-tag"></i><br/>
												<?php echo JText::_( 'FLEXI_ADMIN_ADDTAG' ); ?>
												</button>
											</a>
											<?php endif; ?>
											<?php if($hiddebuttonadduser): ?>
											<a href="index.php?option=com_flexicontent&task=users.add">
												<button type="button" class="btn btn-default btn-lg itemlist">
												<i class="icon-large icon-user"></i><br/>
												<?php echo JText::_( 'FLEXI_ADMIN_ADDAUTHOR' ); ?>
												</button>
											</a>
											<?php endif; ?>
											<?php if($hiddebuttonaddgroup): ?>
											<a href="index.php?option=com_flexicontent&view=groups.add">
												<button type="button" class="btn btn-default btn-lg itemlist">
												<i class="icon-large icon-users"></i><br/>
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
														<i class="icon-large icon-file-2"></i><br/>
														<?php echo JText::_( 'FLEXI_ADMIN_ITEMLIST' ); ?>
													</button>
												</a>
											<?php endif;?>
											<?php if($hiddebuttonmanagecategories): ?>
												<a href="index.php?option=com_flexicontent&view=categories">
													<button type="button" class="btn btn-default btn-lg itemlist">
														<i class="icon-large icon-list"></i><br/>
														<?php echo JText::_( 'FLEXI_ADMIN_CATLIST' ); ?>
													</button>
												</a>
												<?php endif; ?>
											<?php if($hiddebuttonmanagetags): ?>
								<a href="index.php?option=com_flexicontent&view=tags">
									<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="icon-large icon-tag"></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_TAGLIST' ); ?>
									</button>
								</a>
								<?php endif; ?>
								<?php if($hiddebuttonmanageauthors): ?>
								<a href="index.php?option=com_flexicontent&view=users">
									<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="icon-large icon-user"></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_AUTHORLIST' ); ?>
									</button>
								</a>
								<?php endif; ?>

								<?php if($hiddebuttonmanagegroups): ?>
								<a href="index.php?option=com_flexicontent&view=groups">
									<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="icon-large icon-users"></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_GROUPSLIST' ); ?>
									</button>
								</a>
								<?php endif; ?>

								<?php if($hiddebuttonmanagefiles): ?>
								<a href="index.php?option=com_flexicontent&view=filemanager">
									<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="icon-large icon-upload"></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_FILEMANAGER' ); ?>
									</button>
								</a>
								<?php endif; ?>

										</div>
										<?php endif; ?>
								<?php if ($displayadmintab) : ?>
			<!-- start admin tabs-->
			<div class="tab-pane fade" id="admin<?php echo $module->id;?>">
										<?php if($hiddebuttonmanagetypes): ?>
										<a href="index.php?option=com_flexicontent&view=types">
											<button type="button" class="btn btn-default btn-lg itemlist">
												<i class="icon-large icon-book"></i><br/>
												<?php echo JText::_( 'FLEXI_ADMIN_TYPELIST' ); ?>
											</button>
										</a>
										<?php endif; ?>
									<?php if($hiddebuttonaddtypes): ?>
									<a href="index.php?option=com_flexicontent&view=type">
										<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="icon-large icon-book"></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_ADDTYPE' ); ?>
										</button>
									</a>
									<?php endif; ?>
									<?php if($hiddebuttonmanagefields): ?>
									<a href="index.php?option=com_flexicontent&view=fields">
										<button type="button" class="btn btn-default btn-lg itemlist">
											<i class="icon-large icon-stack"></i><br/>
											<?php echo JText::_( 'FLEXI_ADMIN_FIELDLIST' ); ?>
										</button>
									</a>
									<?php endif; ?>
									<?php if($hiddebuttonaddfields): ?>
									<a href="index.php?option=com_flexicontent&view=field">
										<button type="button" class="btn btn-default btn-lg itemlist">
										<i class="icon-large icon-stack"></i><br/>
										<?php echo JText::_( 'FLEXI_ADMIN_ADDFIELD' ); ?>
										</button>
									</a>
									<?php endif; ?>
						<?php if($hiddebuttonimportcontent): ?>
						<a href="index.php?option=com_flexicontent&view=import">
							<button type="button" class="btn btn-default btn-lg itemlist">
								<i class="icon-large icon-loop"></i> <br/>
								<?php echo JText::_( 'FLEXI_ADMIN_IMPORT' ); ?>
							</button>
						</a>
						<?php endif; ?>
						<?php if($hiddebuttonstats): ?>
						<a href="index.php?option=com_flexicontent&view=stats">
							<button type="button" class="btn btn-default btn-lg itemlist">
								<i class="icon-large icon-pie"></i> <br/>
								<?php echo JText::_( 'FLEXI_ADMIN_STATS' ); ?>
							</button>
						</a>
				<?php endif; ?>
				<?php if($hiddebuttonindex): ?>
					<a href="index.php?option=com_flexicontent&view=search">
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-search"></i><br/>
						<?php echo JText::_( 'FLEXI_ADMIN_SEARCH' ); ?>
						</button>
					</a>
				<?php endif; ?>
						<?php if($hiddebuttonadmin): ?>
					<a href="index.php?option=com_flexicontent">
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-options"></i><br/>
						<?php echo JText::_( 'FLEXI_ADMIN_GEN' ); ?>
						</button>
					</a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<!-- end of admin tabs-->
			<?php if ($displayfreetab) : ?>
			<div class="tab-pane fade" id="free<?php echo $module->id;?>">

            <?php $list_freebuttons = $params->get('free_button');
            //print_r ($list_edititembuttons);
            // loop your result
            foreach( $list_freebuttons as $list_freebuttons_idx => $free_button ) :?>

            <a href="<?php echo $free_button->linkbutton; ?>" >
                  <button type="button" class="btn btn-default btn-lg itemlist">
                     <i class="icon-large <?php echo $free_button->iconbutton; ?>"></i><br/>
                  <?php echo JText::_($free_button->freebutton); ?>
                  </button>
            </a>

         <?php endforeach; ?>
			</div>
			<?php endif; ?>

		</div>
		<?php endif; ?>
		<!-- end tabs -->


	</div>
	<!-- end tabs zone -->
</div>

</div>

<!--start pending block -->


<?php if ($hiddefeatured) : ?>
    <div class="block featured well well-small span<?php echo $column; ?> ">
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
    <div class="block pending well well-small span<?php echo $column; ?> ">
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

	<div class="block revised well well-small span<?php echo $column; ?> ">
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
	<div class="block inprogress well well-small span<?php echo $column; ?> ">
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
	<div class="block draft well well-small span<?php echo $column; ?>">
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
	<div class="block youritems well well-small span<?php echo $column; ?>">
		<?php $user = JFactory::getUser();		?>
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i>
		<?php echo JText::_( 'FLEXI_YOUR_ITEM' ); ?> : <?php echo $user->name; ?></h3>
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items'; ?>
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
	<div class="block trashed well well-small span<?php echo $column; ?>">
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
<?php
// loop your result
foreach( $listCustomlist as $listCustomlist_idx => $customblock ) :?>

<div class="block youritems well well-small span<?php echo $column; ?>">
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
            if(!empty($customblock->extrafieldlist)) {
                      //$customblock= $customblock->listitems;
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
         <?php /*foreach ($listCustomlist as $listCustomlist_idx => $customblock) : */?>
            <tr>
            <td>
               <a href="<?php echo $customblock->listitems->link; ?>"><?php echo $customblock->listitems->title; ?>
               <i class="icon-large icon-edit"></i></a>
            </td>
            <?php if ($customblock->displautblock) : ?><td>
               <span class="small">
                  <i class="icon-user"></i>

                  <small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $customblock->listitems->name; ?>"><?php echo $customblock->listitems->name;?> </small>
               </span>
            </td>
            <?php endif; ?>
            <?php
            if(!empty($customblock->extrafieldlist)) {
               $item = $itemmodel->getItem($customblock->listitems->id, $check_view_access=false);
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
               <i class="icon-calendar"></i> <?php echo JHtml::date($customblock->listitems->modified, 'd M Y'); ?>
            </span>
            </td>
            <?php endif; ?>
         </tr>
      <?php/* endforeach; */?>
                  </tbody>
      </table>
</div>
</div>

<?php endforeach; ?>

</div>
</div>
</div>


<script  type="text/javascript">
jQuery(document).ready(function($){
$('#myTab a:first').tab('show');
});
</script>
