<?php
session_cache_limiter('none');  //This prevents a Chrome error when using the back button to return to this page.
session_start();
require_once('../inc/Residents.class.php');
//var_dump($_SESSION['validUser']);

if (!$_SESSION['validUser']) {
    header('Location: ../tpl/search.tpl.php');
    exit();
}
$deleteRecID = $_GET['deleteID'];
$resident = new Residents();//var_dump($_POST);
if (isset($_POST['deleteResident']) )	{  //var_dump($deleteRecID);die;
    $resident->deleteResident($deleteRecID); 
    // header('Location: ../tpl/search.tpl.php');
    // exit();
} else {
    $residentDataArray = array();
    $resident->load($deleteRecID);
    $residentDataArray = $resident->residentData;
}

require_once('../tpl/resident-delete.tpl.php');

// $deleteRecID = $_GET['deleteID'];
// if (isset($_POST['deleteResident']) )	{       // if set delete
//     $sql = "DELETE FROM cemetery_burials WHERE burials_id =?";


?>