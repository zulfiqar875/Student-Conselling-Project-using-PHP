<?php
    session_start();
        
    $con=mysqli_connect('localhost','root','','student');
    
    

    $id = $_SESSION['user'];
    // echo $id;

   
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
                                <a class="nav-link" href="dashboard.php">Home </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="addcounsellor.php">Counsellor <span class="sr-only">(current)</span> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addquestion.php">Add Question</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="feedback.php">Feedback</a>
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
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Counsellor</button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title text-left">Add New Counsellor</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <input type="text" name="fname" placeholder="First Name" class="mt-2 form-control" id="">
                                            <input type="text" name="lname" placeholder="Last Name" class="mt-2 form-control" id="">
                                            <input type="number" name="contact" placeholder="Mobile Number" class="mt-2 form-control" id="">
                                            <input type="email" name="email" placeholder="Email" class="mt-2 form-control" id="">
                                            <input type="Address" name="address" placeholder="Address" class="mt-2 form-control" id="">
                                            <input type="text" name="password" placeholder="Password" class="mt-2 form-control" id="">
                                            <button type="submit" name="done" class="mt-2 btn btn-primary form-control">Add</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>


                            <?php 
                                $con=mysqli_connect('localhost','root','','student');
                                $query="SELECT * FROM `student` WHERE type=3";
                                $run=mysqli_query($con,$query);
                                $row=mysqli_num_rows($run);
                                
                                // if($row>=1)
                                // {
                                ?>
                                <table class="table text-light">
                                    <thead class="bg-info">
                                    <tr>
                                        <th scope="col">Counsellor Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody class="text-dark">
                                    
                                        <?php
                                        $i=1;
                                        $sum=0;
                                        while($data=mysqli_fetch_assoc($run))
                                        {  
                                            ?>
                                            <tr>
                                            
                                            <td><?php echo $data['fname'];?> </td>
                                            <td><?php echo $data['email'];?> </td>
                                            <td><?php echo $data['mobile'];?> </td>
                                            <td>
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </td>
                                            </tr>
                                            <?php
                                        } ?>
                                    
                                    </tbody>
                                </table>
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
    if(isset($_POST['done']))
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $mobile=$_POST['contact'];
        $address=$_POST['address'];
        $password=$_POST['password'];;
        $con=mysqli_connect('localhost','root','','student');
        $run=mysqli_query($con,"INSERT INTO `student`(`fname`, `lname`, `email`, `mobile`, `address`, `password`, `type`) "
            . "VALUES ('$fname','$lname','$email', '$mobile','$address','$password','3')");
        if($run)
        {
            alert("Registration Complete");
            echo "<script type='text/javascript'>document.location.href='addcounsellor.php';</script>";
        }
        else
        {
            echo("Registration Failed...! $sql");
            echo "Error: " . $run . "<br>" . $con->error;
        }
    }

?>

