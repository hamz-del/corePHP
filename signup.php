<?php 

 include('db/connection.php');
 if (isset($_POST['register'])){

    $department = $_POST['departmentid'];
    $batch = $_POST['batchid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $fathername = $_POST['fathername'];

    $image_name = "img/".time().$_FILES['image']['name'];
    if(move_uploaded_file($_FILES['image']['tmp_name'],$image_name))
   
    $email = $_POST['email'];
    $password = $_POST['password'];
    $reg = 0;
    $address= 0;
    $CNIC = 0;
    $contact = 0;
    $dateofbirth = 0;
    $gender = 0;
    $domicle = 0;
    $nationality = 0;
    $posteladdress = 0;
    
    

   echo $insert = "INSERT INTO `students`(`departmentid`, `batchid`, `firstname`, `lastname`, `fathername`, `img`, `email`, `password`, `regNo`, `address`, `CNIC`, `contact`, `dateofbirth`,`gender`,`domicle`,`nationality`,`posteladdress	`,`status`)
     VALUES ('$department','$batch','$firstname','$lastname','$fathername','$image_name','$email','$password','$reg','$address','$CNIC','$contact','$dateofbirth','$gender','$domicle','$nationality','$posteladdress','1')";

    $cmd = $db->query($insert);

    if($cmd){
          echo '<script>window.location="signup.php?msg=Registration Successfully"</script>';
    }else{
          echo '<script>window.loaction="signup.php?dgr=Registration Failed Try Again..."</script>';
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
        <title>Signup</title>
        <link href="../oxford university/resources/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="" >

        <?php
            if(isset($_GET['msg'])){
                echo '<span class="btn btn-info">'.$_GET['msg'].'</span>';

            }
        ?>

        <?php
            if(isset($_GET['dgr'])){
                echo '<span class="btn btn-danger">'.$_GET['dgr'].'</span>';

            }
        ?>
        <div class="container-fluid bg-info text-center">
            <h1 class="display-6 text-weight-bold"><span>Khyber </span><span style="color:bisque;" class="display-5"> Pkhtunkhwa Institute of Medical</span><span> Sciences</span></h1>
    
        </div>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h1 class="text-center font-weight-bold my-4">Student Signup</h1></div>
                                    <div class="card-body">
                                        <form class="user" method="POST" enctype="multipart/form-data">
                                            <div class="form-group row">
                                              <div class="col-sm-6 mb-3 mb-sm-0">
                                                  <label>Department</label>
                                                  <select class="form-control departmentid" name="departmentid">
                                                      <option disabled="" selected="">--Select Department--</option>
                                                      <?php 
                                                       $sel = "select * from departments where dept_status='1'";
                                                       $cmd = $db->query($sel);
                                                       while($row = $cmd->fetch_array()){
          
                                                       ?>
                                                         <option value="<?php echo $row['id']; ?>"><?php echo $row['dept_name']; ?></option>
                                                   <?php } ?>
                                                  </select>
                                              </div>
                                              <div class="col-sm-6">
                                                    <label>Session / Batch</label>
                                                  <select class="form-control batch" name="batchid">
                                                      <option disabled="" selected="">--Select Batch--</option>
                                                        <?php
                                                        $sel = "select * from batches where status='1'";
                                                        $cmd = $db->query($sel);
                                                        while($row= $cmd->fetch_array()){
                                                        
                                                        ?>
                                                        <option value="<?php echo $row['id'];?>"><?php echo $row['batch'];?></option>
                                                        <?php } ?>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-sm-6 mb-3 mb-sm-0">
                                                  <label for="">First Name</label>
                                                  <input type="text" class="form-control form-control-user" name="firstname" placeholder="FirstName">
                                              </div>
                                              <div class="col-sm-6">
                                                 <label for="">Last Name</label>
                                                  <input type="text" class="form-control form-control-user" name="lastname" placeholder="LastName">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="">Father Name</label>
                                                <input type="text" class="form-control form-control-user" name="fathername" placeholder="Father Name">
                                              </div>

                                              <div class="col-sm-6">
                                                <label for="">Upload Image</label>
                                                <input type="file" class="form-control form-control-user" name="image">

                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-sm-6 mb-3 mb-sm-0">
                                                 <label for="">Email</label>
                                                  <input type="email" class="form-control form-control-user" name="email" placeholder="Email">
                                              </div>
                                              <div class="col-sm-6">
                                                 <label for="">Password</label>
                                                  <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                              </div>
                                          </div>
                                          <button class="btn btn-primary btn-user btn-block" type="submit" name="register">Register Account</button>
                                                            
                                          <hr>
                                          <a href="index.html" class="btn btn-google btn-user btn-block">
                                              <i class="fab fa-google fa-fw"></i> Register with Google
                                          </a>
                                          <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                              <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                          </a>
                                      </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">An Account? Login!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer" class="mt-5">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4 ">
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

        
    <script type="text/javascript">
        
        $(document).ready(function(){
    
         $('.departmentid').change(function(){
      
           var deptid = $(this).val();
    
               $.ajax({
                    url:'get_batch.php?id='+deptid,
                       success:function(data){
                       
                          $('.batch').html(data);
    
                         }
                         
                        });
    
    
         });
    
        });
    
    
        </script>
    </body>
</html>

