<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>NextDoor Mechanic</title>
<link rel="shortcut icon" type="image/png" href="imgs/mech.png">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mfstyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<?php
    session_start();
    require 'includes/dbh.inc.php';
    $mid=$_GET['id'];
    if(!isset($_SESSION['useremail'])){?>
    <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>
    <?php
    }
    else{
        $uemail=$_SESSION['useremail'];
        $sql = "SELECT * FROM realmechanics WHERE mechanic_id='$mid';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        $mtable=$row["mechanic_first"].$mid;

        $sql1 = "INSERT INTO $mtable (client) VALUES('$uemail');";
        if(mysqli_query($conn3,$sql1)){
            header("Location: mechdetail.php?id=$mid");
            exit();
        }
    }
?>
</head>
<body>
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    
                        <h2 class="modal-title mx-auto" style="color: steelblue">Login to Your Account</h2>
                    </div>
                    <div class="modal-body">
                    <form action="includes/userlogin.inc.php" class="needs-validation" method="POST">
                                        
                                        <div class="form-group mb-5 text-center">
                                            <label class="label" for="userl">EMAIL/USERNAME</label>
                                            <p id="uavail"></p>
                                            <input type="text" class="form-control w-50 mx-auto text-center p-1" id="userl" name="userid" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; background: transparent;" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                                        <script>
                                                            $(document).ready(function(){
                                                                $('#userl').blur(function(){
                                                                    var userlog = $(this).val();
                                                                    $.ajax({
                                                                        url:"checkuname.php",
                                                                        method:"POST",
                                                                        data:{user_log:userlog},
                                                                        dataType:"text",
                                                                        success:function(html)
                                                                        {
                                                                            $('#uavail').html(html);
                                                                        }
                                                                    })
                                                                })

                                                            })
                                                        </script>
                                                    
                                        <div class="form-group mt-4 mb-5 text-center">
                                            <label class="label" for="pwd">PASSWORD</label>
                                            <input type="password" class="form-control w-50 mx-auto text-center p-1" id="pwd" name="password" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; background: transparent;" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>		
                                        <div class="text-center"><button type="submit" name="login" class="btn btn-primary w-50">SIGN IN</button></div>
                                        </form>
                                    
                                <div class="modal-footer">
                                <a class="btn btn-danger" href="mechdetail.php?id=<?php echo $mid?>">Close</a>
                                </div>		
                    </div>
                </div>
            </div>
        </div>
</body>
</html>