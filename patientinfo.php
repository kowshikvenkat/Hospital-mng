<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
     <script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }

   
    </script>
    <link rel="stylesheet" href="patient.css">
</head>
<body>


<table>

<tr>
    <th>DETAILS</th>
</tr>
    <?php
$con = new mysqli('localhost','root','','crud');
if(!$con){
    echo "Connection unsuccessful! ";
}
$id = $_GET['patient'];
$sql = "Select * from crudoperation where id = $id";
$result = mysqli_query($con,$sql);
if($result){
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['name'];
        $age = $row['age'];
        $disease = $row['disease'];
        $dateIn = $row['dateIn'];
         
echo '<tr>
<td>Name:'.$name.'</td>

</tr>
<tr>
<td>Age:'.$age.'</td>

</tr>
<tr>

<td>Reason for admission:'.$disease.'</td>


</tr>';
    }
}
?>


<?php
$sql =  " CREATE TABLE `".$id."` ( id int(100),  symptoms varchar(255),tests_taken varchar(100),tt_results varchar(100),scan_taken varchar(100),st_results varchar(100),treatment varchar(100),treatment_results varchar(100),medicines varchar(100),medicines_qn int(100),day1 varchar(100),day1_prog int(100),day2 varchar(100) ,day2_prog int(100) ,no int NOT NULL AUTO_INCREMENT, PRIMARY KEY(no)  )";
$result = mysqli_query($con,$sql);
$id = $_GET['patient'];
$sqli = "Select * from `".$id."`";
$result = mysqli_query($con,$sqli);

    $me = "Select * from `".$id."` where id = $id" ;
    $resulting = mysqli_query($con,$me);
    if( mysqli_num_rows($resulting)==0){
    $sqlee = "insert into `".$id."` (id) values ('$id')"; 
    $resultee = mysqli_query($con,$sqlee);
   
    }



$row = mysqli_fetch_assoc($result);
$symptoms = $row['symptoms'];
$tests_taken = $row['tests_taken'];
$tt_results = $row['tt_results'];
$scan_taken = $row['scan_taken'];
$st_results = $row['st_results'];    
$treatment = $row['treatment'];
$treatment_results = $row['treatment_results'];
$medicine=$row['medicines'];
$medicine_qn = $row['medicines_qn'];
$day1 = $row['day1'];
$day1_prog = $row['day1_prog'];
$day2 = $row['day2'];
$day2_prog = $row['day2_prog'];

$sqleee = "Select * from crudoperation where id=$id";
$resulteee = mysqli_query($con,$sqleee);
$rowee = mysqli_fetch_assoc($resulteee);
$update = $rowee['disease'];
echo '<tr>
<th>SYMPTOMS </th>
</tr>
<tr>
<td>'.$symptoms.'</td>
</tr>
<tr>
<th>TESTS TAKEN</th>
</tr>
<tr>
<td>'.$tests_taken.' - '.$tt_results.'</td>
</tr>
<tr>
<th>SCANS DONE</th>
</tr>
<tr>
<td>'.$scan_taken.' - '.$st_results.'</td>
</tr>
<tr>
<th>TREATMENT</th>
</tr>
<tr>
<td>'.$treatment.' - '.$treatment_results.'</td>
</tr>
<tr>
<th>MEDICINES</th>
</tr>
<tr>
<td>'.$medicine.'</td>
</tr>

<tr>
<th>PROGRESS</th>
</tr>
<tr>
<td>Day1: '.$day1.'</td>
</tr>
<tr>
<td><input type="range" min="0" max="100" value="'.$day1_prog.'" disabled></td>
</tr>
<tr>
<td>Day2: '.$day2.'</td>
</tr>
<tr>
<td><input type="range" min="0" max="100" value="'.$day2_prog.'" disabled></td>
</tr>

'

?>


</table>

<div id="insert">
<h1 id="h1" onclick="xl()" > <i  class="fa fa-file"></i>&nbsp;&nbsp;INSERT</h1>
<span id="show">
<form  action="" method="post" autocomplete="off">
    <span id="x" onclick="de()">X</span>
<h3>Symptoms After Consultation</h3>
 Description:<input id="dc" name="symptoms" value="<?php echo $symptoms ;?>" type="text" required>*<br>
 <h3>Tests Taken</h3>
 <input type="text" placeholder="Tests performed.." name="tests_taken" list = "host" value="<?php echo $tests_taken;?>" Required>*  &nbsp;&nbsp;&nbsp;&nbsp; Results:<input name="tt_results" value="<?php echo $tt_results?>" type="text" id="dc">
