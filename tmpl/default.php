<?php
//blocage des accés directs sur ce script
defined('_JEXEC') or die('Accés interdit');

JHtml::_('bootstrap.tooltip');
JHTML::_('behavior.modal');
$document = JFactory::getDocument();
$document->addStyleSheet("./modules/mod_flexiadmin/assets/css/style.css",'text/css',"screen");

//module config
$hiddepending = $params->get('hiddepending', '1' );
$hidderevised = $params->get('hidderevised', '1' );
$hiddeinprogess = $params->get('hiddeinprogess', '1' );
$hiddedraft = $params->get('hiddedraft', '1' );
$hiddeyouritem = $params->get('hiddeyouritem', '1' );
$hiddetrashed = $params->get('hiddetrashed', '1' );
$column = $params->get('column', '4' );
$displaycustomtab= $params->get('displaycustomtab', '1' );
$displaycreattab= $params->get('displaycreattab', '1' );
$displaymanagetab= $params->get('displaymanagetab', '1' );
$displayadmintab= $params->get('displayadmintab', '1' );

//id catlist
$catidlist1= $params->get('catidlist1', '1' );
$nameblockcustom1= $params->get('nameblockcustom1', '' );
$catidlist2= $params->get('catidlist2', '1' );
$nameblockcustom2= $params->get('nameblockcustom2', '' );
$catidlist3= $params->get('catidlist3', '1' );
$nameblockcustom3= $params->get('nameblockcustom3', '' );
$catidlist4= $params->get('catidlist4', '1' );
$nameblockcustom4= $params->get('nameblockcustom4', '' );
$catidlist5= $params->get('catidlist5', '1' );
$nameblockcustom5= $params->get('nameblockcustom5', '' );
$catidlist6= $params->get('catidlist6', '1' );
$nameblockcustom6= $params->get('nameblockcustom6', '' );
$catidlist7= $params->get('catidlist7', '1' );
$nameblockcustom7= $params->get('nameblockcustom7', '' );
$catidlist8= $params->get('catidlist8', '1' );
$nameblockcustom8= $params->get('nameblockcustom8', '' );
$catidlist9= $params->get('catidlist9', '1' );
$nameblockcustom9= $params->get('nameblockcustom9', '' );
$catidlist10= $params->get('catidlist10', '1' );
$nameblockcustom10= $params->get('nameblockcustom10', '' );


//customtab
$nametab = $params->get('nametab', 'FLEXI_ADMIN_CUSTOM_TAB_NAME' );

//bouton add
$namebutton1 = $params->get('namebutton1', '' );
$type1 = $params->get('types1', '' );
$maincat1 = $params->get('catids1', '' );
$namebutton2 = $params->get('namebutton2', '' );
$type2 = $params->get('types2', '' );
$maincat2 = $params->get('catids2', '' );
$namebutton3 = $params->get('namebutton3', '' );
$type3 = $params->get('types3', '' );
$maincat3 = $params->get('catids3', '' );
$namebutton4 = $params->get('namebutton4', '' );
$type4 = $params->get('types4', '' );
$maincat4 = $params->get('catids4', '' );
$namebutton5 = $params->get('namebutton5', '' );
$type5 = $params->get('types5', '' );
$maincat5 = $params->get('catids5', '' );
$namebutton6 = $params->get('namebutton6', '' );
$type6 = $params->get('types6', '' );
$maincat6 = $params->get('catids6', '' );
$namebutton7 = $params->get('namebutton7', '' );
$type7 = $params->get('types7', '' );
$maincat7 = $params->get('catids7', '' );
$namebutton8 = $params->get('namebutton8', '' );
$type8 = $params->get('types8', '' );
$maincat8 = $params->get('catids8', '' );
$namebutton9 = $params->get('namebutton9', '' );
$type9 = $params->get('types9', '' );
$maincat9 = $params->get('catids9', '' );
$namebutton10 = $params->get('namebutton10', '' );
$type10 = $params->get('types10', '' );
$maincat10 = $params->get('catids10', '' );


