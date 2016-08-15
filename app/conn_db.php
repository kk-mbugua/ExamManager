<?php
//declaring the $conn variable
$conn = ""; 
$rows_affected = "";
$this_result = "";

function db_open($db_name = "ris2") {
    //declaring the conn globale variables
    global $conn;
    //set database connection variables
    $servername     =   "localhost";
    $username       =   "root";
    $password       =   "root"; 
    
    //open db
    $conn = new mysqli($servername, $username, $password, $db_name);
    
    //check if db has opened
    if ($conn->connect_error) {
        $error_db = "Failed connection to database: " . "$db_name" . "<br>";
        error_handler($error_db, mysqli_connect_errno(), mysqli_connect_error());
    }
}


function affected() {
    global $conn, $rows_affected;
    $rows_affected = mysqli_affected_rows($conn);
    
    if ($rows_affected < 1) {
        $error_sql ="No information added to or retreived from database. Try checking your parameters" . "<br>";
        error_handler($error_sql, mysqli_errno($conn), mysqli_error($conn));
        return 0;
    }
    else {
        return $rows_affected;
    }
}

function db_close() {
    global $conn;
    $conn->close();
}

function error_handler($error_msg, $mysqli_errno, $mysqli_errmsg) {
    
    if ($mysqli_errmsg) {
        $error_msg .= "mysqli error: " . $mysqli_errno . ":- " . $mysqli_errmsg . "<br>";
    }
    
    echo "The following error(s) has occured:" . "<br>" . $error_msg;
   // die();
}


//updates the database or returns an assosiative array if data is being pulled
function db_query($sql) {
    
    global $conn;
    
    //open the database
    db_open();
    
    //run the mysql querry
    $result = $conn->query($sql);
    affected();
    //close the databse
    db_close();
    
    //check if query was succesfull or returned an error
    if ($result == FALSE) {
        //an error has occured querying the database
        $error_sql = "Error querying db, check sql statement" . "<br>";
        error_handler($error_sql, mysqli_errno($conn), mysqli_error($conn));        
    }
    else {
        return $result;
    }

}

?>