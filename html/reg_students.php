<?php include('header.php');?>
<body>
<div class="dash">  
    <?php include('admin_sidebar.php'); ?>      
    <div class="dash-app">
            <header class="dash-toolbar bg-success tex">
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <div class="font-weight-bold text-white">Anselmo A. Sandoval Memorial National High School</div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4" id="adduser">
                            <?php include('add_students.php'); ?>
                        </div>
                       <div class="col-lg-8" id="">
                            <!--card-->
                            <div id="block_bg" class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-title">Student List</div>
                                </div>
                                    <div class="card-body">
                                        <div class="">
                                        
                                            <form action="delete_student.php" method="post">
                                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                            <a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
                                            <div class="pull-right">
                                                        <ul class="nav nav-pills">
                                                        <li class="">
                                                            <a href="students.php">All</a>
                                                        </li>
                                                        <li class="active">
                                                            <a href="unreg_students.php">Unregistered</a>
                                                        </li>
                                                        <li class="">
                                                        <a href="reg_students.php">Registered</a>
                                                        </li>
                                                        </ul>
                                            </div>
                                            <?php include('modal_delete.php'); ?>
                                                <thead>
                                                <tr>
                                                            <th></th>
                                                        
                                                            <th>Name</th>
                                                            <th>ID Number</th>
                                                    
                                                            <th>Course Yr & Section</th>
                                                            <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                <?php
                                            $query = mysqli_query($conn,"select * from student LEFT JOIN class ON student.class_id = class.class_id where status = 'Registered' ORDER BY student.student_id DESC") or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($query)) {
                                                $id = $row['student_id'];
                                                ?>
                                            
                                                <tr>
                                                <td width="30">
                                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                            
                                                <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
                                                <td><?php echo $row['username']; ?></td> 
                                            
                                                <td width="100"><?php echo $row['class_name']; ?></td> 
                                            
                                                <td width="30"><a href="edit_student.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i> </a></td>
                                            
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
