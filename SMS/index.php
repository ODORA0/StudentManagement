
<?php
//include header part of html
 include('header.php')
  ?>
            

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 jumbotron">
                            <h2 style="text-align: center;">
                                WELCOME TO ST. PETER'S SENIOR SECONDARY SHCOOL
                                <span style="float: right;"><a href="login.php" class="btn btn-info btn-lg">Admin Login</a></span>
                            </h2>
                    </div>
                </div>
            </div>

            <div class="student-info text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 jumbotron">
                            <h2>Student's information</h2>
                            <form action="index.php" method="post">
                <input type="text" name="roll" placeholder="Enter Roll Number" style="width: 240px;height: 35px;"><span>OR/AND<span>
                 <select name="class" class="btn btn-info" >
                                    <option>SELECT class</option>
                                    <option>S1</option>
                                    <option>S2</option>
                                    <option>S3</option>
                                    <option>S4</option>
                                    <option>S5</option>
                                    <option>S6</option>
                                </select>
                  <input type="submit" name="show" value="SHOW INFO" class="btn btn-success text-center" style="margin-left: 30px;" >  
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<table class="table table-striped table-bordered table-responsive text-center">
    <tr >
        <th class="text-center">Roll No.</th>
        <th class="text-center">Class</th>
        <th class="text-center">Full Name</th>
        <th class="text-center">City/Town</th>
        <th class="text-center">Parent phone No.</th>
        <th class="text-center">Profile Pic</th>
    </tr>
<?php 
    include('dbcon.php');
    if (isset($_POST['show'])) {

        $class = $_POST['class'];
        $RollNo = $_POST['roll'];

        $sql = "SELECT * FROM `student` WHERE `class` = '$class' OR `rollno`='$RollNo'";

        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $Id = $DataRows['id'];
                $RollNo = $DataRows['rollno'];
                $Name = $DataRows['name'];
                $City = $DataRows['city'];
                $Pcontact = $DataRows['pcontact'];
                $class = $DataRows['class'];
                $ProfilePic = $DataRows['image'];
                ?>
                <tr>
                    <td><?php echo $RollNo;?></td>
                    <td><?php echo $class;?></td>
                    <td><?php echo $Name; ?></td>
                    <td><?php echo $City; ?></td>
                    <td><?php echo $Pcontact; ?></td>
                    <td><img src="databaseimg/<?php echo $ProfilePic;?>" alt="img"></td>
                </tr>
                <?php
                
            }
            
        } else {
            echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
        }
    }

 ?>
    


<!--include header part of html-->
<?php include('footer.php') ?>

