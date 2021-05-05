<?php 
session_cache_limiter('none');  //This prevents a Chrome error when using the back button to return to this page.
session_start();
require_once('../inc/Residents.class.php');

$message = "";
$errMessage = ""; 

if (!isset($_SESSION['validUser'])) {
    $_SESSION['validUser'] = false;	
}
 
if ($_SESSION['validUser'])				//valid user?
{
	//User is already signed on.  Skip the rest.
	$message = "Welcome Back!";	//Create greeting for VIEW area		
}
else
{
	if (isset($_POST['submitLogin']) )		{	//submitted form?
	//echo"<script>alert('nice try')</script>";
		$inUsername = $_POST['loginUsername'];	//pull the data from the form
		$inPassword = $_POST['loginPassword'];	
		$user = new Residents();
		$user->login($inUsername, $inPassword );

	}
}        
      
    require_once('../tpl/login.tpl.php');
  ?>
  
  