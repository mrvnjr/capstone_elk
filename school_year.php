<?php include('header.php');?>
<body>
<div class="dash">  
    <?php include('admin_sidebar.php'); ?>      
    <div class="dash-app">
            <header class="dash-toolbar ">
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4" id="adduser">
						<?php include('add_school_year.php'); ?>
                        </div>
                       <div class="col-lg-8" id="">
                            <!--card-->
                            <div id="block_bg" class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-title">School Year</div>
                                </div>
                                    <div class="card-body">
                                        <div class="">
                                        <form action="delete_sy.php" method="post">
											<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
											<a data-toggle="modal" href="#user_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
											<?php include('modal_delete.php'); ?>
												<thead>
												<tr>
														<th></th>
														<th>School Year</th>
														<th></th>
												</tr>
												</thead>
												<tbody>
															<?php
															$user_query = mysqli_query($conn,"select * from school_year")or die(mysqli_error());
															while($row = mysqli_fetch_array($user_query)){
															$id = $row['school_year_id'];
															?>
											
														<tr>
														<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
														</td>
														<td><?php echo $row['school_year']; ?></td>
			
														
													
														<td width="40">
														<a href="edit_user.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
														</td>
				
											
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

</html>