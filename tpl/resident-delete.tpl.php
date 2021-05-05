<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Murphy Project</title>
<meta name="author" content="David Kopf">
<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>
<form method="post" name="deleteForm" action="resident-delete.php?deleteID=<?php echo $deleteRecID; ?>" >
<?php 
    if (isset($_POST['deleteResident']) )  {   ?>
        <h2 ><?php echo ($resident->message); ?></h2>
        <p><a href="../tpl/search.tpl.php" id="deleted">Back to Search</a></p> <?php }

    else { ?>
        <div class="resident">
            <h3>First Name: <?php if(isset($residentDataArray['burials_first_name'])) echo ($residentDataArray['burials_first_name'].' ');?></h3>
            <h3>Middle Name:<?php if(isset($residentDataArray['burials_middle_name'])) echo ($residentDataArray['burials_middle_name'].' ');?></h3>
            <h3>Last Name:<?php if(isset($residentDataArray['burials_last_name'])) echo ($residentDataArray['burials_last_name'].' ');?></h3>
            <h3>Day of Death:<?php if(isset($residentDataArray['burials_date_of_death'])) echo ($residentDataArray['burials_date_of_death'].' ');?></h3>
        </div>
        <form method="post" name="deleteForm" action="deleteRecipe.php?recId=<?php echo $deleteRecID; ?>" >
            <h2>Are you SURE you want to delete this resident?</h2>
            <h2>You cannot undo this!</h2>
            <input name="deleteResident" value="Delete Resident" type="submit" />
            <a href="../tpl/search.tpl.php"><button type='button'>Cancel</button></a>
        </form>
        <?php } ?>
</body>