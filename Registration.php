<?php
    session_start();
?>
<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
                <title>Registration Form</title>
            </head>
            <body class="m-4">
                <div class="man">
                    <h4>VU Student Registration Form</h4>
                </div>
                <div class="data bg-primary p-2 text-light">
                    <form method="post">

                        <div class="row mt-2">
                            <div class="col-sm-2">
                                <h6>FIRST NAME</h6>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="fname" id="">
                            </div>
                            <div class="col-sm-3">
                                <p>(max 30 character a-z and A-Z)</p>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-2">
                                <h6>Last NAME</h6>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="lname" id="">
                            </div>
                            <div class="col-sm-3">
                                <p>(max 30 character a-z and A-Z)</p>
                            </div>
                        </div>
                    
                       
                    
                        <div class="row">
                            <div class="col-sm-2">
                                <h6>DATE OF BIRTH</h6>
                            </div>
                            <div class="col-sm-2">
                                <input type="date" name="dob" id="">
                            </div>
                            <div class="col-sm-3">
                                <!-- <p>(max 30 character a-z and A-Z)</p> -->
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-2">
                                <h6>EMAIL ID</h6>
                            </div>
                            <div class="col-sm-2">
                                <input type="email" name="email" id="">
                            </div>
                        </div>
                

                        <div class="row mt-2">
                            <div class="col-sm-2">
                                <h6>MOBILE NUMBER</h6>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" name="mobile" id="">
                            </div>
                            <div class="col-sm-3">
                                <p>(10 digit number)</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <h6>GENDER</h6>
                            </div>
                            <div class="col-sm-2">
                                <input type="radio" name="gender" value="male" > Male
                                <input type="radio" name="gender" value="female"> Female
                            </div>
                            <!-- <div class="col-sm-3">
                                <p>(10 digit number)</p>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <h6>ADDRESS</h6>
                            </div>
                            <div class="col-sm-2">
                            <textarea name="address" id="" cols="40" rows="4"></textarea>
                            </div>
                            <!-- <div class="col-sm-3">
                                <p>(10 digit number)</p>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <h6>CITY</h6>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="city" id="">
                            </div>
                            <div class="col-sm-3">
                                <p>(max 30 character a-z and A-Z)</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <h6>PIN CODE</h6>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" name="pincode" id="">
                            </div>
                            <div class="col-sm-3">
                                <p>(6 digit number)</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <h6>STATE</h6>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="state" id="">
                            </div>
                            <div class="col-sm-3">
                                <p>(max 30 character a-z and A-Z)</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <h6>COUNTRY</h6>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="country" id="">
                            </div>
                        
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <h6>HOBBIES</h6>
                            </div>
                            <div class="col-sm-4">
                            <label for=""> Drawing </label> <input  type="radio" name="hobbies" value="drawing" id="">
                            <label for=""> Singing </label> <input  type="radio" name="hobbies" value="singing" id="">
                            <label for=""> Dancing </label> <input  type="radio" name="hobbies" value="dancing" id="">
                            <label for="">Sketching</label> <input  type="radio" name="hobbies" values ="sketching" id="">
                            <label for="">Other</label> <input  type="radio" name="hobbies" values ="other" id="">
                            <input type="text" name="option" id="">
                            </div>
                            <!-- <div class="col-sm-3">
                                <p>(10 digit number)</p>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6>SPORT EVENT</h6>
                            </div>
                            <div class="col-sm-4">
                            <label for="">Cricket</label> <input  type="radio" name="event" values="Cricket" id="">
                            <label for="">Hockey</label> <input  type="radio" name="event" values="Hockey" id="">
                            <label for="">Table Tennis</label> <input  type="radio" name="event" values="Table Tennis" id="">
                            <label for="">badminton</label> <input  type="radio" name="event" values="Bandminton" id="">
                            
                            </div>
                            
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-2">
                                <h6>Password</h6>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="password" id="">
                            </div>
                            <div class="col-sm-3">
                                <p>(Mix Character)</p>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-sm-6">
                                <button type="submit" name="done" class="border border-primary">Submit</button>
                                <button class="border border-primary">Close</button>
                            </div>
                        </div>

                    </form>

                </div>
            </body>
        </html>


<?php
 
    
    if(isset($_POST['done']))
    {
        $vu_id = "VU-".date("Ymis");
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $dob=$_POST['dob'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $gender=$_POST['gender'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $pincode=$_POST['pincode'];
        $state=$_POST['state'];
        $country=$_POST['country'];
        $hobbies=$_POST['hobbies'];
        $event=$_POST['event'];
        $password = $_POST['password'];

        $con=mysqli_connect('localhost','root','','student');
        
        // echo $id;
        $run=mysqli_query($con,"INSERT INTO `student`(`vu_id`,`fname`, `lname`, `dob`, `email`, `mobile`, `gender`, `address`, `city`, `pincode`, `state`, `country`, `hobbies`, `event`, `password`,`type`) "
                                           . "VALUES ('$vu_id','$fname','$lname','$dob','$email', '$mobile', '$gender','$address', '$city', '$pincode', '$state', '$country', '$hobbies','$event', '$password','2')");
        if($run)
        {
            // $_SESSION['msg'] = "User Register Scuessfully.";

            echo "<script type='text/javascript'>document.location.href='login.php';</script>";
        
            // header("Location: login.php");
        }
        else
        {
            // echo "Error",$run;
            echo "Error: " . $run . "<br>" . $con->error;
        }
    }

?>

