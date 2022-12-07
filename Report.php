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
$tableName="report";
$columns= ['PatientName', 'Age','Report'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
    if(empty($db)){
        $msg= "Database connection error";
    }elseif (empty($columns) || !is_array($columns)) {
        $msg="columns Name must be defined in an indexed array";
    }elseif(empty($tableName)){
        $msg= "Table Name is empty";
    }else{
        $patName = $_POST['patName'];
        $query = "SELECT PatientName, Age, Report FROM report WHERE PatientName = '$patName'";
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
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/ambulance.css">
    <link rel="stylesheet" type="text/css" href="css/style3.css">

</head>
<body>
<div class="docContain about">
    <div class="infoContain">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php echo isset($deleteMsg) ? $deleteMsg : ''; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead><tr><th>S.N</th>
                                <th>Patient Name</th>
                                <th>Age</th>
                                <th>Report</th>
                            </thead>
                            <tbody>
                            <?php
                            if(is_array($fetchData)){
                                $sn=1;
                                foreach($fetchData as $data){
                                    ?>
                                    <tr>
                                        <td><?php echo $sn; ?></td>
                                        <td><?php echo $data['PatientName']??''; ?></td>
                                        <td><?php echo $data['Age']??''; ?></td>
                                        <td><?php echo $data['Report']??''; ?></td>
                                    </tr>
                                    <?php
                                    $sn++;}}else{ ?>
                            <tr>
                                <td colspan="8">
                                    <?php echo $fetchData; ?>
                                </td>
                            <tr>
                                <?php
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>