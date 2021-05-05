

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Murphy Cemetery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="../css/about.css" rel="stylesheet" type="text/css">
<style>
    h1 {
        padding:2em;
        background-color:#444549;
        color:white;
        text-align:center;
    }
    form {
        text-align:center;
    }

    #search {
        background-color:black;
        color:white;
        padding:1em;
        border-radius:15px;
    }
    #logout {
            text-align:center;
        }
</style>
</head>
<body>

<h1>Search Cemetery</h1>
<form action="resident-list.php" method ="post" >  
            <input type ="text" name="fNameSearch" id="fNameSearch" label="First Name search" placeholder="First Name">
            <input type ="text" name="mNameSearch" id="mNameSearch" label="Middle Name search" placeholder="Middle Name">
            <input type ="text" name="lNameSearch" id="lNameSearch" label="Last Name search" placeholder="Last Name">
            <input type="submit"  id = "search" value="Search"><span></span>     <!--  search bar -->
        </form>
<?php if (isset($_SESSION['validUser'])) { 
                if ($_SESSION['validUser']) { ?>
                    <div id="logout">
                        <button><a href="../public/logout.php">Logout of system</a></button>
                    </div>
            <?php }} ?>

<form action="../public/resident-list.php" method ="post" >  
    <div class="form-group">
        <p><label for="floatName">FIRST NAME:</label></p>
        <p><input type ="text" name="firstName" id="fNameSearch" label="First Name search" placeholder="First Name"></p>
    </div>
    <div class="form-group">
        <p><label for="floatName">LAST NAME:</label></p>
        <p><input type ="text" name="lastName" id="lNameSearch" label="Last Name search" placeholder="Last Name"></p>
    </div>
    <div class="form-group">
        <p><label for="floatName">YEAR OF DEATH:</label></p>
        <p><input type ="text" name="deathYear" id="deathYear" label="Year of Death" placeholder="Year of Death"></p>
    </div>
    <!-- <input type ="text" name="firstName" id="fNameSearch" label="First Name search" placeholder="First Name">
    <input type ="text" name="lastName" id="lNameSearch" label="Last Name search" placeholder="Last Name">
    <input type ="text" name="deathYear" id="deathYear" label="Year of Death" placeholder="Year of Death"> -->
    <input type="submit" name="search" id = "search" value="Search">    <!--  search bar -->
</form>

<footer>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 mb-2 mt-2">
                <center>
                <?php  if (!isset($_SESSION['validUser'])) {?>
                    <a href="../public/login.php" >Login</a> <?php } ?>
                </center>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                <center>
                    <p>&copy; Copywrite Murphy Cemetery <script> new Date().getFullYear()</script></p>
                </center>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                <center>
                    <p>Nevada, IA 50201</p>
                </center>
            </div>
        </div>
    </footer>
    
</body>
</html>