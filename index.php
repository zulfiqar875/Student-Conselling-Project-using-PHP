<?php
    session_start();
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
    <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Student Registration</title>
</head>
<body>
    <div class="main mt-5">
        
        <div class="head bg-secondary border border-dark">
            <h2 class="pl-5">Student Registartion</h2>
        </div>
        <div class="link text-center mt-3">
            <a type="button" class="text-primary" data-toggle="modal" data-target="#exampleModalCenter">
                <u>Click Here Studetn Registration Form</u>
            </a>
            <h2 class="text-danger mt-3">
                <?php
                    if ($_SESSION)
                    {
                        echo $_SESSION['msg'];
                    }
                    
                ?>
            </h2>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-center mt-4">
                    <h5 class="modal-title pl-5" id="exampleModalLongTitle">Register:</h5>
                </div>
                <div class="modal-body mt-3">
                    <form action="Registration_Form.php"  method="post">
                        <div class="row">
                            <div class="col-sm-3">
                                 <h4> <span class="text-danger">*</span>VU ID</h4>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="studentid" required id="">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
            </div>
        </div>

        
        
        
    </div>
</body>
</html>

