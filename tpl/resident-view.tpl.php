<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="css/about.css" rel="stylesheet" type="text/css">
    <title>View Resident</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        #container {
            width: 60%;
            height: 100%;
            background-color: lightgray;
            margin: 0px auto 0px auto;
            padding: 20px 0px 20px 0px;
            text-align: center;
        }
        .resident{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        button a:link, button a:hover, button a:visited {
            color: black;
            text-decoration: none;
        }
        button {
            margin: 25px auto 15px auto;
            width: 150px;
        }
        p {
            font-size: 1.25em;
        }
        .image {
            width: 100%;
            height: auto;
        }
		@media only screen and (max-width: 992px){
			#container {
				 width: 80%;
			}
            .image {
                width: 80%;
            }
		}
		@media only screen and (max-width: 576px){
			#container {
				 width: 100%;
			}
            .image {
                width: 60%;
            }
		}



    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">

        <a class="navbar-brand col-9 ml-3" href="index.html"><span class="navWhiteHead">Murphy Cemetery</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mr-2" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item pr-2">
                    <a class="nav-link" href="../index.html"><span class="navWhite">Home</span></a>
                </li>
                <li class="nav-item active pr-2">
                    <a class="nav-link" href="about.html"><span class="navWhite">About</span></a>
                </li>
                <li class="nav-item pr-2">
                    <a class="nav-link" href="contact.php"><span class="navWhite">Contact</span></a>
                </li>
                <li class="nav-item pr-2">
                    <a class="nav-link" href="../tpl/search.tpl.php"><span class="navWhite">Search</span></a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div id = "container">
        <?php if ($validResident){ ?>
            <div class = "resident">
                <div class = "fluid-container">
                <!-- resident names -->
                    <h3>Resident Names</h3>
                    <div class = "row">
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>First Name: <?php if (isset($residentDataArray['burials_first_name'])){echo $residentDataArray['burials_first_name'];}?></p>
                        </div>
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>Middle Name: <?php if (isset($residentDataArray['burials_middle_name'])){echo $residentDataArray['burials_middle_name'];}?></p>
                        </div>
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>Last Name: <?php if (isset($residentDataArray['burials_last_name'])){echo $residentDataArray['burials_last_name'];}?></p>
                        </div>
                    </div>
                    <hr>
                <!-- birth -->
                    <h3>Birth</h3>
                    <div class = "row">
                            <div class = "col-lg-6 col-md-6 col-sm-12">
                                <p>Date Of Birth: <?php if (isset($residentDataArray['burials_dob']) && !$residentDataArray['burials_dob']  === '0000-00-00'){echo $residentDataArray['burials_dob'];}?></p>
                            </div>
                            <div class = "col-lg-6 col-md-6 col-sm-12">
                                <p>Year of Birth: <?php if (isset($residentDataArray['burials_birth_year']) && $residentDataArray['burials_birth_year'] > 0){echo $residentDataArray['burials_birth_year'];}?></p>
                            </div>
                    </div>
                    <hr>
                <!-- birth locations -->
                    <h3>Birth Locations</h3>
                    <div class = "row">
                            <div class = "col-lg-6 col-md-6 col-sm-12">
                                <p>Birth City: <?php if (isset($residentDataArray['burials_birthplace_city'])){echo $residentDataArray['burials_birthplace_city'];}?></p>
                            </div>
                            <div class = "col-lg-6 col-md-6 col-sm-12">
                                <p>Birth State: <?php if (isset($residentDataArray['burials_birthplace_state'])){echo $residentDataArray['burials_birthplace_state'];}?></p>
                            </div>
                    </div>
                    <hr>
                <!-- death-->
                    <h3>Death</h3>
                    <div class = "row">
                            <div class = "col-lg-6 col-md-6 col-sm-12">
                                <p>Date Of Death: <?php if (isset($residentDataArray['burials_date_of_death']) && !$residentDataArray['burials_date_of_death']  === '0000-00-00'){echo $residentDataArray['burials_date_of_death'];}?></p>
                            </div>
                            <div class = "col-lg-6 col-md-6 col-sm-12">
                                <p>Year of Death: <?php if (isset($residentDataArray['burials_death_year']) && $residentDataArray['burials_death_year'] > 0){echo $residentDataArray['burials_death_year'];}?></p>
                            </div>
                    </div>                    
                    <hr>
                <!-- internment -->
                <h3>Internment</h3>
                    <div class = "row">
                            <div class = "col-lg-6 col-md-6 col-sm-12">
                                <p>Date Of Internment: <?php if (isset($residentDataArray['burials_interment_date']) && !$residentDataArray['burials_interment_date']  === '0000-00-00'){echo $residentDataArray['burials_interment_date'];}?></p>
                            </div>
                            <div class = "col-lg-6 col-md-6 col-sm-12">
                                <p>Year of Internment: <?php if (isset($residentDataArray['burials_interment_year']) && $residentDataArray['burials_interment_year'] > 0){echo $residentDataArray['burials_interment_year'];}?></p>
                            </div>
                    </div>    
                    <hr>
                <!-- plot -->
                <h3>Plot Location</h3>
                    <div class = "row">
                            <div class = "col-lg-6 col-md-6 col-sm-12">
                                <p>Cemetery Plot Row: <?php if (isset($residentDataArray['burials_plot_row']) && $residentDataArray['burials_plot_row'] > 0){echo $residentDataArray['burials_plot_row'];}?></p>
                            </div>
                            <div class = "col-lg-6 col-md-6 col-sm-12">
                                <p>Cemetery Plot Number: <?php if (isset($residentDataArray['burials_plot_number']) && $residentDataArray['burials_plot_number'] > 0){echo $residentDataArray['burials_plot_number'];}?></p>
                            </div>
                    </div>
                    <hr>
                <!-- veteran (make dynamics)-->
                    <?php if (isset($residentDataArray['burials_veteran']) && $residentDataArray['burials_veteran'] === "tru"){ ?>
                    <h3>Veteran Information</h3>
                        <div class = "row">
                            <div class = "col-lg-4 col-md-6 col-sm-12">
                                <p>Branch: <?php if (isset($residentDataArray['burials_veteran_branch'])){echo $residentDataArray['burials_veteran_branch'];}?></p>
                            </div> 
                            <div class = "col-lg-4 col-md-6 col-sm-12">
                                <p>Rank: <?php if (isset($residentDataArray['burials_veteran_rank'])){echo $residentDataArray['burials_veteran_rank'];}?></p>
                            </div>  
                            <div class = "col-lg-4 col-md-6 col-sm-12">
                                <p>Service Time: <?php if (isset($residentDataArray['burials_veteran_service_time'])){echo $residentDataArray['burials_veteran_service_time'];}?></p>
                            </div>
                        </div>  
                    <hr>
                    <?php }?>

                <!-- spouse names -->
                    <h3>Spouse Names</h3>
                    <div class = "row">
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>Spouse First Name: <?php if (isset($residentDataArray['burials_spouse_first_name'])){echo $residentDataArray['burials_spouse_first_name'];}?></p>
                        </div>
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>Spouse Middle Name: <?php if (isset($residentDataArray['burials_spouse_middle_name'])){echo $residentDataArray['burials_spouse_middle_name'];}?></p>
                        </div>
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>Spouse Last Name: <?php if (isset($residentDataArray['burials_spouse_last_name'])){echo $residentDataArray['burials_spouse_last_name'];}?></p>
                        </div>
                    </div>
                    <hr>
                <!-- mother names -->
                    <h3>Mother Names</h3>
                    <div class = "row">
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>Mother First Name: <?php if (isset($residentDataArray['burials_mother_first_name'])){echo $residentDataArray['burials_mother_first_name'];}?></p>
                        </div>
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>Mother Middle Name: <?php if (isset($residentDataArray['burials_mother_middle_name'])){echo $residentDataArray['burials_mother_middle_name'];}?></p>
                        </div>
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>Mother Last Name: <?php if (isset($residentDataArray['burials_mother_last_name'])){echo $residentDataArray['burials_mother_last_name'];}?></p>
                        </div>
                    </div>
                    <hr>
                <!-- father names -->
                    <h3>Father Names</h3>
                    <div class = "row">
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>Father First Name: <?php if (isset($residentDataArray['burials_father_first_name'])){echo $residentDataArray['burials_father_first_name'];}?></p>
                        </div>
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>Father Middle Name: <?php if (isset($residentDataArray['burials_father_middle_name'])){echo $residentDataArray['burials_father_middle_name'];}?></p>
                        </div>
                        <div class = "col-lg-4 col-md-6 col-sm-12">
                            <p>Father Last Name: <?php if (isset($residentDataArray['burials_father_last_name'])){echo $residentDataArray['burials_father_last_name'];}?></p>
                        </div>
                    </div>
                    <hr>
                <!-- children -->
                    <h3>Children</h3>
                    <div class = "row">
                        <div class = "col-lg-12 col-md-12 col-sm-12">
                            <p>Children:<br> <?php if (isset($residentDataArray['burials_children_names'])){echo $residentDataArray['burials_children_names'];}?></p>
                        </div>
                    </div>
                    <hr>
                <!-- obituary -->
                    <h3>Obituary</h3>
                    <div class = "row">
                        <div class = "col-lg-12 col-md-12 col-sm-12">
                            <p>Obituary:<br> <?php if (isset($residentDataArray['burials_obituary'])){echo $residentDataArray['burials_obituary'];}?></p>
                        </div>
                    </div>
                    <hr>
                <!-- family notes -->
                    <h3>Family Notes</h3>
                    <div class = "row">
                        <div class = "col-lg-12 col-md-12 col-sm-12">
                            <p>Family Notes:<br> <?php if (isset($residentDataArray['burials_family_notes'])){echo $residentDataArray['burials_family_notes'];}?></p>
                        </div>
                    </div>
                    <hr>
                <!-- images -->
                    <h3>Images</h3>
                        <div class = "row">
                            <div class = "col-lg-4 col-md-12 col-sm-12">
                                <?php if (isset($residentDataArray['burials_img_deceased']) && !empty($residentDataArray['burials_img_deceased'])){ ?>
                                    Photo of Deceased:<br><img src = "<?php echo $residentDataArray['burials_img_deceased']?>" alt = "image of deceased" class = "image">
                                <?php }?>
                            </div>
                            <div class = "col-lg-4 col-md-12 col-sm-12">
                                <?php if (isset($residentDataArray['burials_img_grave1']) && !empty($residentDataArray['burials_img_grave1'])){ ?>
                                    Photo Gravesite:<br><img src = "<?php echo $residentDataArray['burials_img_grave1']?>" alt = "grave 1" class = "image">
                                <?php }?>
                            </div>
                            <div class = "col-lg-4 col-md-12 col-sm-12">
                                <?php if (isset($residentDataArray['burials_img_grave2']) && !empty($residentDataArray['burials_img_grave2'])){ ?>
                                    Photo of Gravesite 2:<br><img src = "<?php echo $residentDataArray['burials_img_grave2']?>" alt = "grave 2" class = "image">
                                <?php }?>
                            </div>
                        </div>	
                    </div>


                <button><a href = "../tpl/search.tpl.php">Return To Search</a></button>
            </div>
        <?php } else { ?>
            <h1>No Resident of that ID</h1>
            <button><a href = "../tpl/search.tpl.php">Return To Search</a></button>
        <?php }?>
    </div>

    <footer>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 mb-2 mt-2">
                <center>
                    <a href="login.php" target="_blank">Login</a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>