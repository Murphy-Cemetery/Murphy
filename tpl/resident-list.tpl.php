<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="../css/about.css" rel="stylesheet" type="text/css">
    <title>Search results</title>
    <style>
        h1 {
        padding:2em;
        background-color:#444549;
        color:white;
        text-align:center;
    }
        .resident {
            background-color:#8d8e79;
            width:50%;  
            margin:2em auto;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-direction:column;
        }
        .center {
            text-align:center;
        }
    </style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">

        <a class="navbar-brand col-9 ml-3" href="../index.html"><span class="navWhiteHead">Murphy Cemetery</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mr-2" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item pr-2">
                    <a class="nav-link" href="../index.html"><span class="navWhite">Home</span></a>
                </li>
                <li class="nav-item active pr-2">
                    <a class="nav-link" href="../public/about.html"><span class="navWhite">About</span></a>
                </li>
                <li class="nav-item pr-2">
                    <a class="nav-link" href="../public/contact.php"><span class="navWhite">Contact</span></a>
                </li>
                <li class="nav-item pr-2">
                    <a class="nav-link" href="search.tpl.php"><span class="navWhite">Search</span></a>
                </li>
            </ul>
        </div>
    </nav>
   
    <h1>Results</h1>
    <?php if (isset($_SESSION['validUser'])) { 
                if ($_SESSION['validUser']) { ?>
                    <div class="center">
                        <button><a href="logout.php">Logout of system</a></button>
                    </div>
            <?php }} ?>
<?php 
 foreach ($residentList as $residentData) 
    { ?>
        <div class="resident">
            <h3>First Name: <?php if(isset($residentData['burials_first_name'])) echo ($residentData['burials_first_name'].' ');?></h3>
            <h3>Middle Name:<?php if(isset($residentData['burials_middle_name'])) echo ($residentData['burials_middle_name'].' ');?></h3>
            <h3>Last Name:<?php if(isset($residentData['burials_last_name'])) echo ($residentData['burials_last_name'].' ');?></h3>
            <h3>Day of Death:<?php if(isset($residentData['burials_date_of_death'])) echo ($residentData['burials_date_of_death'].' ');?></h3>

            <?php  if (isset($_SESSION['validUser'])) { 
                        if ($_SESSION['validUser']) { ?>
                            <p><button><a href="add.php?burialsID=<?php echo $residentData['burials_id']; ?>">Edit</a></button>
                            <button><a href="resident-delete.php?deleteID=<?php echo $residentData['burials_id']; ?>">Delete</a></button></p>
                    <?php }} ?>
        </div> 
    <?php } ?>
    <p class="center"><a href="../tpl/search.tpl.php" id="deleted">Back to Search</a></p>

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
