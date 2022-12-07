<?php
include("doctorData.php");
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

                                <th>Name</th>
                                <th>Specialty</th>
                                <th>Degree</th>
                                <th>Visiting Time</th>
                            </thead>
                            <tbody>
                            <?php
                            if(is_array($fetchData)){
                                $sn=1;
                                foreach($fetchData as $data){
                                    ?>
                                    <tr>
                                        <td><?php echo $sn; ?></td>
                                        <td><?php echo $data['DocName']??''; ?></td>
                                        <td><?php echo $data['Specialty']??''; ?></td>
                                        <td><?php echo $data['Degree']??''; ?></td>
                                        <td><?php echo $data['VisitingTime']??''; ?></td>
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