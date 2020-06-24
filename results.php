<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Results</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    </head>
    <body>
<?php
include_once("connect.php");
$sql = "SELECT id, fname, lname , email, dateofbirth, gendre, telephone, image, add_date FROM users2";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) :?>
        <div class="container py-3">
<?php include('menu.php');?>
            <h2>Results from the data base are:</h2>    
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Date of birth</th>
                        <th>Gendre</th>
                        <th>Telephone</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
<?php while($row = mysqli_fetch_assoc($result)):?>
                    <tr>
                        <td><?php echo htmlentities($row["id"]);?></td>
                        <td><?php echo htmlentities($row["fname"]);?></td>
                        <td><?php echo htmlentities($row["lname"]);?></td>
                        <td><?php echo htmlentities($row["email"]);?></td>
                        <td><?php echo htmlentities($row["dateofbirth"]);?></td>
                        <td><?php echo htmlentities($row["gendre"]);?></td>
                        <td><?php echo htmlentities($row["telephone"]);?></td>
                        <td>
                            <img style="max-width:50px;" src="uploads/<?php echo $row["image"];?>" alt="image">
                            </td>
                    </tr>
<?php endwhile;?>
                </tbody>
            </table>
<?php else:?>
    echo "0 results";
<?php endif;?>
        </div>
    </body>
</html>
<?php
mysqli_close($con);
 ?>