<h3>Scan Tests</h3>
<input type="text" placeholder="Scan tests.." name="scan_taken" list="host2"  value="<?php echo $scan_taken?>"> &nbsp;&nbsp;&nbsp;&nbsp; Results:<input name="st_results" value="<?php echo $st_results?>" type="text" id="dc">
<h3>Treatments</h3>
<input type="text" id="Treatment" name="treatments" value="<?php echo $treatment  ?>" placeholder="Treatments.." required>* &nbsp;&nbsp;&nbsp;&nbsp; Description:<input name="treatment_results" value="<?php echo $treatment_results ?>" type="text" id="dc">
<div id="text">
<h3>Medicines</h3>
<input type="text" placeholder="Medicines" id="medicines" name="medicines" value="<?php echo $medicine ?>" required>&nbsp;&nbsp;&nbsp;&nbsp; <input type="number" name="medicine_qn" value="<?php echo $medicine_qn?>" placeholder="QN" style="width:50px" min="1"> <br>
<h3>Progress</h3>
<input type="text" placeholder = "Day1" name="day1" value="<?php echo $day1;?>" > &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" placeholder = "Day2" name="day2" value="<?php echo $day2;?>" > <br><br>
<input type="range" max="100" min="0" name="day1_prog" value="<?php echo $day1_prog;?>"  required> &nbsp;&nbsp;&nbsp;&nbsp;  <input type="range" max="100" min="0" name="day2_prog" value="<?php echo $day2_prog;?>" required  > <br><br>
<label style="color:red">Only Enter disease if there is change :</label><input type="text" placeholder="Changed disease..." name="update" value="<?php echo $update ?>"><br><br>

<input type="submit" name="submit" >
</div>

<?php
if(isset($_POST['submit'])){
    
  $symptoms = $_POST['symptoms'];
$tests_taken = $_POST['tests_taken'];
$tt_results = $_POST['tt_results'];
$scan_taken = $_POST['scan_taken'];
$st_results = $_POST['st_results'];    
$treatment = $_POST['treatments'];
$treatment_results = $_POST['treatment_results'];
$medicines = $_POST['medicines'];
$medicines_qn = $_POST['medicine_qn'];
$day1 = $_POST['day1'];
$day1_prog = $_POST['day1_prog'];
$day2 = $_POST['day2'];
$day2_prog = $_POST['day2_prog'];
  $update = $_POST['update'];

$updatesql = "update `".$id."` set symptoms = '$symptoms' , tests_taken = '$tests_taken' , tt_results = '$tt_results' ,scan_taken = '$scan_taken' ,
 st_results = '$st_results' , treatment = '$treatment' , treatment_results = '$treatment_results',medicines='$medicines',medicines_qn=$medicines_qn ,
 day1 = '$day1',day1_prog = $day1_prog,day2 = '$day2',day2_prog = $day2_prog where id = $id";
 $updatecrud = "update crudoperation set disease='$update' where id = $id";
 $updatecrudresult = mysqli_query($con,$updatecrud);
 $updateresult = mysqli_query($con,$updatesql);
 if($updateresult){
   
 }else{
     die(mysqli_error($con));
 }
}

?>

<?php


if($disease=="ACCIDENT"){
    echo "<script>document.getElementById('Treatment').setAttribute('list','host5');
           document.getElementById('medicines').setAttribute('list','host6') ;      
    </script>";
}
if($disease=="FRACTURE"){
    echo "<script>document.getElementById('Treatment').setAttribute('list','host4');
    document.getElementById('medicines').setAttribute('list','host7') ; 
    </script> ";
}
if($disease=="CANCER"){
    echo "<script>document.getElementById('Treatment').setAttribute('list','host3');
   document.getElementById('medicines').setAttribute('list','host8')
    </script>";
}


    
?>
</form>
<datalist id="host8">
    <option>Keytruda</option>
    <option>Docetaxel</option>
    <option >Hydroxyurea</option>
</datalist>
<datalist id="host7">
    <option>acetaminophen</option>
    <option >cephalosporin</option>
</datalist>
<datalist id="host6">
    <option >Bacitracin</option>
    <option >Neosprin</option>
    <option >Polysporin</option>
</datalist>

<datalist id="host5">   
    <option data-value="Injecting Painkillers">Injecting painkillers</option>
    <option data-value="Discectomy">Discectomy</option>
    <option data-value="Laminectomy">Laminectomy</option>
   
</datalist>
<datalist id="host4">
    <option data-value="Joint manipulation">Joint Manipulation</option>
    <option data-value="Physical Therapy">Physical Therapy</option>
</datalist>
<datalist id="host3">
    <option data-value="Surgery">Surgery</option>
    <option data-value="Chemotherapy">Chemotherapy</option>
    <option data-value="Radiation">Radiation</option>
</datalist>
<datalist id="host2">
    <option data-value="X-Ray">X-Ray</option>
    <option data-value="CT-Scan">CT-Scan</option>
</datalist>
<datalist id="host">
    <option data-value="Blood Test">Blood Test</option>
    <option data-value="Urine Test">Urine Test</option>
    <option data-value="Aminocentesis">Aminocentesis</option>
    <option data-value="Malabsorption Test">Malabsorption Test</option>
    <option data-value="Glucose Tolerance Test">Glucose Tolerance Test</option>
</datalist>
</span>
</div>










<script>
  function xl(){
      console.log('he');
var xl = document.getElementById("show");
var h1 = document.getElementById("h1");
xl.style.visibility= 'visible';
h1.style.visibility = 'hidden';
  }
  function de(){
      var xl = document.getElementById("show");
xl.style.visibility= 'hidden';
var h1 = document.getElementById("h1");
h1.style.visibility= 'visible';
  }
  
 
</script>
<style>
    #h1{
        cursor:pointer;
        position:absolute;
        top:40%;
        right:30%;

    }
#insert{

    position: absolute;
    right:2%;
   top:5%;
}
#show{
    visibility:hidden;
}
</style>
</body>
</html>