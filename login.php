<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="https://i.pinimg.com/originals/16/aa/df/16aadf06716be2bb9c958b31ee1173a1.jpg" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<style>
    .container
    {
        width: 500px;
    }
</style>
<body>
    <div class="head">
        <div class="container mt-5">
            <h3 class="text-center text-primary"> Login</h3>
            <p>
                <?php
                    session_start();
                    echo $_SESSION['msg'];
                ?>
            </p>
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-12 mt-2">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" id="">
                    </div>

                    <div class="col-sm-12 mt-2">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" id="">
                    </div>

                    <div class="col-sm-12 mt-2">
                        <label for=""></label>
                        <button type="submit" name="done" class="btn btn-primary form-control">Login</button>
                    </div>

                    <div class="col-sm-12 mt-1">
                        <h6>If you don't have an account <a href="Registration.php" class="text-primary"><u>Register</u></a> </h6>
                    </div>
                </div>
            </form>

        </div>
    </div>
</body>
</html>

<?php
    
        
    if(isset($_POST['done']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $con=mysqli_connect('localhost','root','','student');
        $run= mysqli_query($con, "SELECT * FROM `student` WHERE email='$email' and password='$password'");
        $data = mysqli_fetch_assoc($run);
        error_reporting(0);
        if($data)
        {
            if($data['type'] == '1')
            {
                $_SESSION['user'] = $data['type'];
                header("Location:dashboard.php");
            }
            else if($data['type'] == '2')
            {
                $_SESSION['user'] = $data['type'];
                header("Location:Student.php");
            }
            else if ($data['type'] == '3')
            {
                $_SESSION['user'] = $data['type'];
                header("Location:Counsellor.php");
            }
            
        }
        else
        {
            alert("Invalid Email and Password...!");
        }
    }

?>

