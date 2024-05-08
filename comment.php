
    <?php
        include("connection/connect.php");  
        error_reporting(0);  
        session_start(); 

        if(empty($_SESSION["user_id"])) {
            header('location:login.php');
        }

        $dish_id = $_POST['dish_id'];
        $user_id = $_SESSION['user_id'];
        $cmt_text = $_POST['comment'];
        $res_id = $_GET['res_id'];
        mysqli_query($db,"INSERT INTO comments(dish_id,user_id,cmt_text) VALUES ('$dish_id','$user_id','$cmt_text')"); 
        header("location:dishes.php?res_id=$res_id");
    ?>
