<?php

include('include/header.php');
if(isset($_POST['update'])){

    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $fathername = $_POST['Fathername'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $CNIC = $_POST['Cnic'];
    $contactnumber = $_POST['Contactnumber'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['Gender'];
    $domcile = $_POST['domicle'];
    $nationality = $_POST['nationality'];
    $posteladdress = $_POST['posteladdress'];
   
    $result = mysqli_query($db,"UPDATE students SET firstname='$firstname', lastname='$lastname', fathername='$fathername', email='$email', address='$address',
     CNIC='$CNIC', contact='$contactnumber', dateofbirth='$dateofbirth', gender='$gender', domicle='$domcile', nationality='$nationality', posteladdress='$posteladdress' where id=$sel");

     if($result){
        echo "Record is Updated";
        echo '<script>window.location="dashboard.php"</script>';
     }else{
        echo "Not Updated";
     }
    }

?>

                    <!-- Begin Page Content -->

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 border mx-auto " style="background-color:white; height:300px; border-radius:5px">
                                <div class="card-bcard">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="pos-rel">
                                            <?php
                                                $sel =$_SESSION['id'];
                                                $result = mysqli_query($db,"SELECT * FROM students WHERE `id`='$sel'" );
                                                foreach ($result as $value){ 
                                                ?>
                                                <img style="width: 130px; height: 130px; border-radius:70px" class="radius-round border-2 text-center"  src="<?php echo $value['img'];?>" alt="">
                                                <h4 class=" mt-3"><?php echo $value['firstname'];?><span> <?php echo $value['lastname'];?></span></h4>
                                                <h4><?php echo $value['fathername'];?></h4><hr>
                                                <?php
                                                 }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9 mx-auto" style="background:white;">
                                <nav class="navbar navbar-expand-lg border-bottom" >
                                    <div class="collapse navbar-collapse" >
                                        <ul class="navbar-nav mr-auto">
                                            <li class="nav-item active">
                                                <h4 class="text-weight-bold"><a class="nav-link" href="dashboard.php">Overview<span class="sr-only">(current)</span></a></h4>
                                            </li>
                                            <li class="nav-item">
                                                <h4 class="text-weight-bold"><a class="nav-link" href="update.php">Update Profile</a></h4>
                                            </li>
                                            
                                            <li class="nav-item">
                                                <h4 class="text-weight-bold"><a class="nav-link " href="education.php">Education</a></h4>
                                            </li>
                                        </ul><hr>
                                    </div>
                                </nav>
                                <div class="container bg-light text-center mt-3">
                                    <h2>Update Profile</h2>
                                </div>
                                <div class="container">
                                    <form action="" method="POST" class=" mx-auto mt-3">
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">First Name</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="text" name="Firstname" value="<?php echo $value['firstname'];?>" class="form-control brc-on-focus brc-success-m2"  placeholder="Enter First Name">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Last Name</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="text" name="Lastname" value="<?php echo $value['lastname']?>" class="form-control brc-on-focus brc-success-m2"  placeholder="Enter Last Name">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Father Name</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="text" name="Fathername" value="<?php echo $value['fathername']?>" class="form-control brc-on-focus brc-success-m2"  placeholder="Enter father Name">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Email</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="email" name="Email" value="<?php echo $value['email']?>" class="form-control brc-on-focus brc-success-m2"  placeholder="Enter email">
                                                </div>
                                        </div>

                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Address</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="text" name="Address" value="<?php echo $value['address']?>" class="form-control brc-on-focus brc-success-m2"  placeholder="Enter Address">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">CNIC</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="number" name="Cnic" value="<?php echo $value['CNIC']?>" class="form-control brc-on-focus brc-success-m2"  placeholder="Enter CNIC">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Contact Number</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="number" name="Contactnumber" value="<?php echo $value['contact']?>" class="form-control brc-on-focus brc-success-m2"  placeholder="Enter Contact Number">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Date of Birth</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="date" name="dateofbirth" value="<?php echo $value['dateofbirth']?>" class="form-control brc-on-focus brc-success-m2"  placeholder="">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="gender" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Gender</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <select name="Gender"  class="form-control">
                                                        <option value="" disable="">--Select Gender--</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Domicle</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="text" name="domicle" value="<?php echo $value['domicle']?>" class="form-control brc-on-focus brc-success-m2"  placeholder="">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Nationality</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="text" name="nationality" value="<?php echo $value['nationality']?>" class="form-control brc-on-focus brc-success-m2"  placeholder="">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Postal Address</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="text" name="posteladdress" value="<?php echo $value['posteladdress']?>" class="form-control brc-on-focus brc-success-m2"  placeholder="">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right"></label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <button type="submit"  value="" class="form-control btn btn-outline-success w-25" name="update">Submit</button>
                                                </div>
                                        </div>
                                        
                                                     
                                            
                                       
                                        
                                    </form>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
<?php
include('include/footer.php');
?>

              