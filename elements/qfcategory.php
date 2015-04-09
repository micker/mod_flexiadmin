<?php
jimport( 'joomla.application.component.controller' );
// Check if component is installed
if ( !JComponentHelper::isEnabled( 'com_flexicontent', true) ) {
   echo 'This modules requires component FLEXIcontent!';
   return;
}
require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_flexicontent'.DS.'elements'.DS.'qfcategory.php');
?>
