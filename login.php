<?php
		include('admin/dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$recaptcha = $_POST['g-recaptcha-response'];
		$secret_key = '6LdqTVMjAAAAAD2CjxP9ORUDVfbiQoCux26vDMwb';
		  // Hitting request to the URL, Google will
    // respond with success or error scenario
		$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
			. $secret_key . '&response=' . $recaptcha;
	
		// Making request to verify captcha
		$response = file_get_contents($url);
	
		// Response return by google is in
		// JSON format, so we have to parse
		// that json
		$response = json_decode($response);
	
		// Checking, if response is true or not
		if ($response->success) {

		/* student */
			$query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
			$result = mysqli_query($conn,$query)or die(mysqli_error());
			$row = mysqli_fetch_array($result);
			$num_row = mysqli_num_rows($result);
		/* teacher */
			$query_teacher = mysqli_query($conn,"SELECT * FROM teacher WHERE username='$username' AND password='$password'")or die(mysqli_error());
			$num_row_teacher = mysqli_num_rows($query_teacher);
			$row_teahcer = mysqli_fetch_array($query_teacher);
			if( $num_row > 0 ) { 
			$_SESSION['id']=$row['student_id'];
			echo 'true_student';	
			}else if ($num_row_teacher > 0){
			$_SESSION['id']=$row_teahcer['teacher_id'];
			echo 'true';
			
			}else{ 
					echo 'false';
			}	
		} else {
			echo '<script>alert("Error in Google reCAPTACHA")</script>';
		}
				
		?>