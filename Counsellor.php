<?php
    session_start();
        
    $con=mysqli_connect('localhost','root','','student');
    
    

    $id = $_SESSION['user'];
    
   
    $run = mysqli_query($con, "SELECT * FROM `student` WHERE type = $id");
    $data = mysqli_fetch_assoc($run);
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
                <title>Dashboard - Counsellor</title>
            </head>
            <style>
                .card {
                        background-color: #fff;
                        border-radius: 10px;
                        border: none;
                        position: relative;
                        margin-bottom: 30px;
                        box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
                    }
                    .l-bg-cherry {
                        background: linear-gradient(to right, #493240, #f09) !important;
                        color: #fff;
                    }

                    .l-bg-blue-dark {
                        background: linear-gradient(to right, #373b44, #4286f4) !important;
                        color: #fff;
                    }

                    .l-bg-green-dark {
                        background: linear-gradient(to right, #0a504a, #38ef7d) !important;
                        color: #fff;
                    }

                    .l-bg-orange-dark {
                        background: linear-gradient(to right, #a86008, #ffba56) !important;
                        color: #fff;
                    }

                    .card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
                        font-size: 110px;
                    }

                    .card .card-statistic-3 .card-icon {
                        text-align: center;
                        line-height: 50px;
                        margin-left: 15px;
                        color: #000;
                        position: absolute;
                        right: -5px;
                        top: 20px;
                        opacity: 0.1;
                    }

                    .l-bg-cyan {
                        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
                        color: #fff;
                    }

                    .l-bg-green {
                        background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
                        color: #fff;
                    }

                    .l-bg-orange {
                        background: linear-gradient(to right, #f9900e, #ffba56) !important;
                        color: #fff;
                    }

                    .l-bg-cyan {
                        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
                        color: #fff;
                    }
            </style>
            <body>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><b>SCS</b></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="Counsellor.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="studentlist.php">Student </a>
                            </li>
                            <li class="nav-item">
                                <!-- <a class="nav-link" href="chat.php">Chat</a> -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="dashboard p-5 text-center">
                    <h3 class="text-info">Welcome to Counsellor: <b class="text-danger"><?php   
                                                                    echo $data['fname'];   ?></b>
                                                                     
                                                                </h3>
                    <div class="dashboard text-center">
                            <a href="" data-toggle="modal" data-target="#exampleModal" class="btn border border-success text-success">Give Feedback us.</a>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Feednback</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <form action="" method="post">

                                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                            <input type="hidden" name="name" value="<?php echo $data['fname']." ". $data['lname']  ?>">
                                            <label for=""> Enter your feedback</label>
                                            <input type="text" name="msg" id="" class="form-control">
                                            <!-- <textarea name="feedback" id="" cols="30" rows="10" class="form-control"></textarea> -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button name="feedback" type="submit" class="btn btn-primary"> <i class="fa fa-paper-plane-o" aria-hidden="true"></i> send it</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </body>
        </html>
        <?php
    }
    else
    {
        
        $_SESSION['msg'] = "VU ID is not available!";
        header("Location:index.php");   
    }
?>
<?php
    if(isset($_POST['feedback']))
    {
        $id=$_POST['id'];
        $fname=$_POST['name'];
        $msg=$_POST['msg'];

        // echo '<script>alert('$feedback')</script>';
        
        $con=mysqli_connect('localhost','root','','student');
        $run=mysqli_query($con,"INSERT INTO `feedback`(`name`, `userid`, `feedback`) "
            . "VALUES ('$fname','$id','$msg')");
        if($run)
        {
            echo '<script>alert("Feedback Successfully sended.")</script>';
            echo "<script type='text/javascript'>document.location.href='Counsellor.php';</script>";
        }
        else
        {
            alert("Registration Failed...! $sql");
        }
    }

?>

