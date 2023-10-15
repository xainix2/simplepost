<?php

// get hold of the json data sent by the javascript as json data 
$inputJSON = file_get_contents('php://input');
// lets stor the POST data in an array, we are calling this array as $input
$input= json_decode( $inputJSON, TRUE ); //convert JSON into array

// set the default value for returning status 
$status = 'failaaaaaed';

// lets create database connectivity functions
$conn = false;
// the function will return boolean, true if connected
function connectDb(){
    // get hold of global variables
    global $conn, $status;

    $servername = "localhost";
    $database = "database";
    $username = "root";
    $password = "Ironman20!6";
    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // // Check the connection
    if (!$conn) 
    {
        $status = "failed";
    }

    return $conn;
//     
    
}

function disconnectDb(){
    global $conn; 
   // $conn->close();
}

// check if we have the required data in place only then we will save it 
if($input['name']!="" && $input['email']!=""){

    // connect to db;
    $conn = connectDb();
    // prepare the sql
    $sql = "insert into newsletter (cname,cemail,extracol) values('"
        .$input['name']."','".$input['email']."','')";
    
    //$status = $sql;
    
    //execute the sql
    if ($conn->query($sql) === TRUE) {
         $status = "done";
    }
    else {
  $status = $conn->error;
}
    // close the databse connection
    disconnectDb();

}

$responceData = array(
    "data"=>$input,
    "status"=>$status,
    "conn"=>$conn
   
);
echo json_encode($responceData);