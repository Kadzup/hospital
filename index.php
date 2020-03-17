<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Input Form</title>

    <?php 
        include_once("header.html");
    ?>
</head>
<body>
    <?php include_once("menu.html"); ?>
    <?php include_once("db.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-md"></div>
            <div class="col-sm">
                <div class="input">
                    <form method="POST" action="/table/index.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First name</label>
                            <input type="text" class="form-control" name="fname" placeholder="John">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last name</label>
                            <input type="text" class="form-control" name="lname" placeholder="Doe">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Birth Date</label>
                            <input type="date" class="form-control" name="birthday">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Address details</label>
                            <input type="text" class="form-control" name="addresscountry" aria-describedby="addressHelp" placeholder="Enter country name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="addresscity" aria-describedby="addressHelp" placeholder="Enter city">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="addressstreet" aria-describedby="addressHelp" placeholder="Enter street address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="addresshouse" aria-describedby="addressHelp" placeholder="Enter house number">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Weight</label>
                            <input type="number" class="form-control" name="weight" placeholder="65 kg" min="0" value="0">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Height</label>
                            <input type="number" class="form-control" name="height" placeholder="165 cm" min="0" value="0">
                        </div>

                        <button type="button submit" name="submit" class="btn btn-success btn-block">Add record</button>
                    </form>
                </div>
            </div>
            <div class="col-md"></div>
        </div>
    </div>
        
</body>
</html>