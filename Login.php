<?php 
    session_start();
    include('functions.php');
    login();   
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/bootstrap.css">    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                     <?php if(isset($msg)): ?>
                            <?php echo $msg; ?>
                        <?php endif; ?>  
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>

                              <input type="submit" name="login-submit" id="log1"  class="btn btn-lg btn-success btn-block">
                              <br/>
                             <p>Not have account yet?</p>
                              <a class="btn btn-success btn-block btn-lg" href="Register.php">Register</a>
                            </fieldset>
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
