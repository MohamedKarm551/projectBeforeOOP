<?php require_once '../inc/header.php'; ?>
<?php require_once '../../core/connection.php'; ?>
<?php session_start() ?>
<?php   $id=$_GET['id'];
$quer = mysqli_fetch_row(
    mysqli_query($conn,
    "SELECT * FROM `categories` WHERE categories.id=$id;"
));
// print_r($quer);die;
 $name=$quer['1'];
 $des=$quer['2'];
?>
<h1 class="text-center my-5">Edit Category</h1>


<?php require_once '../inc/messages.php'; ?> 
<!-- message for success or problems -errors-  -->
    <form method="POST" action="../../handlers/categories/edit.php">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 form-group">
                <label for="name" class="form-label">Category Name</label>
<?php  echo "          
      <input type='text' name='name' value='$name'>
"?>            </div>
            <div class="mb-3 form-group">
                <label for="description" class="form-label">Category Description</label>
                <?php  echo "          
      <input type='text' name='des' value='$des'>
"?>             </div>
            <?php echo"<input type='hidden' name='id' value='$id'>"?>


            <button class="btn btn-primary" name="submit">
                edit
            </button>
        </div>
    </div>
    
</form>

<?php require_once '../inc/footer.php'; ?>