<?php
require_once "config/config.php";
$qset=$db->query("select * from setting");
$rset=$qset->fetch(PDO::FETCH_OBJ);
//echo "under Maintenance"; die;

//Set Default Semester
if(empty($_SESSION["kdsemester"])){
$qs=$db->prepare("select * from semester where used='Y'");$qs->execute();
$rs=$qs->fetch();
$_SESSION["kdsemester"]=$rs["kdsemester"];
}

$foto="pp_default.jpg";
$nama="Jhon";$email="jhon@upgris.ac.id";

?>
<!DOCTYPE html>
<!-- 
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.0.0
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Login - - SmartAdmin v4.0.1
        </title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="<?php echo baseurl();?>assets/smartadmin/css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="<?php echo baseurl();?>assets/smartadmin/css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo baseurl();?>assets/smartadmin/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo baseurl("uploads/$rset->icon"); ?>">
        <link rel="mask-icon" href="<?php echo baseurl();?>assets/smartadmin/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-inner bg-brand-gradient">
                <div class="page-content-wrapper bg-transparent m-0">
                    <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                        <div class="d-flex align-items-center container p-0">
                            <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                                <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                                    <img src="<?php echo baseurl("uploads/$rset->logo");?>" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                    <span class="fs-xxl fw-500 text-white ml-3 mr-1">SIJITU</span>
                                </a>
                            </div>
                          
                        </div>
                    </div>
                    <div class="flex-1" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                            <div class="row">
                                <div class="col col-md-6 col-lg-7 hidden-sm-down">
                                    <h2 class="fs-xxl fw-500 mt-5 text-white">
                                        The simplest UI toolkit for developers &amp; programmers
                                        <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
                                            Presenting you with the next level of innovative UX design and engineering. The most modular toolkit available with over 600+ layout permutations. Experience the simplicity of SmartAdmin, everywhere you go!
                                        </small>
                                    </h2>
                                   
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                                    <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                                        Secure login
                                    </h1>
                                    <div class="card p-4 rounded-plus bg-faded">
                                        <?php 
                                        if(isset($_POST['login'])) {
                                            $user = trim(mysqli_real_escape_string($dbli, $_POST['user']));
                                            $pass = sha1(trim(mysqli_real_escape_string($dbli, $_POST['pass'])));
                                            $sql_login = mysqli_query($dbli, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'") or die (mysqli_error($dbli));
                                            if (mysqli_num_rows($sql_login) > 0) {
                                                $_SESSION['user'] = $user;
                                                echo "<script>window.location='".baseurl("angket-t002")."';</script>";
                                               
                                            } else{
                                                echo "gagal";
                                                
                                            }
                                        }
                                        
                                        ?>
                                        <form id="js-login" method="post" novalidate="" action="">
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="email" id="username" class="form-control form-control-lg" placeholder="your id or email" value="" name="user" required>
                                                <div class="invalid-feedback">No, you missed this one.</div>
                                                <div class="help-block">Your unique username to app</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" id="password" class="form-control form-control-lg" placeholder="password" value="" name="pass" required>
                                                <div class="invalid-feedback">Sorry, you missed this one.</div>
                                                <div class="help-block">Your password</div>
                                            </div>
                                            <button type='submit' id='login' class="btn btn-primary btn-block btn-lg" name="login">Login Now</button>
                                            <!-- <div class="row no-gutters">
                                                <div class="col-lg-6 pr-lg-1 my-2">
                                                    <button type="submit" class="btn btn-info btn-block btn-lg">Sign in with <i class="fab fa-google"></i></button>
                                                </div>
                                                <div class="col-lg-6 pl-lg-1 my-2">
                                                    <button id="js-login-btn" type="submit" class="btn btn-danger btn-block btn-lg">Secure login</button>
                                                </div>
                                            </div> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                                2019 © SmartAdmin by&nbsp;<a href='https://www.gotbootstrap.com' class='text-white opacity-40 fw-500' title='gotbootstrap.com' target='_blank'>gotbootstrap.com</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- base vendor bundle: 
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            $("#js-login-btn").click(function(event)
            {

                // Fetch form to apply custom Bootstrap validation
                var form = $("#js-login")

                if (form[0].checkValidity() === false)
                {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.addClass('was-validated');
                // Perform ajax submit here...
            });

        </script>
    </body>
</html>
