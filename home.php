<?php   
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: login.php');
    }
    include('functions.php');   
    logout();   
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tooplate-style.css">      
  
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>

    <div class="page-header p-3">
        <h1>Hi, Welcome to our site
            <?php 
                echo !empty($_SESSION['firstname'])?'Mr. '.$_SESSION['firstname']." ":'Guest'." ";
                echo !empty($_SESSION['lastname'])?$_SESSION['lastname']:''; 
            ?>
        </h1>
        <form method="post">
            <button type="submit" name="logout" class="btn btn-block btn-link logoutBtn">Logout</button>
        </form>
        <a href="edit.php" class="btn btn-light">
            <i class="fas fa-user-circle text-info mr-1"></i> Edit Profile
        </a>
    </div>


    <div class="tm-container mx-auto">
        <section class="tm-section tm-section-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tm-bg-circle-white tm-flex-center-v">
                            <header class="text-center">
                                <h1 class="tm-site-title">New SPOT</h1>
                                <p class="tm-site-subtitle">Free HTML one-page template</p>
                            </header>
                            <p>This HTML page features alternating circular spots in a clean and attractive way. You may use this template for any purpose. Photos are from Unsplash website.</p>
                            <p class="text-center mt-4 mb-0">
                                <a data-scroll href="#tm-section-2" class="btn tm-btn-secondary">Continue...</a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="tm-section-2" class="tm-section pt-2 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 tm-flex-center-v tm-text-container tm-section-left">
                        <h2 class="tm-color-secondary mb-4">Lorem ipsum dolor site</h2>
                        <p class="mb-4">Nullam erat dolor, ullamcorper et nisi nec, porta portitor nisi. Quisque lobortis sem ut facilisis
                            mattis. Sed eu pellentesque sapien, a finibus eros. Nunc ut ultricies augue.</p>
                        <p class="mb-5">Mauris sagittis dui arcu, sed luctus metus faucibus nec. Sed vulputate ipsum massa, ut dapibus purus
                            volutpat vel. Interdum et malesuada fames ac ante.</p>
                        <p class="text-right mb-0">
                            <a href="#tm-section-3" class="btn tm-btn-secondary">Continue...</a>
                        </p>
                    </div>
                    <div class="col-xl-7 col-lg-6 tm-circle-img-container">
                        <img src="img/img-01.jpg" alt="Image" class="rounded-circle tm-circle-img">
                    </div>
                </div>
            </div>
        </section>
        <section id="tm-section-3" class="tm-section tm-section-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 tm-section-2-right">
                        <div class="tm-bg-circle-white tm-bg-circle-pad-2 tm-flex-center-v">
                            <header>
                                <h2 class="tm-color-primary">Duis vel vaius eros</h2>
                            </header>
                            <p>In hac habitasse platea dictumst. Ut tristique, purus vitae egestas hendrerit, tellus elit luctus
                                lacus
                            </p>
                            <ul class="dashed">
                                <li>Quisque lobortis sem ut facilisis mattis</li>
                                <li>Sed eu pellentesque sapien</li>
                                <li>Mauris sagittis dui arcu</li>
                                <li>Sed luctus metus faucibus nec</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>              
    </div>

    <script src="js/jquery.js"></script>    
    <script defer src="js/font-awesome.js"></script>

    <script src="js/smooth-scroll.polyfills.min.js"></script>

    <script>
        var scroll = new SmoothScroll('a[href*="#"]', {
            easing: 'easeInOutQuart',
            speed: 800
        });
    </script>

</body>
</html>