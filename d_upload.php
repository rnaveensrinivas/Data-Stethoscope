<?php
$conn = mysqli_connect("localhost","root","","data_stethoscope");
//establishing a connection with database. 

if(!$conn)
{
    //We couldn't connect with the database. 
    echo "<h1>failed<h1>";
    exit() ; //not proceeding with left over script. 
}


if(isset($_POST['submit'])) //if the form has been submitted. 
{

    session_start(); //starting the seesion 

    $tablename = $_SESSION['tablenameup'];
    $dname = $_SESSION['docname'];
    $dnum = $_SESSION['docnum'];
    //getting in the doctor details. 
    
    //getting in the date and file via post. 
    $date = $_POST['date'];
    $filename = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];
   

    //setting the absolute path of the file. 
    $folder = "uploads/patient/".$filename;

    //insert that new record of patient into their table. 
    $query = "INSERT INTO $tablename values('$date','$filename','$dname','$dnum')";
    $run = mysqli_query($conn,$query);
    
    
    //now we will move the file from temporary to permanent stroage. 
    if(move_uploaded_file($tempname,$folder))
    {
        //yay, we successfully uploaded the file. 
        echo "<script>alert('File Uploaded!!')</script>";
        echo '<meta http-equiv= "refresh" content="1; url=/Data-Stethoscope/dLogin.html">';

    }
    else
    {
        //we coudln't upload the file. 
        echo "<script>alert('Failed')</script>";
    }


}
?>