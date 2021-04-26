<html>
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
    </style>
<body>
    <h1>Results</h1>
<?php 
 foreach ($residentList as $burialsData) 
            { ?>
                <div class="resident">
                    <h3>First Name: <?php if(isset($burialsData['burials_first_name'])) echo ($burialsData['burials_first_name'].' ');?></h3>
                    <h3>Middle Name:<?php if(isset($burialsData['burials_middle_name'])) echo ($burialsData['burials_middle_name'].' ');?></h3>
                    <h3>Last Name:<?php if(isset($burialsData['burials_last_name'])) echo ($burialsData['burials_last_name'].' ');?></h3>
                    <h3>Day of Death:<?php if(isset($burialsData['burials_date_of_death'])) echo ($burialsData['burials_date_of_death'].' ');?></h3>

                </div> 
                    <?php } ?>





</body>




</html>

