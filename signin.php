
<?php
session_start();
error_reporting(0);
include('includes/config.php');
//Process for Sign
if(isset($_POST['signin']))
{
//Getting Post Values
$uname=$_POST['username'];
$password=md5($_POST['password']);
// Quer for signing matching username and password with db details
$sql ="SELECT Userid,IsActive FROM tblusers WHERE UserName=:uname and UserPassword=:password";
//preparing the query
$query= $dbh -> prepare($sql);
//Binding the values
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
//Execute the query
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->IsActive;
    $uid=$result->Userid;
  } 
if($status==0)
{
echo "<script>alert('Your account is Inactive. Please contact admin');</script>";
} else{
    $_SESSION['usrid']=$uid;
echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
} }
else{
  echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OMS || Signin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


    <!-- header-start -->
 <?php include_once('includes/header.php');?>
    <!-- header-end -->

    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Login</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
               
    
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">For Already Registered Users</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form"  method="post" novalidate="novalidate">
                            <div class="row">
                             
                               
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <input type="text" class="form-control" placeholder="Username" name="username" required="true">
                                    </div>
                                </div>
                                <a href="forgot-password.php" style="color:blue;">Forgot Password ?</a>

                                <div class="col-12" style="padding-top: 20px;">
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password"  class="form-control" required /> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="genric-btn primary e-large" name="signin">Send</button>
                            </div>
                        </form>
                         Not Register yet ? <a href="signup.php" > Signup here</a>
                    </div>
              
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    

    <!-- footer_start  -->
    <?php include_once('includes/footer.php');?>
    <!-- footer_end  -->
    
        <!-- JS here -->
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/scrollIt.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/nice-select.min.js"></script>
        <script src="js/jquery.slicknav.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/gijgo.min.js"></script>
    
        <!--contact js-->
        <script src="js/contact.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/mail-script.js"></script>
    
        <script src="js/main.js"></script>
        <script>
            $('#datepicker').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                 rightIcon: '<span class="fa fa-caret-down"></span>'
             }
            });
            $('#datepicker2').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                 rightIcon: '<span class="fa fa-caret-down"></span>'
             }
    
            });
        </script>
    </body>
    
    </html>