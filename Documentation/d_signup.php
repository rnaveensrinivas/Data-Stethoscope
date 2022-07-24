<?php
$conn = mysqli_connect("localhost","root","","data_stethoscope");
if(!$conn)
{
    echo "<h1>failed</h1>";

}
//Error Reporting 
ini_set ("display_errors", "1");
error_reporting(E_ALL);


if(isset($_POST['submit']))
{
    $dname = $_POST['dname'];
    $dage = $_POST['dage'];
    $demail = $_POST['demail'];
    $dnumber = $_POST['dnumber'];
    $dpwd = $_POST['dpwd'];
    $dspec = $_POST['dspec'];

    $filename = $_FILES['dID']['name'];
    $tempname = $_FILES['dID']['tmp_name'];
    $folder = "uploads/doctor/".$filename;
    
    $query = "INSERT INTO doctor(dname,dage,did,demail,dnumber,dpwd,dspec) values('$dname','$dage','$filename','$demail','$dnumber','$dpwd','$dspec')";
    $run = mysqli_query($conn,$query);
    //check query
    if(!$run)
    {
        echo "<script> alert('Query Failed')</script>";

    }
    else
    {
        echo mysqli_error($conn);
    }
    //move files to disk
    if(move_uploaded_file($tempname,$filename))
    {
        echo "<script> alert('Success')</script>";

    }
    else
    {
        echo "<script> alert('Failed')</script>";
    }
    echo '<meta http-equiv= "refresh" content="1; url=/Data-storage/dLogin.html"/>';

}
?>