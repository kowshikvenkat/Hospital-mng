<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
 
</head>
<body>
    <div id="navbar">  <img src="https://www.gangahospital.com/public/images/update/nabl.png" alt="">     
<img src="https://www.bing.com/th?id=OIP.VCXSyCcFaPcLk69VkXBfxwHaB6&w=310&h=100&c=8&rs=1&qlt=90&o=6&dpr=1.25&pid=3.1&rm=2"><img>
       <img src="https://www.gangahospital.com/public/images/update/GPEA Logo.png" alt="">
     
        <div id="navbarcontent">
    <a href="#">CREDITS</a>
<a href="#">IQ HOSPITALS</a>

<a href="#"><i class="fa fa-fast-backward"></i>&nbsp;&nbsp;&nbsp;HOME</a></div></div>
<br><br><br>
    <select style="position:absolute;left:10%;top:33%;"  id="select" onchange="changefunc()">
        <option value="6">Search by ADMN ID</option>
    <option value="1">Search by patient name</option>
    <option value="2">Search by patient age</option>
    <option value="3">Search by patient disease</option>
    <option value="4">Search by patient admission date</option>
    <option value="5">Search by patient discharge date</option>
</select>
<div id="allinputs">
    <input type="text" id="inputfield6" placeholder="Admission Id" onkeyup="search6()">
 <input type="text" id="inputfield1" placeholder=" Patient name.." onkeyup="search1()">
  <input type="text" id="inputfield2" placeholder=" Patient age.." onkeyup="search2()">
   <input type="text" id="inputfield3" placeholder=" Patient disease.." onkeyup="search3()">
    <input type="text" id="inputfield4" placeholder=" Patient ad date.." onkeyup="search4()">
      <input type="text" id="inputfield5" placeholder=" Patient dc date.." onkeyup="search5()">
      </div>
    
    <h1 style="position: absolute; left: 39%;border-radius:50%;box-shadow:0 0 5px grey;padding:13px;">PATIENT LIST</h1><br>
        <table id="mytable" cellpadding ="20"> 
        <thead>
            <tr>
                <th><button style="font-size:15px" onclick="admn()">ADMNID</button></th>
                <th>  <button onclick="naming()">Name</button></th>
                <th> <button onclick="age()">Age</button></th>
                <th><button onclick="disease()">Disease</button></th>
                <th>  <button onclick="date()">DateIn</button></th>
                <th>DateOut</th>
                <th>BED_BOOKING</th>
                <th>ROOM</th>            
            </tr>
        </thead>
           <?php
$con = new mysqli('localhost','root','','crud');
if(!$con){
    echo "Connection unsuccessful! ";
}
$sql = "Select * from crudoperation";
$result = mysqli_query($con,$sql);
if($result){
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
        $age = $row['age'];
        $disease = $row['disease'];
        $dateIn = $row['dateIn'];
        $dateOut = $row['dateOut'];
          $dateout;
if($dateOut=='0000-00-00 00:00:00'){
    $dateout = "Not yet discharged";
}else{
    $dateout = $dateOut;
}
        $booking = $row['booked_or_not'];
        $room = $row['room'];
        echo '<tr>
          <td> <a href="billinginfo.php?billing='.$id.'">'.$id.'</a></td>
        <td> '.$name.'</td>
          <td> '.$age.'</td>
          <td>'.$disease.'</td>
          <td>'.$dateIn.'</td>
          <td>'.$dateout.'</td>
          <td>'.$booking.'</td>
         <td>'.$room.'</td>
          </tr>';
    }
}
?>
    </table><br>
 

  <i style="position:absolute;top:37%;left:27%;z-index:5;font-size:30px;color:grey" class="fa fa-search-plus"></i>
</body>
<style>

  
body{
    overflow-x: hidden;
}
th button{
    border:none;
    width:50px;
    height:20px;
    background-color:grey;
    color:black;
    font-size:20px;
    font-weight:700;
    position: relative;
    left:-15px;
    
}
#allinputs input{
height:40px;
width:300px;
position: absolute;
top:36%;
left:6%;
border:4px solid #009B77;
font-size:30px;
}
#allinputs input:focus{
    box-shadow:0 0 5px forestgreen;
    outline:none;
}
#buttons{
    display: flex;
    float: right;
    
}
table{
 position: relative;
  left:5%;
    margin-top: 7%;
    width: 1100px;

      box-shadow: 0 0 10px grey;

   
    font-size:20px ;

}
tr:hover{
background-color:#009879;
color: white;   

  
}
tr:nth-of-type(even):hover{
background-color:#009879;
color: white;   

  
}
 table tr{
     
    height: 100%;
    width: 100%;
position: relative;
padding: 5%;
}
table tr:nth-of-type(even){
background: #f3f3f3;
}
table th{
    background-color: grey;
    
}
button{
    background-color: blanchedalmond;
    border-radius: 20px;
    border:2px solid white;
    width: 150px;
    color: white;
    background-color: #009879;
}

