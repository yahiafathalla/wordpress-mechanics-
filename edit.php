<?php 
  session_start();
  include('functions.php');

  if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
  }

  if(isset($_SESSION['user_id'])){
    update_user_profile($_SESSION['user_id']);
  }
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <!-- Edit Profile -->
  <div class="create-profile">
    <div class="container">
      <div class="row">
        <div class="col-md-8 m-auto">
          <a href="home.php" class="btn btn-light">
            Go Back
          </a>
          <h1 class="display-4 text-center">Edit Your Profile</h1>
          <p class="lead text-center">Let's get some information to make your profile stand out</p>
          <small class="d-block pb-3">* = required field</small>
          <?php if(isset($msg)): ?>
              <?php echo $msg; ?>
          <?php endif; ?>  
          <form action='' method="post">
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Firstname..." name="firstname" />
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Lastname..." name="lastname" />
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-lg" placeholder="Password..." name="password" />
              <small class="form-text text-muted"></small>
            </div>

            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="City..." name="city" />
              <small class="form-text text-muted"></small>
            </div>
           
            <input type="submit" name="submit" class="btn btn-info btn-block mt-4" />
          </form>
        </div>
      </div>
    </div>
  </div>

 

  <script src="js/jquery.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  
  <script src="js.bootstrap.min.js"></script>
  <script src="js/font-awesome.js"></script>
</body>

</html>