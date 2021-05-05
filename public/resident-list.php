<?php
session_cache_limiter('none');  //This prevents a Chrome error when using the back button to return to this page.
session_start();
require_once('../inc/Residents.class.php');

$resident = new Residents();


// $burialList = $resident->getList(
//     (isset($_GET['firstName']) ? $_GET['firstName'] : null)
//     // (isset($_GET['middleName']) ? $_GET['middleName'] : null),
//     // (isset($_GET['lastName']) ? $_GET['lastName'] : null)
// );
//$burialList = array();var_dump($_POST);
$residentList= $resident->getList(
    (isset($_POST['firstName']) ? $_POST['firstName'] : null),
    (isset($_POST['lastName']) ? $_POST['lastName'] : null),
    (isset($_POST['deathYear']) ? $_POST['deathYear'] : null)
    );
//$burialList = $resident->residentData;var_dump($burialList);
//var_dump($burialList);

require_once("../tpl/resident-list.tpl.php");
?>