button:active{
    background-color: white;
}
button:hover{
    cursor: pointer;
}

#navbar{
    width: 100%;
    height: 100px;
    background-color: purple;
}
#navbar img{
    
    height: 100%;
}
#inputfield,#buttons{
    margin-top: 4%;
}
#inputfield{
    margin-left:5%;
    height: 50px;
    font-size: 30px;
}
#navbarcontent{
    position:relative;
    left: 35%;
    top: -60%;
   
}
#navbarcontent a{
    position: relative;
    margin-top: -10%;
    padding-left: 10%;
    text-decoration: none;
    color: white;
    font-weight: 800;

}
i{
    color: black;
}
#redirect{
    position: relative;
    padding:4px;
left:70%;
     height: 40px;

}
#redirect a{
    text-decoration: none;
    color: white;
}
#redirect i{
    font-size:14px;
    color:white;
}


</style>


<script>

console.log("hello");

   function admn(){
          var color = ["red", "green", "yellow", "lime", "blue"]
        var z = 0;
        let tr= document.getElementsByTagName('tr');
      
       var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("mytable");
        switching = true;
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[i + 1].getElementsByTagName("TD")[0];
                //check if the two rows should switch place:
                  
                 
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                     
                    
                    rows[i].style.color = "black";
                    rows[i + 1].style.color = "black";
                    shouldSwitch = true;
                    break;
                  
                }
                
               
            
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                console.log("success");
               var q= rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        
                switching = true;
                
                
            }
        
        }
         
  

       
}
  
    function age(){
          var color = ["red", "green", "yellow", "lime", "blue"]
        var z = 0;
        let tr= document.getElementsByTagName('tr');
      
       var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("mytable");
        switching = true;
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[2];
                y = rows[i + 1].getElementsByTagName("TD")[2];
                //check if the two rows should switch place:
                  
                 
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                     
                    
                    rows[i].style.color = "black";
                    rows[i + 1].style.color = "black";
                    shouldSwitch = true;
                    break;
                  
                }
                
               
            
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                console.log("success");
               var q= rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        
                switching = true;
                
                
            }
        
        }
         
  

       
}
    
       /* for( i=0;i<rows.length;i++){
            
            let td=rows[i].getElementsByTagName('td')[1];
                 console.log(td.textContent,"tdtext");
                    rows[i].style.color = "red";
   document.body.appendChild(td);

            x = rows[i].getElementsByTagName("td")[1];
            y = rows[i + 1].getElementsByTagName("td")[1];
            if(x==y){
                console.log("yes");
            }else{
                console.log("no")
            }
        }*/
    


    function naming() {
           var color = ["red", "green", "yellow", "lime", "blue","orange","purple"]
        var z = 0;
        let tr = document.getElementsByTagName('tr');
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("mytable");
        switching = true;
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[1];
                y = rows[i + 1].getElementsByTagName("TD")[1];
                  
                //check if the two rows should switch place:
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                   console.log("compare")
                   rows[i].style.color = "black";
                    rows[i + 1].style.color = "black";
                    shouldSwitch = true;
                    break;
                }
                 if (x.innerHTML.toLowerCase().charAt(0) == y.innerHTML.toLowerCase().charAt(0)) {
                    console.log("yess", rows[i], rows[i + 1])
                    console.log(rows[i],rows[i+1])
                      
                }
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                var q = rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                
                switching = true;
            }
        }
    }


   function disease() {
          var color = ["red", "green", "yellow", "lime", "blue"]
       var z = 0;
        let tr = document.getElementsByTagName('tr');
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("mytable");
        switching = true;
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
                 
                /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                
                x = rows[i].getElementsByTagName("TD")[3];
                y = rows[i + 1].getElementsByTagName("TD")[3];
                            
                //check if the two rows should switch place:
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    rows[i].style.color = "black";
                    rows[i+1].style.color = "black";
                    shouldSwitch = true;
                    break;
                }
               
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                var q = rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);

                switching = true;
            }
        }
    }

    function date() {
           var color = ["red", "green", "yellow", "lime", "blue"]
        var z = 0;
            let tr = document.getElementsByTagName('tr');
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("mytable");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[4];
                    y = rows[i + 1].getElementsByTagName("TD")[4];
                   // console.log(x)
                    //check if the two rows should switch place:
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                      //  console.log(x.textContent.substring(0,10))
                        rows[i].style.color = "black";
                        rows[i + 1].style.color = "black";
                        shouldSwitch = true;
                        break;
                    }
                    
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    var q = rows[i].parentNode.insertBefore(rows[i+1 ], rows[i]);
                  //  console.log("hello");
                    switching = true;
                }
            }
        }





            

    const search1= ()=>  {

        let inputname = document.getElementById("inputfield1").value.toUpperCase();
        console.log(inputname)
        let mytable = document.getElementById("mytable");
        let tr = mytable.getElementsByTagName('tr');

        console.log(tr);
        for (var i = 1; i < tr.length; i++) {


            let td = tr[i].getElementsByTagName('td')[1];
               
            console.log(td)

            if (td) {
                console.log(tr.length, "tr length")
                
                if (td.innerHTML.toUpperCase().indexOf(inputname) > -1) {
                    tr[i].style.display = "";



                }
                else {
                    tr[i].style.display = "none";


                }
            }






        }
    }
    const search2= ()=>  {

        let inputname = document.getElementById("inputfield2").value.toUpperCase();
        console.log(inputname)
        let mytable = document.getElementById("mytable");
        let tr = mytable.getElementsByTagName('tr');

        console.log(tr);
        for (var i = 1; i < tr.length; i++) {


            let td = tr[i].getElementsByTagName('td')[2];
               
            console.log(td)

            if (td) {
                console.log(tr.length, "tr length")
                
                if (td.innerHTML.toUpperCase().indexOf(inputname) > -1) {
                    tr[i].style.display = "";



                }
                else {
                    tr[i].style.display = "none";


                }
            }






        }
    }

