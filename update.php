<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>
 


    <?php

$con = new mysqli('localhost','root','','crud');
if(!$con){
    echo "Connection unsuccessful! ";
}
$id = $_GET['updateid'];

$sql = "Select * from crudoperation where id=$id";
$result = mysqli_query($con,$sql);
$row  = mysqli_fetch_assoc($result);
$name = $row['name'];
$age = $row['age'];
$disease = $row['disease'];
$dateIn = $row['dateIn'];
$dateOut = $row['dateOut'];
if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $age=$_POST['age'];
    $disease = $_POST['disease'];
    $dateIn = $_POST['dateIn'];
    $dateOut = $_POST['dateOut'];
    
     echo "<script> var opt = document.getElementById('host');
    var txt = 'All options:'';
    var i;
    for(i=0;i<opt.options.length;i++){
        txt = txt + '\n' + opt.options[i].value;
    }
    console.log(txt);</script>";
if($dateOut>0 &&$dateIn>$dateOut){
    echo "Invalid dates!";
      die(mysqli_error($con));
}else{
    if($age>123 || strlen($name)<5){
           echo "<script>alert('Follow instructions properly');</sc>";
    }
elseif($dateOut>0){
      
    $sql = "update crudoperation set name='$name', age=$age , disease='$disease', dateIn='$dateIn' ,dateOut='$dateOut',room='',booked_or_not='Not booked',color = '' where id=$id";
   $result =  mysqli_query($con,$sql);
   if($result){
       echo "updated";
     
     header('location:firstpage.php');
   } else{
             echo"Could not Update!";
             die(mysqli_error($con));
   }
   
}
      
    $sql = "update crudoperation set name=upper('$name'), age=$age , disease=upper('$disease'), dateIn='$dateIn' ,dateOut='$dateOut' where id=$id";
   $result =  mysqli_query($con,$sql);
   if($result){
       echo "updated";
     
     header('location:firstpage.php');
   } else{
             echo"Could not Update!";
             die(mysqli_error($con));
   }

}
}


    ?>


<h3 id="h3" style="background:#92ABD1;padding:5px"><ul>
    <li>Name should have 5 characters*</li>
    <li>Select valid complaint*</li>
    <li>Input every field before updating*</li>
</ul>
<span onclick="xl()">X</span>
</h3><br>
<div class="body">
         <h1 style="color:white;">UPDATE PATIENT DETAIL</h1>&nbsp;&nbsp;
   <form method="post" >
  
        Name: <input type="text" name="name" value="<?php echo $name; ?>" required > <br>
        Age: <input type="number" name="age" value="<?php echo $age; ?>" required> <br>
        Complaint: <input type="text" name="disease" id="complaint" list="host" value="<?php echo $disease; ?>" required> <br>
        DateIn: <input type="datetime-local" id="dateIn" name="dateIn" value="<?php $dateIn=preg_replace("/\s/",'T',$dateIn); echo $dateIn?>" required> <br>
         DateOut: <input type="datetime-local" id="dateOut" name="dateOut" value="<?php $dateOut=preg_replace("/\s/",'T',$dateOut); echo $dateOut?>" > <br>
        <input type="Submit" value="Update" name="submit">
    </form>
</div>

<datalist id="host">
    <option value="Accident">Accident</option>
    <option value="Fracture">Fracture</option>
    <option value="Cancer">Cancer</option>
</datalist>

<a href="firstpage.php"><i class="fa fa-fast-backward"></i>&nbsp;&nbsp;Back</a>
</body>
<style>
    body{
        background:rgba(0,0,0,0.8);
    
    }
    h3 span{
        float:right;
        margin-top:-8%;
        background:white;
        opacity:0.8;
        border-radius:50%;
        padding:10px;
    }
    h3 span:hover{
        cursor: pointer;
    }
    .body{
        display:flex;
        justify-content:center;
        align-items:center;
    }
form{
    box-shadow:0 0 20px grey;
    text-align:center;
    background:white;
    width:450px;
    padding:2%;
    font-size:25px;
}
form input[type="submit"]{
    height:30px;
    width:100px;
    border:0px solid black;
    box-shadow:0 0 3px grey;
    background:#88B048;
    cursor:pointer;
}
form input{
border:2px solid black;
margin:3%;
width:200px;
}
a{
    text-decoration:none;
    color:white;
    background-color:#88B048;
    padding:2%;
}
</style>

<script>
    function xl(){
       var x = document.getElementById('h3');
       x.style.visibility = "hidden";
    }



     var date = new Date();
    var tdate = date.getDate();
    var month = date.getMonth()+1;
    console.log(tdate);
    if(month < 10){
        month = "0"+month;
    }
    if(tdate < 10){
     
        tdate = "0"+tdate;
    }
    var year = date.getUTCFullYear();
    var maxdate = year + "-" + month + "-" + tdate + "T23:59:59";

   var x = document.getElementById("dateIn").setAttribute('max',maxdate);
    var y = document.getElementById("dateOut").setAttribute('max',maxdate);


   var opt = document.getElementById("host");
    var txt = "All options:";
    var i;
    for(i=0;i<opt.options.length;i++){
        txt = txt + "\n" + opt.options[i].value;
    }
    console.log(txt);


/* var h =  document.getElementById("complaint").value ;
if(!h==txt){
    h='';
}*/
</script>
</html>