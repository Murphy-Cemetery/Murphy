<?php 

class Residents {
    var $burialsData = array();    // hold data from array
    var $errors = array();          // for errors
    var $db = null;
    var $errMessage ="";
    var $message ="";



    function __construct() {
        // create a connection to our database
        $this->db = new PDO('mysql:host=localhost;dbname=murphy_cemetery;charset=utf8', 
            'root', '');           
    }

    // takes a keyed array and sets our internal data representation to the array
    function set($dataArray)
    {
        $this->burialsData = $dataArray;

    }

    function logout() {
        session_start();	//provide access to the current session
        session_unset();	//remove all session variables related to current session
        session_destroy();	//remove current session
        $this->message = "You were logged out.";
    }// end logout

    function delete($burialID) {
            $stmt = $this->db->prepare("DELETE FROM cemetery_burials WHERE burials_id = ?");
            $stmt->execute(array($burialsID));
    }



    function login($userName,$userPW) {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE user_name = ? AND user_password = ?");
        $stmt->execute(array($userName, $userPW));
       
        if ($stmt->rowCount() == 1) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            
            if ($row['username'] === $userName) {
                $_SESSION['user'] = $row['userId'];				//this is a valid user so set your SESSION variable
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
        $this->residentData['burials_first_name']=filter_var($this->residentData['burials_first_name'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_middle_name']=filter_var($this->residentData['burials_middle_name'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_last_name']=filter_var($this->residentData['burials_last_name'],FILTER_SANITIZE_STRING);
        // $this->residentData['burials_dob']=filter_var($this->residentData['burials_dob'],FILTER_SANITIZE_ENCODED); 
        $this->residentData['burials_birth_year']=filter_var($this->residentData['burials_birth_year'],FILTER_VALIDATE_INT);
        $this->residentData['burials_birth_city']=filter_var($this->residentData['burials_birth_city'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_birth_state']=filter_var($this->residentData['burials_birth_state'],FILTER_SANITIZE_STRING);
        // $this->residentData['burials_date_of_death']=filter_var($this->residentData['burials_date_of_death'],FILTER_SANITIZE_ENCODED); 
        $this->residentData['burials_death_year']=filter_var($this->residentData['burials_death_year'],FILTER_VALIDATE_INT);
        $this->residentData['burials_plot_row']=filter_var($this->residentData['burials_plot_row'],FILTER_VALIDATE_INT);
        $this->residentData['burials_plot_number']=filter_var($this->residentData['burials_plot_number'],FILTER_VALIDATE_INT);
        // $this->residentData['burials_interment_date']=filter_var($this->residentData['burials_interment_date'],FILTER_SANITIZE_ENCODED); 
        $this->residentData['burials_interment_year']=filter_var($this->residentData['burials_interment_year'],FILTER_VALIDATE_INT);
        $this->residentData['burials_veteran']=filter_var($this->residentData['burials_veteran'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_veteran_branch']=filter_var($this->residentData['burials_veteran_branch'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_veteran_rank']=filter_var($this->residentData['burials_veteran_rank'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_veteran_service_time']=filter_var($this->residentData['burials_veteran_service_time'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_spouse_first_name']=filter_var($this->residentData['burials_spouse_first_name'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_spouse_middle_name']=filter_var($this->residentData['burials_spouse_middle_name'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_spouse_last_name']=filter_var($this->residentData['burials_spouse_last_name'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_children_names']=filter_var($this->residentData['burials_children_names'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_mother_first_name']=filter_var($this->residentData['burials_mother_first_name'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_mother_middle_name']=filter_var($this->residentData['burials_mother_middle_name'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_mother_last_name']=filter_var($this->residentData['burials_mother_last_name'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_father_first_name']=filter_var($this->residentData['burials_father_first_name'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_father_middle_name']=filter_var($this->residentData['burials_father_middle_name'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_father_last_name']=filter_var($this->residentData['burials_father_last_name'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_img_deceased']=filter_var($this->residentData['burials_img_deceased'],FILTER_SANITIZE_URL);
        $this->residentData['burials_img_grave1']=filter_var($this->residentData['burials_img_grave1'],FILTER_SANITIZE_URL);
        $this->residentData['burials_img_grave2']=filter_var($this->residentData['burials_img_grave2'],FILTER_SANITIZE_URL);
        $this->residentData['burials_obituary']=filter_var($this->residentData['burials_obituary'],FILTER_SANITIZE_STRING);
        $this->residentData['burials_family_notes']=filter_var($this->residentData['burials_family_notes'],FILTER_SANITIZE_STRING);


        return $dataArray;
    }// end sanitize



        // load a news article based on an id
        function load($burialsID) {
            // flag to track if the article was loaded
            $isLoaded = false;//var_dump($burialsID);
    
            // load from database
            // create a prepared statement (secure programming)
            $stmt = $this->db->prepare("SELECT * FROM cemetery_burials WHERE burials_id = ?");
            
            // execute the prepared statement passing in the id of the article we 
            // want to load
            $stmt->execute(array($burialsID));    //var_dump($stmt->rowCount());

            // check to see if we loaded the article
            if ($stmt->rowCount() == 1) {
                // if we did load the article, fetch the data as a keyed array
                $burialsData = $stmt->fetch(PDO::FETCH_ASSOC);
                //var_dump($dataArray);
                
                // set the data to our internal property            
                $this->set($burialsData);
                            
                // set the success flag to true
                $isLoaded = true;
            }
            //var_dump($stmt->rowCount());    
            return $isLoaded;  // return success or failure
        } // end load 



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
                    "/../public/images/" . $this->burialData['burials_id'] . "_resident.jpg");
        }// adjust this for various pictures to load

} // end class 