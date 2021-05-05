<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<meta charset="utf-8">
	<title>Add Grave</title>
	<style>
		.title {
			width: 100%;
			height: 75px;
			line-height: 75px;
			font-size: 2em;
			font-weight: 500;
			text-align: center;
			color: white;
			background-color: dimgray;
		}
		#container {
			margin-left: auto;
			margin-right: auto;
			width: 85%;
			border-left: 1px black solid;
			border-right: 1px black solid;
		}
		#container form, form div{
			margin-left: auto;
			margin-right: auto;
			font-size: 1.25em;
		}
		div div {
			padding: 10px;
		}
		div input, div textarea, div select{
			width: 100%;
			border: 2px black solid;
		}
		input[type="radio"] {
			width: .75em;
			height: .75em;
			border: 5px solid black;
			display: inline;
			line-height: 100%;
		}
		.relationBox {
			background-color: lightgray;
			width: 80%;
			margin: 15px auto 15px auto;
			padding: 15px;
		}
		.textareas {
			width: 80%;
			font-size: 1.25em;
			margin-left: auto;
			margin-right: auto;
		}
		.relationBox .textarea {
			width: 80%;
		}
		h2 {
			width: 30%;
			text-align: center;
			margin-left: auto;
			margin-right: auto;
		}
		.children {
			text-align: center;
		}
		.children textarea {
			width: 80%;
			border: 2px black solid;
		}
		.buttons {
			width: 40%;
			margin: 25px auto 25px auto;
			display: flex;
			flex-direction: row;
			justify-content: space-around;
		}
		.buttons input {
			width: 250px;
			height: 75px;
			background-color: black;
			transition: background-color 0.5s;
			color: white;
			font-weight: bold;
			font-size: 1.25em;
			border: none;
		}
		.buttons input:hover {
			background-color: dimgray;
		}
		.mobileRemove {

		}
		.inputImage {
			width: 100%;
			height: auto;
		}
		.row div {
			text-align: center;
		}
		.error {
			color: red;
			font-size: .75em;
		}
		@media only screen and (max-width: 1360px){
			.mobileRemove {
				display: none;
			}
			.buttons {
				width: 50%;
			}
		}
		@media only screen and (max-width: 1140px){
			#container {
				 width: 100%;
			}
			.buttons {
				width: 70%;
			}
		}
		@media only screen and (max-width: 540px){
			.buttons {
				width: 100%;
			}
		}

	</style>
	<script>
		function veteranClick(veteranBool){
			if (veteranBool){
				document.getElementById("vetTrue").checked = true;
				document.getElementById("vetFalse").checked = false;
				var elements = document.querySelectorAll('.veteranInput');
				for(var i = 0; i < elements.length; i++){
					elements[i].removeAttribute("hidden");
				}
				var elements = document.querySelectorAll('.greyFilter');
				for(var i = 0; i < elements.length; i++){
					elements[i].style.opacity = "100%";
				}
			}
			else{
				document.getElementById("vetFalse").checked = true;
				document.getElementById("vetTrue").checked = false;
				var elements = document.querySelectorAll('.veteranInput');
				for(var i = 0; i < elements.length; i++){
					elements[i].setAttribute("hidden", "true");
					elements[i].value = "";
				}
				var elements = document.querySelectorAll('.greyFilter');
				for(var i = 0; i < elements.length; i++){
					elements[i].style.opacity = "25%";
				}
			}
		}
		function bodyInit(){
			
			var vetActive = <?php if (isset($residentDataArray['burials_veteran']) && $residentDataArray['burials_veteran'] === 'tru'){
				echo "veteranClick(true);";
			}else {
				echo "veteranClick(false);";}?>
			
		}
	</script>