//category filter
$filtercat1= $params->get('filtercatids1', '' );
$namecatfilter1= $params->get('namecatfilter1', '' );
$filtercat2= $params->get('filtercatids2', '' );
$namecatfilter2= $params->get('namecatfilter2', '' );
$filtercat3= $params->get('filtercatids3', '' );
$namecatfilter3= $params->get('namecatfilter3', '' );
$filtercat4= $params->get('filtercatids4', '' );
$namecatfilter4= $params->get('namecatfilter4', '' );
$filtercat5= $params->get('filtercatids5', '' );
$namecatfilter5= $params->get('namecatfilter5', '' );
$filtercat6= $params->get('filtercatids6', '' );
$namecatfilter6= $params->get('namecatfilter6', '' );
$filtercat7= $params->get('filtercatids7', '' );
$namecatfilter7= $params->get('namecatfilter7', '' );
$filtercat8= $params->get('filtercatids8', '' );
$namecatfilter8= $params->get('namecatfilter8', '' );
$filtercat9= $params->get('filtercatids9', '' );
$namecatfilter9= $params->get('namecatfilter9', '' );
$filtercat10= $params->get('filtercatids10', '' );
$namecatfilter10= $params->get('namecatfilter10', '' );


//edit special item
$itemedit1= $params->get('itemid1', '' );
$nameitemedit1= $params->get('nameitemedit1', '' );
$itemedit2= $params->get('itemid2', '' );
$nameitemedit2= $params->get('nameitemedit2', '' );
$itemedit3= $params->get('itemid3', '' );
$nameitemedit3= $params->get('nameitemedit3', '' );
$itemedit4= $params->get('itemid4', '' );
$nameitemedit4= $params->get('nameitemedit4', '' );
$itemedit5= $params->get('itemid5', '' );
$nameitemedit5= $params->get('nameitemedit5', '' );
$itemedit6= $params->get('itemid6', '' );
$nameitemedit6= $params->get('nameitemedit6', '' );
$itemedit7= $params->get('itemid7', '' );
$nameitemedit7= $params->get('nameitemedit7', '' );
$itemedit8= $params->get('itemid8', '' );
$nameitemedit8= $params->get('nameitemedit8', '' );
$itemedit9= $params->get('itemid9', '' );
$nameitemedit9= $params->get('nameitemedit9', '' );
$itemedit10= $params->get('itemid10', '' );
$nameitemedit10= $params->get('nameitemedit10', '' );
?>

