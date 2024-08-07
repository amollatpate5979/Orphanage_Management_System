<?php
session_start();
//datbase connection file
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['usrid'])==0)
    {   
header('location:logout.php');
}
else{
// update Process
if(isset($_POST['update']))
{

//Getting User id  
$uid=$_SESSION['usrid'];
// Getting Post values
$fname=$_POST['name'];
$emailid=$_POST['email'];   
$pnumber=$_POST['phonenumber']; 
$gender=$_POST['gender']; 
// query for data updation
$sql="update  tblusers set FullName=:fname,Emailid=:emailid,PhoneNumber=:pnumber,UserGender=:gender where Userid=:uid ";
//preparing the query
$query = $dbh->prepare($sql);
//Binding the values
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':emailid',$emailid,PDO::PARAM_STR);
$query->bindParam(':pnumber',$pnumber,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();

echo "<script>alert('Success : Profile updated Successfully.');</script>";
echo "<script>window.location.href='profile.php'</script>"; 

}

    ?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OMS || Users Profile</title>
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
                        <h3>Profile</h3>
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
                        <h2 class="contact-title">Profile Details</h2>
                    </div>
                    <div class="col-lg-8">
                        <?php 
$uid=$_SESSION['usrid'];
$sql = "SELECT * from  tblusers where Userid=:uid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':uid',$uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{    ?> 
                        <form class="form-contact contact_form"  method="post" novalidate="novalidate">
                            <div class="row">
                             
                               
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo htmlentities($result->FullName);?>" required="true">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Username <small style="color:red;">(Can't be change)</small></label>
                                        <input type="text" class="form-control" name="username" id="username" value="<?php echo htmlentities($result->UserName);?>" readonly="true" >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required="true" value="<?php echo htmlentities($result->Emailid);?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="tel"  pattern="[0-9]{10}" title="10 numeric characters only" class="form-control" name="phonenumber" maxlength="10" required="true" value="<?php echo htmlentities($result->PhoneNumber);?>">
                                    </div>
                                </div>
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender" required="true">
<option value="<?php echo htmlentities($result->UserGender);?>"><?php echo htmlentities($result->UserGender);?></option>    
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Transgender">Transgender</option>
</select>
                                    </div>
                                </div>
                            </div><?php }} ?>
                            <div class="form-group mt-3">
                                <button type="submit" class="genric-btn primary e-large" id="update" name="update">Update</button>
                            </div>
                        </form>
                         
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
    
    </html><?php } ?>