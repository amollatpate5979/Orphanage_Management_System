<?php
session_start();
error_reporting(0);
include('includes/config.php');
// Code for change password 
if(isset($_POST['submit']))
  {
    $username=$_POST['username'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT UserName FROM tblusers WHERE UserName=:username and PhoneNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblusers set UserPassword=:newpassword where UserName=:username and PhoneNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
   
    <title>OMS || Forgot Password</title>
    
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
    <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
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
                        <h3>Forgot Password</h3>
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
                        <h2 class="contact-title">User Forgot Password (Password Recovery)</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form"  method="post" name="chngpwd" onSubmit="return valid();">
                            <div class="row">
                             
                               
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <input type="text" class="form-control" placeholder="Username" name="username" required="true">
                                    </div>
                                </div>
                              

                                <div class="col-12" style="padding-top: 20px;">
                                    <div class="form-group">
                                        <input type="text" name="mobile" placeholder="Reg Phone Number"  class="form-control" required /> 
                                       
                                    </div>
                                </div>
                                <div class="col-12" style="padding-top: 20px;">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="newpassword" placeholder="New Password" required="true"/> 
                                       
                                    </div>
                                </div>
                                <div class="col-12" style="padding-top: 20px;">
                                    <div class="form-group">
                                       <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required="true"/>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="genric-btn primary e-large" name="submit">Reset</button>
                            </div>
                        </form>
                         Already Registered <a href="signin.php" > Sign In</a>
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