<div class="row-fluid">
<?php if ($displaycustomtab || $displaycreattab || $displaymanagetab || $displayadmintab) : ?>
    <div class="action well well-small span13">
	<a href="index.php?option=com_modules&view=module&layout=edit&id=<?php echo $module->id;?>" style="float:right;">
						<button type="button" class="btn btn-default">
							<i class="icon-small icon-options"></i>
						</button>
				</a>
	<ul class="nav nav-tabs" role="tablist">
	<?php if ($displaycustomtab) : ?><li class="active"><a href="#0" data-toggle="tab"><?php echo JText::_($nametab); ?></a></li> <?php endif; ?>
	<?php if ($displaycreattab) : ?><li class=""><a href="#1" data-toggle="tab">Creation</a></li>  <?php endif; ?>
	<?php if ($displaymanagetab) : ?><li class=""><a href="#2" data-toggle="tab">Gestion</a></li>  <?php endif; ?>
	<?php if ($displayadmintab) : ?><li class=""><a href="#3" data-toggle="tab">Administration</a></li>  <?php endif; ?>
	</ul>  
	
		<div class="tab-content">  
		<?php if ($displaycustomtab) : ?>
			<div class="tab-pane active" id="0">
			<?php if ($namebutton1) : ?>
			<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type1;?>&maincat=<?php echo $maincat1; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $namebutton1; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namebutton2) : ?>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type3;?>&maincat=<?php echo $maincat2; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $namebutton2; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namebutton3) : ?>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type3;?>&maincat=<?php echo $maincat3; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $namebutton3; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namebutton4) : ?>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type4;?>&maincat=<?php echo $maincat4; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $namebutton4; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namebutton5) : ?>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type5;?>&maincat=<?php echo $maincat5; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $namebutton5; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namebutton6) : ?>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type6;?>&maincat=<?php echo $maincat6; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $namebutton6; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namebutton7) : ?>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type7;?>&maincat=<?php echo $maincat7; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $namebutton7; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namebutton8) : ?>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type8;?>&maincat=<?php echo $maincat8; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $namebutton8; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namebutton9) : ?>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type9;?>&maincat=<?php echo $maincat9; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $namebutton9; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namebutton10) : ?>
				<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type10;?>&maincat=<?php echo $maincat10; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $namebutton10; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namecatfilter1) : ?>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat1; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-list"></i><br/> 
						<?php echo $namecatfilter1; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namecatfilter2) : ?>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat2; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-list"></i><br/> 
						<?php echo $namecatfilter2; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namecatfilter3) : ?>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat3; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-list"></i><br/> 
						<?php echo $namecatfilter3; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namecatfilter4) : ?>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat4; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-list"></i><br/> 
						<?php echo $namecatfilter4; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namecatfilter5) : ?>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat5; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-list"></i><br/> 
						<?php echo $namecatfilter5; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namecatfilter6) : ?>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat6; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-list"></i><br/> 
						<?php echo $namecatfilter6; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namecatfilter7) : ?>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat7; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-list"></i><br/> 
						<?php echo $namecatfilter7; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namecatfilter8) : ?>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat8; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-list"></i><br/> 
						<?php echo $namecatfilter8; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namecatfilter9) : ?>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat9; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-list"></i><br/> 
						<?php echo $namecatfilter9; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($namecatfilter10) : ?>
				<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat10; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-list"></i><br/> 
						<?php echo $namecatfilter10; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($nameitemedit1) : ?>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit1; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $nameitemedit1; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($nameitemedit2) : ?>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit2; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $nameitemedit2; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($nameitemedit3) : ?>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit3; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $nameitemedit3; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($nameitemedit4) : ?>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit4; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $nameitemedit4; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($nameitemedit5) : ?>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit5; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $nameitemedit5; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($nameitemedit6) : ?>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit6; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $nameitemedit6; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($nameitemedit7) : ?>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit7; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $nameitemedit7; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($nameitemedit8) : ?>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit8; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $nameitemedit8; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($nameitemedit9) : ?>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit9; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $nameitemedit9; ?>
						</button>
				</a>
			<?php endif; ?>
			<?php if ($nameitemedit10) : ?>
				<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit10; ?>" >
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo $nameitemedit10; ?>
						</button>
				</a>
			<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php if ($displaycreattab) : ?>
			<div class="tab-pane" id="1">  
				<a href="index.php?option=com_flexicontent&view=types&format=raw" 
							class="modal" 
							rel="{size: {x: 700, y: 300}, closable: true}">
						<button type="button" class="btn btn-default btn-lg itemlist">
							<i class="icon-large icon-file-plus"></i><br/> 
						<?php echo JText::_( 'FLEXI_ADMIN_ADDITEM' ); ?>
						</button>
				</a>
				<a href="index.php?option=com_flexicontent&view=category">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-list"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_ADDCAT' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent&view=tag">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-tag"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_ADDTAG' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent&task=users.add">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-user"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_ADDAUTHOR' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent&view=groups.add">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-users"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_ADDGROUPS' ); ?>
					</button>
				</a>
				
			</div>  
			<?php endif; ?>
			<?php if ($displaymanagetab) : ?>
			<div class="tab-pane" id="2">  
				<a href="index.php?option=com_flexicontent&view=items">
					<button type="button" class="btn btn-default btn-lg itemlist">
					<i class="icon-large icon-file-3"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_ITEMLIST' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent&view=categories">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-list"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_CATLIST' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent&view=tags">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-tag"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_TAGLIST' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent&view=users">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-user"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_AUTHORLIST' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent&view=groups">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-users"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_GROUPSLIST' ); ?>
					</button>
				</a>
			</div>  
			<?php endif; ?>
			<?php if ($displayadmintab) : ?>
			<div class="tab-pane" id="3"> 
				<a href="index.php?option=com_flexicontent&view=types">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-book"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_TYPELIST' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent&view=type">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-book"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_ADDTYPE' ); ?>
					</button>
				</a>			
				<a href="index.php?option=com_flexicontent&view=fields">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-stack"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_FIELDLIST' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent&view=field">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-stack"></i><br/> 
					<?php echo JText::_( 'FLEXI_ADMIN_ADDFIELD' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent&view=import">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-loop"></i> <br/>
					<?php echo JText::_( 'FLEXI_ADMIN_IMPORT' ); ?>
					</button>
				</a>	
				<a href="index.php?option=com_flexicontent&view=stats">
					<button type="button" class="btn btn-default btn-lg itemlist">  
					<i class="icon-large icon-pie"></i> <br/>
					<?php echo JText::_( 'FLEXI_ADMIN_STATS' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent&view=search">
					<button type="button" class="btn btn-default btn-lg itemlist">  
						<i class="icon-large icon-search"></i><br/> 
						<?php echo JText::_( 'FLEXI_ADMIN_SEARCH' ); ?>
					</button>
				</a>
				<a href="index.php?option=com_flexicontent">
					<button type="button" class="btn btn-default btn-lg itemlist">  
						<i class="icon-large icon-options"></i><br/> 
						<?php echo JText::_( 'FLEXI_ADMIN_GEN' ); ?>
					</button>
				</a>
			</div> 
			<?php endif; ?>			
		</div>    
	</div> 
	<?php endif; ?>
</div>
</div>
	
<div class="row-fluid">
<div class="row-fluid">
<?php if ($hiddepending) : ?>
    <div class="pending well well-small span<?php echo $column; ?> ">
	<h3 class="module-title nav-header"><i class="icon-large icon-thumbs-down"></i> <?php echo JText::_( 'FLEXI_ADMIN_PENDING' ); ?></h3>

	<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=PE'; ?>
	<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
			<div class="row-striped">		
				<?php foreach ($listPending as $itemPending) : ?>			
				<div class="row-fluid">				
					<div class="span13">					
						<div class="span6">					
							<a href="<?php echo $itemPending->link; ?>"><?php echo $itemPending->title; ?>	
							<i class="icon-large icon-edit"></i></a>					
						</div>					
						<div class="span3" style="margin-left: 0 !important;">
							<span class="small">	
							<i class="icon-user"></i> 
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemPending->created_by; ?>"><?php echo $itemPending->created_by;?> </small>
							</span>				
						</div>				
						<div class="span3">
							<span class="small">
							<i class="icon-calendar"></i> <?php echo JHtml::date($itemPending->created, 'n M Y'); ?>
							</span>
						</div>				
					</div>			
				</div>	
				<?php endforeach; ?>		
			</div>	
	</div>	
	<?php endif; ?>
	
	<?php if ($hidderevised) : ?>

	<div class="revised well well-small span<?php echo $column; ?> ">
		<h3 class="module-title nav-header"><i class="icon-large icon-thumbs-up"></i> <?php echo JText::_( 'FLEXI_ADMIN_REVISED' ); ?></h3>	
		<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=RV'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
			<div class="row-striped">		
				<?php foreach ($listRevised as $itemRevised) : ?>			
				<div class="row-fluid">
					<div class="span13">					
						<div class="span6">							
							<a href="<?php echo $itemRevised->link; ?>"><?php echo $itemRevised->title; ?>					
							<i class="icon-large icon-edit"></i></a>					
						</div>					
						<div class="span3" style="margin-left: 0 !important;">					
							<span class="small">
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemRevised->created_by; ?>">&nbsp;<i class="icon-user"></i></small>											
							</span>				
						</div>				
						<div class="span3">
							<span class="small"> 
							<i class="icon-calendar"></i> <?php echo JHtml::date($itemRevised->created, 'n M Y'); ?>
							</span>
						</div>				
					</div>			
				</div>		
				<?php endforeach; ?>		
			</div>	
	</div>	
<?php endif; ?>
<?php if ($hiddeinprogess) : ?>
	<div class="inprogress well well-small span<?php echo $column; ?> ">	
		<h3 class="module-title nav-header"><i class="icon-large icon-checkin"></i> <?php echo JText::_( 'FLEXI_ADMIN_INPROGRESS' ); ?></h3>
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=IP'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
			<div class="row-striped">				
				<?php foreach ($listInprogress as $itemInprogress) : ?>			
				<div class="row-fluid">				
					<div class="span13">					
						<div class="span6">							
							<a href="<?php echo $itemInprogress->link; ?>"><?php echo $itemInprogress->title; ?>					
							<i class="icon-large icon-edit"></i></a>					
						</div>					
						<div class="span3" style="margin-left: 0 !important;">					
							<span class="small">					 
							<i class="icon-user"></i> 
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemInprogress->created_by; ?>"><?php echo $itemInprogress->created_by;?> </small>
							</span>				
						</div>				
						<div class="span3">
							<span class="small"> <i class="icon-calendar"></i> <?php echo JHtml::date($itemInprogress->created, 'n M Y'); ?></span>
						</div>
					</div>			
				</div>		
			<?php endforeach; ?>		
			</div>	
	</div>	
<?php endif; ?>
</div>
<div class="row-fluid">
<?php if ($hiddedraft) : ?>
	<div class="draft well well-small span<?php echo $column; ?>">
	<h3 class="module-title nav-header"><i class="icon-large icon-file"></i> <?php echo JText::_( 'FLEXI_ADMIN_DRAFT' ); ?></h3>
	<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=OQ'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
	<div class="row-striped">		
		<?php foreach ($listDraft as $itemDraft) : ?>
		<div class="row-fluid">		
			<div class="span13">	
				<div class="span6">		
					<a href="<?php echo $itemDraft->link; ?>"><?php echo $itemDraft->title; ?>	
					<i class="icon-large icon-edit"></i></a>		
				</div>				
				<div class="span3" style="margin-left: 0 !important;">		
					<span class="small">
<?php //TODO display user name in tooltip ?>
					<i class="icon-user"></i><small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemDraft->created_by; ?>"><?php echo $itemDraft->created_by;?> </small> 			
					</span>			
				</div>			
				<div class="span3">
					<span class="small">
					<i class="icon-calendar"></i> <?php echo JHtml::date($itemDraft->created, 'n M Y'); ?>
					</span>
				</div>		
			</div>	
		</div>	
		<?php endforeach; ?>	
	</div>	
</div>
<?php endif; ?>
<?php if ($hiddeyouritem) : ?>
	<div class="youritems well well-small span<?php echo $column; ?>">	
		<?php $user = JFactory::getUser();		?>
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_( 'FLEXI_YOUR_ITEM' ); ?> : <?php echo $user->name; ?></h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=OQ'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">		
			<?php foreach ($listUseritem as $itemUseritem) : ?>		
			<div class="row-fluid">		
				<div class="span13">			
					<div class="span6">					
						<a href="<?php echo $itemUseritem->link; ?>"><?php echo $itemUseritem->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span3" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemUseritem->created_by; ?>"><?php echo $itemUseritem->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span3">
					<?php echo $itemUseritem->state;?>
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemUseritem->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?>
<?php if ($hiddetrashed) : ?>
	<div class="trashed well well-small span<?php echo $column; ?>">	
	<h3 class="module-title nav-header"><i class="icon-large icon-trash"></i> 
	<?php echo JText::_( 'FLEXI_ADMIN_TRASHED' ); ?></h3>	
	<?php //TODO filtrage trashed	
	$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=OQ'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
	</div>	
<?php endif; ?>
<?php if ($nameblockcustom1) : ?>
	<div class="youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom1); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist1; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">	
	
			<?php foreach ($listCustomlist1 as $itemCustomlist1) : ?>		
			<div class="row-fluid">		
				<div class="span13">			
					<div class="span6">					
						<a href="<?php echo $itemCustomlist1->link; ?>"><?php echo $itemCustomlist1->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span3" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemCustomlist1->created_by; ?>"><?php echo $itemCustomlist1->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span3">
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist1->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?>
<?php if ($nameblockcustom2) : ?>
	<div class="youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom2); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist2; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">	
	
			<?php foreach ($listCustomlist2 as $itemCustomlist2) : ?>		
			<div class="row-fluid">		
				<div class="span13">			
					<div class="span6">					
						<a href="<?php echo $itemCustomlist2->link; ?>"><?php echo $itemCustomlist2->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span3" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemCustomlist2->created_by; ?>"><?php echo $itemCustomlist2->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span3">
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist2->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?>
<?php if ($nameblockcustom3) : ?>
	<div class="youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom3); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist3; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">	
	
			<?php foreach ($listCustomlist3 as $itemCustomlist3) : ?>		
			<div class="row-fluid">		
				<div class="span13">			
					<div class="span6">					
						<a href="<?php echo $itemCustomlist3->link; ?>"><?php echo $itemCustomlist3->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span3" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemCustomlist3->created_by; ?>"><?php echo $itemCustomlist3->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span3">
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist3->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?>
<?php if ($nameblockcustom4) : ?>
	<div class="youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom4); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist4; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">	
	
			<?php foreach ($listCustomlist4 as $itemCustomlist4) : ?>		
			<div class="row-fluid">		
				<div class="span13">			
					<div class="span6">					
						<a href="<?php echo $itemCustomlist4->link; ?>"><?php echo $itemCustomlist4->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span3" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemCustomlist4->created_by; ?>"><?php echo $itemCustomlist4->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span3">
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist4->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?>
<?php if ($nameblockcustom5) : ?>
	<div class="youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom5); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist5; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">	
	
			<?php foreach ($listCustomlist5 as $itemCustomlist5) : ?>		
			<div class="row-fluid">		
				<div class="span13">			
					<div class="span6">					
						<a href="<?php echo $itemCustomlist5->link; ?>"><?php echo $itemCustomlist5->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span3" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemCustomlist5->created_by; ?>"><?php echo $itemCustomlist5->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span3">
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist5->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?>
<?php if ($nameblockcustom6) : ?>
	<div class="youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom6); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist6; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">	
	
			<?php foreach ($listCustomlist6 as $itemCustomlist6) : ?>		
			<div class="row-fluid">		
				<div class="span13">			
					<div class="span6">					
						<a href="<?php echo $itemCustomlist6->link; ?>"><?php echo $itemCustomlist6->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span3" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemCustomlist6->created_by; ?>"><?php echo $itemCustomlist6->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span3">
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist6->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?>
<?php if ($nameblockcustom7) : ?>
	<div class="youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom7); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist7; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">	
	
			<?php foreach ($listCustomlist7 as $itemCustomlist7) : ?>		
			<div class="row-fluid">		
				<div class="span13">			
					<div class="span6">					
						<a href="<?php echo $itemCustomlist7->link; ?>"><?php echo $itemCustomlist7->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span3" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemCustomlist7->created_by; ?>"><?php echo $itemCustomlist7->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span3">
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist7->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?>
<?php if ($nameblockcustom8) : ?>
	<div class="youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom8); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist8; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">	
	
			<?php foreach ($listCustomlist8 as $itemCustomlist8) : ?>		
			<div class="row-fluid">		
				<div class="span13">			
					<div class="span6">					
						<a href="<?php echo $itemCustomlist8->link; ?>"><?php echo $itemCustomlist8->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span3" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemCustomlist8->created_by; ?>"><?php echo $itemCustomlist8->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span3">
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist8->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?>
<?php if ($nameblockcustom9) : ?>
	<div class="youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom9); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist9; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">	
	
			<?php foreach ($listCustomlist9 as $itemCustomlist9) : ?>		
			<div class="row-fluid">		
				<div class="span13">			
					<div class="span6">					
						<a href="<?php echo $itemCustomlist9->link; ?>"><?php echo $itemCustomlist9->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span3" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemCustomlist9->created_by; ?>"><?php echo $itemCustomlist9->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span3">
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist9->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?>
<?php if ($nameblockcustom10) : ?>
	<div class="youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom10); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist10; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">	
	
			<?php foreach ($listCustomlist10 as $itemCustomlist10) : ?>		
			<div class="row-fluid">		
				<div class="span13">			
					<div class="span6">					
						<a href="<?php echo $itemCustomlist10->link; ?>"><?php echo $itemCustomlist10->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span3" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemCustomlist10->created_by; ?>"><?php echo $itemCustomlist10->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span3">
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist10->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?>
</div>
</div>
</div>


