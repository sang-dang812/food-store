<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))  
{
	header('location:login.php');
}
else
{
    if(isset($_POST['submit'] ))
    {
        
            
        
        $mql = "update users set username='$_POST[uname]', f_name='$_POST[fname]', l_name='$_POST[lname]',email='$_POST[email]',phone='$_POST[phone]',password='$_POST[password]' where u_id='".$_SESSION['user_id']."' ";
        mysqli_query($db, $mql);
                $success = 	'<div class="alert alert-success alert-dismissible fade show">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <strong>User Updated!</strong></div>';
        //echo "<h1>ABC</h1>";
    }
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>My Orders</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css" rel="stylesheet">
    .indent-small {
        margin-left: 5px;
    }

    .form-group.internal {
        margin-bottom: 0;
    }

    .dialog-panel {
        margin: 10px;
    }

    .datepicker-dropdown {
        z-index: 200 !important;
    }

    .panel-body {
        background: #e5e5e5;
        /* Old browsers */
        background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* FF3.6+ */
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
        /* Chrome,Safari4+ */
        background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* Chrome10+,Safari5.1+ */
        background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* Opera 12+ */
        background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* IE10+ */
        background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
        /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
        font: 600 15px "Open Sans", Arial, sans-serif;
    }

    label.control-label {
        font-weight: 600;
        color: #777;
    }

    
    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {

       
    }
    </style>

</head>

<body>


    <header id="header" class="header-scroll top-header headrom">

        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/hcmut.png" alt="" width="18%"> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>

                        <?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>';
							}
						else
							{
									
									
                                echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
									echo  '<li class="nav-item"><a href="my_account.php" class="nav-link active">My Account</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
							}

						?>

                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <div class="page-wrapper">



        <div class="inner-page-hero bg-image" data-image-src="images/res.jpeg">
            <div class="container"> </div>

        </div>
        <div class="result-show">
            <div class="container">
                <div class="row">


                </div>
            </div>
        </div>

        <?php
            $query = mysqli_query($db,'SELECT * FROM users WHERE u_id = "'.$_SESSION['user_id'].'"');
            if (!mysqli_num_rows($query)>0) {

            }
            else {
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <form class="row g-3 ml-2" action='' method='post'>
                        <h3>Edit your account</h3>
                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <input name="uname" type="text" class="form-control" id="username" value="<?php echo $row['username'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">First name</label>
                            <input name="fname" type="text" class="form-control" id="firstname" value="<?php echo $row['f_name'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Last name</label>
                            <input name="lname" type="text" class="form-control" id="lastname"  value="<?php echo $row['l_name'] ?>">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="text" class="form-control" id="email" value="<?php echo $row['email'] ?>">
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">phone</label>
                            <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $row['phone'] ?>">
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">password</label>
                            <input name="password" type="text" class="form-control" id="password" value="<?php echo $row['password'] ?>">
                        </div>
                        <input type="submit" value="Edit" class="btn btn-purple" name="submit">
                    </form>
                    <?php
                    echo $success;
                }
            }
        ?>


        
        <?php include "include/footer.php" ?>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>
<?php
}
?>