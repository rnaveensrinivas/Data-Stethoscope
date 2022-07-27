<?php
$conn = mysqli_connect("localhost","root","","data_stethoscope"); //establishing a connection with MySQL.

if(!$conn)
{
    //MySQL is not turned on. 
    echo "<h1>failed, server is not active. </h1>";
    exit() ;
    // the script dies after encountering this statement. 
    //no futher instruction is executed.

}
//Error Reporting 
ini_set ("display_errors", "1");
error_reporting(E_ALL);


if(isset($_POST['submit'])) //if the form is submitted.
{
    //getting in all the form details.
    $dname = $_POST['dname'];
    $dage = $_POST['dage'];
    $demail = $_POST['demail'];
    $dnumber = $_POST['dnumber'];
    $dpwd = $_POST['dpwd'];
    $dspec = $_POST['dspec'];

    //getting in the files. 
    $filename = $_FILES['dID']['name']; //file name which was given by user. 
    $tempname = $_FILES['dID']['tmp_name']; //temp name with which that file is stored in server/temp.
    $folder = "uploads/doctor/".$filename; //absolute path to which file will be saved. 
    
    //adding the doctor to doctor's table. 
    $query = "INSERT INTO doctor(dname,dage,did,demail,dnumber,dpwd,dspec) values('$dname','$dage','$filename','$demail','$dnumber','$dpwd','$dspec')";
    $run = mysqli_query($conn,$query);

    //check query
    if(!$run)
    {
        echo "<script> alert('Query Failed')</script>";
        
    }
    else
    {
        //move files from temporary storage to permanent storage. 
        //temporary storage is in scope as long as this current script is running. 
        //after this script the temp storage is not accessible. 
        //so before the storage goes out of scope move it to a permanent storage. 
        if(move_uploaded_file($tempname,$folder))
        {
            echo "<script> alert('Success')</script>";
            echo '<meta http-equiv= "refresh" content="1; url=/Data-Stethoscope/dLogin.html"/>';
        }
        else
        {
            echo "<script> alert('Failed')</script>";
        }
    }
}
?>