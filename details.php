<?php
    session_start();
        
    $con=mysqli_connect('localhost','root','','student');
    
    
    $sid = $_GET['sid'];
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
                    <h3 class="text-info">Student Profile</h3>
                    <div class="dashboard text-left mt-5">
                        <div class="row">
                            <div class="col sm 4">
                                <h6><u>Student Profile</u></h6>
                                <?php
                                   $conn = new mysqli('localhost', 'root', '', 'student');
                                   if ($conn->connect_error) {
                                     die("Connection failed: " . $conn->connect_error);
                                   }
                                //    echo $sid;
                                   $sql = "SELECT *
                                           FROM student
                                           WHERE id = $sid";
                                   $result = $conn->query($sql);
                                //    echo $sid;
                                   if ($result->num_rows > 0) 
                                   {
                                       $sn=1;
                                     // output data of each row
                                       while($d = $result->fetch_assoc()) 
                                       {
                                            ?>
                                           
                                            <!-- <label for=""> <?php echo $sn; ?> </label> <br> -->
                                            <label for=""><b> Student Name:</b>  <?php echo $d['fname']. $d['lname']; ?>  </label> <br>
                                            <label for=""> <b>Gender:</b>  <?php echo $d['gender']; ?>                </label> <br>
                                            <label for=""> <b>Email:</b>  <?php echo $d['email']; ?>                 </label> <br>
                                            <label for=""> <b>Contact No.:</b>  <?php echo $d['mobile']; ?>                </label> <br>
                                            <label for=""> <b>Address:</b>  <?php echo $d['address']; ?>               </label> <br>
                                            <label for=""> <b>Hobbies:</b>  <?php echo $d['hobbies']; ?> <br>  
                                           
                                           <?php $sn++; 
                                       }
                                   }
                                   else
                                   {
                                       echo "Record not found...!";
                                   }
                                ?>       
                            </div>
                            <div class="col-sm-5">
                                <h6><u>Queries Feedback</u></h6>
                                <?php
                                    $conn = new mysqli('localhost', 'root', '', 'student');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    //    echo $sid;
                                    $sql = "SELECT *
                                            FROM answers
                                            WHERE sid = $sid";
                                    $result = $conn->query($sql);
                                    //    echo $sid;
                                    if ($result->num_rows > 0) 
                                    {
                                        $sn=1;
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) 
                                        {
                                                ?>
                                                <label for=""> <b>Question 1:</b>  <?php echo $row['q1'];   ?>    </label> <br>
                                                <label for=""> <b>Answer 1:</b>  <?php echo $row['a1'];   ?>    </label> <br>
                                                <label for=""> <b>Question 2:</b>  <?php echo $row['q2'];   ?>    </label> <br>
                                                <label for=""> <b>Answer 2:</b>  <?php echo $row['a2'];   ?>    </label> <br>
                                                <label for=""> <b>Question 3:</b>  <?php echo $row['q3'];   ?>    </label> <br>
                                                <label for=""> <b>Answer 3:</b>  <?php echo $row['a3'];   ?>    </label> <br>
                                                <label for=""> <b>Question 4:</b>  <?php echo $row['q4'];   ?>    </label> <br>
                                                <label for=""> <b>Answer 4:</b>  <?php echo $row['a4'];   ?>    </label> <br>
                                                <label for=""> <b>Question 5:</b>  <?php echo $row['q5'];   ?>    </label> <br>
                                                <label for=""> <b>Answer 5:</b>  <?php echo $row['a5'];   ?>    </label> <br>
                                                 
                                            
                                            <?php $sn++; 
                                        }
                                    }
                                    else
                                    {
                                        echo "Record not found...!";
                                    }
                                ?>       

                            </div>
                            <div class="col sm 2">
                                <a href="Schat.php?sid=<?php echo $sid ?>" class="btn btn-success"> Chat Now</a>
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
