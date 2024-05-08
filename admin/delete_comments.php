
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM comments WHERE cmt_id = '".$_GET['cmt_del']."'");
header("location:all_comments.php");  

?>