<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <table id="mytable1">

<tr>
    <th>DETAILS</th>
</tr>
    <?php
$con = new mysqli('localhost','root','','crud');
if(!$con){
    echo "Connection unsuccessful! ";
}
$id = $_GET['billing'];
$sql = "Select * from crudoperation where id = $id";
$result = mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $age = $row['age'];
        $disease = $row['disease'];
        $dateIn = $row['dateIn'];
         $dateOut = $row['dateOut'];
         if($dateOut=='0000-00-00 00:00:00'){
    
        echo "<script>alert('The patient has not discharged yet and cannot BILL now!');
        window.location.href = 'billing.php';
        </script>";
              

}else{
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


$id = $_GET['billing'];
$sqli = "Select * from `".$id."`";
$result = mysqli_query($con,$sqli);
$row = mysqli_fetch_assoc($result);
$symptoms = $row['symptoms'];
$tests_taken = $row['tests_taken'];
$tt_results = $row['tt_results'];
$scan_taken = $row['scan_taken'];
$st_results = $row['st_results'];    
$treatment = $row['treatment'];
$treatment_results = $row['treatment_results'];
$medicine = $row['medicines'];
$medicine_qn = $row['medicines_qn'];
$day1 = $row['day1'];
$day1_prog = $row['day1_prog'];
$day2 = $row['day2'];
$day2_prog = $row['day2_prog'];

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
<td>'.$medicine.'-'.$medicine_qn.'</td>
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
';
$d1 = strtotime("$dateIn");
$d2 = strtotime("$dateOut");
$seconds = abs($d1 - $d2);
$days = floor($seconds/60/60/24);
$price = $days*30000;

$pricefortest;
$priceforscan;
$medicineprice;
if($tests_taken=="Blood Test"){
$pricefortest = 1000;
}else{
    $pricefortest = 500;
}
if($scan_taken!=NULL){
if($scan_taken=="X-Ray"){
    $priceforscan = 10000;
}else{
    $priceforscan = 15000;
}
}else{
    $priceforscan = $pricefortest;
}
if($medicine=="Bacitracin"||"acetaminophen"||"Keytruda"||"Docetaxel"){
$medicineprice = 1000 * $medicine_qn;
}elseif($medicine=="Hydroxyurea"||"cephalosporin"){
$medicineprice = 2000 * $medicine_qn;
}else{
    $medicineprice = 3000 * $medicine_qn;
}
$strlen = strlen($treatment);
$treatmentprice =  ($strlen*1000);
$finalprice = $price + $pricefortest + $priceforscan + $treatmentprice + $medicineprice;
?>
</table>

<table id="mytable2">
<?php
echo '<tr>
<th>DaysAdmitted</th>
</tr>
<tr>
<td>'.$days.'</td>
</tr>
<tr>
<th>Rental fees</th>
</tr>
<tr>
<td>'.$price.' Rs</td>
</tr>
<tr>
<th>TESTS-PRICE</th>
</tr>
<tr>
<td>Test-'.$pricefortest.' Rs</td>
</tr>
<tr>
<th>SCAN TESTS-PRICE</th>
</tr>
<tr>
<td>'.$priceforscan.' Rs</td>
</tr>
<tr>
<th>TREATMENT-PRICE</th>
</tr>
<tr>
<td>'.$treatmentprice.' Rs</td>
</tr>
<tr>
<th>MEDICINE-PRICE</th>
</tr>
<tr>
<td>'.$medicineprice.' Rs</td>
</tr>
<tr>
<th style="color:red;"><i>TOTAL FEES</i></th>
</tr>
<tr >
<td style="border:3px dashed red ">'.$finalprice.' Rs</td>
</tr>';
?>
</table><br><br>

<button onclick="window.print()">Download As PDF</button><br>
<script>
    function generatePDF(){
        let element = document.getElementById('mytable2');
         let element2 = document.getElementById('mytable1');
var opt = {
    
    margin:1,
    filename:'bill.pdf',
    image:{type:'jpeg',quality:0.98},
    html2canvas:{scale:2,letterRendering:true},
    jsPDF:{unit:'mm',format:'a4',orientation:'portrait'}
} ;
html2pdf().from(element).set(opt).save();
html2pdf().from(element2).set(opt).save();
    };
</script>
<style>
    body{
        display:flex;
        justify-content:center;
    }
    body button{
        width:100px;
        height:50px;
        position:absolute;
        bottom:-100px;
        padding:10px;
        border-radius:10%;
        background-color:#34568B;
        color:white;
        cursor:pointer;
    }
th{
padding:5px;
box-shadow: 0 0 3px olivedrab;
background-color: palegoldenrod;
}
table{
    width: 600px;

text-align: center;
border:3px solid green;
}
td{
    padding:4px;
}
#x{
    cursor: pointer;
border-radius:50% ;
background-color: orangered;
padding: 4px;
}
form{
    background-color: skyblue;
    padding:10px;
    box-shadow:0px 0px 10px grey;
}
#div2 {
   text-align: center;

}
#div2 input{
    margin: 3%;
}

input[type="range"]:disabled{
    color: red;
}
#insert{
    background-color: rgb(193, 218, 253);
}
#h1{
    color: darkgoldenrod;
}
</style>
</body>
</html>