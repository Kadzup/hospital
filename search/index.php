<?php
    include_once("../db.php");

    function BuildTable(){
        $searching = "";
        if(isset($_POST['search']))
            $searching = $_POST['search'];

        if($searching == "")
            $DataArray = GetAllRecords();
        else
            $DataArray = GetSearchedRecords($searching);

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
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Address</th>
                            <th scope="col">Birth Date</th>
                            <th scope="col">Weight</th>
                            <th scope="col">Height</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(($_POST['fname'] != "") && ($_POST['lname'] != "") && ($_POST['address'] != "") && ($_POST['birthday'] != "")) {
                            InsertRecord( $_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['birthday'], $_POST['weight'], $_POST['height']);
                        }
                    ?>
                    <?php BuildTable(); ?>
                    </tbody>
                </table>
                <a type="button" class="btn btn-dark" href="../" data-toggle="tooltip" data-placement="bottom" title="Back to input form">Back</a>
            </div>
            <div class="col-xs"></div>
        </div>
    </div>
</body>
</html>