<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
<div class="dash">  
	<?php include('teacher_add_announcement_sidebar.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
				<h1>Add Announcements</h1>
                    <div class="row">
                        <?php
                        $school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <div class="col-lg-12" id="content ">
                                <div class="card">
                                    <div class="card-body row">
                                        <div class="col-7">
                                        <form class="" id="add_downloadble" method="post"  >
                                            <div class="form-group">                                 
                                                <textarea name="content" class="form-control" id="ckeditor_full"></textarea>
                                            </div>
											<script>
                                                jQuery(document).ready(function($){
                                                    $("#add_downloadble").submit(function(e){
                                                        e.preventDefault();
                                                        var formData = $(this).serialize();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "add_announcement_save.php",
                                                            data: formData,
                                                            success: function(html){
                                                                $.jGrowl("Student Successfully  Added", { header: 'Student Added' });
                                                                window.location = 'add_announcement.php';
                                                            }

                                                        });
                                                    });
                                                });
			                                </script>		
									        </div>
                                            <div class="col-5">
                                                <div class="alert alert-info">Check The Class you want to put this file.</div>
                                                <div class="float-left">
                                                    Check All <input type="checkbox"  name="selectAll" id="checkAll" />
                                                    <script>
                                                    $("#checkAll").click(function () {
                                                        $('input:checkbox').not(this).prop('checked', this.checked);
                                                    });
                                                    </script>					
                                                </div>
                                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="">

                                                        <thead>
                                                                <tr>
                                                                <th></th>
                                                                <th>Class Name</th>
                                                                <th>Subject Code</th>
                                                                </tr>
                                                                
                                                        </thead>
                                                        <tbody>	
                                                            <?php $query = mysqli_query($conn,"select * from teacher_class
                                                                    LEFT JOIN class ON class.class_id = teacher_class.class_id
                                                                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                                                    where teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error());
                                                                    $count = mysqli_num_rows($query);
                                                                    
                                                                
                                                                    while($row = mysqli_fetch_array($query)){
                                                                    $id = $row['teacher_class_id'];
                                            
                                                                    ?>                             
                                                                    <tr id="del<?php echo $id; ?>">
                                                                        <td width="30">
                                                                            <input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                                        </td>
                                                                        <td><?php echo $row['class_name']; ?></td>
                                                                        <td><?php echo $row['subject_code']; ?></td>                                                                   
                                                                    </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        <div class="col-10">
                                            <hr>
                                            <center>
                                                <div class="form-group">
                                                    <button name="Upload" type="submit" value="Upload" class="btn btn-success"><i class="fas fa-check-square"></i>&nbsp;Post</button>
                                                </div>
                                            </center>
                                        </form>		
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main> 	
    </div>
</div>
<?php include('scripts.php'); ?>
</body>