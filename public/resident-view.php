<?php 
require_once('../inc/Residents.class.php');

$resident = new Residents();
$residentDataArray = array();
$validResident = false;
if (isset($_REQUEST['burialsID']) && $_REQUEST['burialsID'] > 0) {
    
    if ($resident->load($_REQUEST['burialsID'])){ //checks for valid id
        $residentDataArray = $resident->residentData;
        $validResident = true;
    }
    // set our article array to our local variable


}




require_once('../tpl/resident-view.tpl.php');
?>
