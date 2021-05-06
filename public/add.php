<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION['validUser'])){
        header('Location: login.php');
        exit;
    }
} else {
    if (isset($_SESSION['validUser']) && $_SESSION['validUser'] === false){
        header('Location: login.php');
        exit;
    }
}
require_once('../inc/Residents.class.php');
$resident = new Residents();

//$resident->residentData['burials_img_deceased'] = "image";
// $resident->residentData['burials_img_deceased']['name'] = "iamge";
// $resident->residentData['burials_img_grave1']['name'] = "image";
// $resident->residentData['burials_img_grave2']['name'] = "image";

// initialize some variables to be used by our view
$residentDataArray = array();
$residentErrorsArray = array();
$st = ""; //this variable for the state selection element
$veteranBool = false;

if (isset($_REQUEST['burialsID']) && $_REQUEST['burialsID'] > 0) {
    $resident->load($_REQUEST['burialsID']);
    // set our article array to our local variable
    $residentDataArray = $resident->residentData;
    $resident->oldResidentData = $resident->residentData;
    $st = $resident->residentData['burials_birthplace_state'];

}

if (isset($_POST['Save'])) {
    // sanitize and set the post array to our local variable
    //$_POST['burials_id'] = $resident->residentData['burials_id'];

    $residentDataArray = $resident->sanitize($_POST);
    $resident->set($residentDataArray);

    // pass the array into our instance
    //echo $_POST['burials_birth_year'];
    if ($resident->validate()) {
        
        // save
        if ($resident->save()) {
            //echo "success";
            header("location: login.php");
            exit;
        } else {
            $residentErrorsArray[] = "Save failed";
        }
    } else {
        $residentErrorsArray = $resident->errors;
        $residentDataArray = $resident->residentData;
		//var_dump($residentErrorsArray);
    }
}
function selectedCheck($value1, $value2){
	if ($value1 == $value2){
	echo 'selected="selected"';
	}
	return '';
}
require_once('../tpl/add.tpl.php');
?>
