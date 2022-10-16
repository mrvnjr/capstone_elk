<?php include('header_dashboard.php'); ?>
<!-- <?php include('session.php'); ?> -->
<?php $get_id = $_GET['id']; ?>
<body>
<div class="dash">  
	<?php include('student_sidebar.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            </header>
            <main class="dash-content">
				<h1>My Assignment</h1>
                <div class="container-fluid">
                    <div class="row">
					<?php include('assignment_link_student.php'); ?>
                        <div class="col-lg-12" id=" ">
						<div class="card">
								<div class="card-body">
								
								</div>
							</div>
							
                        </div>
                               
                    </div>
                </div>
            </main> 	
    </div>
</div>
<?php include('script.php'); ?>
</body>

<!-- ________________ -->


