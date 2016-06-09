<?php
/**
* @version 0.9.0 stable $Id: default.php yannick berges
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
$document->addStyleSheet("/modules/mod_flexiadmin/assets/css/style.css",'text/css',"screen");

//extrafield
require_once (JPATH_ADMINISTRATOR.DS.'components/com_flexicontent/defineconstants.php');
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_flexicontent'.DS.'tables');
require_once("../components/com_flexicontent/classes/flexicontent.fields.php");
require_once("../components/com_flexicontent/classes/flexicontent.helper.php");
require_once("../components/com_flexicontent/helpers/permission.php");
require_once("../components/com_flexicontent/models/".FLEXI_ITEMVIEW.".php");

$itemmodel_name = FLEXI_J16GE ? 'FlexicontentModelItem' : 'FlexicontentModelItems';
$itemmodel = new $itemmodel_name();

$extrafieldlist1    = $params->get('extrafieldlist1', '' );
$extrafieldlist1 = explode( ',', $extrafieldlist1 );
$extraFieldlist1= $extrafieldlist1;

$extrafieldlist2    = $params->get('extrafieldlist2', '' );
$extrafieldlist2 = explode( ',', $extrafieldlist2 );
$extraFieldlist2= $extrafieldlist2;

$extrafieldlist3    = $params->get('extrafieldlist3', '' );
$extrafieldlist3 = explode( ',', $extrafieldlist3 );
$extraFieldlist3= $extrafieldlist3;

$extrafieldlist4    = $params->get('extrafieldlist4', '' );
$extrafieldlist4 = explode( ',', $extrafieldlist4 );
$extraFieldlist4= $extrafieldlist4;

$extrafieldlist5    = $params->get('extrafieldlist5', '' );
$extrafieldlist5 = explode( ',', $extrafieldlist5 );
$extraFieldlist5= $extrafieldlist5;

$extrafieldlist6    = $params->get('extrafieldlist6', '' );
$extrafieldlist6 = explode( ',', $extrafieldlist6 );
$extraFieldlist6= $extrafieldlist6;
 
$extrafieldlist7    = $params->get('extrafieldlist7', '' );
$extrafieldlist7 = explode( ',', $extrafieldlist7 );
$extraFieldlist7= $extrafieldlist7;

$extrafieldlist8    = $params->get('extrafieldlist8', '' );
$extrafieldlist8 = explode( ',', $extrafieldlist8 );
$extraFieldlist8= $extrafieldlist8;

$extrafieldlist9    = $params->get('extrafieldlist9', '' );
$extrafieldlist9 = explode( ',', $extrafieldlist9 );
$extraFieldlist9= $extrafieldlist9;

$extrafieldlist10    = $params->get('extrafieldlist10', '' );
$extrafieldlist10 = explode( ',', $extrafieldlist10 );
$extraFieldlist10= $extrafieldlist10;

//module config
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

//id catlist
$catidlist1       = $params->get('catidlist1', '1' );
$nameblockcustom1 = $params->get('nameblockcustom1', '' );
$displblock1	  = $params->get('displblock1', '' );
$displdateblock1  = $params->get('displdateblock1', '1' );
$displautblock1   = $params->get('displautblock1', '' );

$catidlist2       = $params->get('catidlist2', '1' );
$nameblockcustom2 = $params->get('nameblockcustom2', '' );
$displblock2 	  = $params->get('displblock2', '' );
$displdateblock2  = $params->get('displdateblock2', '1' );
$displautblock2   = $params->get('displautblock2', '1' );

$catidlist3       = $params->get('catidlist3', '1' );
$nameblockcustom3 = $params->get('nameblockcustom3', '' );
$displblock3 	  = $params->get('displblock3', '' );
$displdateblock3  = $params->get('displdateblock3', '1' );
$displautblock3   = $params->get('displautblock3', '1' );

$catidlist4       = $params->get('catidlist4', '1' );
$nameblockcustom4 = $params->get('nameblockcustom4', '' );
$displblock4      = $params->get('displblock4', '' );
$displdateblock4  = $params->get('displdateblock4', '1' );
$displautblock4   = $params->get('displautblock4', '1' );

$catidlist5       = $params->get('catidlist5', '1' );
$nameblockcustom5 = $params->get('nameblockcustom5', '' );
$displblock5      = $params->get('displblock5', '' );
$displdateblock5  = $params->get('displdateblock5', '1' );
$displautblock5   = $params->get('displautblock5', '1' );

$catidlist6       = $params->get('catidlist6', '1' );
$nameblockcustom6 = $params->get('nameblockcustom6', '' );
$displblock6 	  = $params->get('displblock6', '' );
$displdateblock6  = $params->get('displdateblock6', '1' );
$displautblock6   = $params->get('displautblock6', '1' );

$catidlist7       = $params->get('catidlist7', '1' );
$nameblockcustom7 = $params->get('nameblockcustom7', '' );
$displblock7      = $params->get('displblock7', '' );
$displdateblock7  = $params->get('displdateblock7', '1' );
$displautblock7   = $params->get('displautblock7', '1' );

$catidlist8       = $params->get('catidlist8', '1' );
$nameblockcustom8 = $params->get('nameblockcustom8', '' );
$displblock8      = $params->get('displblock8', '' );
$displdateblock8  = $params->get('displdateblock8', '1' );
$displautblock8   = $params->get('displautblock8', '1' );

$catidlist9       = $params->get('catidlist9', '1' );
$nameblockcustom9 = $params->get('nameblockcustom9', '' );
$displblock9      = $params->get('displblock9', '' );
$displdateblock9  = $params->get('displdateblock9', '1' );
$displautblock9   = $params->get('displautblock9', '1' );

$catidlist10      = $params->get('catidlist10', '1' );
$nameblockcustom10= $params->get('nameblockcustom10', '' );
$displblock10 	  = $params->get('displblock10', '' );
$displdateblock10 = $params->get('displdateblock10', '1' );
$displautblock10  = $params->get('displautblock10', '1' );


//customtab
$nametab = $params->get('nametab', 'FLEXI_ADMIN_CUSTOM_TAB_NAME' );

//bouton add
$namebutton1  = $params->get('namebutton1', '' );
$type1        = $params->get('types1', '' );
$maincat1     = $params->get('catids1', '' );
$dispb1 	  = $params->get('dispb1', '' );
$namebutton2  = $params->get('namebutton2', '' );
$type2        = $params->get('types2', '' );
$maincat2     = $params->get('catids2', '' );
$dispb2       = $params->get('dispb2', '' );
$namebutton3  = $params->get('namebutton3', '' );
$type3        = $params->get('types3', '' );
$maincat3     = $params->get('catids3', '' );
$dispb3       = $params->get('dispb3', '' );
$namebutton4  = $params->get('namebutton4', '' );
$type4        = $params->get('types4', '' );
$maincat4     = $params->get('catids4', '' );
$dispb4       = $params->get('dispb4', '' );
$namebutton5  = $params->get('namebutton5', '' );
$type5        = $params->get('types5', '' );
$maincat5     = $params->get('catids5', '' );
$dispb5       = $params->get('dispb5', '' );
$namebutton6  = $params->get('namebutton6', '' );
$type6        = $params->get('types6', '' );
$maincat6     = $params->get('catids6', '' );
$dispb6       = $params->get('dispb6', '' );
$namebutton7  = $params->get('namebutton7', '' );
$type7        = $params->get('types7', '' );
$maincat7     = $params->get('catids7', '' );
$dispb7       = $params->get('dispb7', '' );
$namebutton8  = $params->get('namebutton8', '' );
$type8        = $params->get('types8', '' );
$maincat8     = $params->get('catids8', '' );
$dispb8       = $params->get('dispb8', '' );
$namebutton9  = $params->get('namebutton9', '' );
$type9        = $params->get('types9', '' );
$maincat9     = $params->get('catids9', '' );
$dispb9       = $params->get('dispb9', '' );
$namebutton10 = $params->get('namebutton10', '' );
$type10       = $params->get('types10', '' );
$maincat10    = $params->get('catids10', '' );
$dispb10      = $params->get('dispb10', '' );


//category filter
$filtercat1     = $params->get('filtercatids1', '' );
$namecatfilter1 = $params->get('namecatfilter1', '' );
$dispc1 		= $params->get('dispc1', '' );
$filtercat2     = $params->get('filtercatids2', '' );
$namecatfilter2 = $params->get('namecatfilter2', '' );
$dispc2 		= $params->get('dispc2', '' );
$filtercat3     = $params->get('filtercatids3', '' );
$namecatfilter3 = $params->get('namecatfilter3', '' );
$dispc3 		= $params->get('dispc3', '' );
$filtercat4     = $params->get('filtercatids4', '' );
$namecatfilter4 = $params->get('namecatfilter4', '' );
$dispc4 		= $params->get('dispc4', '' );
$filtercat5     = $params->get('filtercatids5', '' );
$namecatfilter5 = $params->get('namecatfilter5', '' );
$dispc5 		= $params->get('dispc5', '' );
$filtercat6     = $params->get('filtercatids6', '' );
$namecatfilter6 = $params->get('namecatfilter6', '' );
$dispc6 		= $params->get('dispc6', '' );
$filtercat7     = $params->get('filtercatids7', '' );
$namecatfilter7 = $params->get('namecatfilter7', '' );
$dispc7 		= $params->get('dispc7', '' );
$filtercat8     = $params->get('filtercatids8', '' );
$namecatfilter8 = $params->get('namecatfilter8', '' );
$dispc8 		= $params->get('dispc8', '' );
$filtercat9     = $params->get('filtercatids9', '' );
$namecatfilter9 = $params->get('namecatfilter9', '' );
$dispc9 		= $params->get('dispc9', '' );
$filtercat10    = $params->get('filtercatids10', '' );
$namecatfilter10= $params->get('namecatfilter10', '' );
$dispc10 		= $params->get('dispc10', '' );


//edit special item
$itemedit1     = $params->get('itemid1', '' );
$nameitemedit1 = $params->get('nameitemedit1', '' );
$dispi1        = $params->get('dispi1', '' );
$itemedit2     = $params->get('itemid2', '' );
$nameitemedit2 = $params->get('nameitemedit2', '' );
$dispi2        = $params->get('dispi2', '' );
$itemedit3     = $params->get('itemid3', '' );
$nameitemedit3 = $params->get('nameitemedit3', '' );
$dispi3        = $params->get('dispi3', '' );
$itemedit4     = $params->get('itemid4', '' );
$nameitemedit4 = $params->get('nameitemedit4', '' );
$dispi4        = $params->get('dispi4', '' );
$itemedit5     = $params->get('itemid5', '' );
$nameitemedit5 = $params->get('nameitemedit5', '' );
$dispi5        = $params->get('dispi5', '' );
$itemedit6     = $params->get('itemid6', '' );
$nameitemedit6 = $params->get('nameitemedit6', '' );
$dispi6        = $params->get('dispi6', '' );
$itemedit7     = $params->get('itemid7', '' );
$nameitemedit7 = $params->get('nameitemedit7', '' );
$dispi7        = $params->get('dispi7', '' );
$itemedit8     = $params->get('itemid8', '' );
$nameitemedit8 = $params->get('nameitemedit8', '' );
$dispi8        = $params->get('dispi8', '' );
$itemedit9     = $params->get('itemid9', '' );
$nameitemedit9 = $params->get('nameitemedit9', '' );
$dispi9        = $params->get('dispi9', '' );
$itemedit10    = $params->get('itemid10', '' );
$nameitemedit10= $params->get('nameitemedit10', '' );
$dispi10        = $params->get('dispi10', '' );


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


//free bouton
$dispfreebutton1  = $params->get('dispf1', '' );
$freebutton1  = $params->get('freebutton1', '' );
$linkbutton1  = $params->get('linkbutton1', '' );
$iconbutton1  = $params->get('iconbutton1', '' );
$dispfreebutton2  = $params->get('dispf2', '' );
$freebutton2  = $params->get('freebutton2', '' );
$linkbutton2  = $params->get('linkbutton2', '' );
$iconbutton2  = $params->get('iconbutton2', '' );
$dispfreebutton2  = $params->get('dispf2', '' );
$freebutton3  = $params->get('freebutton3', '' );
$linkbutton3  = $params->get('linkbutton3', '' );
$iconbutton3  = $params->get('iconbutton3', '' );
$dispfreebutton3  = $params->get('dispf3', '' );
$freebutton4  = $params->get('freebutton4', '' );
$linkbutton4  = $params->get('linkbutton4', '' );
$iconbutton4  = $params->get('iconbutton4', '' );
$dispfreebutton4  = $params->get('dispf4', '' );
$freebutton5  = $params->get('freebutton5', '' );
$linkbutton5  = $params->get('linkbutton5', '' );
$iconbutton5  = $params->get('iconbutton5', '' );
$dispfreebutton5  = $params->get('dispf5', '' );
$freebutton6  = $params->get('freebutton6', '' );
$linkbutton6  = $params->get('linkbutton6', '' );
$iconbutton6  = $params->get('iconbutton6', '' );
$dispfreebutton6  = $params->get('dispf6', '' );
$freebutton7  = $params->get('freebutton7', '' );
$linkbutton7  = $params->get('linkbutton7', '' );
$iconbutton7  = $params->get('iconbutton7', '' );
$dispfreebutton7  = $params->get('dispf7', '' );
$freebutton8  = $params->get('freebutton8', '' );
$linkbutton8  = $params->get('linkbutton8', '' );
$iconbutton8  = $params->get('iconbutton8', '' );
$dispfreebutton8  = $params->get('dispf8', '' );
$freebutton9  = $params->get('freebutton9', '' );
$linkbutton9  = $params->get('linkbutton9', '' );
$iconbutton9  = $params->get('iconbutton9', '' );
$dispfreebutton9  = $params->get('dispf9', '' );
$freebutton10  = $params->get('freebutton10', '' );
$linkbutton10  = $params->get('linkbutton10', '' );
$iconbutton10  = $params->get('iconbutton10', '' );
$dispfreebutton10  = $params->get('dispf10', '' );

jimport( 'joomla.application.component.controller' );
// Check if component is installed
if ( !JComponentHelper::isEnabled( 'com_flexicontent', true) ) {
   echo 'This modules requires component FLEXIcontent!';
   return;
}
?>


<div class="row-fluid flexiad">
    <?php if ($displayconfigmodule) : ?>
	<a href="index.php?option=com_modules&view=module&layout=edit&id=<?php echo $module->id;?>" style="float:right;margin-top: -30px;">
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
    <div class="action well well-small span12">
        
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
					<?php if ($dispb1) : ?>
					<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type1;?>&maincat=<?php echo $maincat1; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $namebutton1; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispb2) : ?>
						<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type2;?>&maincat=<?php echo $maincat2; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $namebutton2; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispb3) : ?>
						<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type3;?>&maincat=<?php echo $maincat3; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $namebutton3; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispb4) : ?>
						<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type4;?>&maincat=<?php echo $maincat4; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $namebutton4; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispb5) : ?>
						<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type5;?>&maincat=<?php echo $maincat5; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $namebutton5; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispb6) : ?>
						<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type6;?>&maincat=<?php echo $maincat6; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $namebutton6; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispb7) : ?>
						<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type7;?>&maincat=<?php echo $maincat7; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $namebutton7; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispb8) : ?>
						<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type8;?>&maincat=<?php echo $maincat8; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $namebutton8; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispb9) : ?>
						<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type9;?>&maincat=<?php echo $maincat9; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $namebutton9; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispb10) : ?>
						<a href="index.php?option=com_flexicontent&controller=items&task=items.add&typeid=<?php echo $type10;?>&maincat=<?php echo $maincat10; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $namebutton10; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispc1) : ?>
						<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat1; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-list"></i><br/> 
								<?php echo $namecatfilter1; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispc2) : ?>
						<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat2; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-list"></i><br/> 
								<?php echo $namecatfilter2; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispc3) : ?>
						<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat3; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-list"></i><br/> 
								<?php echo $namecatfilter3; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispc4) : ?>
						<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat4; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-list"></i><br/> 
								<?php echo $namecatfilter4; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispc5) : ?>
						<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat5; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-list"></i><br/> 
								<?php echo $namecatfilter5; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispc6) : ?>
						<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat6; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-list"></i><br/> 
								<?php echo $namecatfilter6; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispc7) : ?>
						<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat7; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-list"></i><br/> 
								<?php echo $namecatfilter7; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispc8) : ?>
						<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat8; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-list"></i><br/> 
								<?php echo $namecatfilter8; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispc9) : ?>
						<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat9; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-list"></i><br/> 
								<?php echo $namecatfilter9; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispc10) : ?>
						<a href="index.php?option=com_flexicontent&view=items&filter_cats=<?php echo $filtercat10; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-list"></i><br/> 
								<?php echo $namecatfilter10; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispi1) : ?>
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
					<?php if ($dispi3) : ?>
						<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit3; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $nameitemedit3; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispi4) : ?>
						<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit4; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $nameitemedit4; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispi5) : ?>
						<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit5; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $nameitemedit5; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispi6) : ?>
						<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit6; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $nameitemedit6; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispi7) : ?>
						<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit7; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $nameitemedit7; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispi8) : ?>
						<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit8; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $nameitemedit8; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispi9) : ?>
						<a href="index.php?option=com_flexicontent&task=items.edit&cid[]=<?php echo $itemedit9; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large icon-file-plus"></i><br/> 
								<?php echo $nameitemedit9; ?>
								</button>
						</a>
					<?php endif; ?>
					<?php if ($dispi10) : ?>
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
			<?php if ($dispfreebutton1) : ?>
						<a href="<?php echo $linkbutton1; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large <?php echo $iconbutton1; ?>"></i><br/> 
								<?php echo $freebutton1; ?>
								</button>
						</a>
			<?php endif; ?>
			<?php if ($dispfreebutton2) : ?>
						<a href="<?php echo $linkbutton2; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large <?php echo $iconbutton2; ?>"></i><br/> 
								<?php echo $freebutton2; ?>
								</button>
						</a>
			<?php endif; ?>
			<?php if ($dispfreebutton3) : ?>
						<a href="<?php echo $linkbutton3; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large <?php echo $iconbutton3; ?>"></i><br/> 
								<?php echo $freebutton3; ?>
								</button>
						</a>
			<?php endif; ?>
			<?php if ($dispfreebutton4) : ?>
						<a href="<?php echo $linkbutton4; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large <?php echo $iconbutton4; ?>"></i><br/> 
								<?php echo $freebutton4; ?>
								</button>
						</a>
			<?php endif; ?>
						<?php if ($dispfreebutton5) : ?>
						<a href="<?php echo $linkbutton5; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large <?php echo $iconbutton5; ?>"></i><br/> 
								<?php echo $freebutton5; ?>
								</button>
						</a>
			<?php endif; ?>
						<?php if ($dispfreebutton6) : ?>
						<a href="<?php echo $linkbutton6; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large <?php echo $iconbutton6; ?>"></i><br/> 
								<?php echo $freebutton6; ?>
								</button>
						</a>
			<?php endif; ?>
						<?php if ($dispfreebutton7) : ?>
						<a href="<?php echo $linkbutton7; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large <?php echo $iconbutton7; ?>"></i><br/> 
								<?php echo $freebutton7; ?>
								</button>
						</a>
			<?php endif; ?>
						<?php if ($dispfreebutton8) : ?>
						<a href="<?php echo $linkbutton8; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large <?php echo $iconbutton8; ?>"></i><br/> 
								<?php echo $freebutton8; ?>
								</button>
						</a>
			<?php endif; ?>
						<?php if ($dispfreebutton9) : ?>
						<a href="<?php echo $linkbutton9; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large <?php echo $iconbutton9; ?>"></i><br/> 
								<?php echo $freebutton9; ?>
								</button>
						</a>
			<?php endif; ?>
						<?php if ($dispfreebutton10) : ?>
						<a href="<?php echo $linkbutton10; ?>" >
								<button type="button" class="btn btn-default btn-lg itemlist">
									<i class="icon-large <?php echo $iconbutton10; ?>"></i><br/> 
								<?php echo $freebutton10; ?>
								</button>
						</a>
			<?php endif; ?>
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
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=OQ'; ?>
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
	$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;filter_state=OQ'; ?>
		<div style='text-align:right;'>
		<a href='<?php echo $show_all_link ?>' class='adminlink'>
		<?php
		echo JText::_( 'FLEXI_ADMIN_ALL' );		
		echo "</a></div>";	?>		
	</div>	
<?php endif; ?>
<?php if ($displblock1) : ?>
	<div class="block youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom1); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist1; ?>
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
					<?php if ($displautblock1) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_AUTHOR' ); ?></th><?php endif; ?>
					<?php 
                         $itemCustomlist1= $listCustomlist1[0];
						$item = $itemmodel->getItem($itemCustomlist1->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
						FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist1 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$label= $item->fields[$extrafield]->label;
							echo '<th>';
							echo $label;
							echo '</th>';
						}
						}
					?>
					<?php if ($displdateblock1) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_DATE' ); ?></th><?php endif; ?>
					</tr>
				</thead>
				
				<tbody>	
				<?php foreach ($listCustomlist1 as $itemCustomlist1) : ?>	
					<tr>
					<td>					
						<a href="<?php echo $itemCustomlist1->link; ?>"><?php echo $itemCustomlist1->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</td>				
					<?php if ($displautblock1) : ?><td>		
						<span class="small">			
							<i class="icon-user"></i> 	
							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemCustomlist1->name; ?>"><?php echo $itemCustomlist1->name;?> </small> 	
						</span>			
					</td>	
					<?php endif; ?>		
					
					<?php 	
						$item = $itemmodel->getItem($itemCustomlist1->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
                        //print_r ($extraFieldlist1);
						//FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist1 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$value= $item->fields[$extrafield]->display;
							echo '<td>';
							echo $value;
							echo '</td>';
						}
						}
					?>
					<?php if ($displdateblock1) : ?>
					<td>
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist1->modified, 'd M Y'); ?>
					</span>
					</td>	
					<?php endif; ?>		
				</tr>				
			<?php endforeach; ?>
							</tbody>
			</table>
	</div>	
</div>
<?php endif; ?>
<?php if ($displblock2) : ?>
	<div class="block youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom2); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist2; ?>
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
					<?php if ($displautblock2) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_AUTHOR' ); ?></th><?php endif; ?>
					<?php 
                         $itemCustomlist2= $listCustomlist2[0];
                        //echo $listCustomlist2[0];
						$item = $itemmodel->getItem($itemCustomlist2->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
						  
						FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist2 as $extrafield){
							//FlexicontentFields::getFieldDisplay($item, $extrafield);
							$label= $item->fields[$extrafield]->label;
							echo '<th>';
							echo $label;
							echo '</th>';
						}
						  }
					?>
					<?php if ($displdateblock2) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_DATE' ); ?></th><?php endif; ?>
					</tr>
				</thead>
				
				<tbody>	
				<?php foreach ($listCustomlist2 as $itemCustomlist2) : ?>	
					<tr>
					<td>					
						<a href="<?php echo $itemCustomlist2->link; ?>"><?php echo $itemCustomlist2->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</td>				
					<?php if ($displautblock2) : ?><td>		
						<span class="small">			
							<i class="icon-user"></i> 	
							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemCustomlist2->name; ?>"><?php echo $itemCustomlist2->name;?> </small> 	
						</span>			
					</td>	
					<?php endif; ?>		
					
					<?php 	
						$item = $itemmodel->getItem($itemCustomlist2->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
                        //print_r ($extraFieldlist2);
						//FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist2 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$value= $item->fields[$extrafield]->display;
							echo '<td>';
							echo $value;
							echo '</td>';
						}
						}
					?>
					<?php if ($displdateblock2) : ?>
					<td>
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist2->modified, 'd M Y'); ?>
					</span>
					</td>	
					<?php endif; ?>		
				</tr>				
			<?php endforeach; ?>
							</tbody>
			</table>
	</div>	
</div>
<?php endif; ?>
<?php if ($displblock3) : ?>
	<div class="block youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom3); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist3; ?>
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
					<?php if ($displautblock3) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_AUTHOR' ); ?></th><?php endif; ?>
					<?php 
                         $itemCustomlist3= $listCustomlist3[0];
						$item = $itemmodel->getItem($itemCustomlist3->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
						FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist3 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$label= $item->fields[$extrafield]->label;
							echo '<th>';
							echo $label;
							echo '</th>';
						}
						}
					?>
					<?php if ($displdateblock3) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_DATE' ); ?></th><?php endif; ?>
					</tr>
				</thead>
				
				<tbody>	
				<?php foreach ($listCustomlist3 as $itemCustomlist3) : ?>	
					<tr>
					<td>					
						<a href="<?php echo $itemCustomlist3->link; ?>"><?php echo $itemCustomlist3->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</td>				
					<?php if ($displautblock3) : ?><td>		
						<span class="small">			
							<i class="icon-user"></i> 	
							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemCustomlist3->name; ?>"><?php echo $itemCustomlist3->name;?> </small> 	
						</span>			
					</td>	
					<?php endif; ?>		
					
					<?php 	
						$item = $itemmodel->getItem($itemCustomlist3->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
                        //print_r ($extraFieldlist1);
						//FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist3 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$value= $item->fields[$extrafield]->display;
							echo '<td>';
							echo $value;
							echo '</td>';
						}
						}
					?>
					<?php if ($displdateblock3) : ?>
					<td>
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist3->modified, 'd M Y'); ?>
					</span>
					</td>	
					<?php endif; ?>		
				</tr>				
			<?php endforeach; ?>
							</tbody>
			</table>
	</div>	
</div>
<?php endif; ?>
<?php if ($displblock4) : ?>
	<div class="block youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom4); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist4; ?>
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
					<?php if ($displautblock4) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_AUTHOR' ); ?></th><?php endif; ?>
					<?php 
                         $itemCustomlist4= $listCustomlist4[0];
						$item = $itemmodel->getItem($itemCustomlist4->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
						  
						FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist4 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$label= $item->fields[$extrafield]->label;
							echo '<th>';
							echo $label;
							echo '</th>';
						}
						  }
					?>
					<?php if ($displdateblock4) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_DATE' ); ?></th><?php endif; ?>
					</tr>
				</thead>
				
				<tbody>	
				<?php foreach ($listCustomlist4 as $itemCustomlist3) : ?>	
					<tr>
					<td>					
						<a href="<?php echo $itemCustomlist4->link; ?>"><?php echo $itemCustomlist4->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</td>				
					<?php if ($displautblock4) : ?><td>		
						<span class="small">			
							<i class="icon-user"></i> 	
							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemCustomlist4->name; ?>"><?php echo $itemCustomlist4->name;?> </small> 	
						</span>			
					</td>	
					<?php endif; ?>		
					
					<?php 	
						$item = $itemmodel->getItem($itemCustomlist4->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
                        //print_r ($extraFieldlist1);
						//FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist4 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$value= $item->fields[$extrafield]->display;
							echo '<td>';
							echo $value;
							echo '</td>';
						}
						}
					?>
					<?php if ($displdateblock4) : ?>
					<td>
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist4->modified, 'd M Y'); ?>
					</span>
					</td>	
					<?php endif; ?>		
				</tr>				
			<?php endforeach; ?>
							</tbody>
			</table>
            </div>	
</div>
<?php endif; ?>
<?php if ($displblock5) : ?>
	<div class="block youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom5); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist5; ?>
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
					<?php if ($displautblock5) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_AUTHOR' ); ?></th><?php endif; ?>
					<?php 
                         $itemCustomlist5= $listCustomlist5[0];
						$item = $itemmodel->getItem($itemCustomlist5->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
						  
						FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist5 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$label= $item->fields[$extrafield]->label;
							echo '<th>';
							echo $label;
							echo '</th>';
						}
						  }
					?>
					<?php if ($displdateblock5) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_DATE' ); ?></th><?php endif; ?>
					</tr>
				</thead>
				
				<tbody>	
				<?php foreach ($listCustomlist5 as $itemCustomlist5) : ?>	
					<tr>
					<td>					
						<a href="<?php echo $itemCustomlist5->link; ?>"><?php echo $itemCustomlist5->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</td>				
					<?php if ($displautblock5) : ?><td>		
						<span class="small">			
							<i class="icon-user"></i> 	
							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemCustomlist5->name; ?>"><?php echo $itemCustomlist5->name;?> </small> 	
						</span>			
					</td>	
					<?php endif; ?>		
					
					<?php 	
						$item = $itemmodel->getItem($itemCustomlist5->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
                        //print_r ($extraFieldlist1);
						//FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist5 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$value= $item->fields[$extrafield]->display;
							echo '<td>';
							echo $value;
							echo '</td>';
						}
						}
					?>
					<?php if ($displdateblock5) : ?>
					<td>
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist5->modified, 'd M Y'); ?>
					</span>
					</td>	
					<?php endif; ?>		
				</tr>				
			<?php endforeach; ?>
							</tbody>
			</table>
	</div>	
</div>
<?php endif; ?>
<?php if ($displblock6) : ?>
	<div class="block youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom6); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist6; ?>
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
					<?php if ($displautblock6) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_AUTHOR' ); ?></th><?php endif; ?>
					<?php 
                         $itemCustomlist6= $listCustomlist6[0];
						$item = $itemmodel->getItem($itemCustomlist6->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
						  
						FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist6 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$label= $item->fields[$extrafield]->label;
							echo '<th>';
							echo $label;
							echo '</th>';
						}
						  }
					?>
					<?php if ($displdateblock6) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_DATE' ); ?></th><?php endif; ?>
					</tr>
				</thead>
				
				<tbody>	
				<?php foreach ($listCustomlist6 as $itemCustomlist6) : ?>	
					<tr>
					<td>					
						<a href="<?php echo $itemCustomlist6->link; ?>"><?php echo $itemCustomlist6->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</td>				
					<?php if ($displautblock6) : ?><td>		
						<span class="small">			
							<i class="icon-user"></i> 	
							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemCustomlist6->name; ?>"><?php echo $itemCustomlist6->name;?> </small> 	
						</span>			
					</td>	
					<?php endif; ?>		
					
					<?php 	
						$item = $itemmodel->getItem($itemCustomlist6->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
                        //print_r ($extraFieldlist1);
						//FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist6 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$value= $item->fields[$extrafield]->display;
							echo '<td>';
							echo $value;
							echo '</td>';
						}
						}
					?>
					<?php if ($displdateblock6) : ?>
					<td>
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist6->modified, 'd M Y'); ?>
					</span>
					</td>	
					<?php endif; ?>		
				</tr>				
			<?php endforeach; ?>
							</tbody>
			</table>
	</div>	
</div>
<?php endif; ?>
<?php if ($displblock7) : ?>
	<div class="block youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom7); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist7; ?>
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
					<?php if ($displautblock7) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_AUTHOR' ); ?></th><?php endif; ?>
					<?php 
                         $itemCustomlist7= $listCustomlist7[0];
						$item = $itemmodel->getItem($itemCustomlist7->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
						FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist7 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$label= $item->fields[$extrafield]->label;
							echo '<th>';
							echo $label;
							echo '</th>';
						}
						}
					?>
					<?php if ($displdateblock7) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_DATE' ); ?></th><?php endif; ?>
					</tr>
				</thead>
				
				<tbody>	
				<?php foreach ($listCustomlist7 as $itemCustomlist7) : ?>	
					<tr>
					<td>					
						<a href="<?php echo $itemCustomlist7->link; ?>"><?php echo $itemCustomlist7->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</td>				
					<?php if ($displautblock7) : ?><td>		
						<span class="small">			
							<i class="icon-user"></i> 	
							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemCustomlist7->name; ?>"><?php echo $itemCustomlist7->name;?> </small> 	
						</span>			
					</td>	
					<?php endif; ?>		
					
					<?php 	
						$item = $itemmodel->getItem($itemCustomlist7->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
                        //print_r ($extraFieldlist1);
						//FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist7 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$value= $item->fields[$extrafield]->display;
							echo '<td>';
							echo $value;
							echo '</td>';
						}
						}
					?>
					<?php if ($displdateblock7) : ?>
					<td>
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist7->modified, 'd M Y'); ?>
					</span>
					</td>	
					<?php endif; ?>		
				</tr>				
			<?php endforeach; ?>
							</tbody>
			</table>
	</div>	
</div>
<?php endif; ?>
<?php if ($displblock8) : ?>
	<div class="block youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom8); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist8; ?>
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
					<?php if ($displautblock8) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_AUTHOR' ); ?></th><?php endif; ?>
					<?php 
                         $itemCustomlist8= $listCustomlist8[0];
						$item = $itemmodel->getItem($itemCustomlist8->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
						  
						FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist8 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$label= $item->fields[$extrafield]->label;
							echo '<th>';
							echo $label;
							echo '</th>';
						}
						}
					?>
					<?php if ($displdateblock8) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_DATE' ); ?></th><?php endif; ?>
					</tr>
				</thead>
				
				<tbody>	
				<?php foreach ($listCustomlist8 as $itemCustomlist8) : ?>	
					<tr>
					<td>					
						<a href="<?php echo $itemCustomlist8->link; ?>"><?php echo $itemCustomlist8->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</td>				
					<?php if ($displautblock8) : ?><td>		
						<span class="small">			
							<i class="icon-user"></i> 	
							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemCustomlist8->name; ?>"><?php echo $itemCustomlist8->name;?> </small> 	
						</span>			
					</td>	
					<?php endif; ?>		
					
					<?php 	
						$item = $itemmodel->getItem($itemCustomlist8->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
                        //print_r ($extraFieldlist1);
						//FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist8 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$value= $item->fields[$extrafield]->display;
							echo '<td>';
							echo $value;
							echo '</td>';
						}
						}
					?>
					<?php if ($displdateblock8) : ?>
					<td>
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist8->modified, 'd M Y'); ?>
					</span>
					</td>	
					<?php endif; ?>		
				</tr>				
			<?php endforeach; ?>
							</tbody>
			</table>
	</div>	
</div>
<?php endif; ?>
<?php if ($displblock9) : ?>
	<div class="block youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom9); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist9; ?>
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
					<?php if ($displautblock9) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_AUTHOR' ); ?></th><?php endif; ?>
					<?php 
                         $itemCustomlist9= $listCustomlist9[0];
						$item = $itemmodel->getItem($itemCustomlist9->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
						FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist9 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$label= $item->fields[$extrafield]->label;
							echo '<th>';
							echo $label;
							echo '</th>';
						}
						}
					?>
					<?php if ($displdateblock9) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_DATE' ); ?></th><?php endif; ?>
					</tr>
				</thead>
				
				<tbody>	
				<?php foreach ($listCustomlist9 as $itemCustomlist9) : ?>	
					<tr>
					<td>					
						<a href="<?php echo $itemCustomlist9->link; ?>"><?php echo $itemCustomlist9->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</td>				
					<?php if ($displautblock9) : ?><td>		
						<span class="small">			
							<i class="icon-user"></i> 	
							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemCustomlist9->name; ?>"><?php echo $itemCustomlist9->name;?> </small> 	
						</span>			
					</td>	
					<?php endif; ?>		
					
					<?php 	
						$item = $itemmodel->getItem($itemCustomlist9->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
                        //print_r ($extraFieldlist1);
						//FlexicontentFields::getFields($items);
						if(isset($extrafield)) { 
						foreach ($extraFieldlist9 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$value= $item->fields[$extrafield]->display;
							echo '<td>';
							echo $value;
							echo '</td>';
						}
						}
					?>
					<?php if ($displdateblock9) : ?>
					<td>
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist9->modified, 'd M Y'); ?>
					</span>
					</td>	
					<?php endif; ?>		
				</tr>				
			<?php endforeach; ?>
							</tbody>
			</table>
	</div>	
</div>
<?php endif; ?>
<?php if ($displblock10) : ?>
	<div class="block youritems well well-small span<?php echo $column; ?>">	
		<h3 class="module-title nav-header">
		<i class="icon-large icon-user"></i> 
		<?php echo JText::_($nameblockcustom10); ?> : </h3>	
		<?php		$show_all_link = 'index.php?option=com_flexicontent&amp;view=items&amp;&filter_cats='.$catidlist10; ?>
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
					<?php if ($displautblock10) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_AUTHOR' ); ?></th><?php endif; ?>
					<?php 
                         $itemCustomlist10= $listCustomlist10[0];
						$item = $itemmodel->getItem($itemCustomlist10->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
						FlexicontentFields::getFields($items);
						 if(isset($extrafield)) { 
						foreach ($extraFieldlist10 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$label= $item->fields[$extrafield]->label;
							echo '<th>';
							echo $label;
							echo '</th>';
						}
						}
					?>
					<?php if ($displdateblock10) : ?><th><?php echo JText::_( 'FLEXI_ADMIN_DATE' ); ?></th><?php endif; ?>
					</tr>
				</thead>
				
				<tbody>	
				<?php foreach ($listCustomlist10 as $itemCustomlist10) : ?>	
					<tr>
					<td>					
						<a href="<?php echo $itemCustomlist10->link; ?>"><?php echo $itemCustomlist10->title; ?>	
						<i class="icon-large icon-edit"></i></a>		
					</td>				
					<?php if ($displautblock10) : ?><td>		
						<span class="small">			
							<i class="icon-user"></i> 	
							
							<small class="hasTooltip" title="" data-original-title="<?php echo JHtml::tooltipText('FLEXI_ADMIN_MODIFIED_BY')." ". $itemCustomlist10->name; ?>"><?php echo $itemCustomlist10->name;?> </small> 	
						</span>			
					</td>	
					<?php endif; ?>		
					
					<?php 	
						$item = $itemmodel->getItem($itemCustomlist10->id, $check_view_access=false);
						$items = array(&$item);
						  // Get fields values from the DB, 
                        //print_r ($extraFieldlist1);
						//FlexicontentFields::getFields($items);
						 if(isset($extrafield)) { 
						foreach ($extraFieldlist10 as $extrafield){
							FlexicontentFields::getFieldDisplay($item, $extrafield);
							$value= $item->fields[$extrafield]->display;
							echo '<td>';
							echo $value;
							echo '</td>';
						}
						}
					?>
					<?php if ($displdateblock3) : ?>
					<td>
					<span class="small"> 
						<i class="icon-calendar"></i> <?php echo JHtml::date($itemCustomlist10->modified, 'd M Y'); ?>
					</span>
					</td>	
					<?php endif; ?>		
				</tr>				
			<?php endforeach; ?>
							</tbody>
			</table>
	</div>	
</div>
<?php endif; ?>
</div>
</div>
</div>


<script  type="text/javascript">
jQuery(document).ready(function($){
$('#myTab a:first').tab('show');
});
</script>



