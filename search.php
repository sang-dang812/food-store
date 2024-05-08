<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  
error_reporting(0);  
session_start(); 

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <style type="text/css">
    #buttn {
        color: #fff;
        background-color: #5c4ac7;
        border: none;
    }
    </style>
    <title>Home || Online Food Ordering System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>


<body class="home">
    
    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/hcmut.png" alt="" width="18%"> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active fs-24" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>


                        <?php
						if(empty($_SESSION["user_id"])) // if user is not login
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

    <section class="hero bg-image" data-image-src="images/img/canteen-BK.jpeg">
        <div class="hero-inner">
            <div class="container text-center hero-text font-white">
                <h1>FOOD ONLINE ORDERING SYSTEM: BKFOOD </h1>

                <div class="banner-form">
                    <form class="form-inline">

                    </form>
                </div>
                

                </div>

            </div>
        </div>

    </section>

    <section class="popular">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <h2>Những món ăn phổ biến hiện nay:</h2>
                <!-- <p class="lead">Dễ dàng chọn lựa món ăn của riêng bạn với top 6 món ăn được mua nhiềt nhất !</p> -->
                <form action="" method="POST">
                    <input type="text" name="searchbox" placeholder="Tìm kiếm món ăn yêu thích của bạn" style="min-width:300px;">
                    <input type="submit" id="buttn" name="submit" value="Tìm kiếm" />
                </form>
            </div>
            <div class="row">

                <?php 					
						$query_res= mysqli_query($db,"SELECT * FROM dishes WHERE dishes.title like '%".$_POST['searchbox']."%'"); 
                                while($r=mysqli_fetch_array($query_res))
                                {
                                        
                                    echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                            <div class="food-item-wrap">
                                                <div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/'.$r['img'].'"></div>
                                                <div class="content">
                                                    <h5><a href="dishes.php?res_id='.$r['rs_id'].'">'.$r['title'].'</a></h5>
                                                    <div class="product-name">'.$r['slogan'].'</div>
                                                    <div class="price-btn-block"> <span class="price">$'.$r['price'].'</span> <a href="dishes.php?res_id='.$r['rs_id'].'" class="btn theme-btn-dash pull-right">Mua ngay</a> </div>
                                                </div>
                                                
                                            </div>
                                    </div>';                                      
                                }	
						?>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="text-xs-center">
                <h2>Đặt hàng một cách dễ dàng</h2>
                <div class="row how-it-works-solution">
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                        <div class="how-it-works-wrap">
                            <div class="step step-1">
                                <div class="icon" data-step="1">
                                </div>
                                <h3>Chọn 1 nhà hàng yêu thích</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                        <div class="step step-2">
                            <div class="icon" data-step="2">
                            </div>
                            <h3>Chọn món ăn yêu thích</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                        <div class="step step-3">
                            <div class="icon" data-step="3">
                            </div>
                            <h3>Đặt hàng ngay và thưởng thức món ăn của bạn !</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="pay-info">Phí vận chuyển tùy thuộc vào vị trí của bạn</p>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-restaurants">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title-block pull-left">
                        <h4>Những nhà hàng trong hệ thống</h4>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="restaurants-filter pull-right">
                        <nav class="primary pull-left">
                            <ul>
                                <li><a href="#" class="selected" data-filter="*">all</a> </li>
                                <?php 
									$res= mysqli_query($db,"select * from res_category");
									      while($row=mysqli_fetch_array($res))
										  {
											echo '<li><a href="#" data-filter=".'.$row['c_name'].'"> '.$row['c_name'].'</a> </li>';
										  }
									?>

                            </ul>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="restaurant-listing">


                    <?php  
						$ress= mysqli_query($db,"select * from restaurant");  
									      while($rows=mysqli_fetch_array($ress))
										  {
													
													$query= mysqli_query($db,"select * from res_category where c_id='".$rows['c_id']."' ");
													 $rowss=mysqli_fetch_array($query);
						
													 echo ' <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all '.$rowss['c_name'].'">
														<div class="restaurant-wrap">
															<div class="row">
																<div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
																	<a class="restaurant-logo" href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo"> </a>
																</div>
													
																<div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
																	<h5><a href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].'</span>
																</div>
													
															</div>
												
														</div>
												
													</div>';
										  }
						
						
						?>

                </div>
            </div>


        </div>
    </section>


    <?php include "include/footer.php" ?>


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