const search3= ()=>  {

        let inputname = document.getElementById("inputfield3").value.toUpperCase();
        console.log(inputname)
        let mytable = document.getElementById("mytable");
        let tr = mytable.getElementsByTagName('tr');

        console.log(tr);
        for (var i = 1; i < tr.length; i++) {


            let td = tr[i].getElementsByTagName('td')[3];
               
            console.log(td)

            if (td) {
                console.log(tr.length, "tr length")
                
                if (td.innerHTML.toUpperCase().indexOf(inputname) > -1) {
                    tr[i].style.display = "";



                }
                else {
                    tr[i].style.display = "none";


                }
            }






        }
    }
    const search4= ()=>  {

        let inputname = document.getElementById("inputfield4").value.toUpperCase();
        console.log(inputname)
        let mytable = document.getElementById("mytable");
        let tr = mytable.getElementsByTagName('tr');

        console.log(tr);
        for (var i = 1; i < tr.length; i++) {


            let td = tr[i].getElementsByTagName('td')[4];
               
            console.log(td)

            if (td) {
                console.log(tr.length, "tr length")
                
                if (td.innerHTML.toUpperCase().indexOf(inputname) > -1) {
                    tr[i].style.display = "";



                }
                else {
                    tr[i].style.display = "none";


                }
            }






        }
    }

const search5= ()=>  {

        let inputname = document.getElementById("inputfield5").value.toUpperCase();
        console.log(inputname)
        let mytable = document.getElementById("mytable");
        let tr = mytable.getElementsByTagName('tr');

        console.log(tr);
        for (var i = 1; i < tr.length; i++) {


            let td = tr[i].getElementsByTagName('td')[5];
               
            console.log(td)

            if (td) {
                console.log(tr.length, "tr length")
                
                if (td.innerHTML.toUpperCase().indexOf(inputname) > -1) {
                    tr[i].style.display = "";



                }
                else {
                    tr[i].style.display = "none";


                }
            }






        }
    }


const search6= ()=>  {

        let inputname = document.getElementById("inputfield6").value.toUpperCase();
        console.log(inputname)
        let mytable = document.getElementById("mytable");
        let tr = mytable.getElementsByTagName('tr');

        console.log(tr);
        for (var i = 1; i < tr.length; i++) {


            let td = tr[i].getElementsByTagName('td')[0];
               
            console.log(td)

            if (td) {
                console.log(tr.length, "tr length")
                
                if (td.innerHTML.toUpperCase().indexOf(inputname) > -1) {
                    tr[i].style.display = "";



                }
                else {
                    tr[i].style.display = "none";


                }
            }






        }
    }

     document.getElementById("inputfield6").style.display = "block";
    function none(){
        document.getElementById("inputfield1").style.display = "none";
        document.getElementById("inputfield2").style.display = "none";
            document.getElementById("inputfield3").style.display = "none";
               document.getElementById("inputfield4").style.display = "none";
                  document.getElementById("inputfield5").style.display = "none";
 }
 none();
    function changefunc(){
        var selectbox = document.getElementById("select");
        var selectvalue = selectbox.options[selectbox.selectedIndex].value;
          if(selectvalue==1){
none();
 document.getElementById("inputfield6").style.display = "none";
document.getElementById("inputfield1").style.display = "block";
        }
        if(selectvalue==2){
none();
 document.getElementById("inputfield6").style.display = "none";
document.getElementById("inputfield2").style.display = "block";
        }
          if(selectvalue==3){
none();
 document.getElementById("inputfield6").style.display = "none";
document.getElementById("inputfield3").style.display = "block";
        }
          if(selectvalue==4){
none();
  document.getElementById("inputfield6").style.display = "none";
document.getElementById("inputfield4").style.display = "block";
        }
          if(selectvalue==5){
none();
  document.getElementById("inputfield6").style.display = "none";
document.getElementById("inputfield5").style.display = "block";
        }
        if(selectvalue==6){
none();
  document.getElementById("inputfield6").style.display = "block";

        }
    }
    </script>


</html>