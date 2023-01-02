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
                            <li class="nav-item ">
                                <a class="nav-link" href="addcounsellor.php">Counsellor <span class="sr-only">(current)</span> </a>
                            </li>
                            <li class="nav-item active">
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
                    <h3 class="text-info">Question</h3>
                </div>

                <div class="addcounsellor p-5">
                    <div class="box">
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Question</button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title text-left">Add New Question</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <input type="text" required name="q1" placeholder="Question-1" class="mt-2 form-control" id="">
                                            <input type="text" required name="q2" placeholder="Question-2" class="mt-2 form-control" id="">
                                            <input type="text" required name="q3" placeholder="Question-3" class="mt-2 form-control" id="">
                                            <input type="text" required name="q4" placeholder="Question-4" class="mt-2 form-control" id="">
                                            <input type="text" required name="q5" placeholder="Question-5" class="mt-2 form-control" id="">
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
                                $query="SELECT * FROM `systemq` ORDER BY id DESC LIMIT 5";
                                $run=mysqli_query($con,$query);
                                $row=mysqli_num_rows($run);
                                
                                // if($row>=1)
                                // {
                                ?>
                                <table class="table text-light">
                                    <thead class="bg-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Question</th>
                                        
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
                                            
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $data['Q1'];?> </td>
                                            
                                                
                                                <td>
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                                    <!-- <i class="fa fa-eye" aria-hidden="true"></i> -->
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
        $q1=$_POST['q1'];
        $q2=$_POST['q2'];
        $q3=$_POST['q3'];
        $q4=$_POST['q4'];
        $q5=$_POST['q5'];
        $con=mysqli_connect('localhost','root','','student');
        $run=mysqli_query($con,"INSERT INTO `systemq`(`Q1`) "
            . "VALUES ('$q1')");
        if($run)
        {
            $con=mysqli_connect('localhost','root','','student');
            $run=mysqli_query($con,"INSERT INTO `systemq`(`Q1`) "
                . "VALUES ('$q2')");
            if($run)
            {
                $con=mysqli_connect('localhost','root','','student');
                $run=mysqli_query($con,"INSERT INTO `systemq`(`Q1`) "
                    . "VALUES ('$q3')");
                if($run)
                {
                    $con=mysqli_connect('localhost','root','','student');
                    $run=mysqli_query($con,"INSERT INTO `systemq`(`Q1`) "
                        . "VALUES ('$q4')");
                    if($run)
                    {
                        $con=mysqli_connect('localhost','root','','student');
                        $run=mysqli_query($con,"INSERT INTO `systemq`(`Q1`) "
                            . "VALUES ('$q5')");
                        if($run)
                        {
                            alert("Question Added");
                            echo "<script type='text/javascript'>document.location.href='addquestion.php';</script>";
                        }
                        else
                        {
                            echo("Registration Failed 5...! $sql");
                            echo "Error: " . $run . "<br>" . $con->error;
                        }
                    }
                    else
                    {
                        echo("Registration Failed 4...! $sql");
                        echo "Error: " . $run . "<br>" . $con->error;
                    }
                }
                else
                {
                    echo("Registration Failed 3...! $sql");
                    echo "Error: " . $run . "<br>" . $con->error;
                }
            }
            else
            {
                echo("Registration Failed 2...! $sql");
                echo "Error: " . $run . "<br>" . $con->error;
            }
        }
        else
        {
            echo("Registration Failed 1...! $sql");
            echo "Error: " . $run . "<br>" . $con->error;
        }
    }

?>

