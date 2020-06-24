<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
//https://www.w3schools.com/php/php_form_url_email.asp
//https://www.w3schools.com/php/php_file_upload.asp
//https://code-boxx.com/simple-csrf-token-php/

$key = $_SESSION['token'];
if($key!==$_POST['hash']){
    echo 'CSRF Error';die;
}
include_once("connect.php");

$fname = '';
$lname = '';
$email = '';
$password = '';
$dateofbirth = '';
$gendre = '';
$telephone = '';
$mess_error = '';

//Validation

if(isset($_POST['fname']) && !empty($_POST['fname']) && strlen($_POST['fname'])>3){
    $fname = trim($_POST['fname']);
}
else{
    $error = true;
    $mess_error.='Please enter first name!'."<br />";
}
if(isset($_POST['lname']) && !empty($_POST['lname'])){
    $lname = trim($_POST['lname']);
}
else{
    $error = true;
    $mess_error.='Please enter last name!'."<br />";
}
if(isset($_POST['email']) && !empty($_POST['email'])){
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $mess_error.='Email adress is invalid!';
    }
    else{
        $email = trim($_POST['email']);
    }
}
else{
    $error = true;
    $mess_error.='Please enter email adress!'."<br />";
}
if(isset($_POST['password']) && !empty($_POST['password'])){
    if($_POST['password']===$_POST['password2']){
        $password = sha1(trim($_POST['password']));
    }
    else{
        $error = true;
        $mess_error.='Password / Confirmation is missing!'."<br />";
    }
}
else{
    $error = true;
    $mess_error.='Password incorrect!'."<br />";
}
if(isset($_POST['dateofbirth']) && !empty($_POST['dateofbirth'])){
    $dateofbirth = date('Y-m-d',strtotime($_POST['dateofbirth']));
}
else{
    $error = true;
    $mess_error.='Please enter date of birth!'."<br />";
}
if(isset($_POST['gendre']) && !empty($_POST['gendre'])){
    $arrayGendre = array('m','f','n');
    if(in_array($_POST['gendre'],$arrayGendre) ){
        $gendre = $_POST['gendre'];
    }
    else{
        $error = true;
        $mess_error.='The value you have entered is incorrect!'."<br />";
    }
}
else{
    $error = true;
    $mess_error.='Please enter the gendre!'."<br />";
}
if(isset($_POST['telephone']) && !empty($_POST['telephone'])){
    $telephone = $_POST['telephone'];
}
else{
    $error = true;
    $mess_error.='Please enter the phone number'."<br />";
}


if(isset($_FILES['image']) && $_FILES['image']['size']>0)
{
  $path = "uploads/";
  $image = basename( $_FILES['image']['name']);
  $path = $path . $image;
  $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        // echo "Image type- " . $check["mime"] . ".";
        if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
            //ok
        } else{
        $mess_error.= "Unable to save image! <br>";
        }
    } else {
        $mess_error.= "The file type is not supported!";
    }
}
?>
<?php
    if(isset($error) && $error===true){
        echo '<div class="alert alert-danger" role="alert">'.
        $mess_error.'<br><br><a class="alert-link" href="formular.php"> << Enter the data correctly!</a>
        </div>';
        //include("formular.php");
    }
    else{
        //salvare date
        $sql = "INSERT INTO users2 (fname, lname, email, password, dateofbirth, gendre, telephone, image)
        VALUES ('".$fname."', '".$lname."', '".$email."', '".$password."', '".$dateofbirth."', '".$gendre."', '".$telephone."', '".$image."')";
        if (mysqli_query($con, $sql)) {
            $success_message = "Data entered successfully!";
            $db_error = false;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
    mysqli_close($con);

 ?>

<!DOCTYPE html>
 <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    </head>
    <body>

 <?php if(isset($db_error) && $db_error===false):?>
        <div class="alert alert-success" role="alert">
            <p><?php echo $success_message;?></p>
            <a class="alert-link" href="formular.php"> << Add new user</a>
        </div>
        <br /> 
<?php endif;?>  
    </body>
 </html>
