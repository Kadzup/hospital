<?php
    include_once("../db.php");

    function BuildTable(){
        $order = "";
        $column = "";

        if(isset($_GET['order'])){
            $order = $_GET['order'];
        }
        else{
            $order = 'ASC';
        }

        if(isset($_GET['column'])){
            $column = $_GET['column'];
        }
        else{
            $column = 'id';
        }

        $DataArray = GetAllRecordsAndSortBy($column, $order);

        // build table by selected data
        foreach ($DataArray as $items) {
            echo "<tr>";
            $k = 0;
            foreach ($items as $item){
                if($k == 5)
                    echo "<td>$item kg</td>";
                else if($k == 6)
                    echo "<td>$item cm</td>";
                else
                    echo "<td>$item</td>";                
                $k++;
            }
            echo "</tr>";
        }
    }  

    function GetAverageWeight(){
        return GetAverageFromColumn("clients","weight");
    }

    function GetSortingHref($column){
        $order = "";

        if(isset($_GET['order'])){
            $order = $_GET['order'];
        }

        if($order != ""){
            if($order == "ASC"){
                $order = "DESC";
            }
            else{
                $order = "ASC";
            }
        }

        if(isset($_GET['column'])){
            if($_GET['column'] == $column){
                if($order == ""){
                    $order = "DESC";
                }
            }
        }

        return "?column=$column&&order=$order";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table View</title>

    <?php include_once("../header.html");?>

</head>
<body>
    <?php include_once("../menu.html"); ?>
    <div class="container">
        <div class="row">
            <div class="col-xs"></div>
            <div class="col-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><a href="<?php echo GetSortingHref("id");?>">#</a></th>
                            <th scope="col"><a href="<?php echo GetSortingHref("fname");?>">First Name</th>
                            <th scope="col"><a href="<?php echo GetSortingHref("lname");?>">Last Name</th>
                            <th scope="col"><a href="<?php echo GetSortingHref("address");?>">Address</th>
                            <th scope="col"><a href="<?php echo GetSortingHref("birthday");?>">Birth Date</th>
                            <th scope="col"><a href="<?php echo GetSortingHref("weight");?>">Weight</th>
                            <th scope="col"><a href="<?php echo GetSortingHref("height");?>">Height</th>
                            <th scope="col"><a href="<?php echo GetSortingHref("diagnosis");?>">Diagnosis</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(($_POST['fname'] != "") && ($_POST['lname'] != "") && ($_POST['addresscountry'] != "") && ($_POST['addresscity'] != "") && ($_POST['addressstreet'] != "") && ($_POST['addresshouse'] != "") && ($_POST['birthday'] != "")) {
                            InsertAddressRecord($_POST['addresscountry'], $_POST['addresscity'], $_POST['addressstreet'], $_POST['addresshouse']);
                            InsertClientRecord( $_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['birthday'], $_POST['weight'], $_POST['height']);
                        }
                    ?>
                    <?php BuildTable(); ?>
                    <tr>
                        <td colspan="4"></td>
                        <td><b>Average Weight:</b></td>
                        <td><b><u> <?php echo GetAverageWeight(); ?> kg</u></b></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <a type="button" class="btn btn-dark" href="../" data-toggle="tooltip" data-placement="bottom" title="Back to input form">Back</a>
            </div>
            <div class="col-xs"></div>
        </div>
    </div>
</body>
</html>