<?php
echo "<html>";
echo "<body>";
session_start();
$tablename = $_SESSION['tablename'];
//Establishing Connection with Db
$conn = mysqli_connect("localhost","root","","data_stethoscope");
if(!$conn)
{
    echo "success";
}
echo "<link rel='stylesheet' type='text/css' href='table.css' />";
//error reporting 
ini_set ("display_errors", "1");
error_reporting(E_ALL);

$query = "SELECT * FROM $tablename";
$run = mysqli_query($conn, $query);
if(!$run)
{
    echo mysqli_error($conn);

}
    
    echo "<table class = 'dash' border='2px'>";
    while($row = mysqli_fetch_assoc($run)) 
    {
        echo "<tr>";
            echo "<td> {$row['sno']} </td>";
            echo "<td>{$row['filename']}</td>";
            echo "<td>{$row['date']}</td>";
            echo "<td>{$row['dname']}</td>";
            echo "<td>{$row['dnum']}</td>";
            $filename = "/Data-storage/uploads/patient/".$row['filename'];  
            echo '<td><a href= "'.$filename.'" target="_blank"><button>Download</button></a></td>';
        echo "</tr>";
    } 
    echo "</table>";
    echo "</body>";
    echo "</html>";

?>