<?php

$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "project";
$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$db= $conn;
$tableName="doctor";
$columns= ['DocName', 'Specialty','Degree','VisitingTime'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
    if(empty($db)){
        $msg= "Database connection error";
    }elseif (empty($columns) || !is_array($columns)) {
        $msg="columns Name must be defined in an indexed array";
    }elseif(empty($tableName)){
        $msg= "Table Name is empty";
    }else{

        $columnName = implode(", ", $columns);
        $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id DESC";
        $result = $db->query($query);

        if($result== true){
            if ($result->num_rows > 0) {
                $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg= $row;
            } else {
                $msg= "No Data Found";
            }
        }else{
            $msg= mysqli_error($db);
        }
    }
    return $msg;
}
?>