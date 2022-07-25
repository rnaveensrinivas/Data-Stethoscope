<?php


$conn = mysqli_connect("localhost","root","","data_stethoscope");

if(!$conn)
{
    echo "<h1>failed<h1>";

}

//error reporting 
ini_set ("display_errors", "1");
error_reporting(E_ALL);

if(isset($_POST['submit']))
{
    
    session_start();
    $tablename = $_SESSION['tablenameup'];
    $dname = $_SESSION['docname'];
    $dnum = $_SESSION['docnum'];
    $sno = $_POST['sno'];
    $date = $_POST['date'];
    $filename = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];
   
    $folder = "uploads/patient/".$filename;

    $query = "INSERT INTO $tablename values('$sno','$date','$filename','$dname','$dnum')";
    $run = mysqli_query($conn,$query);
    
    //check query
    if(! $run)
    {
        echo "<script>alert('Query failed!')<script>";

    }
    else
    {
        echo mysqli_error($conn);
    }
    
    //move files
    if(move_uploaded_file($tempname,$folder))
    {
        echo "<script>alert('File Uploaded!!')</script>";
    }
    else
    {
        echo "<script>alert('Failed')</script>";
    }

    echo '<meta http-equiv= "refresh" content="1; url=/Data-storage/dLogin.html"/>';

}
?>