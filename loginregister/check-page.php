<?php 

    require_once('connection.php');

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 02;
    $start_from = ($page-1)*02;
    
    $query = "select * from pagination limit $start_from,$num_per_page";
    $result = mysqli_query($con,$query);

?>