<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $length = 32;
    $_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length); 
    $hash = $_SESSION['token'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta hhtp-equiv="X-UA-Compatible" content="ie=edge">
    <title>Helga's FORM Course 8</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>
    <div class="container py-4">
<?php include('menu.php');?>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width:600px;">
            <h4 class="card-title mt-3 text-center">Create new account</h4>

            <form action="http://localhost/LinkAcademy/Core%20PHP%20Programming/Core%20PHP%208/post.php" method="post" enctype="multipart/form-data">

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="fname" class="form-control" placeholder="First Name" type="text">
                </div><!-- form-group -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="lname" class="form-control" placeholder="Last Name" type="text">
                </div><!-- form-group -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email Adress" type="email">
                </div><!-- form-group -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password" class="form-control" placeholder="Password" type="password">
                </div><!-- form-group -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class=" fa fa-lock"></i> </span>
                    </div>
                    <input name="password2" class="form-control" placeholder="Password Confirmation" type="password">
                </div><!-- form-group -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                    </div>
                    <input name="dateofbirth" class="form-control" placeholder="Date of birth" type="text" onfocus="(this.type='date')" onblur="(this.type='text')">
                </div><!-- form-group -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-genderless"></i> </span>
                    </div>
                    <select name="gendre" class="form-control">
                        <option selected="">Select gendre</option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                        <option value="n">Other</option>
                    </select>
                </div><!-- form-group -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <input name="telephone" class="form-control" placeholder="Phone number" type="tel">
                </div><!-- form-group -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-file-image"></i> </span>
                    </div>
                    <input name="image" class="form-control" placeholder="Image" type="file">
                </div><!-- form-group -->
                <input type="hidden" name="hash" value="<?php echo $hash;?>">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Submit </button>
                </div>
            </form>
        </article>
    </div> <!-- card -->
    </div> <!-- end container -->
</body>
</html>