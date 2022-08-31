<?php
include('include/header.php');
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
                                                $result = mysqli_query($db,"SELECT * FROM students WHERE `id`='$sel' " );
                                                    
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
                                                <h4 class="text-weight-bold"><a class="nav-link  active" href="dashboard.php">Overview<span class="sr-only">(current)</span></a></h4>
                                            </li>
                                            <li class="nav-item">
                                                <h4 class="text-weight-bold"><a class="nav-link" href="update.php?id=<?php echo $value['id']?>">Update Profile</a></h4>
                                                
                                            </li>
                                            
                                            <li class="nav-item">
                                                <h4 class="text-weight-bold"><a class="nav-link " href="education.php">Education</a></h4>
                                            </li>
                                        </ul><hr>
                                    </div>
                                </nav>
                                <h3>More Info</h3>
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                            $sel = $_SESSION['id'];
                                            $result = mysqli_query($db,"SELECT * FROM students WHERE `id`='$sel'");
                                            foreach($result as $value)
                                        ?>
                                        <tr>
                                        <?php
                                           $result = mysqli_query($db,"SELECT `departmentid`,`dept_name` FROM `students`,`departments` WHERE students.departmentid=departments.id");
                                           $row = mysqli_fetch_array($result);
                                                {?>
                                            <th>Department</th>
                                            <td><?php echo $row['dept_name']?></td>
                                            <?php
                                         }
                                         ?>
                                        </tr>
                                        <tr>
                                        <?php
                                           $result = mysqli_query($db,"SELECT `departmentid`,`batch_session` FROM `students`,`batches` WHERE students.batchid=batches.id");
                                           $row = mysqli_fetch_array($result);
                                                {?>
                                            <th>Session</th>
                                            <td><?php echo $row['batch_session']?></td>
                                            <?php
                                         }
                                         ?>
                                        </tr>

                                        <tr>
                                            <th>CNIC</th>
                                            <td><?php echo $value['CNIC']?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $value['email']?></td>
                                        </tr>
                                        <tr>
                                            <th>contact</th>
                                            <td><?php echo $value['contact']?></td>    
                                        </tr>
                                        <tr>
                                            <th>Date of Birth</th>
                                            <td><?php echo $value['dateofbirth']?></td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td><?php echo $value['gender']?></td>
                                        </tr>
                                        <tr>
                                            <th>Domicle</th>
                                            <td><?php echo $value['domicle']?></td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td><?php echo $value['address']?></td>
                                        </tr>
                                        <tr>
                                            <!-- <td>
                                                <a href="update.php"><button class="btn btn-success">Update Profile</button></a>
                                            </td> -->
                                        </tr>

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
<?php
include('include/footer.php');
?>

              