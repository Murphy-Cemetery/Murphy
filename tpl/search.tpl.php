
<!DOCTYPE html>
<html lang="en">
<head>
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

</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Murphy Cemetery</title>
</head>
<body>

<h1>Search Cemetery</h1>
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
    
</body>
</html>