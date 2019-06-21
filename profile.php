<?php include "inc.php"; ?>
<?php if(!isset($_SESSION['userId'])): 

header("location: login.php");

endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <?php include "components/styles.php" ?>
</head>
<body>
   <?php include "components/nav.php"; ?>
   
   <div class="jumbotron jumb">
       <h1>Hello . <?php echo $_SESSION['userName']; ?></h1>
   </div>
   
</body>
</html>