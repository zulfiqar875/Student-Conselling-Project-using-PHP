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
                        <button class="btn border border-danger text-danger"><?php if ($data['type'] == '2') { echo "Student"; } else if ($data['type'] == '3') { echo "Counsellor"; } ?></button>
                    </div>
                </div>
                <div class="dashboard pt-5 pl-5 pr-5 pb-0 text-center">
                    <h3 class="text-info">Chat With Counsellor</h3>
                </div>

                <div class="addcounsellor p-5">
                    <div class="box">
                            <?php 
                                $con=mysqli_connect('localhost','root','','student');
                                $query="SELECT * FROM `student` WHERE type=3 AND hire = 1";
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
                                                <?php if ($id == '2')
                                                { 
                                                    ?>
                                                        <a class="btn border border-danger" href="Cchat.php?cid=<?php echo $data['id'] ?>"><i class="fa fa-paper-plane-o text-danger" aria-hidden="true"> Chat Now</i></a>
                                                    <?php
                                                } 
                                                else if ($id == '3') 
                                                { 
                                                    ?>
                                                    <a class="btn border border-danger" href="Schat.php?cid=<?php echo $data['id'] ?>"><i class="fa fa-paper-plane-o text-danger" aria-hidden="true"> Chat Now</i></a>
                                                <?php
                                                } ?>
                                               
 
                                                
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
