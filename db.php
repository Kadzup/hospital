<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

function getDBCred(){
    return ["localhost","root", "", "hospital"];
}

// Create connection
function getConnection($servername, $username, $password, $dbname){
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function InsertClientRecord($fname, $lname, $address, $birthday, $weight, $height){
    $sql = "INSERT INTO  clients (fname, lname, address, birthday, weight, height) VALUES ('$fname','$lname','$address','$birthday','$weight','$height');";
    
    $cred = getDBCred();
    $conn = getConnection($cred[0], $cred[1], $cred[2], $cred[3]);
    
    if ($conn->query($sql) === FALSE) {
        echo "Error creating record: " . $conn->error;
    }

    $conn->close();
}

function InsertAddressRecord($country, $city, $street, $house){
    $sql = "INSERT INTO  address (country, city, street, house) VALUES ('$country','$city','$street','$house');";
    
    $cred = getDBCred();
    $conn = getConnection($cred[0], $cred[1], $cred[2], $cred[3]);
    
    if ($conn->query($sql) === FALSE) {
        echo "Error creating record: " . $conn->error;
    }

    $conn->close();
}

function InsertDiagnosisRecord($title, $description, $treatment_plan){
    $sql = "INSERT INTO  diagnosis (title, description, treatment_plan) VALUES ('$title', '$description', '$treatment_plan');";
    
    $cred = getDBCred();
    $conn = getConnection($cred[0], $cred[1], $cred[2], $cred[3]);
    
    if ($conn->query($sql) === FALSE) {
        echo "Error creating record: " . $conn->error;
    }

    $conn->close();
}

function GetAllRecords(){
    $sql = "SELECT * FROM clients;";
    
    $cred = getDBCred();
    $conn = getConnection($cred[0], $cred[1], $cred[2], $cred[3]);
    
    $result = $conn->query($sql);

    $conn->close();

    return $result;
}

function GetSearchedRecords($searching){
    $sql = "SELECT * FROM clients WHERE lname LIKE '%$searching%';";
    
    $cred = getDBCred();
    $conn = getConnection($cred[0], $cred[1], $cred[2], $cred[3]);
    
    $result = $conn->query($sql);

    $conn->close();

    return $result;
}

function GetAllRecordsAndSortBy($column, $order){
    $sql = "SELECT * FROM clients ORDER BY ".$column." ".$order.";";
    $cred = getDBCred();
    $conn = getConnection($cred[0], $cred[1], $cred[2], $cred[3]);
    
    $result = $conn->query($sql);

    $conn->close();

    return $result;
}

function GetAverageFromColumn($table, $columnName){
    $sql = "SELECT AVG(`$columnName`) FROM `$table`;";
    
    $cred = getDBCred();
    $conn = getConnection($cred[0], $cred[1], $cred[2], $cred[3]);
    
    $result = $conn->query($sql);
    
    $conn->close();
    
    foreach ($result as $items) {
        foreach ($items as $item){
            return $item;
        }
    }
}

// first lunch only
function CreateTable(){
    $sql = "CREATE TABLE `clients2` (
        `id` int(6) UNSIGNED NOT NULL,
        `fname` varchar(30) NOT NULL,
        `lname` varchar(30) NOT NULL,
        `address` varchar(50) DEFAULT NULL,
        `birthday` date DEFAULT NULL,
        `weight` int(6) DEFAULT NULL,
        `height` int(6) DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    $cred = getDBCred();
    $conn = getConnection($cred[0], $cred[1], $cred[2], $cred[3]);

    if ($conn->query($sql) === TRUE) {
        echo "Table Created Successfully";
    }
    else{
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
?>