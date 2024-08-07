<?php
//datbase connection file
include('includes/config.php');
error_reporting(0);
// Signup Process
if(isset($_POST['signup']))
{

// Getting Post values
$fname=$_POST['name'];
$uname=$_POST['username'];
$emailid=$_POST['email'];   
$pnumber=$_POST['phonenumber']; 
$gender=$_POST['gender']; 
$password=md5($_POST['pass']);  
$status=1;
// query for data insertion
$sql="INSERT INTO tblusers(FullName,UserName,Emailid,PhoneNumber,UserGender,UserPassword,IsActive) VALUES(:fname,:uname,:emailid,:pnumber,:gender,:password,:status)";
//preparing the query
$query = $dbh->prepare($sql);
//Binding the values
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);
$query->bindParam(':emailid',$emailid,PDO::PARAM_STR);
$query->bindParam(':pnumber',$pnumber,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
//Execute the query
$query->execute();
//Check that the insertion really worked
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Success : User signup successfull. Now you can signin');</script>";
echo "<script>window.location.href='signin.php'</script>";  
}
else 
{
echo "<script>alert('Error : Something went wrong. Please try again');</script>";   
}

}

    ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OMS || Registration</title>
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
    <script>
function checkusernameAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'uname='+$("#username").val(),
type: "POST",
success:function(data){
$("#username-availabilty-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
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
                        <h3>Registrations Page</h3>
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
                        <h2 class="contact-title">Registere with Us Users</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="" method="post" name="signup">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name" required="true">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Username"  name="username" id="username" required="true" onBlur="checkusernameAvailability()">
                                       <span id="username-availabilty-status" style="font-size:14px;"></span> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email Id" class="form-control" name="email" required="true">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="tel" placeholder="Phone Number" pattern="[0-9]{10}" title="10 numeric characters only" class="form-control" name="phonenumber" maxlength="10" required="true">
                                    </div>
                                </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                        <select name="gender" required="true" class="form-control">
<option value="">Select Gender</option> 
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Transgender">Transgender</option>
</select>
                                    </div>
                                </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" class="form-control" placeholder="Password" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" class="info" required /> 
<span style="font-size:11px; color:red">Password atleast one number and one uppercase and lowercase letter, and at least 6 or more characters</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="genric-btn primary e-large" name="signup">Register</button>
                            </div>
                        </form>
                        <div class="col-xs-12 mt30">
 <div class="input-box post-comment" style="color:blue;"> 
   Already Regsiter<a href="signin.php" > Signin</a>
</div>
</div>
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