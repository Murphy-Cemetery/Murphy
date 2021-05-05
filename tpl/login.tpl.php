<!DOCTYPE html>
  <html>
  <head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
  </head>

<body>



<?php

	if (isset($_POST['submitLogin']))
	{
        if ($user->message!="") {?>
	      <h2><?php echo $user->message ?></h2>	<?php }
	
        else
        { ?>
            <p class='errMsg'><?php echo $user->errMessage ?></p> 
            <?php	
        }
    }
	if ($_SESSION['validUser'])	//This is a valid user.  Show them the Administrator Page
	{
    
      header("Location:../tpl/search.tpl.php");
      exit;
   
	}
	else									//The user needs to log in.  Display the Login Form
	{
?>
			
        <form method="post" name="loginForm" action="login.php" >
        
        <h1>Cemetery Project Admin System</h1>
        <h2>Admins can login to edit entries and add residents</h2>
          <p>Username: <input name="loginUsername" type="text" /></p>
          <p>Password: <input name="loginPassword" type="password" /></p>

          <p><input name="submitLogin" value="Login" type="submit" /> <input name="" type="reset" />&nbsp;</p>
        </form>
                
<?php //turn off HTML and turn on PHP
	}//end of checking for a valid user
			

?>

</body>
</html>