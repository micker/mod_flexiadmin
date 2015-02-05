<?php
/**
* @version 0.4.2 stable $Id: default.php yannick berges
* @package Joomla
* @subpackage FLEXIcontent
* @copyright (C) 2014 Berges Yannick - www.com3elles.com
* @license GNU/GPL v2

* special thanks to ggppdk and emmanuel dannan for flexicontent

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

//module config
$hiddepending        = $params->get('hiddepending', '1' );
$hidderevised        = $params->get('hidderevised', '1' );
$hiddeinprogess      = $params->get('hiddeinprogess', '1' );
$hiddedraft          = $params->get('hiddedraft', '1' );
$hiddeyouritem       = $params->get('hiddeyouritem', '1' );
$hiddetrashed        = $params->get('hiddetrashed', '1' );
$column              = $params->get('column', '4' );
$displaycustomtab    = $params->get('displaycustomtab', '1' );
$displaycreattab     = $params->get('displaycreattab', '1' );
$displaymanagetab    = $params->get('displaymanagetab', '1' );
$displayadmintab     = $params->get('displayadmintab', '1' );
$displayconfigmodule = $params->get('displayconfigmodule', '1' );
$tabmodsidebar       = $params->get('tabmodsidebar', '0' );

//id catlist
$catidlist1       = $params->get('catidlist1', '1' );
$nameblockcustom1 = $params->get('nameblockcustom1', '' );
$catidlist2       = $params->get('catidlist2', '1' );
$nameblockcustom2 = $params->get('nameblockcustom2', '' );
$catidlist3       = $params->get('catidlist3', '1' );
$nameblockcustom3 = $params->get('nameblockcustom3', '' );
$catidlist4       = $params->get('catidlist4', '1' );
$nameblockcustom4 = $params->get('nameblockcustom4', '' );
$catidlist5       = $params->get('catidlist5', '1' );
$nameblockcustom5 = $params->get('nameblockcustom5', '' );
$catidlist6       = $params->get('catidlist6', '1' );
$nameblockcustom6 = $params->get('nameblockcustom6', '' );
$catidlist7       = $params->get('catidlist7', '1' );
$nameblockcustom7 = $params->get('nameblockcustom7', '' );
$catidlist8       = $params->get('catidlist8', '1' );
$nameblockcustom8 = $params->get('nameblockcustom8', '' );
$catidlist9       = $params->get('catidlist9', '1' );
$nameblockcustom9 = $params->get('nameblockcustom9', '' );
$catidlist10      = $params->get('catidlist10', '1' );
$nameblockcustom10= $params->get('nameblockcustom10', '' );


//customtab
$nametab = $params->get('nametab', 'FLEXI_ADMIN_CUSTOM_TAB_NAME' );

//bouton add
$namebutton1  = $params->get('namebutton1', '' );
$type1        = $params->get('types1', '' );
$maincat1     = $params->get('catids1', '' );
$namebutton2  = $params->get('namebutton2', '' );
$type2        = $params->get('types2', '' );
$maincat2     = $params->get('catids2', '' );
$namebutton3  = $params->get('namebutton3', '' );
$type3        = $params->get('types3', '' );
$maincat3     = $params->get('catids3', '' );
$namebutton4  = $params->get('namebutton4', '' );
$type4        = $params->get('types4', '' );
$maincat4     = $params->get('catids4', '' );
$namebutton5  = $params->get('namebutton5', '' );
$type5        = $params->get('types5', '' );
$maincat5     = $params->get('catids5', '' );
$namebutton6  = $params->get('namebutton6', '' );
$type6        = $params->get('types6', '' );
$maincat6     = $params->get('catids6', '' );
$namebutton7  = $params->get('namebutton7', '' );
$type7        = $params->get('types7', '' );
$maincat7     = $params->get('catids7', '' );
$namebutton8  = $params->get('namebutton8', '' );
$type8        = $params->get('types8', '' );
$maincat8     = $params->get('catids8', '' );
$namebutton9  = $params->get('namebutton9', '' );
$type9        = $params->get('types9', '' );
$maincat9     = $params->get('catids9', '' );
$namebutton10 = $params->get('namebutton10', '' );
$type10       = $params->get('types10', '' );
$maincat10    = $params->get('catids10', '' );


//category filter
$filtercat1     = $params->get('filtercatids1', '' );
$namecatfilter1 = $params->get('namecatfilter1', '' );
$filtercat2     = $params->get('filtercatids2', '' );
$namecatfilter2 = $params->get('namecatfilter2', '' );
$filtercat3     = $params->get('filtercatids3', '' );
$namecatfilter3 = $params->get('namecatfilter3', '' );
$filtercat4     = $params->get('filtercatids4', '' );
$namecatfilter4 = $params->get('namecatfilter4', '' );
$filtercat5     = $params->get('filtercatids5', '' );
$namecatfilter5 = $params->get('namecatfilter5', '' );
$filtercat6     = $params->get('filtercatids6', '' );
$namecatfilter6 = $params->get('namecatfilter6', '' );
$filtercat7     = $params->get('filtercatids7', '' );
$namecatfilter7 = $params->get('namecatfilter7', '' );
$filtercat8     = $params->get('filtercatids8', '' );
$namecatfilter8 = $params->get('namecatfilter8', '' );
$filtercat9     = $params->get('filtercatids9', '' );
$namecatfilter9 = $params->get('namecatfilter9', '' );
$filtercat10    = $params->get('filtercatids10', '' );
$namecatfilter10= $params->get('namecatfilter10', '' );


//edit special item
$itemedit1     = $params->get('itemid1', '' );
$nameitemedit1 = $params->get('nameitemedit1', '' );
$itemedit2     = $params->get('itemid2', '' );
$nameitemedit2 = $params->get('nameitemedit2', '' );
$itemedit3     = $params->get('itemid3', '' );
$nameitemedit3 = $params->get('nameitemedit3', '' );
$itemedit4     = $params->get('itemid4', '' );
$nameitemedit4 = $params->get('nameitemedit4', '' );
$itemedit5     = $params->get('itemid5', '' );
$nameitemedit5 = $params->get('nameitemedit5', '' );
$itemedit6     = $params->get('itemid6', '' );
$nameitemedit6 = $params->get('nameitemedit6', '' );
$itemedit7     = $params->get('itemid7', '' );
$nameitemedit7 = $params->get('nameitemedit7', '' );
$itemedit8     = $params->get('itemid8', '' );
$nameitemedit8 = $params->get('nameitemedit8', '' );
$itemedit9     = $params->get('itemid9', '' );
$nameitemedit9 = $params->get('nameitemedit9', '' );
$itemedit10    = $params->get('itemid10', '' );
$nameitemedit10= $params->get('nameitemedit10', '' );


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
?>

<div class="row-fluid">
<?php if ($displaycustomtab || $displaycreattab || $displaymanagetab || $displayadmintab) : ?>
    <div class="sidebar-nav quick-icons">
	<?php if ($displayconfigmodule) : ?>
	<a href="index.php?option=com_modules&view=module&layout=edit&id=<?php echo $module->id;?>" style="float:right;">
			<i class="icon-small icon-options"></i>
		
	</a>
	<?php endif; ?>
	
	<?php if ($tabmodsidebar) : ?>
	<ul class="nav nav-tabs" role="tablist" id="myTab2">
	<?php if ($displaycustomtab) : ?><li class="active"><a href="#custom<?php echo $module->id;?>" data-toggle="tab"><?php echo JText::_($nametab); ?></a></li> <?php endif; ?>
	<?php if ($displaycreattab) : ?><li class=""><a href="#create<?php echo $module->id;?>" data-toggle="tab"><?php echo JText::_('FLEXI_ADMIN_TAB_CREATE_D'); ?></a></li>  <?php endif; ?>
	<?php if ($displaymanagetab) : ?><li class=""><a href="#manage<?php echo $module->id;?>" data-toggle="tab"><?php echo JText::_('FLEXI_ADMIN_TAB_MANAGE_D'); ?></a></li>  <?php endif; ?>
	<?php if ($displayadmintab) : ?><li class=""><a href="#admin<?php echo $module->id;?>" data-toggle="tab"><?php echo JText::_('FLEXI_ADMIN_TAB_ADMIN_D'); ?></a></li>  <?php endif; ?>
	</ul>  
	<?php endif; ?>
	<?php if ($tabmodsidebar) : ?>
		<div class="tab-content">  
	<?php endif; ?>	
		<?php if ($displaycustomtab) : ?>
			<div class="tab-pane active" id="custom<?php echo $module->id;?>">
			<ul class="j-links-group nav nav-list">
			<?php if ($tabmodsidebar == 0) : ?>
			<li><h2 class="nav-header"><?php echo JText::_($nametab); ?></h2></li>
			<?php endif; ?>
			<?php if ($namebutton1) : ?>
			<li>
			<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type1;?>&maincat=<?php echo $maincat1; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $namebutton1; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namebutton2) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type2;?>&maincat=<?php echo $maincat2; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $namebutton2; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namebutton3) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type3;?>&maincat=<?php echo $maincat3; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $namebutton3; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namebutton4) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type4;?>&maincat=<?php echo $maincat4; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $namebutton4; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namebutton5) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type5;?>&maincat=<?php echo $maincat5; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $namebutton5; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namebutton6) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type6;?>&maincat=<?php echo $maincat6; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $namebutton6; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namebutton7) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type7;?>&maincat=<?php echo $maincat7; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $namebutton7; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namebutton8) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type8;?>&maincat=<?php echo $maincat8; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $namebutton8; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namebutton9) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type9;?>&maincat=<?php echo $maincat9; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $namebutton9; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namebutton10) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type10;?>&maincat=<?php echo $maincat10; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $namebutton10; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<li>
			<?php if ($namecatfilter1) : ?>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat1; ?>" >
						
							<i class="icon-large icon-list"></i> 
						<?php echo $namecatfilter1; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namecatfilter2) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat2; ?>" >
						
							<i class="icon-large icon-list"></i> 
						<?php echo $namecatfilter2; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namecatfilter3) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat3; ?>" >
						
							<i class="icon-large icon-list"></i> 
						<?php echo $namecatfilter3; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namecatfilter4) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat4; ?>" >
						
							<i class="icon-large icon-list"></i> 
						<?php echo $namecatfilter4; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namecatfilter5) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat5; ?>" >
						
							<i class="icon-large icon-list"></i> 
						<?php echo $namecatfilter5; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namecatfilter6) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat6; ?>" >
						
							<i class="icon-large icon-list"></i> 
						<?php echo $namecatfilter6; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namecatfilter7) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat7; ?>" >
						
							<i class="icon-large icon-list"></i> 
						<?php echo $namecatfilter7; ?>
						
				</a>
			</li>	
			<?php endif; ?>
			<?php if ($namecatfilter8) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat8; ?>" >
						
							<i class="icon-large icon-list"></i> 
						<?php echo $namecatfilter8; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namecatfilter9) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat9; ?>" >
						
							<i class="icon-large icon-list"></i> 
						<?php echo $namecatfilter9; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($namecatfilter10) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat10; ?>" >
						
							<i class="icon-large icon-list"></i> 
						<?php echo $namecatfilter10; ?>
						
				</a>
			</li>	
			<?php endif; ?>
			<?php if ($nameitemedit1) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit1; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $nameitemedit1; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($nameitemedit2) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit2; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $nameitemedit2; ?>
						
				</a>
			</li>	
			<?php endif; ?>
			<?php if ($nameitemedit3) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit3; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $nameitemedit3; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($nameitemedit4) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit4; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $nameitemedit4; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($nameitemedit5) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit5; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $nameitemedit5; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($nameitemedit6) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit6; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $nameitemedit6; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($nameitemedit7) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit7; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $nameitemedit7; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($nameitemedit8) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit8; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $nameitemedit8; ?>
						
				</a>
			</li>
			<?php endif; ?>
			<?php if ($nameitemedit9) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit9; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $nameitemedit9; ?>
						
				</a>
			</li>	
			<?php endif; ?>
			<?php if ($nameitemedit10) : ?>
			<li>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit10; ?>" >
						
							<i class="icon-large icon-file-plus"></i> 
						<?php echo $nameitemedit10; ?>
						
				</a>
			</li>	
			<?php endif; ?>
			</ul>
			</div>
			<?php endif; ?>
			<?php if ($displaycreattab) : ?>
			<div class="tab-pane" id="create<?php echo $module->id;?>"> 
			<ul class="j-links-group nav nav-list">
			<?php if ($tabmodsidebar == 0) : ?>
			<li><h2 class="nav-header"><?php echo JText::_('FLEXI_ADMIN_TAB_CREATE_D'); ?></h2></li>
			<?php endif; ?>
			<?php if($hiddebuttonadditem): ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=types&format=raw" 
							class="modal" 
							rel="{size: {x: 700, y: 300}, closable: true}">
							<i class="icon-large icon-file-plus"></i>
						<span class="j-links-link"><?php echo JText::_( 'FLEXI_ADMIN_ADDITEM' ); ?></span>
				</a>
			</li>
				<?php endif; ?>
				<?php if($hiddebuttonaddcategory): ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=category"> 
					<i class="icon-large icon-list"></i>
					<span class="j-links-link"><?php echo JText::_( 'FLEXI_ADMIN_ADDCATEGORY' ); ?></span>
				</a>
			</li>
				<?php endif; ?>
				<?php if($hiddebuttonaddtag): ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=tag">
					<i class="icon-large icon-tag"></i>
					<span class="j-links-link"><?php echo JText::_( 'FLEXI_ADMIN_ADDTAG' ); ?></span>
				</a>
			</li>
				<?php endif; ?>
				<?php if($hiddebuttonadduser): ?>
			<li>
				<a href="index.php?option=com_flexicontent&task=users.add">
					<i class="icon-large icon-user"></i> 
					<span class="j-links-link"><?php echo JText::_( 'FLEXI_ADMIN_ADDAUTHOR' ); ?></span>
				</a>
			</li>
				<?php endif; ?>
				<?php if($hiddebuttonaddgroup): ?>
			<li>
				<a href="index.php?option=com_flexicontent&view=groups.add">
					<i class="icon-large icon-users"></i>
					<span class="j-links-link"><?php echo JText::_( 'FLEXI_ADMIN_ADDGROUPS' ); ?></span>
				</a>
			</li>
				<?php endif; ?>
				</ul>
			</div>  
			<?php endif; ?>
			<?php if ($displaymanagetab) : ?>
			<div class="tab-pane" id="manage<?php echo $module->id;?>">  
			<ul class="j-links-group nav nav-list">
			<?php if ($tabmodsidebar == 0) : ?>
			<li><h2 class="nav-header"><?php echo JText::_('FLEXI_ADMIN_TAB_MANAGE_D'); ?></h2></li>
			<?php endif; ?>
				<?php if($hiddebuttonmanageitems): ?>
				<li>
					<a href="index.php?option=com_flexicontent&view=items">
						
							<i class="icon-large icon-file-2"></i> 
							<?php echo JText::_( 'FLEXI_ADMIN_ITEMLIST' ); ?></span>

					</a>
				</li>
				<?php endif;?>
				<?php if($hiddebuttonmanagecategories): ?>
				<li>
					<a href="index.php?option=com_flexicontent&view=categories">
						  
							<i class="icon-large icon-list"></i> 
							<?php echo JText::_( 'FLEXI_ADMIN_CATLIST' ); ?>
						
					</a>
				</li>
					<?php endif; ?>
				<?php if($hiddebuttonmanagetags): ?>
				<li>
	<a href="index.php?option=com_flexicontent&view=tags">
		  
			<i class="icon-large icon-tag"></i> 
			<?php echo JText::_( 'FLEXI_ADMIN_TAGLIST' ); ?>
		
	</a>
	</li>
	<?php endif; ?>
	<?php if($hiddebuttonmanageauthors): ?>
	<li>
	<a href="index.php?option=com_flexicontent&view=users">
		  
			<i class="icon-large icon-user"></i> 
			<?php echo JText::_( 'FLEXI_ADMIN_AUTHORLIST' ); ?>
		
	</a>
	</li>
	<?php endif; ?>
	
	<?php if($hiddebuttonmanagegroups): ?>
	<li>
	<a href="index.php?option=com_flexicontent&view=groups">
		  
			<i class="icon-large icon-users"></i> 
			<?php echo JText::_( 'FLEXI_ADMIN_GROUPSLIST' ); ?>
		
	</a>
	</li>
	<?php endif; ?>
		
	<?php if($hiddebuttonmanagefiles): ?>
	<li>
	<a href="index.php?option=com_flexicontent&view=filemanager">
		  
			<i class="icon-large icon-upload"></i> 
			<?php echo JText::_( 'FLEXI_ADMIN_FILEMANAGER' ); ?>
		
	</a>
	</li>
	<?php endif; ?>
	</ul>
			</div>  
			<?php endif; ?>
			<?php if ($displayadmintab) : ?>
			<div class="tab-pane" id="admin<?php echo $module->id;?>"> 
			
			<ul class="j-links-group nav nav-list">
			<?php if ($tabmodsidebar == 0) : ?>
			<li><h2 class="nav-header"><?php echo JText::_('FLEXI_ADMIN_TAB_ADMIN_D'); ?></h2></li>
			<?php endif; ?>
					<?php if($hiddebuttonmanagetypes): ?>
					<li>
					<a href="index.php?option=com_flexicontent&view=types">
						  
							<i class="icon-large icon-book"></i> 
							<?php echo JText::_( 'FLEXI_ADMIN_TYPELIST' ); ?>
						
					</a>
					</li>
					<?php endif; ?>
				<?php if($hiddebuttonaddtypes): ?>
				<li>
				<a href="index.php?option=com_flexicontent&view=type">
					  
					<i class="icon-large icon-book"></i> 
					<?php echo JText::_( 'FLEXI_ADMIN_ADDTYPE' ); ?>
					
				</a>
</li>				
				<?php endif; ?>
				<?php if($hiddebuttonmanagefields): ?>
				<li>
				<a href="index.php?option=com_flexicontent&view=fields">
					  
						<i class="icon-large icon-stack"></i> 
						<?php echo JText::_( 'FLEXI_ADMIN_FIELDLIST' ); ?>
					
				</a>
				</li>
				<?php endif; ?>
				<?php if($hiddebuttonaddfields): ?>
				<li>
				<a href="index.php?option=com_flexicontent&view=field">
					  
					<i class="icon-large icon-stack"></i> 
					<?php echo JText::_( 'FLEXI_ADMIN_ADDFIELD' ); ?>
					
				</a>
				</li>
				<?php endif; ?>
	<?php if($hiddebuttonimportcontent): ?><li>
	<a href="index.php?option=com_flexicontent&view=import">
		  
			<i class="icon-large icon-loop"></i> 
			<?php echo JText::_( 'FLEXI_ADMIN_IMPORT' ); ?>
		
	</a>
	</li>
	<?php endif; ?>
	<?php if($hiddebuttonstats): ?>
	<li>
	<a href="index.php?option=com_flexicontent&view=stats">
		  
			<i class="icon-large icon-pie"></i> 
			<?php echo JText::_( 'FLEXI_ADMIN_STATS' ); ?>
		
	</a>
	</li>
	<?php endif; ?>
	<?php if($hiddebuttonindex): ?>
	<li>
	<a href="index.php?option=com_flexicontent&view=search">
		  
			<i class="icon-large icon-search"></i> 
			<?php echo JText::_( 'FLEXI_ADMIN_SEARCH' ); ?>
		
	</a>
	</li>
    <?php endif; ?>
	<?php if($hiddebuttonadmin): ?>
	<li>
				<a href="index.php?option=com_flexicontent">
					  
						<i class="icon-large icon-options"></i> 
						<?php echo JText::_( 'FLEXI_ADMIN_GEN' ); ?>
					
				</a>
				</li>
				<?php endif; ?>
				</ul>
			</div> 
			<?php endif; ?>
		<?php if ($tabmodsidebar) : ?>	
		</div>  
		<?php endif; ?>		
	</div> 

	<?php endif; ?>
</div>

<script  type="text/javascript">
jQuery(document).ready(function($){
$('#myTab2 a:first').tab('show');
});
</script>





