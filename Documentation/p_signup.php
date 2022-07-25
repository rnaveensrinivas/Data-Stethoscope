<?php
$conn = mysqli_connect("localhost","root","","data_stethoscope"); // establishing a connection. 

if(!$conn) // if connection is not made then print this error. 
{
    echo "<h1>failed</h1>";

}

//error reporting :The quickest way to display all php errors and warnings is to add these lines to your PHP code file:
ini_set ("display_errors", "1");
error_reporting(E_ALL);

// if the form is submitted then do the following. 
if(isset($_POST['submit']))
{
    $pname = $_POST['pname'];
    $page = $_POST['page'];
    $pemail = $_POST['pemail'];
    $pnum = $_POST['pnum'];
    $ppassword = $_POST['ppassword'];
    $pblood = $_POST['pblood'];
    $filename = $_FILES['pid']['name'];
    $tempname = $_FILES['pid']['tmp_name'];
    $folder = "uploads/patient/".$filename; 

    $query = "INSERT INTO patient(pname,page,pid,pemail,pnum,ppassword,pblood) values('$pname','$page','$filename','$pemail','$pnum','$ppassword','$pblood')";
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
    
    //move files
    if(move_uploaded_file($tempname,$folder))
    {
        echo "<script> alert('Success')</script>";
    }
    else
    {
        echo "<script> alert('Failed')</script>";
    }
    $tablename = "P_".$pnum;
    $sql = "CREATE TABLE $tablename ( sno int(4) NOT NULL,date DATE, filename varchar(100), dname varchar(100), dnum varchar(20), PRIMARY KEY (sno))";
    $run1 = mysqli_query($conn,$sql);
    if(!$run1)
    {
        echo mysqli_error($conn);
    }
    echo '<meta http-equiv= "refresh" content="1; url=/Data-storage/plogin.html"/>';
    //date doctor filname,docphone
}
?>