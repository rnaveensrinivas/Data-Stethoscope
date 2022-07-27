<?php

//HTML embedded within PHP
//Here the login page and the accessing page are combined into one. 
//there isn't a dedicated page for doctor lobby. 


echo "<html>";
echo "<body>";
echo "<link rel='stylesheet' type='text/css' href='table.css' />";

$conn = mysqli_connect("localhost","root","","data_stethoscope"); //establishing a connection.
if(!$conn)
{
    //MySQL is not connected. There is an issue in connection. 
    echo "<h1>failed</h1>";
    exit() ; //stop here, don't execute rest of the script. 
}

//getting the form details. 
$dnumber = $_POST['dnum']; 
$dpwd = $_POST['dpwd'];
$pnum =$_POST['pnum'];

//checking if the doctor exists. 
$query = "SELECT * FROM doctor WHERE dnumber = $dnumber";
$run = mysqli_query($conn,$query);
if(!$run)
{
    echo mysqli_error($conn);
    exit() ; //agian there is some database connection failure. 
}


$row = mysqli_fetch_assoc($run);

if( !$row ){
    //there exist no doctor with the number. 
    echo "account doesn't exist!" ;
    exit() ; 
}

//getting in the doctor details. 
$password = $row['dpwd'];
$dname = $row['dname'];


if($dpwd!=$password)
{
    //client side password doesn't match with server side password. 
    echo "<h3>incorrect password</h3>";
    exit() ; 
}
else
{
    //querying the patient's table. 
    $tablename = "P_".$pnum;
    $query1 = "SELECT * FROM $tablename";
    $run1 = mysqli_query($conn, $query1);

    if(!$run1)
    {
        echo mysqli_error($conn);
        exit() ; //query didn't run for some reason. 
    }
    
    echo "<table class = 'dash' border='2px'>";
    
    echo "<tr><td>FileName</td><td>Date</td><td>Doctor Name</td><td>Doctor Phone</td></tr>" ;
    while($row1 = mysqli_fetch_assoc($run1)) 
    {
        //printint the patient's recordrs. 
        //same from pdashboard.php
        echo "<tr>";
            echo "<td>{$row1['filename']}</td>";
            echo "<td>{$row1['date']}</td>";
            echo "<td>{$row1['dname']}</td>";
            echo "<td>{$row1['dnum']}</td>";
            $filename = "/Data-Stethoscope/uploads/patient/".$row1['filename'];  
            echo '<td><a href= "'.$filename.'" target="_blank"><button>View</button></a></td>';
        echo "</tr>";
    } 

    //closing all the opened tags.
    echo "</table>";
    echo "</body>";
    echo "</html>";

    //starting a session since the present doctor might want to upload a record for that patient. 
    session_start();
    $_SESSION['tablenameup']=$tablename;
    $_SESSION['docname']= $dname;
    $_SESSION['docnum']= $dnumber;
    //echo "<a href= 'dupload.html' target='_blank'><button class='button'>Upload Record</button></a>"; //opens in a new tab.
    echo "<a href= 'dupload.html'><button class='button'>Upload Record</button></a>"; //opens in present tab itself. 

}
?>