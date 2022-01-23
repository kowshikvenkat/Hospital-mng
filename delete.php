<?php

$con = new mysqli('localhost','root','','crud');
if(!$con){
    echo "Connection unsuccessful! ";
}

if(isset($_GET['deletename'])){
    
    $id = $_GET['deletename'];
    $sql = "delete from `crudoperation` where id='$id'";
    $result= mysqli_query($con,$sql);
    if($result){
        echo "deleted!";
        header('location:firstpage.php');
    }else{
        die(mysqli_error($con));
    }
}
?>