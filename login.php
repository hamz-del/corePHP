<?php 

 include('db/connection.php');

 if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

   echo $sel = "select * from students where email='$email' and password='$password' and status='1'";
    $cmd = $db->query($sel);
    $re = mysqli_num_rows($cmd);
    if($re==1){
        print_r($re);
        $row = $cmd->fetch_array();
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];

         echo '<script>window.location="dashboard.php?msg=Welcome"</script>';
    }else{
         echo '<script>window.location="login.php?dgr=Invaild Email or Password"</script>';
    }

 }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="../oxford university/resources/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="">
        <?php
        if(isset($_GET['msg'])){
            echo '<span class="btn btn-info">'.$_GET['msg'].'</span>';

        }
        ?>

        <?php
        if(isset($_GET['dgr'])){
            echo '<span clas="btn btn-danger">'.$_GET['dgr'].'</span>';

        }
        ?>
        <div class="container-fluid bg-info text-center">
            <h1 class="display-5 text-weight-bold"><span>Khyber </span><span style="color:bisque; font-size:xx-large;"> Pkhtunkhwa Institute of Medical</span><span> Sciences</span></h1>
    
        </div>
        
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Student Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" inputmode="text" />
                                                <label for="inputEmail" class="floating-lable">User Email</label>
                                                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            
                                               <button class="btn btn-primary form-control" type="submit" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
