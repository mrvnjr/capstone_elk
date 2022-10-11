<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
<div class="dash">  
	<?php include('teacher_sidebar.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            </header>
            <main class="dash-content">
				<h1>My Class</h1>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8" id=" ">
                        <?php
									$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
									$school_year_query_row = mysqli_fetch_array($school_year_query);
									$school_year = $school_year_query_row['school_year'];
								?>
                            <div class="card">
                                <div class="card-body">
                                    <?php include('teacher_class.php'); ?>
                                </div>
                            </div>
                        </div>
                       	<div class="col-lg-4" id="">
						
	</div>                                  
                    </div>
                </div>
            </main> 	
    </div>
</div>
<?php include('scripts.php'); ?>
</body>