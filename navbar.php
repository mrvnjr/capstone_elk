<!-- <header class="dash-toolbar "> -->

    <a href="#!" class="menu-toggle">
        <i class="fas fa-bars"></i>
    </a>
<div class="tools">    
    <div class="dropdown tools-item">
    <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i>
    </a>
    <?php $query= mysqli_query($conn,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
														$row = mysqli_fetch_array($query);
												?>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
        <a class="dropdown-item" href="#!">Profile</a>
        <a class="dropdown-item" href="logout.php">Logout</a>
    </div>
</div>
<!-- </header> -->

