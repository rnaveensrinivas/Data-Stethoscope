<?php

$conn = mysqli_connect("localhost","root","","data_stethoscope"); 

if(!$conn)
{
    echo "<h1>failed</h1>";

}

$pnum = $_POST['pnum']; 
$ppassword = $_POST['ppassword'];
$tablename = "P_".$pnum;

$query = "SELECT * FROM patient WHERE pnum = $pnum ";
$run = mysqli_query($conn,$query);
if(!$run)
{
    echo mysqli_error($conn);
}
$row = mysqli_fetch_assoc($run);
$password = $row['ppassword'];

if($ppassword!=$password)
{
    echo "<h3>incorrect password</h3>";
}
else
{
    session_start();
    $_SESSION['tablename']=$tablename;
    echo '<meta http-equiv= "refresh" content="1; url=/Data-storage/pdashboard.php"/>';//URL TO BE CHANGED 
    
}

?>