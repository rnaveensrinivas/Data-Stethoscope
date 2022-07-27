<?php
$conn = mysqli_connect("localhost","root","","data_stethoscope"); //establishing the connection with MySQL server.
//$conn = new mysqli(host, username, password, dbname, port, socket) OOP sytle
//mysqli_connect(host, username, password, dbname, port, socket) procedural style
//It returns an object which represent MySql connection. If connection failed then it return FALSE.
//mysqli is improved(i) and secure than mysql

if(!$conn){ 
    echo "<h1>failed</h1>"; 
    // if the connection couldn't be established then report error.
    //mostly the MySQL is not tured on.
} 
else{
        
    if(isset($_POST['submit']))//if the form has been submitted. 
    {
        //There is no server side package cleaning done. check Eduvate, where the inputs are cleaned.
        $pname = $_POST['pname'];
        $page = $_POST['page'];
        $pemail = $_POST['pemail'];
        $pnum = $_POST['pnum'];
        $ppassword = $_POST['ppassword'];
        $pblood = $_POST['pblood'];

        $filename = $_FILES['pid']['name'];
        $tempname = $_FILES['pid']['tmp_name'];
        /*

        The global predefined variable $_FILES is an associative array containing items uploaded via HTTP POST method.

        $_FILES['file']['tmp_name']
        Provides the name of the file stored on the web server’s hard disk in the system temporary file directory
        This file is only kept as long as the PHP script responsible for handling the form submission is running. 
        So, if you want to use the uploaded file later on (for example, store it for display on the site), 
        you need to make a copy of it elsewhere.

        To do this you can use the move_uploaded_file() function which moves an uploaded file from its temporary 
        to permanent location. Please note that you'd best use move_uploaded_file() over functions like copy() 
        and rename() for this purpose because it performs additional checks to ensure the file was 
        indeed uploaded by the HTTP POST request.

        $_FILES['file']['name']
        Provides the name of the file on the client machine before it was submitted.
        If you make a permanent copy of the temporary file, you might want to give it its original name instead of the 
        automatically-generated temporary filename that’s described above.
        */

        //Where we are planning on permanently storing it. That location's absolute address.
        $folder = "uploads/patient/".$filename; //note that the file uploded shouldn't have any space in the name. 
        //if there is space then it won't accept. 

        $query = "INSERT INTO patient(pname,page,pid,pemail,pnum,ppassword,pblood) values('$pname','$page','$filename','$pemail','$pnum','$ppassword','$pblood')";
        $run = mysqli_query($conn,$query);
        /*
        $conn -> query(query, resultmode) oop style.
        mysqli_query(connection, query, resultmode) procedural style
        note : result mode is optional. 

        For successful SELECT, SHOW, DESCRIBE, or EXPLAIN queries it will return a mysqli_result object. 
        For other successful queries it will return TRUE. FALSE on failure.

        Even if the query didn't give any output also it is considered to be TRUE. 
        
        Only when the query didn't run it will return false. 

        */

        
        //check if query ran in the server ?
        if(!$run)
        {
            echo "<script> $query alert('Query Failed')</script>";
            echo mysqli_error($conn);
            /*
            Return the last error description for the most recent function call, if any.
            Returns a string with the error description. "" if no error occurred.


            */
        }
        
        //moving files from temp folder of server to permanent folder. 
        if(move_uploaded_file($tempname,$folder))
        {
            echo "<script> alert('Success')</script>";
        }
        else
        {
            echo "<script> alert('Failed')</script>";
        }

        //Creating a new table for the patient, that table will hold the patient's history. 
        $tablename = "P_".$pnum;
        $sql = "CREATE TABLE $tablename ( date DATE, filename varchar(100), dname varchar(100), dnum varchar(20))";
        $run1 = mysqli_query($conn,$sql);

        if(!$run1)
        {
            echo mysqli_error($conn);
        }
        else{
            echo '<meta http-equiv= "refresh" content="1; url=/Data-stethoscope/plogin.html"/>';
            /*
            Defines a time interval for the document to refresh itself.
            The value "refresh" should be used carefully, as it takes the control of a page away from the user.
            refresh the current page and go to that page. 
            an alternate would be "header()".

            */
        }
    }
}


?>