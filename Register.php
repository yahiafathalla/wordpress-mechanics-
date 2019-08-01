<?php 
    session_start();
    include('functions.php');
    register();
    if(isset($_SESSION['user_id'])){
      header('Location: home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/bootstrap.css">
        
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Register</h3>
          </div>
          <div class="panel-body">
            <?php if(isset($msg) && !empty($msg)):?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <ul>
                    <?php foreach($msg as $key => $error): ?>
                      <?php if($key == ('Firstname' || 'Lastname' || 'email' ||  'password' ||  'password_2'  || 'city'  || 'fields_required' || 'email_exist' ||  'insert_error')): ?>
                        <li><strong><?php echo $error; ?></strong></li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>  
                </div>
            <?php endif;?>    
            <?php if(isset($msg_success) && !empty($msg_success)):?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <i class="fa fa-check" aria-hidden="true"></i>
                <?php foreach($msg_success as $key => $success): ?>
                  <?php if($key == 'insert_success'): ?>
                    <strong><?php echo $success; ?></strong>
                  <?php endif; ?>  
                <?php endforeach; ?>  
            </div>    
            <?php endif;?>
            <form role="form" method="post">
              <div class="form-group">
                <label for="Firstname">First name*</label>
                <input type="text" name="firstname" class="form-control" id="Firstname">
              </div>
              <div class="form-group">
                <label for="Lastname">Last name</label>
                <input type="text" name="lastname" id="Lastname" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">email*</label>
                <input type="email" id="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="password_1">Password*</label>
                <input type="password" id="password_1" class="form-control" name="password_1">
              </div>
              <div class="form-group">
                <label id="password_2">Confirm password*</label>
                <input type="password" id="password_2" name="password_2" class="form-control">
              </div>
              <div class="form-group">
                <label id="city">city</label>
                <input type="text" id="city" name="city" class="form-control">
              </div>
                    
              <div class="form-group">
                <button type="submit" class="btn btn-success" name="reg_user">Register</button>
              </div>
            </form>
           
          </div>  
        </div>
      </div>
    </div>
  </div>
    <script src="js/jquery.js"></script>
    <script src="js/font-awesome.js"></script>
  </body>
</html>