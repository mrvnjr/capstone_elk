<?php include('header.php'); ?>
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">
        <div class="card col-8">
            <div class="card-header">
                <h3 class=""><i class="fas fa-lock"></i> Sign in</h3>
            </div>
            <div class="card-body">
                <form id="login_form1" class="form-signin" method="post">
                    <div class="form-group">
    				    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
				    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="account-dialog-actions">
                        <button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
                    </div>
                <!-- <script type="text/javascript">
						$(document).ready(function(){
							$('#signin').tooltip('show');
							$('#signin').tooltip('hide');
						});
					</script>		 -->
			</form>
						<script>
						jQuery(document).ready(function(){
						jQuery("#login_form1").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								$.ajax({
									type: "POST",
									url: "login.php",
									data: formData,
									success: function(html){
									if(html=='true')
									{
									$.jGrowl("Loading File Please Wait......", { sticky: true });
									$.jGrowl("Welcome to CHMSC Learning Management System", { header: 'Access Granted' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'dasboard_teacher.php'  }, delay);  
									}else if (html == 'true_student'){
										$.jGrowl("Welcome to CHMSC Learning Management System", { header: 'Access Granted' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'student_notification.php'  }, delay);  
									}else
									{
									$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
									}
									}
								});
								return false;
							});
						});
						</script>
            </div>
        </div>
      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="../uploads/bg.jpg"alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
       </div>
    </div>
  </div>
</section>