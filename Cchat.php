<?php
    session_start();
        
    $con=mysqli_connect('localhost','root','','student');
    
    

    $id = $_SESSION['user'];
    $cid = $_GET['cid'];

   
    $run = mysqli_query($con, "SELECT * FROM `student` WHERE type = $id");
    $data = mysqli_fetch_assoc($run);


    $user = $data['id'];
    error_reporting(0);

    if($data)
    {
    
        ?>
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
                <title>Dashboard - Admin</title>
            </head>
            <body>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><b>SCS</b></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="Student.php">Home </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="counsellorlist.php">Counsellor</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="chat.php">Chat <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button class="btn border border-danger text-danger"><?php if ($data['type'] == '2') { echo "Student"; } ?></button>
                    </div>
                </div>
                <div class="dashboard pt-5 pl-5 pr-5 pb-0 text-center">
                    <h3 class="text-info">Chat With Counsellor: <b class="text-danger"><?php     
                                                                    $cid; 
                                                                    $run = mysqli_query($con, "SELECT * FROM `student` WHERE id = $cid");
                                                                    $data = mysqli_fetch_assoc($run);
                                                                    echo $data['fname'];   ?></b>
                                                                     
                                                                </h3>
                </div>

                <div class="addcounsellor p-5">
                    <div class="box">   
                        <?php 
                            $con=mysqli_connect('localhost','root','','student');
                            $query="SELECT * FROM `chat` WHERE cid=$cid";
                            $run=mysqli_query($con,$query);
                            $row=mysqli_num_rows($run);
                            while($d=mysqli_fetch_assoc($run))
                            {  
                                ?>
                                    <label for="" class="left">   <?php echo $d['answer'].": ".$d['question'];?> </label> <br>
                                    
                                </tr>
                                <?php
                            } 
                        ?>
                        <form action="" method="post">  
                            <input type="text" name="msg" class="form-control" id="">
                            <input type="hidden" name="cid" value="<?php echo $cid; ?>" class="form-control" id="">
                            <input type="hidden" name="sid" value="<?php echo $user; ?>" class="form-control" id="">
                            <input type="submit" value="send" name="chat" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </body>
        </html>
        <?php
    }
    else
    {
        
        $_SESSION['msg'] = "VU ID is not available!";
        header("Location:login.php");   
    }
?>


<?php
    

    if(isset($_POST['chat']))
    {
        // echo '<script>alert("Registartion Completed")</script>';
        $msg = $_POST['msg'];
        $cid = $_POST['cid'];
        $sid = $_POST['sid'];
        
        $con=mysqli_connect('localhost','root','','student');
        // echo '<script>alert("Registartion Completed")</script>';
        $run=mysqli_query($con,"INSERT INTO `chat`(`cid`,`sid`,`question`,`answer`,`status`) "
            . "VALUES ('$cid','$sid','$msg','Student','1')");
            // echo '<script>alert("Registartion Completed")</script>';
        if($run)
        {
            
            echo "<script type='text/javascript'>document.location.href='chat.php';</script>";
        }
        else
        {
            echo("Registration Failed...! $sql");
            echo "Error: " . $run . "<br>" . $con->error;
        }
    }

?>