
  <?php
        require_once('db.php');
         
        $message = '';
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $name = trim(filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING));
         $email = trim(filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL));

          if(empty($_POST['name']) || empty($_POST['email'])){
            echo '<div class="alert alert-danger"><p>Please Kindly Fill the empty spaces</p></div>';
        }else{
        $sql = 'INSERT INTO users(name, email) VALUES(:name, :email)';
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':name', $name, PDO::PARAM_STR);
          $stmt->bindParam(':email', $email, PDO::PARAM_STR);
          $stmt->execute();
          if($stmt){
          $message = "User Successfully Added";
      }
        }


      }

    
   
  ?>
  <?php
   $title='Add User';
   include('inc/header.php'); 
 
   ?>
    <div class="container">
      <div class="card mt-5">
        <div class="card-header">
          <h2 class="text-muted"><i class="fas fa-users"></i> ADD USERS</h2>
        </div>
        <dv class="card-body">

          <?php if(!empty($message)):?>
           <div class="alert alert-success">
             <?= $message; ?>
           </div>
          <?php endif;?>
          <form method="POST" action="">
            <div class="form-group">
              <label for="name" class="label-control">NAME *</label>
              <input type="text" name="name" id="name" class="form-control">
            </div>
             <div class="form-group">
              <label for="email" class="label-control">EMAIL *</label>
              <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit"  class="btn btn-info">Add User</button>
            </div>
          </form>
        </dv>
      </div>
    </div>

  <?php include('inc/footer.php'); ?>  

    
