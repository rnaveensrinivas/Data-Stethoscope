<?php
echo "<html>"; //encoding html inside php
echo "<body>";
session_start(); //starting a session so that we know whose records to open.
$tablename = $_SESSION['tablename']; //getting in the user's table details.

//Establishing Connection with Db
$conn = mysqli_connect("localhost","root","","data_stethoscope");
if(!$conn){
    echo "failed";
}
else{
    //bringing in table style detail/
    echo "<link rel='stylesheet' type='text/css' href='table.css' />";

    // //error reporting 
    // ini_set ("display_errors", "1");
    // error_reporting(E_ALL);

    $query = "SELECT * FROM $tablename"; //querying the the person's history.
    $run = mysqli_query($conn, $query); //return the query result into the $run object. 

    if(!$run){
        //if the query itself didn't run then push error.
        echo mysqli_error($conn);
    }
    else{
        echo "<table class = 'dash' border='2px'>";

        echo "<tr><td>FileName</td><td>Date</td><td>Doctor Name</td><td>Doctor Phone</td></tr>" ;
        while($row = mysqli_fetch_assoc($run)) {
            /* 
            Fetch a result row as an associative array
            The fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.
            Note: Fieldnames returned from this function are case-sensitive.
            $row = $run -> fetch_assoc() oop style.
            mysqli_fetch_assoc($run) procedural style

            Returns an associative array of strings representing the fetched row. 
            NULL if there are no more rows in result-set

            */

            //displaying the details. 
        
            echo "<tr>";
                echo "<td>{$row['filename']}</td>";
                echo "<td>{$row['date']}</td>";
                echo "<td>{$row['dname']}</td>";
                echo "<td>{$row['dnum']}</td>";
                $filename = "/Data-Stethoscope/uploads/patient/".$row['filename'];  

                //bascially we are just storing the name of the file in DB, but we are storing all the files in the secondary storage. 
                //here the secondary storage is a folder in the same directory. 
                //The thing is all the files should have unique name, since all the files are stored under same roof. 

                echo '<td><a href= "'.$filename.'" target="_blank"><button>View</button></a></td>';
                //here we are redirecting them to that folder itself. 
                //and that file(anytime ) is forced to be displayed in the browswer. 

            echo "</tr>";
        } 
    }
    
    echo "</table>"; //bunch of closing tags.
    echo "</body>";
    echo "</html>";
}


?>