<?php
include "inc.php";
if(isset($_SESSION['userId'])): 

  header("location: profile.php");
  
  endif; 
$validation = new validation;
$queries    = new queries;

if(isset($_POST['login'])){

  $validation->validate('email', 'Email', 'required');
  $validation->validate("password", 'Password', 'required');
  if($validation->run()){
    
    $email = $validation->input('email');
    $password = $validation->input('password');
    if($queries->query("SELECT * FROM users WHERE email = ? ", [$email])){
      if($queries->count() > 0 ){
        $row = $queries->fetch();
        $userId = $row->id;
        $userName = $row->fullName;
        $dbPassword = $row->password;
        $status     = $row->status;
        if($status == 0){

          $_SESSION['notVerified'] = "Please verify your email and try again";

        } else {
       if(password_verify($password, $dbPassword)){

        $_SESSION['userId'] = $userId;
        $_SESSION['userName'] = $userName;
        header("location: profile.php");

       } else {
         $validation->errors['password'] = "Sorry invalid password";
       }
      }

      } else {
        $validation->errors['email'] = "Sorry invalid email";
      }
    }

  }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <?php include "components/styles.php"; ?>
</head>
<body>
  <?php include "components/nav.php"; ?> 
  <div class="container">
  <div class="row mt-5">
  <div class="col-md-5">
    <?php if(isset($_SESSION['accountCreated'])): ?>
      <div class="alert alert-success">
        <?php echo $_SESSION['accountCreated']; ?>
      </div>
<?php endif; ?>
<?php unset($_SESSION['accountCreated']); ?>

<!-- User account has been verified successfully -->
<?php if(isset($_SESSION['emailVerified'])): ?>
      <div class="alert alert-success">
        <?php echo $_SESSION['emailVerified']; ?>
      </div>
<?php endif; ?>
<?php unset($_SESSION['emailVerified']); ?>


<?php if(isset($_SESSION['notVerified'])): ?>
      <div class="alert alert-danger">
        <?php echo $_SESSION['notVerified']; ?>
      </div>
<?php endif; ?>
<?php unset($_SESSION['notVerified']); ?>
  <div class="card">
  <div class="card-body">
  <form action="" method="POST">
  <div class="form-group">
  <h3>Login Form</h3>
  </div>
  <!-- Close form-group -->
  <div class="form-group">
  <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php if($validation->input('email')): echo $validation->input('email'); endif; ?>">
  <div class="error">
  <?php if(!empty($validation->errors['email'])): echo $validation->errors['email']; endif; ?>
  </div>
  </div>
  <!-- Close form-group -->

  <div class="form-group">
  <input type="password" name="password" class="form-control" placeholder="Create new password">
  <div class="error">
  <?php if(!empty($validation->errors['password'])): echo $validation->errors['password']; endif; ?>
  </div>
  </div>
  <!-- Close form-group -->

  <div class="form-group">
  <input type="submit" name="login" class="btn btn-info" value="Login &rarr;" style="background: #7B68EE!important;">
  </div>
  <!-- Close form-group -->
  </form>
  <!-- Close form -->
  </div>
  <!-- Close card-body -->
  </div>
  <!-- Close card -->
  </div>
  <!-- Close col-md-5 -->
  <div class="col-md-5 text-white ml-auto">
   <h1>Login Form</h1><hr>
   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum adipisci tempora sit voluptas inventore illum aliquam quod, incidunt quas dolorem modi hic earum est quidem molestias optio repellat id ipsum.</p>
  </div>
  <!-- Close col-md-5 -->
  </div>
  <!-- Close row -->
  </div>
   <!-- Close container -->
</body>
</html>