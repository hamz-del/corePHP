<?php
include('include/header.php');

if(isset($_POST['register'])){
    $degree = $_POST['degreename'];
    $totalmarks = $_POST['totalmarks'];
    $obtainmarks = $_POST['obtainmarks'];
    $year = $_POST['passingyear'];
    $board = $_POST['board'];

    $studentid =$_SESSION['id'];
   $q = "INSERT INTO education (`std_id`,`degreename`,`totalmarks`,`obtainmarks`,`year`,`board`)VALUES
    ('$studentid','$degree','$totalmarks','$obtainmarks','$year','$board')";
    $result_education =  mysqli_query($db, $q);

    if($result_education){
     echo"<script>alert('Education record Successfully Added')</script>";
    }
    else{
        echo"<script>alert('Education record not added')</script>";
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
                                                <h4 class="text-weight-bold"><a class="nav-link" href="dashboard.php">Overview<span class="sr-only">(current)</span></a></h4>
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
                                <div class="container bg-light text-center mt-3">
                                    <h2>Education Record</h2>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Dregee Name</th>
                                            <th>Total Marks</th>
                                            <th>Obtain Marks</th>
                                            <th>Passing Year</th>
                                            <th>Board/university</th>
                                        </tr>
                                    </thead>
                                            
                                    <tbody>
                                        <?php 
                                        $i=1;
                                        $result = mysqli_query($db,"SELECT * FROM education where std_id='$sel'");
                                        foreach ($result as $row)
                                        { 
                                            ?>
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $row['degreename'];?></td>
                                        <td><?php echo $row['totalmarks'];?></td>
                                        <td><?php echo $row['obtainmarks'];?></td>
                                        <td><?php echo $row['year'];?></td>
                                        <td><?php echo $row['board'];?></td>
                                        <td>
                                          <a href="delete.php?delete=<?php echo $row['id']?>" ><button class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                    <?php
                                                 }
                                                ?>

                                    </tbody>

                                </table>
                                <div class="container">
                                    <form action="" method="POST" class=" mx-auto mt-3">
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Certificate/Degree</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="text" name="degreename" value="" class="form-control brc-on-focus brc-success-m2"  placeholder="Degree Name">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Total Marks/GPA</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="number" name="totalmarks" value="" class="form-control brc-on-focus brc-success-m2"  placeholder="Total Marks">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Obtained Marks/CGPA</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="number" name="obtainmarks" value="" class="form-control brc-on-focus brc-success-m2"  placeholder="Obtain Marks ">
                                                </div>
                                        </div>
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Passing Year</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="number" name="passingyear" value="" class="form-control brc-on-focus brc-success-m2"  placeholder="Passing Year">
                                                </div>
                                        </div>

                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Board/university</label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <input type="text" name="board" value="" class="form-control brc-on-focus brc-success-m2"  placeholder="Board/University">
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row mx-0">
                                            <label for="email" class="col-sm-4 col-xl-3 col-form-label text-sm-right"></label>
                                                <div class="col-sm-8 col-lg-6">
                                                    <button type="submit"  value="" class="form-control btn btn-outline-success w-25" name="register">Submit</button>
                                                </div>
                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
<?php
include('include/footer.php');
?>

              