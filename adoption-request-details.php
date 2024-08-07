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
    <title>OMS || Adoption Request Details</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  

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
                        <h3>Adoption Request Details</h3>
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
                        <h2 class="contact-title">Adoption Request Details</h2>
                    </div>
                    <div class="col-lg-12">
                         <?php
     $apid=intval($_GET['apid']);     
$sql = "SELECT tbladoption.ID as aid,tbladoption.Userid,tbladoption.Childid,tbladoption.Requestnumber,tbladoption.Address,tbladoption.Occupation,tbladoption.Income,tbladoption.Reasonforadoption,tbladoption.MaritalStatus,tbladoption.SpouseName,tbladoption.SpousePhonenumber,tbladoption.SpouceEmail,tbladoption.SpouseIncome,tbladoption.SpouseOccupation,tbladoption.IsActive,tbladoption.Remark,tblusers.FullName,tblusers.Emailid,tblusers.PhoneNumber,tblusers.UserGender,tblusers.RegDate,tblusers.IsActive,tblchild.ID,tblchild.IndentificationNumber,tblchild.ChildName,tblchild.ChildGender,tblchild.ChildArrivalDate,tblchild.AllergicIssue,tblchild.BloodGroup,tblchild.Age,tblchild.ChildPhoto,tblchild.IsActive,tblchild.RegDate,tbladoption.Status,tbladoption.RequsetDate from tbladoption join tblusers on tblusers.Userid=tbladoption.Userid join tblchild on tblchild.ID=tbladoption.Childid where tbladoption.ID=:apid";
$query = $dbh -> prepare($sql);
$query->bindParam(':apid',$apid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
    ?>
                       <table width="100%" class="table table-striped table-bordered table-hover" >
<tr>
<th>Request Number</th>    
<td colspan="2"><?php echo htmlentities($row->Requestnumber);?></td>
<th>Adoption Requset Date</th>    
<td colspan="2"><?php echo htmlentities($row->RequsetDate);?></td>

</tr>    
<tr>
    <th colspan="6" style="text-align: center;color: blue;">Requester Details</th>
</tr>
<tr>
<th>Name</th>    
<td colspan="2"><?php echo htmlentities($row->FullName);?></td>
<th>Email</th>    
<td colspan="2"><?php echo htmlentities($row->Emailid);?></td>

</tr> 
<tr>
<th>Phone Number</th>    
<td colspan="2"><?php echo htmlentities($row->PhoneNumber);?></td>
<th>Marital Status</th>    
<td colspan="2"><?php echo htmlentities($row->UserGender);?></td>

</tr> 
<tr>
<th>Address</th>    
<td colspan="2"><?php echo htmlentities($row->Address);?></td>
<th>Occupation</th>    
<td colspan="2"><?php echo htmlentities($row->Occupation);?></td>

</tr> 
<tr>
<th>Income(permonth)</th>    
<td colspan="2"><?php echo htmlentities($row->Income);?></td>
<th>Spouse Name</th>    
<td colspan="2"><?php echo htmlentities($row->SpouseName);?></td>

</tr> 
<tr>
<th>Spouse Phone Number</th>    
<td colspan="2"><?php echo htmlentities($row->SpousePhonenumber);?></td>
<th>Spouce Email</th>    
<td colspan="2"><?php echo htmlentities($row->SpouceEmail);?></td>

</tr> 
<tr>
<th>Spouse Occupation</th>    
<td colspan="2"><?php echo htmlentities($row->SpouseOccupation);?></td>
<th>Spouse Income</th>    
<td colspan="2"><?php echo htmlentities($row->SpouseIncome);?></td>

</tr> 
<tr>
<th>Reason For Adoption</th>    
<td colspan="2"><?php echo htmlentities($row->Reasonforadoption);?></td>
<th>Status</th>    

<td colspan="2"><?php $status=$row->Status;
if($status==""){
echo htmlentities("Not Confirmed yet");    
} else {
echo htmlentities("$status");        
}
?></td>
</tr>

<tr>
    <th colspan="6" style="text-align: center;color: blue;">Child Details</th>
</tr>
<tr>
<th>Child Identifications Number</th>    
<td colspan="2"><?php echo htmlentities($row->IndentificationNumber);?></td>
<th>Child Name</th>    
<td colspan="2"><?php echo htmlentities($row->ChildName);?></td>
</tr> 
<tr>
<th>Child Gender</th>    
<td colspan="2"><?php echo htmlentities($row->ChildGender);?></td>
<th>Child Arrival Date</th>    
<td colspan="2"><?php echo htmlentities($row->ChildArrivalDate);?></td>
</tr>
<tr>
<th>Allergic Issue</th>    
<td colspan="2"><?php echo htmlentities($row->AllergicIssue);?></td>
<th>Blood Group</th>    
<td colspan="2"><?php echo htmlentities($row->BloodGroup);?></td>

</tr>
<tr>
<th>Age</th>    
<td colspan="2"><?php echo htmlentities($row->Age);?></td>
<th>ChildPhoto</th>    
<td colspan="2"><img src="admin/childimages/<?php echo htmlentities($row->ChildPhoto);?>" width="50" height="50"></td>
</tr>
<?php if($row->Remark!=""){?>
<tr>
<th>Admin Remark</th>    
<td colspan="5"><?php echo htmlentities($row->Remark);?></td>
</tr>
<?php } ?>

<?php if($row->UpdationDate!=""){?>
<tr>
<th>Updation Date</th>    
<td colspan="5"><?php echo htmlentities($row->UpdationDate);?></td>
</tr>
<?php } ?>

</table>
                         
      <?php } }?>              </div>
              
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