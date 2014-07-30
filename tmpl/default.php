<?php
//blocage des accés directs sur ce script
defined('_JEXEC') or die('Accés interdit');

JHtml::_('bootstrap.tooltip');
$document = JFactory::getDocument();
$document->addStyleSheet("./modules/mod_flexiadmin/assets/css/style.css",'text/css',"screen");
$hiddepending = $params->get('hiddepending', '1' );
$hidderevised = $params->get('hidderevised', '1' );
$hiddeinprogress = $params->get('hiddeinprogress', '1' );
$hiddedraft = $params->get('hiddedraft', '1' );
$hiddeyouritem = $params->get('hiddeyouritem', '1' );
$hiddetrashed = $params->get('hiddetrashed', '1' );
$column = $params->get('column', '4' );
?>

<div class="row-fluid">
    <div class="action well well-small span12">
	<a href="index.php?option=com_flexicontent&view=items">
		<button type="button" class="btn btn-default btn-lg itemlist">
			<i class="icon-large icon-file-2"></i><br/> 
			<?php echo JText::_( 'FLEXI_ADMIN_ITEMLIST' ); ?>
		</button>
	</a>
	
	<a href="index.php?option=com_flexicontent&view=categories">
		<button type="button" class="btn btn-default btn-lg itemlist">  
			<i class="icon-large icon-list"></i><br/> 
			<?php echo JText::_( 'FLEXI_ADMIN_CATLIST' ); ?>
		</button>
	</a>
	
	<a href="index.php?option=com_flexicontent&view=types">
		<button type="button" class="btn btn-default btn-lg itemlist">  
			<i class="icon-large icon-book"></i><br/> 
			<?php echo JText::_( 'FLEXI_ADMIN_TYPELIST' ); ?>
		</button>
	</a>
	
	<a href="index.php?option=com_flexicontent&view=tags">
		<button type="button" class="btn btn-default btn-lg itemlist">  
			<i class="icon-large icon-tag"></i><br/> 
			<?php echo JText::_( 'FLEXI_ADMIN_TAGLIST' ); ?>
		</button>
	</a>
	<a href="index.php?option=com_flexicontent&view=fields">
		<button type="button" class="btn btn-default btn-lg itemlist">  
			<i class="icon-large icon-stack"></i><br/> 
			<?php echo JText::_( 'FLEXI_ADMIN_FIELDLIST' ); ?>
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
	
	<a href="index.php?option=com_flexicontent&view=filemanager">
		<button type="button" class="btn btn-default btn-lg itemlist">  
			<i class="icon-large icon-upload"></i><br/> 
			<?php echo JText::_( 'FLEXI_ADMIN_FILEMANAGER' ); ?>
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
    </div>
</div>
	
