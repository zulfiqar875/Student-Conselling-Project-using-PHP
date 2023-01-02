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
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button class="btn border border-danger text-danger"><?php if ($data['type'] == '2') { echo "Student"; } ?></button>
                    </div>
                </div>
                <div class="dashboard pt-5 pl-5 pr-5 pb-0 text-center">
                    <h3 class="text-info">Our Counsellor</h3>
                </div>

                <div class="addcounsellor p-5">
                    <div class="box">
                        <?php 
                        $con=mysqli_connect('localhost','root','','student');
                        $query="SELECT * FROM `student` WHERE type=3";
                        $run=mysqli_query($con,$query);
                        $row=mysqli_num_rows($run);
                        ?>
                        <table class="table text-light">
                            <thead class="bg-info">
                            <tr>
                                <th>Sr. No.</th>
                                <th scope="col">Counsellor Name</th>
                                <!-- <th scope="col">State</th> -->
                                <!-- <th scope="col">Country</th> -->
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="text-dark">
                            
                                <?php
                                $n = 1;
                                // $sum=0;
                                while($data=mysqli_fetch_assoc($run))
                                {  
                                    ?>
                                    <tr>
                                    <td><?php echo $n; ?></td>
                                    <td><?php echo $data['fname']. " ". $data['lname'];?> </td>
                                    <td>
                                        <a class="btn border border-danger"  href="query.php?cid=<?php echo $data['id'] ?>"><i class="fa fa-paper-plane-o text-danger" aria-hidden="true"> Consent</i></a>
                                    </td>
                                    
                                    
                                </tr>
                                <?php
                                $n++;   
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


