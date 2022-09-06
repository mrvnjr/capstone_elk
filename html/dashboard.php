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
                       <div class="col-lg-12" id="">
                            <!--Chart-->
                            <div class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="easion-card-title"> Doughnut </div>
                                    <div class="easion-card-menu">
                                        <div class="dropdown show">
                                            <a class="easion-card-menu-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
								$query_student = mysqli_query($conn,"select * from student where status='Registered'")or die(mysqli_error());
								$count_student = mysqli_num_rows($query_student);
								?>
                                	<?php 
								$query1_student = mysqli_query($conn,"select * from student where status='Unregistered'")or die(mysqli_error());
								$count1_student = mysqli_num_rows($query1_student);
								?>
                                <div class="card-body easion-card-body-chart">
                                    <canvas id="easionChartjsDougnut"></canvas>
                                    <script>
                                        var ctx = document.getElementById("easionChartjsDougnut").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'doughnut',
                                            data: {
                                                labels: ["Registered Students,Unregistered Students"],
                                                datasets: [{
                                                    label: 'Week',
                                                    data: [<?php echo $count_student ?>,<?php echo $count1_student ?>],
                                                    backgroundColor: [
                                                        window.chartColors.primary,
                                                        window.chartColors.secondary,
                                                        window.chartColors.success,
                                                        window.chartColors.superwarning,
                                                        window.chartColors.danger,
                                                    ],
                                                    borderColor: '#fff',
                                                    fill: false
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                    display: true
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <!--Chart-->
                        </div>                                  
                    </div>
                </div>
            </main>
    </div>
</div>
<?php include('scripts.php'); ?>
</body>