</head>
<body onLoad="bodyInit()">
	<div class = "title">Add New Deceased</div>
	<div id = "container" class = "container-fluid">
		<form action ="" method="post" enctype="multipart/form-data">
			<div><!--section 1 informations-->
				<input type="hidden" name="burials_id" value="<?php echo (isset($residentDataArray['burials_id']) ? $residentDataArray['burials_id'] : ''); ?>"/>
				<div class = "row"><!--names-->
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_first_name">First Name</label><br>
						<input type = "text" name = "burials_first_name" value = "<?php echo (isset($residentDataArray['burials_first_name']) ? $residentDataArray['burials_first_name'] : ''); ?>">
						<?php if (isset($residentErrorsArray['burials_first_name'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_first_name']?></div>
						<?php }?>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_middle_name">Middle Name</label><br>
						<input type = "text" name = "burials_middle_name"  value = "<?php echo (isset($residentDataArray['burials_middle_name']) ? $residentDataArray['burials_middle_name'] : ''); ?>">
						<?php if (isset($residentErrorsArray['burials_middle_name'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_middle_name']?></div>
						<?php }?>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_last_name">Last Name</label><br>
						<input type = "text" name = "burials_last_name" value = "<?php echo (isset($residentDataArray['burials_last_name']) ? $residentDataArray['burials_last_name'] : ''); ?>">
						<?php if (isset($residentErrorsArray['burials_last_name'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_last_name']?></div>
						<?php }?>
					</div>
					<!--birth-->
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_dob">Birth Date</label><br>
						<input type = "date" name = "burials_dob" value = "<?php echo (isset($residentDataArray['burials_dob']) ? $residentDataArray['burials_dob'] : ''); ?>">
						<?php if (isset($residentErrorsArray['burials_dob'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_dob']?></div>
						<?php }?>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_birth_year">Birth Year</label><br>
						<input type = "text" name = "burials_birth_year" value = 
						"<?php if (isset($residentDataArray['burials_birth_year']) && $residentDataArray['burials_birth_year'] > 0){
							echo $residentDataArray['burials_birth_year'];
						}?>">
						<?php if (isset($residentErrorsArray['burials_birth_year'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_birth_year']?></div>
						<?php }?>
					</div>
					<!-- <div class = "col-lg-4 col-md-6 col-sm-12 mobileRemove"></div> -->
					<!--death-->
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_date_of_death">Death Date</label><br>
						<input type = "date" name = "burials_date_of_death" value = "<?php echo (isset($residentDataArray['burials_date_of_death']) ? $residentDataArray['burials_date_of_death'] : ''); ?>">
						<?php if (isset($residentErrorsArray['burials_date_of_death'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_date_of_death']?></div>
						<?php }?>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_death_year">Death Year</label><br>
						<input type = "text" name = "burials_death_year" value = 
						"<?php if (isset($residentDataArray['burials_death_year']) && $residentDataArray['burials_death_year'] > 0){
							echo $residentDataArray['burials_death_year'];
						}?>">
						<?php if (isset($residentErrorsArray['burials_death_year'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_death_year']?></div>
						<?php }?>
					</div>
					<!-- <div class = "col-lg-4 col-md-6 col-sm-12 mobileRemove"></div> -->
					<!--internment-->
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_interment_date">Internment Date</label><br>
						<input type = "date" name = "burials_interment_date" value = "<?php echo (isset($residentDataArray['burials_interment_date']) ? $residentDataArray['burials_interment_date'] : ''); ?>">
						<?php if (isset($residentErrorsArray['burials_interment_date'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_interment_date']?></div>
						<?php }?>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_interment_year">Internment Year</label><br>
						<input type = "text" name = "burials_interment_year" value =
						"<?php if (isset($residentDataArray['burials_interment_year']) && $residentDataArray['burials_interment_year'] > 0){
							echo $residentDataArray['burials_interment_year'];
						}?>">
						<?php if (isset($residentErrorsArray['burials_interment_year'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_interment_year']?></div>
						<?php }?>
					</div>
					<!-- <div class = "col-lg-4 col-md-6 col-sm-12 mobileRemove"></div> -->
					<!--plot-->
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_plot_row">Burial Plot Row</label><br>
						<input type = "text" name = "burials_plot_row" value =
						"<?php if (isset($residentDataArray['burials_plot_row']) && $residentDataArray['burials_plot_row'] > 0){
							echo $residentDataArray['burials_plot_row'];
						}?>">
						<?php if (isset($residentErrorsArray['burials_plot_row'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_plot_row']?></div>
						<?php }?>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_plot_number">Burial Plot Number</label><br>
						<input type = "text" name = "burials_plot_number" value =
						"<?php if (isset($residentDataArray['burials_plot_number']) && $residentDataArray['burials_plot_number'] > 0){
							echo $residentDataArray['burials_plot_number'];
						}?>">
						<?php if (isset($residentErrorsArray['burials_plot_number'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_plot_number']?></div>
						<?php }?>
					</div>
					<!-- <div class = "col-lg-4 col-md-6 col-sm-12 mobileRemove"></div> -->
					<!--birth place-->
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_birthplace_city">Birth City</label><br>
						<input type = "text" name = "burials_birthplace_city" value = "<?php echo (isset($residentDataArray['burials_birthplace_city']) ? $residentDataArray['burials_birthplace_city'] : ''); ?>">
						<?php if (isset($residentErrorsArray['burials_birthplace_city'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_birthplace_city']?></div>
						<?php }?>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_birthplace_state">Birth State</label><br>
						<select name = "burials_birthplace_state">
							<option value="Alabama" <?php selectedCheck("Alabama", $st)?>>Alabama</option>
							<option value="Alaska" <?php selectedCheck("Alaska", $st)?>>Alaska</option>
							<option value="Arizona" <?php selectedCheck("Arizona", $st)?>>Arizona</option>
							<option value="Arkansas" <?php selectedCheck("Arkansas", $st)?>>Arkansas</option>
							<option value="California" <?php selectedCheck("California", $st)?>>California</option>
							<option value="Colorado" <?php selectedCheck("Colorado", $st)?>>Colorado</option>
							<option value="Connecticut" <?php selectedCheck("Connecticut", $st)?>>Connecticut</option>
							<option value="Delaware" <?php selectedCheck("Delaware", $st)?>>Delaware</option>
							<option value="District Of Columbia" <?php selectedCheck("District Of Columbia", $st)?>>District Of Columbia</option>
							<option value="Florida" <?php selectedCheck("Florida", $st)?>>Florida</option>
							<option value="Georgia" <?php selectedCheck("Georgia", $st)?>>Georgia</option>
							<option value="Hawaii" <?php selectedCheck("Hawaii", $st)?>>Hawaii</option>
							<option value="Idaho" <?php selectedCheck("Idaho", $st)?>>Idaho</option>
							<option value="Illinois" <?php selectedCheck("Illinois", $st)?>>Illinois</option>
							<option value="Indiana" <?php selectedCheck("Indiana", $st)?>>Indiana</option>
							<option value="Iowa" <?php selectedCheck("Iowa", $st)?>>Iowa</option>
							<option value="Kansas" <?php selectedCheck("Kansas", $st)?>>Kansas</option>
							<option value="Kentucky" <?php selectedCheck("Kentucky", $st)?>>Kentucky</option>
							<option value="Louisiana" <?php selectedCheck("Louisiana", $st)?>>Louisiana</option>
							<option value="Maine" <?php selectedCheck("Maine", $st)?>>Maine</option>
							<option value="Maryland" <?php selectedCheck("Maryland", $st)?>>Maryland</option>
							<option value="Massachusetts" <?php selectedCheck("Massachusetts", $st)?>>Massachusetts</option>
							<option value="Michigan" <?php selectedCheck("Michigan", $st)?>>Michigan</option>
							<option value="Minnesota" <?php selectedCheck("Minnesota", $st)?>>Minnesota</option>
							<option value="Mississippi" <?php selectedCheck("Mississippi", $st)?>>Mississippi</option>
							<option value="Missouri" <?php selectedCheck("Missouri", $st)?>>Missouri</option>
							<option value="Montana" <?php selectedCheck("Montana", $st)?>>Montana</option>
							<option value="Nebraska" <?php selectedCheck("Nebraska", $st)?>>Nebraska</option>
							<option value="Nevada" <?php selectedCheck("Nevada", $st)?>>Nevada</option>
							<option value="New Hampshire" <?php selectedCheck("New Hampshire", $st)?>>New Hampshire</option>
							<option value="New Jersey" <?php selectedCheck("New Jersey", $st)?>>New Jersey</option>
							<option value="New Mexico" <?php selectedCheck("New Mexico", $st)?>>New Mexico</option>
							<option value="New York" <?php selectedCheck("New York", $st)?>>New York</option>
							<option value="North Carolina" <?php selectedCheck("North Carolina", $st)?>>North Carolina</option>
							<option value="North Dakota" <?php selectedCheck("North Dakota", $st)?>>North Dakota</option>
							<option value="Ohio" <?php selectedCheck("Ohio", $st)?>>Ohio</option>
							<option value="Oklahoma" <?php selectedCheck("Oklahoma", $st)?>>Oklahoma</option>
							<option value="Oregon" <?php selectedCheck("Oregon", $st)?>>Oregon</option>
							<option value="Pennsylvania" <?php selectedCheck("Pennsylvania", $st)?>>Pennsylvania</option>
							<option value="Rhode Island" <?php selectedCheck("Rhode Island", $st)?>>Rhode Island</option>
							<option value="South Carolina" <?php selectedCheck("South Carolina", $st)?>>South Carolina</option>
							<option value="South Dakota" <?php selectedCheck("South Dakota", $st)?>>South Dakota</option>
							<option value="Tennessee" <?php selectedCheck("Tennessee", $st)?>>Tennessee</option>
							<option value="Texas" <?php selectedCheck("Texas", $st)?>>Texas</option>
							<option value="Utah" <?php selectedCheck("Utah", $st)?>>Utah</option>
							<option value="Vermont" <?php selectedCheck("Vermont", $st)?>>Vermont</option>
							<option value="Virginia" <?php selectedCheck("Virginia", $st)?>>Virginia</option>
							<option value="Washington" <?php selectedCheck("Washington", $st)?>>Washington</option>
							<option value="West Virginia" <?php selectedCheck("West Virginia", $st)?>>West Virginia</option>
							<option value="Wisconsin" <?php selectedCheck("Wisconsin", $st)?>>Wisconsin</option>
							<option value="Wyoming" <?php selectedCheck("Wyoming", $st)?>>Wyoming</option>
							<option value ="Other Location" <?php selectedCheck("Other Location", $st)?>>Other Location</option>
						</select>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-12 mobileRemove"></div>
					<div class = "col-lg-4 col-md-6 col-sm-12 mobileRemove"></div>
				</div>
			</div>
			<div><!--section 2 veteran status-->
				<div class = "row">
					<div class = "col-lg-3 col-md-6 col-sm-12 mobileRemove"></div>
					<div class = "col-lg-3 col-md-6 col-sm-12"><label for = "burials_veteran"></label>Veteran Status</div>
					<div class = "col-lg-3 col-md-6 col-sm-12">
						Yes - <input type="radio" name = "burials_veteran" value = true onClick="veteranClick(true)" id = "vetTrue">
						<hr>
						No - <input type = "radio" name = "burials_veteran" value = false onClick="veteranClick(false)" id = "vetFalse">
					</div>
					<div class = "col-lg-3 col-md-6 col-sm-12 mobileRemove"></div>
				</div>
				<div class = "row greyFilter">
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_veteran_branch" class = "veteranInput">Branch</label><br>
						<input type = "text" class = "veteranInput" name = "burials_veteran_branch" value = "<?php echo (isset($residentDataArray['burials_veteran_branch']) ? $residentDataArray['burials_veteran_branch'] : ''); ?>">
						<?php if (isset($residentErrorsArray['burials_veteran_branch'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_veteran_branch']?></div>
						<?php }?>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_veteran_rank" class = "veteranInput">Rank</label><br>
						<input type = "text" class = "veteranInput" name = "burials_veteran_rank" value = "<?php echo (isset($residentDataArray['burials_veteran_rank']) ? $residentDataArray['burials_veteran_rank'] : ''); ?>">
						<?php if (isset($residentErrorsArray['burials_veteran_rank'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_veteran_rank']?></div>
						<?php }?>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-12">
						<label for = "burials_veteran_service_time" class = "veteranInput">Service Time</label><br>
						<input type = "text" class = "veteranInput" name = "burials_veteran_service_time" value = "<?php echo (isset($residentDataArray['burials_veteran_service_time']) ? $residentDataArray['burials_veteran_service_time'] : ''); ?>">
						<?php if (isset($residentErrorsArray['burials_veteran_service_time'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_veteran_service_time']?></div>
						<?php }?>
					</div>
				</div>
			</div>








			<div class = "relationBox">
				<h2>Spouse</h2>
				<hr>
				<div><!--spouse-->
					<div class = "row"><!--names-->
						<div class = "col-lg-4 col-md-6 col-sm-12">
							<label for = "burials_spouse_first_name">First Name</label><br>
							<input type = "text" name = "burials_spouse_first_name" value = "<?php echo (isset($residentDataArray['burials_spouse_first_name']) ? $residentDataArray['burials_spouse_first_name'] : ''); ?>">
							<?php if (isset($residentErrorsArray['burials_spouse_first_name'])){ ?>
								<div class = "error"><?php echo $residentErrorsArray['burials_spouse_first_name']?></div>
							<?php }?>							
						</div>
						<div class = "col-lg-4 col-md-6 col-sm-12">
							<label for = "burials_spouse_middle_name">Middle Name</label><br>
							<input type = "text" name = "burials_spouse_middle_name" value = "<?php echo (isset($residentDataArray['burials_spouse_middle_name']) ? $residentDataArray['burials_spouse_middle_name'] : ''); ?>">
							<?php if (isset($residentErrorsArray['burials_spouse_middle_name'])){ ?>
								<div class = "error"><?php echo $residentErrorsArray['burials_spouse_middle_name']?></div>
							<?php }?>							
						</div>
						<div class = "col-lg-4 col-md-6 col-sm-12">
							<label for = "burials_spouse_last_name">Last Name</label><br>
							<input type = "text" name = "burials_spouse_last_name" value = "<?php echo (isset($residentDataArray['burials_spouse_last_name']) ? $residentDataArray['burials_spouse_last_name'] : ''); ?>">
							<?php if (isset($residentErrorsArray['burials_spouse_last_name'])){ ?>
								<div class = "error"><?php echo $residentErrorsArray['burials_spouse_last_name']?></div>
							<?php }?>							
						</div>
					</div>
				</div>
			</div>
			<div class = "relationBox">
				<h2>Mother</h2>
				<hr>
				<div><!--parents-->
					<div class = "row"><!--mother names-->
						<div class = "col-lg-4 col-md-6 col-sm-12">
							<label for = "burials_mother_first_name">First Name</label><br>
							<input type = "text" name = "burials_mother_first_name" value = "<?php echo (isset($residentDataArray['burials_mother_first_name']) ? $residentDataArray['burials_mother_first_name'] : ''); ?>">
							<?php if (isset($residentErrorsArray['burials_mother_first_name'])){ ?>
								<div class = "error"><?php echo $residentErrorsArray['burials_mother_first_name']?></div>
							<?php }?>							

						</div>
						<div class = "col-lg-4 col-md-6 col-sm-12">
							<label for = "burials_mother_middle_name">Middle Name</label><br>
							<input type = "text" name = "burials_mother_middle_name" value = "<?php echo (isset($residentDataArray['burials_mother_middle_name']) ? $residentDataArray['burials_mother_middle_name'] : ''); ?>">
							<?php if (isset($residentErrorsArray['burials_mother_middle_name'])){ ?>
								<div class = "error"><?php echo $residentErrorsArray['burials_mother_middle_name']?></div>
							<?php }?>							

						</div>
						<div class = "col-lg-4 col-md-6 col-sm-12">
							<label for = "burials_mother_last_name">Last Name</label><br>
							<input type = "text" name = "burials_mother_last_name" value = "<?php echo (isset($residentDataArray['burials_mother_last_name']) ? $residentDataArray['burials_mother_last_name'] : ''); ?>">
							<?php if (isset($residentErrorsArray['burials_mother_last_name'])){ ?>
								<div class = "error"><?php echo $residentErrorsArray['burials_mother_last_name']?></div>
							<?php }?>							

						</div>
					</div>
				</div>
				<h2>Father</h2>
				<hr>
				<div>
					<div class = "row"><!--father names-->
						<div class = "col-lg-4 col-md-6 col-sm-12">
							<label for = "burials_father_first_name">First Name</label><br>
							<input type = "text" name = "burials_father_first_name" value = "<?php echo (isset($residentDataArray['burials_father_first_name']) ? $residentDataArray['burials_father_first_name'] : ''); ?>">
							<?php if (isset($residentErrorsArray['burials_father_first_name'])){ ?>
								<div class = "error"><?php echo $residentErrorsArray['burials_father_first_name']?></div>
							<?php }?>							

						</div>
						<div class = "col-lg-4 col-md-6 col-sm-12">
							<label for = "burials_father_middle_name">Middle Name</label><br>
							<input type = "text" name = "burials_father_middle_name" value = "<?php echo (isset($residentDataArray['burials_father_middle_name']) ? $residentDataArray['burials_father_middle_name'] : ''); ?>">
							<?php if (isset($residentErrorsArray['burials_father_middle_name'])){ ?>
								<div class = "error"><?php echo $residentErrorsArray['burials_father_middle_name']?></div>
							<?php }?>							

						</div>
						<div class = "col-lg-4 col-md-6 col-sm-12">
							<label for = "burials_father_last_name">Last Name</label><br>
							<input type = "text" name = "burials_father_last_name" value = "<?php echo (isset($residentDataArray['burials_father_last_name']) ? $residentDataArray['burials_father_last_name'] : ''); ?>">
							<?php if (isset($residentErrorsArray['burials_father_last_name'])){ ?>
								<div class = "error"><?php echo $residentErrorsArray['burials_father_last_name']?></div>
							<?php }?>							

						</div>
					</div>
				</div>	
			</div>
			<div class = "relationBox children">
				<h2>Children</h2><!--children text areas-->
				<textarea name = "burials_children_names" rows="8"><?php echo (isset($residentDataArray['burials_children_names']) ? $residentDataArray['burials_children_names'] : ''); ?></textarea>
				<?php if (isset($residentErrorsArray['burials_children_names'])){ ?>
					<div class = "error"><?php echo $residentErrorsArray['burials_children_names']?></div>
				<?php }?>							

			</div>

			
			<div class = "textareas">
				<div class = "row"><!--long text entries-->
					<div>
						<label for = "burials_obituary">Obituary</label>
						<textarea name = "burials_obituary" rows="8"><?php echo (isset($residentDataArray['burials_obituary']) ? $residentDataArray['burials_obituary'] : ''); ?></textarea>
						<?php if (isset($residentErrorsArray['burials_obituary'])){ ?>
								<div class = "error"><?php echo $residentErrorsArray['burials_obituary']?></div>
						<?php }?>							

					</div>
				</div>
				<div class = "row">
					<div>
						<label for = "burials_family_notes">Family Notes</label><br>
						<textarea name = "burials_family_notes" rows="8"><?php echo (isset($residentDataArray['burials_family_notes']) ? $residentDataArray['burials_family_notes'] : ''); ?></textarea>
						<?php if (isset($residentErrorsArray['burials_family_notes'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_family_notes']?></div>
						<?php }?>							

					</div>
				</div>
			</div>
			<div class = "row">
				<div class = "col-lg-4 col-md-6 col-sm-12"><!--images-->
					<div>
						<label for = "burials_img_deceased">Image of Deceased</label><br><input type = "file" name = "burials_img_deceased">
						<?php if (isset($resident->residentData['burials_img_deceased']) && !empty($resident->residentData['burials_img_deceased'] && isset($_GET['burialsID']))){ ?>
							Current Image:<br><img src = "<?php echo $resident->residentData['burials_img_deceased']?>" alt = "deceased" class = "inputImage">
						<?php }?>
						<?php if (isset($residentErrorsArray['burials_img_deceased'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_img_deceased']?></div>
						<?php }?>	
					</div>
				</div>
				<div class = "col-lg-4 col-md-6 col-sm-12">
					<div>
						<label for = "burials_img_grave1">Image of Grave</label><br><input type = "file" name = "burials_img_grave1">
						<?php if (isset($resident->residentData['burials_img_grave1']) && !empty($resident->residentData['burials_img_grave1'] && isset($_GET['burialsID']))){ ?>
							Current Image:<br><img src = "<?php echo $resident->residentData['burials_img_grave1']?>" alt = "grave 1" class = "inputImage">
						<?php }?>
						<?php if (isset($residentErrorsArray['burials_img_grave1'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_img_grave1']?></div>
						<?php }?>	
					</div>
				</div>
				<div class = "col-lg-4 col-md-6 col-sm-12">
					<div>
						<label for = "burials_img_grave2">Image of Grave 2</label><br><input type = "file" name = "burials_img_grave2">
						<?php if (isset($resident->residentData['burials_img_grave2']) && !empty($resident->residentData['burials_img_grave2'] && isset($_GET['burialsID']))){ ?>
							Current Image:<br><img src = "<?php echo $resident->residentData['burials_img_grave2']?>" alt = "grave 2" class = "inputImage">
						<?php }?>
						<?php if (isset($residentErrorsArray['burials_img_grave2'])){ ?>
							<div class = "error"><?php echo $residentErrorsArray['burials_img_grave2']?></div>
						<?php }?>	
					</div>
				</div>
			</div>
			<div class = "buttons">
				<input type = "submit" value = "Submit" name = "Save">
				<input type = "reset" value = "Reset" name = "submit">
			</div>
		</form>
	</div>
	
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>