<div class="row-fluid">
<div class="row-fluid">
<?php if ($hiddepending) : ?>
    <div class="pending well well-small span<?php echo $column; ?> ">
	<h2 class="module-title nav-header"><i class="icon-large icon-thumbs-down"></i> <?php echo JText::_( 'FLEXI_ADMIN_PENDING' ); ?></h2>

	<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=PE'; ?>
	<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
			<div class="row-striped">		
				<?php foreach ($listPending as $itemPending) : ?>			
				<div class="row-fluid">				
					<div class="span12">					
						<div class="span6">					
							<a href="<?php echo $itemPending->link; ?>"><?php echo $itemPending->title; ?>	
							<i class="icon-large icon-edit"></i></a>					
						</div>					
						<div class="span2" style="margin-left: 0 !important;">
							<span class="small">	
							<i class="icon-user"></i> 
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemPending->created_by; ?>"><?php echo $itemPending->created_by;?> </small>
							</span>				
						</div>				
						<div class="span<?php echo $column; ?>">
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
		<h2 class="module-title nav-header"><i class="icon-large icon-thumbs-up"></i> <?php echo JText::_( 'FLEXI_ADMIN_REVISED' ); ?></h2>	
		<?php $show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=RV'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
			<div class="row-striped">		
				<?php foreach ($listRevised as $itemRevised) : ?>			
				<div class="row-fluid">
					<div class="span12">					
						<div class="span6">							
							<a href="<?php echo $itemRevised->link; ?>"><?php echo $itemRevised->title; ?>					
							<i class="icon-large icon-edit"></i></a>					
						</div>					
						<div class="span2" style="margin-left: 0 !important;">					
							<span class="small">
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemRevised->created_by; ?>">&nbsp;<i class="icon-user"></i></small>											
							</span>				
						</div>				
						<div class="span<?php echo $column; ?>">
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
<?php if ($hiddeinprogress) : ?>
	<div class="inprogress well well-small span<?php echo $column; ?> ">	
		<h2 class="module-title nav-header"><i class="icon-large icon-checkin"></i> <?php echo JText::_( 'FLEXI_ADMIN_INPROGRESS' ); ?></h2>
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=IP'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
			<div class="row-striped">				
				<?php foreach ($listInprogress as $itemInprogress) : ?>			
				<div class="row-fluid">				
					<div class="span12">					
						<div class="span6">							
							<a href="<?php echo $itemInprogress->link; ?>"><?php echo $itemInprogress->title; ?>					
							<i class="icon-large icon-edit"></i></a>					
						</div>					
						<div class="span2" style="margin-left: 0 !important;">					
							<span class="small">					 
							<i class="icon-user"></i> 
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemInprogress->created_by; ?>"><?php echo $itemInprogress->created_by;?> </small>
							</span>				
						</div>				
						<div class="span<?php echo $column; ?>">
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
	<h2 class="module-title nav-header"><i class="icon-large icon-file"></i> <?php echo JText::_( 'FLEXI_ADMIN_DRAFT' ); ?></h2>
	<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=OQ'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
	<div class="row-striped">		
		<?php foreach ($listDraft as $itemDraft) : ?>
		<div class="row-fluid">		
			<div class="span12">	
				<div class="span6">		
					<a href="<?php echo $itemDraft->link; ?>"><?php echo $itemDraft->title; ?>	
					<i class="icon-large icon-edit"></i></a>		
				</div>				
				<div class="span2" style="margin-left: 0 !important;">		
					<span class="small">
<?php //TODO display user name in tooltip ?>
					<i class="icon-user"></i><small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemDraft->created_by; ?>"><?php echo $itemDraft->created_by;?> </small> 			
					</span>			
				</div>			
				<div class="span<?php echo $column; ?>">
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
		<h2 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_( 'FLEXI_YOUR_ITEM' ); ?> : <?php echo $user->name; ?></h2>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=OQ'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
		<div class="row-striped">		
			<?php foreach ($listUseritem as $itemUseritem) : ?>		
			<div class="row-fluid">		
				<div class="span12">			
					<div class="span6">					
						<a href="<?php echo $itemUseritem->link; ?>"><?php echo $itemUseritem->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</div>				
					<div class="span2" style="margin-left: 0 !important;">		
						<span class="small">			
							<i class="icon-user"></i> 	
<?php //TODO display user name in tooltip ?>							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_CREATED_BY')." ". $itemUseritem->created_by; ?>"><?php echo $itemUseritem->created_by;?> </small> 	
						</span>			
					</div>			
					<div class="span<?php echo $column; ?>">
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($$itemUseritem->created, 'n M Y'); ?>
					</span>
					</div>		
				</div>		
			</div>	
			<?php endforeach; ?>
	</div>	
</div>
<?php endif; ?><?php if ($hiddetrashed) : ?>
	<div class="trashed well well-small span<?php echo $column; ?>">	
	<h2 class="module-title nav-header"><i class="icon-large icon-trash"></i> 
	<?php echo JText::_( 'FLEXI_ADMIN_TRASHED' ); ?></h2>	
	<?php //TODO filtrage trashed	
	$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=OQ'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
	</div>	
<?php endif; ?>
</div>
</div>


