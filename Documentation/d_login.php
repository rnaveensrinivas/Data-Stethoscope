<?php
echo "<html>";
echo "<body>";
echo "<link rel='stylesheet' type='text/css' href='table.css' />";
$conn = mysqli_connect("localhost","root","","data_stethoscope");
if(!$conn)
{
    echo "<h1>failed</h1>";

}
//error reporting 
ini_set ("display_errors", "1");
error_reporting(E_ALL);

$dnumber = $_POST['dnum'];
$dpwd = $_POST['dpwd'];
$pnum =$_POST['pnum'];

$query = "SELECT * FROM doctor WHERE dnumber = $dnumber";
$run = mysqli_query($conn,$query);
if(!$run)
{
    echo mysqli_error($conn);
}
$row = mysqli_fetch_assoc($run);
$password = $row['dpwd'];
$dname = $row['dname'];

if($dpwd!=$password)
{
    echo "<h3>incorrect password</h3>";
}
else
{
    $tablename = "P_".$pnum;
    $query1 = "SELECT * FROM $tablename";
    $run1 = mysqli_query($conn, $query1);
    if(!$run1)
    {
    echo mysqli_error($conn);
    }
    echo "<table class = 'dash' border='2px'>";
    while($row1 = mysqli_fetch_assoc($run1)) 
    {
        echo "<tr>";
            echo "<td> {$row1['sno']} </td>";
            echo "<td>{$row1['filename']}</td>";
            echo "<td>{$row1['date']}</td>";
            echo "<td>{$row1['dname']}</td>";
            echo "<td>{$row1['dnum']}</td>";
            $filename = "/Data-storage/uploads/patient/".$row1['filename'];  
            echo '<td><a href= "'.$filename.'" target="_blank"><button>Download</button></a></td>';
        echo "</tr>";
    } 
    echo "</table>";
    echo "</body>";
    echo "</html>";
    session_start();
    $_SESSION['tablenameup']=$tablename;
    $_SESSION['docname']= $dname;
    $_SESSION['docnum']= $dnumber;
    echo "<a href= 'dupload.html' target='_blank'><button class='button'>Upload</button></a>";

}


?>