<?php
$conn = mysqli_connect("localhost","root","","data_stethoscope"); //establishing connection and function returns connection object.

if(!$conn) //checking if connection is made.
{
    //mysqli_connect returned false(bool). 
    echo "<h1>failed</h1>"; //if the connection couldn't be established. 
    //when the sql server is turned off. 
}
else{

    $pnum = $_POST['pnum']; //getting in enetered phone number
    $ppassword = $_POST['ppassword']; //getting in entered password.
    $tablename = "P_".$pnum; //finding the table name from phone number. 

    $query = "SELECT * FROM patient WHERE pnum = $pnum "; 

    $run = mysqli_query($conn,$query); //returns a mysqli_result object. return a group of data. for select , show , describe, or explain for rest of the qeuries it returns true.
    //A query that runs but returns no results is still considered a "successful query", since the query did run in the database and an empty result set is a legitimate response.


    if(!$run) //the query didn't run in the database itself. 
    {
        echo mysqli_error($conn); //Return the last error description for the most recent function call, if any:
    }
    else{
        //query ran in the database. Doesn't matter if it returns anything or not. as long as it runs.

        if( $row = mysqli_fetch_assoc($run)  ) { //similar to that of a cursor functionality.The fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.
            $password = $row['ppassword']; //getting in the password from the database. 

            if($ppassword!=$password) //checks if the passwords match.
            {
                echo "<h3>incorrect password</h3>";
            }
            else
            {
                session_start();
                //Session is a way of persisting your information across multiple pages and requests. When you visit the login page of any site and you provide your username and password, you won't need to provide them again on subsequent pages.
                $_SESSION['tablename']=$tablename; //starting a session which we will use to access this user from here on.
                echo '<meta http-equiv= "refresh" content="1; url=/Data-Stethoscope/pdashboard.php"/>';
                //The objective of this technique( the above redirection ) is to enable redirects on the client side without confusing the user. 
            }
        }
        else{
            //if the entered phone number doesn't exist in table. 
            echo "account doesn't exist." ;
        }
    }
}
?>