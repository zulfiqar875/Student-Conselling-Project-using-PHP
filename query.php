<?php
    session_start();
        
    $con=mysqli_connect('localhost','root','','student');
    
    
    $cid = $_GET['cid'];
    $id = $_SESSION['user'];
    // echo $id;

   
    $run = mysqli_query($con, "SELECT * FROM `student` WHERE type = $id");
    $data = mysqli_fetch_assoc($run);

    error_reporting(0);

    if($data)
    {
        $id = $data['id'];
        
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
                            <li class="nav-item active">
                                <a class="nav-link" href="counsellorlist.php">Counsellor <span class="sr-only">(current)</span> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="chat.php">Chat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="dashboard pt-5 pl-5 pr-5 pb-0 text-center">
                    <h3 class="text-info">Our Counsellor</h3>
                </div>

                <div class="addcounsellor p-5">
                    <div class="box">
                        <form method="post">
                            <h6 class="text-danger">*Kindly answer to these question following given below:</h4>
                            <hr>
                            <input type="hidden" name="cid" value="<?php echo $cid ?>" id="">
                            <input type="hidden" name="sid" value="<?php echo $id;?>" id="">
                            <?php
                                $con=mysqli_connect('localhost','root','','student');
                                $query="SELECT * FROM `systemq`";
                                $run=mysqli_query($con,$query);
                                $row=mysqli_num_rows($run);
                                $n = 1;
                                while($data=mysqli_fetch_assoc($run))
                                {  
                                    ?>
                                        <?php echo $data['Q1'] ?> <br>
                                        <input type="hidden" name="q<?php echo $n ?>" value="<?php echo $data['Q1'] ?>" class="form-control">
                                        <input type="text" name="a<?php echo $n ?>" id="" class="form-control">
                                        <!-- <br> -->
                                    <?php
                                    $n++;
                                } 
                                ?>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="question" class="mt-2 btn btn-primary form-control">Add</button>
                                </div>
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
    

    if(isset($_POST['question']))
    {
        // echo '<script>alert("Registartion Completed")</script>';
        $cid = $_POST['cid'];
        $sid = $_POST['sid'];
        $q1=$_POST['q1'];
        $q2=$_POST['q2'];
        $q3=$_POST['q3'];
        $q4=$_POST['q4'];
        $q5=$_POST['q5'];
        $a1=$_POST['a1'];
        $a2=$_POST['a2'];
        $a3=$_POST['a3'];
        $a4=$_POST['a4'];
        $a5=$_POST['a5'];
        $con=mysqli_connect('localhost','root','','student');
        // echo '<script>alert("Registartion Completed")</script>';
        $run=mysqli_query($con,"INSERT INTO `answers`(`sid`,`q1`, `a1`, `q2`, `a2`, `q3`, `a3`, `q4`,`a4`, `q5`,`a5`, `status`) "
            . "VALUES ('$id','$q1','$a1','$q2','$a2','$q3','$a3','$q4','$a4','$q5','$a5','1')");
            // echo '<script>alert("Registartion Completed")</script>';
        if($run)
        {
            echo '<script>alert("Done")</script>';
            $run=mysqli_query($con,"UPDATE `student` SET `hire`='1' WHERE id=$cid");
            $run=mysqli_query($con,"INSERT INTO `hire`(`sid`, `cid`) "
            . "VALUES ('$sid','$cid')");
            echo "<script type='text/javascript'>document.location.href='chat.php';</script>";
        }
        else
        {
            echo("Registration Failed...! $sql");
            echo "Error: " . $run . "<br>" . $con->error;
        }
    }

?>

