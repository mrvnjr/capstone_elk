<?php include('header.php');?>
<body>
<div class="dash">  
    <?php include('teacher_sidebar.php'); ?>      
    <div class="dash-app">
            <header class="dash-toolbar">
                <?php include('navbar.php');?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4" id="adduser">
                            <?php include('add_class_form.php'); ?>
                        </div>
                        <div class="col-lg-8" id="">
                            <!--card-->
                            <?php
                                $school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
                                $school_year_query_row = mysqli_fetch_array($school_year_query);
                                $school_year = $school_year_query_row['school_year'];
                            ?>
							
                            <div id="block_bg" class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-title">Teacher Class List</div>
                                </div>
                                    <div class="card-body">
                                        <div class="">
                                            
                                        <form action="delete_teacher.php" method="post">
                                            <table class="table table-in-card table-responsive-sm" id="example">
                                                <a data-toggle="modal" href="#teacher_delete" id="delete"  class="btn btn-danger mb-3" name=""><i class="fas fa-trash-alt"></i></a>
                                                    <?php include('modal_delete.php'); ?>
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Teacher Name</th>
                                                        <th scope="col">Class Section</th>
                                                        <th scope="col">Subject</th>
                                                        <th scope="col"></th>

                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                        $teacher_query = mysqli_query($conn,"select * from teacher_class_student
														LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
														LEFT JOIN class ON class.class_id = teacher_class.class_id 
														LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
														LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
														where school_year = '$school_year'
														")or die(mysqli_error());
                                                        while($row = mysqli_fetch_array($teacher_query)){
                                                        $id = $row['teacher_id'];
                                                        ?>
                                            
                                                            <tr>
                                                            <td width="30">
                                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                            </td>
                                                            
                                                            <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                                                            <td><?php echo $row['class_name']; ?></td>
                                                            <td><?php echo $row['subject_code']; ?></td>
                                                        
                                                            <td width="50"><a href="edit_teacher.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                                                           
                                                
                                                            </tr>
                                                        <?php } ?>
                                                </tbody>
                                            </table>
                                        </form>
                                        </div>
                                    </div>
                            </div>
                           <!--card-->
                        </div>                                  
                    </div>
                </div>
            </main>
    </div>
</div>
<?php include('scripts.php'); ?>
</body>
