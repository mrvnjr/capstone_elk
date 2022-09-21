
<div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Add Class</div>
            </div>
            <div class="card-body ">
              <div class="col-12">
                <form method="post">
                  <div class="form-group">
                    <label for="">Class Name</label>
                    <input type="hidden" name="session_id" class=""value="<?php echo $session_id; ?>">
                    <select name="class_id"  class="form-control" required>
                      <option></option>
                    <?php
                    $query = mysqli_query($conn,"select * from class order by class_name");
                    while($row = mysqli_fetch_array($query)){
                    
                    ?>
                    <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="">Subject</label>
                      <select name="subject_id"  class="form-control" required>
                        <option></option>
                      <?php
                      $query = mysqli_query($conn,"select * from subject order by subject_code");
                      while($row = mysqli_fetch_array($query)){
                      
                      ?>
                      <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_code']; ?></option>
                      <?php } ?>
                      </select>
                  </div>
                  <div class="form-group">
                  <label>School Year:</label>
                      <?php
                      $query = mysqli_query($conn,"select * from school_year order by school_year DESC");
                      $row = mysqli_fetch_array($query);
                      ?>
                      <input id="" type="text" class="form-control" name="school_year" value="<?php  echo $row['school_year']; ?>" >
                      </div>
                    <div class="form-group text-center">
                    <button name="save" class="btn btn-success"><i class="fas fa-plus"></i></button>
                    </div>
                </form>
              </div>
            </div>
</div>

<?php
if (isset($_POST['save'])){
$class_name = $_POST['class_name'];


$query = mysqli_query($conn,"select * from class where class_name  =  '$class_name' ")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Date Already Exist');
</script>
<?php
}else{
mysqli_query($conn,"insert into class (class_name) values('$class_name')")or die(mysqli_error());
?>
<script>
window.location = "class.php";
</script>
<?php
}
}
?>