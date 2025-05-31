<?php

    include 'connect.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];


        $sql = "delete from `dashboarddesign`.`userprofile` where id=$id";
        $result = mysqli_query($connect, $sql);
        if($result){
            // echo 'delete data successfully';
            header('location: display.php');
        }
        else{
            die(mysqli_connect_error($connect));
        }
    }




?>