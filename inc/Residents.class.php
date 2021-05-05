<?php
class Residents {
    var $residentData = array();    // hold data from array
    var $oldResidentData = array();

    var $errors = array();          // for errors
    var $db = null;
    var $errMessage ="";
    var $message = ""; 
    



    function __construct() {
        // create a connection to our database
        $this->db = new PDO('mysql:host=localhost;dbname=murphy_cemetery;charset=utf8', 
            'root', '');
    }

    // takes a keyed array and sets our internal data representation to the array
    function set($dataArray)
    {
        $this->residentData = $dataArray;
    }




    function deleteResident($burialID) {   
        $stmt = $this->db->prepare("DELETE FROM cemetery_burials WHERE burials_id = ?");//var_dump($burialID);var_dump($this->message);
        if ($stmt->execute(array($burialID)))
            {$this->message= "The resident has been deleted.";}
        else {$this->errMessage="Error, resident not deleted.";}
    }

    function login($userName,$userPW) {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE user_name = ? AND user_password = ?");
        $stmt->execute(array($userName, $userPW));
       
        if ($stmt->rowCount() == 1) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            
            if ($row['user_name'] === $userName) {				//this is a valid user so set your SESSION variable

                $_SESSION['validUser'] = true;	
                $this->message = "Welcome Back! $userName";	
            }
            else {
                $_SESSION['validUser'] = false;					
                $this->errMessage = "Sorry, there was a problem with your username or password. Please try again.";		
            }
        }
        else {
            $_SESSION['validUser'] = false;					
            $this->errMessage = "Sorry, there was a problem with your username or password. Please try again.";		
        }   
    }// end login



    // santize the data in the passed array, return the array
    function sanitize($dataArray) { // convert for residents
        // sanitize data based on rules  
        $dataArray['burials_first_name']=filter_var($dataArray['burials_first_name'],FILTER_SANITIZE_STRING);
        $dataArray['burials_middle_name']=filter_var($dataArray['burials_middle_name'],FILTER_SANITIZE_STRING);
        $dataArray['burials_last_name']=filter_var($dataArray['burials_last_name'],FILTER_SANITIZE_STRING);
        // $dataArray['burials_dob']=filter_var($dataArray['burials_dob'],FILTER_SANITIZE_ENCODED); 
        $dataArray['burials_birth_year']=filter_var($dataArray['burials_birth_year'],FILTER_VALIDATE_INT);
        $dataArray['burials_birthplace_city']=filter_var($dataArray['burials_birthplace_city'],FILTER_SANITIZE_STRING);
        $dataArray['burials_birthplace_state']=filter_var($dataArray['burials_birthplace_state'],FILTER_SANITIZE_STRING);
        // $dataArray['burials_date_of_death']=filter_var($dataArray['burials_date_of_death'],FILTER_SANITIZE_ENCODED); 
        $dataArray['burials_death_year']=filter_var($dataArray['burials_death_year'],FILTER_VALIDATE_INT);
        $dataArray['burials_plot_row']=filter_var($dataArray['burials_plot_row'],FILTER_VALIDATE_INT);
        $dataArray['burials_plot_number']=filter_var($dataArray['burials_plot_number'],FILTER_VALIDATE_INT);
        // $dataArray['burials_interment_date']=filter_var($dataArray['burials_interment_date'],FILTER_SANITIZE_ENCODED); 
        $dataArray['burials_interment_year']=filter_var($dataArray['burials_interment_year'],FILTER_VALIDATE_INT);
        $dataArray['burials_veteran']=filter_var($dataArray['burials_veteran'],FILTER_SANITIZE_STRING);
        $dataArray['burials_veteran_branch']=filter_var($dataArray['burials_veteran_branch'],FILTER_SANITIZE_STRING);
        $dataArray['burials_veteran_rank']=filter_var($dataArray['burials_veteran_rank'],FILTER_SANITIZE_STRING);
        $dataArray['burials_veteran_service_time']=filter_var($dataArray['burials_veteran_service_time'],FILTER_SANITIZE_STRING);
        $dataArray['burials_spouse_first_name']=filter_var($dataArray['burials_spouse_first_name'],FILTER_SANITIZE_STRING);
        $dataArray['burials_spouse_middle_name']=filter_var($dataArray['burials_spouse_middle_name'],FILTER_SANITIZE_STRING);
        $dataArray['burials_spouse_last_name']=filter_var($dataArray['burials_spouse_last_name'],FILTER_SANITIZE_STRING);
        $dataArray['burials_children_names']=filter_var($dataArray['burials_children_names'],FILTER_SANITIZE_STRING);
        $dataArray['burials_mother_first_name']=filter_var($dataArray['burials_mother_first_name'],FILTER_SANITIZE_STRING);
        $dataArray['burials_mother_middle_name']=filter_var($dataArray['burials_mother_middle_name'],FILTER_SANITIZE_STRING);
        $dataArray['burials_mother_last_name']=filter_var($dataArray['burials_mother_last_name'],FILTER_SANITIZE_STRING);
        $dataArray['burials_father_first_name']=filter_var($dataArray['burials_father_first_name'],FILTER_SANITIZE_STRING);
        $dataArray['burials_father_middle_name']=filter_var($dataArray['burials_father_middle_name'],FILTER_SANITIZE_STRING);
        $dataArray['burials_father_last_name']=filter_var($dataArray['burials_father_last_name'],FILTER_SANITIZE_STRING);
        // $dataArray['burials_img_deceased']=filter_var($dataArray['burials_img_deceased'],FILTER_SANITIZE_URL);
        // $dataArray['burials_img_grave1']=filter_var($dataArray['burials_img_grave1'],FILTER_SANITIZE_URL);
        // $dataArray['burials_img_grave2']=filter_var($dataArray['burials_img_grave2'],FILTER_SANITIZE_URL);
        $dataArray['burials_obituary']=filter_var($dataArray['burials_obituary'],FILTER_SANITIZE_STRING);
        $dataArray['burials_family_notes']=filter_var($dataArray['burials_family_notes'],FILTER_SANITIZE_STRING);


        return $dataArray;
    }// end sanitize



        // load a news article based on an id
        function load($burialsID) {
            // flag to track if the article was loaded
            $isLoaded = false;
    
            // load from database
            // create a prepared statement (secure programming)
            $stmt = $this->db->prepare("SELECT * FROM cemetery_burials WHERE burials_id = ?");
            
            // execute the prepared statement passing in the id of the article we 
            // want to load
            $stmt->execute(array($burialsID));
    
            // check to see if we loaded the article
            if ($stmt->rowCount() == 1) {
                // if we did load the article, fetch the data as a keyed array
                $residentData = $stmt->fetch(PDO::FETCH_ASSOC);
                //var_dump($dataArray);
                
                // set the data to our internal property            
                $this->set($residentData);
                            
                // set the success flag to true
                $isLoaded = true;
            }
            //var_dump($stmt->rowCount());    
            return $isLoaded;  // return success or failure
        } // end load 
        function save() {

            
            // create a flag to track if the save was successful
            $isSaved = false;

            //handling file upload nulls


            //exit;
            // determine if insert or update based on articleID
            // save data from residentData property to database
            if (empty($this->residentData['burials_id'])) {
                if (isset($this->residentData['burials_img_deceased']['name'])){
                    $image1 = $this->residentData['burials_img_deceased']['name'];
                } else {
                    $image1 = "";
                }
                if (isset($this->residentData['burials_img_grave1']['name'])){
                    $image2 = $this->residentData['burials_img_grave1']['name'];
                } else {
                    $image2 = "";
                }
                if (isset($this->residentData['burials_img_grave2']['name'])){
                    $image3 = $this->residentData['burials_img_grave2']['name'];
                } else {
                    $image3 = "";
                }
                // create a prepared statement to insert data into the table
                $stmt = $this->db->prepare(
                    "INSERT INTO cemetery_burials 
                        (burials_first_name,
                        burials_middle_name,
                        burials_last_name,
                        burials_dob,
                        burials_birth_year,
                        burials_date_of_death,
                        burials_death_year,
                        burials_interment_date,
                        burials_interment_year,
                        burials_plot_row,
                        burials_plot_number,
                        burials_birthplace_city,
                        burials_birthplace_state,
                        burials_veteran,
                        burials_veteran_branch,
                        burials_veteran_rank,
                        burials_veteran_service_time,
                        burials_spouse_first_name,
                        burials_spouse_middle_name,
                        burials_spouse_last_name,
                        burials_mother_first_name,
                        burials_mother_middle_name,
                        burials_mother_last_name,
                        burials_father_first_name,
                        burials_father_middle_name,
                        burials_father_last_name,
                        burials_children_names,
                        burials_obituary,
                        burials_family_notes,
                        burials_img_deceased,
                        burials_img_grave1,
                        burials_img_grave2
                         ) 
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
                     );
                // execute the insert statement, passing in the data to insert
                $isSaved = $stmt->execute(array(
                        $this->residentData['burials_first_name'],
                        $this->residentData['burials_middle_name'],
                        $this->residentData['burials_last_name'],
                        $this->residentData['burials_dob'],
                        $this->residentData['burials_birth_year'],
                        $this->residentData['burials_date_of_death'],
                        $this->residentData['burials_death_year'],
                        $this->residentData['burials_interment_date'],
                        $this->residentData['burials_interment_year'],
                        $this->residentData['burials_plot_row'],
                        $this->residentData['burials_plot_number'],
                        $this->residentData['burials_birthplace_city'],
                        $this->residentData['burials_birthplace_state'],
                        $this->residentData['burials_veteran'],
                        $this->residentData['burials_veteran_branch'],
                        $this->residentData['burials_veteran_rank'],
                        $this->residentData['burials_veteran_service_time'],
                        $this->residentData['burials_spouse_first_name'],
                        $this->residentData['burials_spouse_middle_name'],
                        $this->residentData['burials_spouse_last_name'],
                        $this->residentData['burials_mother_first_name'],
                        $this->residentData['burials_mother_middle_name'],
                        $this->residentData['burials_mother_last_name'],
                        $this->residentData['burials_father_first_name'],
                        $this->residentData['burials_father_middle_name'],
                        $this->residentData['burials_father_last_name'],
                        $this->residentData['burials_children_names'],
                        $this->residentData['burials_obituary'],
                        $this->residentData['burials_family_notes'],
                        $image1,
                        $image2,
                        $image3
                    )
                );
                
                // if the execute returned true, then store the new id back into our 
                // data property
                if ($isSaved) {
                    $this->residentData['burialsID'] = $this->db->lastInsertId();
                    //image 1 upload after db success
                    if (isset($this->residentData['burials_img_deceased']['name'])){
                        $fileDestination = '../public/'.$this->residentData['burials_img_deceased']['name'];
                        move_uploaded_file($this->residentData['burials_img_deceased']['tmp'], $fileDestination);
                    }
                    //image 2 upload after db success
                    if (isset($this->residentData['burials_img_grave1']['name'])){
                        $fileDestination = '../public/'.$this->residentData['burials_img_grave1']['name'];
                        move_uploaded_file($this->residentData['burials_img_grave1']['tmp'], $fileDestination);
                    }
                    //image 3 upload after db success
                    if (isset($this->residentData['burials_img_grave2']['name'])){
                        $fileDestination = '../public/'.$this->residentData['burials_img_grave2']['name'];
                        move_uploaded_file($this->residentData['burials_img_grave2']['tmp'], $fileDestination);
                    }
                }
            } else { 
                if (isset($this->residentData['burials_img_deceased']['name'])){ //saving image location
                    $image1 = $this->residentData['burials_img_deceased']['name'];
                } else {
                    if (isset($this->oldResidentData['burials_img_deceased'])){// if image already exists, saves its location instead
                        $image1 = $this->oldResidentData['burials_img_deceased'];
                    } else {
                        $image1 = "";
                    }
                }

                if (isset($this->residentData['burials_img_grave1']['name'])){//saving image location
                    $image2 = $this->residentData['burials_img_grave1']['name'];
                } else {
                    if (isset($this->oldResidentData['burials_img_grave1'])){// if image already exists, saves its location instead
                        $image2 = $this->oldResidentData['burials_img_grave1'];
                    } else {
                        $image2 = "";
                    }
                }

                if (isset($this->residentData['burials_img_grave2']['name'])){//saving image location
                    $image3 = $this->residentData['burials_img_grave2']['name'];
                } else {
                    if (isset($this->oldResidentData['burials_img_grave2'])){// if image already exists, saves its location instead
                        $image3 = $this->oldResidentData['burials_img_grave2'];
                    } else {
                        $image3 = "";
                    }
                }
                // if this is an update of an existing record, create a prepared update 
                // statement
                $stmt = $this->db->prepare(
                    "UPDATE cemetery_burials SET
                        burials_first_name = ?,
                        burials_middle_name = ?,
                        burials_last_name = ?,
                        burials_dob = ?,
                        burials_birth_year = ?,
                        burials_date_of_death = ?,
                        burials_death_year = ?,
                        burials_interment_date = ?,
                        burials_interment_year = ?,
                        burials_plot_row = ?,
                        burials_plot_number = ?,
                        burials_birthplace_city = ?,
                        burials_birthplace_state = ?,
                        burials_veteran = ?,
                        burials_veteran_branch = ?,
                        burials_veteran_rank = ?,
                        burials_veteran_service_time = ?,
                        burials_spouse_first_name = ?,
                        burials_spouse_middle_name = ?,
                        burials_spouse_last_name = ?,
                        burials_mother_first_name = ?,
                        burials_mother_middle_name = ?,
                        burials_mother_last_name = ?,
                        burials_father_first_name = ?,
                        burials_father_middle_name = ?,
                        burials_father_last_name = ?,
                        burials_children_names = ?,
                        burials_obituary = ?,
                        burials_family_notes = ?,
                        burials_img_deceased = ?,
                        burials_img_grave1 = ?,
                        burials_img_grave2 = ?
                    WHERE burials_id = ?"
                );   
                // execute the update statement, passing in the data to update
                $isSaved = $stmt->execute(array(
                    $this->residentData['burials_first_name'],
                    $this->residentData['burials_middle_name'],
                    $this->residentData['burials_last_name'],
                    $this->residentData['burials_dob'],
                    $this->residentData['burials_birth_year'],
                    $this->residentData['burials_date_of_death'],
                    $this->residentData['burials_death_year'],
                    $this->residentData['burials_interment_date'],
                    $this->residentData['burials_interment_year'],
                    $this->residentData['burials_plot_row'],
                    $this->residentData['burials_plot_number'],
                    $this->residentData['burials_birthplace_city'],
                    $this->residentData['burials_birthplace_state'],
                    $this->residentData['burials_veteran'],
                    $this->residentData['burials_veteran_branch'],
                    $this->residentData['burials_veteran_rank'],
                    $this->residentData['burials_veteran_service_time'],
                    $this->residentData['burials_spouse_first_name'],
                    $this->residentData['burials_spouse_middle_name'],
                    $this->residentData['burials_spouse_last_name'],
                    $this->residentData['burials_mother_first_name'],
                    $this->residentData['burials_mother_middle_name'],
                    $this->residentData['burials_mother_last_name'],
                    $this->residentData['burials_father_first_name'],
                    $this->residentData['burials_father_middle_name'],
                    $this->residentData['burials_father_last_name'],
                    $this->residentData['burials_children_names'],
                    $this->residentData['burials_obituary'],
                    $this->residentData['burials_family_notes'],
                    $image1,
                    $image2,
                    $image3,
                    $this->residentData['burials_id']
                    )
                );
                if ($isSaved) {
                    //image 1 upload after db success
                    if (isset($this->residentData['burials_img_deceased']['name'])){
                        if (isset($this->oldResidentData['burials_img_deceased'])){
                            $fileDestination = '../public/'.$this->oldResidentData['burials_img_deceased'];
                            move_uploaded_file($this->residentData['burials_img_deceased']['tmp'], $fileDestination);
                        } else {
                            $fileDestination = '../public/'.$this->residentData['burials_img_deceased']['name'];
                            move_uploaded_file($this->residentData['burials_img_deceased']['tmp'], $fileDestination);
                        }

                    }
                    //image 2 upload after db success
                    if (isset($this->residentData['burials_img_grave1']['name'])){
                        if (isset($this->oldResidentData['burials_img_grave1'])){
                            $fileDestination = '../public/'.$this->oldResidentData['burials_img_grave1'];
                            move_uploaded_file($this->residentData['burials_img_grave1']['tmp'], $fileDestination);
                        } else {
                            $fileDestination = '../public/'.$this->residentData['burials_img_grave1']['name'];
                            move_uploaded_file($this->residentData['burials_img_grave1']['tmp'], $fileDestination);
                        }

                    }
                    //image 3 upload after db success
                    if (isset($this->residentData['burials_img_grave2']['name'])){
                        if (isset($this->oldResidentData['burials_img_grave2'])){
                            $fileDestination = '../public/'.$this->oldResidentData['burials_img_grave2'];
                            move_uploaded_file($this->residentData['burials_img_grave2']['tmp'], $fileDestination);
                        }else {
                            $fileDestination = '../public/'.$this->residentData['burials_img_grave2']['name'];
                            move_uploaded_file($this->residentData['burials_img_grave2']['tmp'], $fileDestination);
                        }

                    }
                }        
            }
                            
            // return the success flag
            return $isSaved;
        }
        function validate(){
            $isValid = true; //validation flag
            //regular expressions
            $regex = "/[!@#$%^&*(),.?:_+={}|<>]/";
            $regexTextArea = "/[@#$%^&*().:_+={}|<>]/";

            //burials_first_name
                if (empty($this->residentData['burials_first_name'])){
                    //empty input
                    $isValid = false;
                    $this->errors['burials_first_name'] = "A First Name is required";
                } else {
                    if (preg_match($regex, $this->residentData['burials_first_name'])){
                        //special characters found
                        $isValid = false;
                        $this->errors['burials_first_name'] = "No special characters";
                    } else {
                        if (strlen($this->residentData['burials_first_name']) > 100){
                            //character limit
                            $isValid = false;
                            $this->errors['burials_first_name'] = "100 character limit";
                        }
                    }
                }
            //burials_middle_name
                if (preg_match($regex, $this->residentData['burials_middle_name'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_middle_name'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_middle_name']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_middle_name'] = "100 character limit";
                    }
                }
            //burials_last_name
                if (preg_match($regex, $this->residentData['burials_last_name'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_last_name'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_last_name']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_last_name'] = "100 character limit";
                    }
                }
            //burials_birth_year
                if (!empty($this->residentData['burials_birth_year'])){
                    if (preg_match($regex, $this->residentData['burials_birth_year'])){
                        //special characters found
                        $isValid = false;
                        $this->errors['burials_birth_year'] = "No special characters";
                    } else {
                        if (!is_numeric($this->residentData['burials_birth_year'])){
                            //must be numeric
                            $isValid = false;
                            $this->errors['burials_birth_year'] = "must be numeric";
                        } else {
                            if (strlen($this->residentData['burials_birth_year']) > 4){
                                //character limit
                                $isValid = false;
                                $this->errors['burials_birth_year'] = "4 character limit";
                            }else {
                                if ($this->residentData['burials_birth_year'] < 1){
                                    //no negatives
                                    $isValid = false;
                                    $this->errors['burials_birth_year'] = "no negative numbers";
                                }
                            }
                        }
                    }
                }
            //burials_death_year
                if (!empty($this->residentData['burials_death_year'])){
                    if (preg_match($regex, $this->residentData['burials_death_year'])){
                        //special characters found
                        $isValid = false;
                        $this->errors['burials_death_year'] = "No special characters";
                    } else {
                        if (!is_numeric($this->residentData['burials_death_year'])){
                            //must be numeric
                            $isValid = false;
                            $this->errors['burials_death_year'] = "must be numeric";
                        } else {
                            if (strlen($this->residentData['burials_death_year']) > 4){
                                //character limit
                                $isValid = false;
                                $this->errors['burials_death_year'] = "4 character limit";
                            } else {
                                if ($this->residentData['burials_death_year'] < 1){
                                    //no negatives
                                    $isValid = false;
                                    $this->errors['burials_death_year'] = "no negative numbers";
                                }
                            }
                        }
                    }
                }
            //burials_interment_year
                if (!empty($this->residentData['burials_interment_year'])){
                    if (preg_match($regex, $this->residentData['burials_interment_year'])){
                        //special characters found
                        $isValid = false;
                        $this->errors['burials_interment_year'] = "No special characters";
                    } else {
                        if (!is_numeric($this->residentData['burials_interment_year'])){
                            //must be numeric
                            $isValid = false;
                            $this->errors['burials_interment_year'] = "must be numeric";
                        } else {
                            if (strlen($this->residentData['burials_interment_year']) > 4){
                                //character limit
                                $isValid = false;
                                $this->errors['burials_interment_year'] = "4 character limit";
                            } else {
                                if ($this->residentData['burials_interment_year'] < 1){
                                    //no negatives
                                    $isValid = false;
                                    $this->errors['burials_interment_year'] = "no negative numbers";
                                }
                            }
                        }
                    }
                }
            //burials_plot_row
                if (!empty($this->residentData['burials_plot_row'])){
                    if (preg_match($regex, $this->residentData['burials_plot_row'])){
                        //special characters found
                        $isValid = false;
                        $this->errors['burials_plot_row'] = "No special characters";
                    } else {
                        if (!is_numeric($this->residentData['burials_plot_row'])){
                            //must be numeric
                            $isValid = false;
                            $this->errors['burials_plot_row'] = "must be numeric";
                        } else {
                            if (strlen($this->residentData['burials_plot_row']) > 5){
                                //character limit
                                $isValid = false;
                                $this->errors['burials_plot_row'] = "5 character limit";
                            } else {
                                if ($this->errors['burials_plot_row'] < 1){
                                    //no negatives
                                    $isValid = false;
                                    $this->errors['burials_plot_row'] = "no negative numbers";
                                }
                            }
                        } 
                    }
                }
            //burials_plot_number
                if (!empty($this->residentData['burials_plot_number'])){
                    if (preg_match($regex, $this->residentData['burials_plot_number'])){
                        //special characters found
                        $isValid = false;
                        $this->errors['burials_plot_number'] = "No special characters";
                    } else {
                        if (!is_numeric($this->residentData['burials_plot_number'])){
                            //must be numeric
                            $isValid = false;
                            $this->errors['burials_plot_number'] = "must be numeric";
                        } else {
                            if (strlen($this->residentData['burials_plot_number']) > 5){
                                //character limit
                                $isValid = false;
                                $this->errors['burials_plot_number'] = "5 character limit";
                            } else {
                                if ($this->errors['burials_plot_number'] < 1){
                                    //no negatives
                                    $isValid = false;
                                    $this->errors['burials_plot_number'] = "no negative numbers";
                                }
                            }
                        } 
                    }
                }
            //burials_birthplace_city
                if (preg_match($regex, $this->residentData['burials_birthplace_city'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_birthplace_city'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_birthplace_city']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_birthplace_city'] = "100 character limit";
                    }
                }
            //burials_veteran_branch
                if (preg_match($regex, $this->residentData['burials_veteran_branch'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_veteran_branch'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_veteran_branch']) > 25){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_veteran_branch'] = "25 character limit";
                    }
                }
            //burials_veteran_rank
                if (preg_match($regex, $this->residentData['burials_veteran_rank'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_veteran_rank'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_veteran_rank']) > 25){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_veteran_rank'] = "25 character limit";
                    }
                }
            //burials_veteran_service_time
                if (preg_match($regex, $this->residentData['burials_veteran_service_time'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_veteran_service_time'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_veteran_service_time']) > 25){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_veteran_service_time'] = "25 character limit";
                    }
                }
            //burials_spouse_first_name
                if (preg_match($regex, $this->residentData['burials_spouse_first_name'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_spouse_first_name'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_spouse_first_name']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_spouse_first_name'] = "100 character limit";
                    }
                }
            //burials_spouse_middle_name
                if (preg_match($regex, $this->residentData['burials_spouse_middle_name'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_spouse_middle_name'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_spouse_middle_name']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_spouse_middle_name'] = "100 character limit";
                    }
                }
            //burials_spouse_last_name
                if (preg_match($regex, $this->residentData['burials_spouse_last_name'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_spouse_last_name'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_spouse_last_name']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_spouse_last_name'] = "100 character limit";
                    }
                }
            //burials_mother_first_name
                if (preg_match($regex, $this->residentData['burials_mother_first_name'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_mother_first_name'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_mother_first_name']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_mother_first_name'] = "100 character limit";
                    }
                }
            //burials_mother_middle_name
                if (preg_match($regex, $this->residentData['burials_mother_middle_name'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_mother_middle_name'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_mother_middle_name']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_mother_middle_name'] = "100 character limit";
                    }
                }
            //burials_mother_last_name
                if (preg_match($regex, $this->residentData['burials_mother_last_name'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_mother_last_name'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_mother_last_name']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_mother_last_name'] = "100 character limit";
                    }
                }
            //burials_father_first_name
                if (preg_match($regex, $this->residentData['burials_father_first_name'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_father_first_name'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_father_first_name']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_father_first_name'] = "100 character limit";
                    }
                }
            //burials_father_middle_name
                if (preg_match($regex, $this->residentData['burials_father_middle_name'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_father_middle_name'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_father_middle_name']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_father_middle_name'] = "100 character limit";
                    }
                }
            //burials_father_last_name
                if (preg_match($regex, $this->residentData['burials_father_last_name'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_father_last_name'] = "No special characters";
                } else {
                    if (strlen($this->residentData['burials_father_last_name']) > 100){
                        //character limit
                        $isValid = false;
                        $this->errors['burials_father_last_name'] = "100 character limit";
                    }
                }
            //burials_children_names
                if (preg_match($regex, $this->residentData['burials_children_names'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_children_names'] = "No special characters";
                }
            //burials_obituary
                if (preg_match($regexTextArea, $this->residentData['burials_obituary'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_obituary'] = "No special characters";
                }
            //burials_family_notes
                if (preg_match($regexTextArea, $this->residentData['burials_family_notes'])){
                    //special characters found
                    $isValid = false;
                    $this->errors['burials_family_notes'] = "No special characters";
                }

            //burials_img_deceased
            if (!empty($_FILES['burials_img_deceased']['name'])){
                if (!$this->handleImage($_FILES['burials_img_deceased'], 'burials_img_deceased')){
                    //failed image validation
                    //echo "inside";
                    $isValid = false;
                }
             }
            //burials_img_grave1
            if (!empty($_FILES['burials_img_grave1']['name'])){
                if (!$this->handleImage($_FILES['burials_img_grave1'], 'burials_img_grave1')){
                    //failed image validation
                    $isValid = false;
                }
            }
            //burials_img_grave2
            if (!empty($_FILES['burials_img_grave2']['name'])){
                if (!$this->handleImage($_FILES['burials_img_grave2'], 'burials_img_grave2')){
                    //failed image validation
                    $isValid = false;
                }
            }
            echo $isValid;
            return $isValid;

        }
        function handleImage($imageArray, $imageName){ //validates and if valid prepares the image for moving/uploading

            $fileName = $imageArray['name'];
            $fileTmpName = $imageArray['tmp_name'];
            $fileSize = $imageArray['size'];
            $fileError = $imageArray['error'];
            $fileType = $imageArray['type'];

            $fileExt = explode('.', $fileName);

            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowed)){
                if ($fileError === 0){
                    if ($fileSize < 1000000){
                        $imageFinal['tmp'] = $fileTmpName;
                        $imageFinal['name'] = "images/".uniqid('', true).".".$fileActualExt;
                        //saving image for upload
                        $this->residentData[$imageName] = $imageFinal;
                        return true;
                        // $fileDestination = '../public/images/'.$fileNameNew;
                        // move_uploaded_file($fileTmpName, $fileDestination);
                    }else {
                        //your file is too big
                        $this->errors[$imageName] = "file is too big";

                        return false;
                    }
                }else {
                    //there was an error uploading your file
                    $this->errors[$imageName] = "there was an error processing this file";

                    return false;
                }

            }else {
                //you cannot upload files of this type!
                $this->errors[$imageName] = "invalid file type. Try jpg/jpeg/png";

                return false;
            }
        }

        function getList(
            $firstName  = null,
            $lastName = null,
            $deathYear = null
        ) {
           
            $burialList = array();
            //var_dump($page,$filterColumn);
            // TODO: get the news articles and store into $articleList
           
            $sql = "SELECT * FROM cemetery_burials WHERE burials_first_name LIKE ? AND burials_last_name LIKE ?";
            if ($deathYear != "") 
                $sql .= ' AND burials_death_year LIKE ?';
            $stmt = $this->db->prepare($sql);//var_dump($deathYear);

            if ($deathYear != "") 
                $stmt->execute(array('%'.$firstName.'%','%'.$lastName.'%','%'.$deathYear.'%'));
            else 
                $stmt->execute(array('%'.$firstName.'%','%'.$lastName.'%'));//var_dump($stmt->rowCount());
//var_dump($deathYear);
            if ($stmt->rowCount() >= 1) {
                $burialList = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return $burialList; // return the list of residents
         
        }

        function saveImage($fileArray) {
            move_uploaded_file($fileArray['tmp_name'], dirname(__FILE__) . 
                    "/../public/images/" . $this->burialData['burials-id'] . "_resident.jpg");
        }// adjust this for various pictures to load

} // end class 