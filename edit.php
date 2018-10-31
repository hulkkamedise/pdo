
  <?php
        require_once('db.php');

        $id=$_GET['id'];
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
         $stmt->execute();
         $user = $stmt->fetch();
        $message = '';
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $name = trim(filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING));
         $email = trim(filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL));

          $sql = 'UPDATE users SET name=:name, email=:email WHERE id=:id';
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':name', $name, PDO::PARAM_STR);
          $stmt->bindParam(':email', $email, PDO::PARAM_STR);
          $stmt->bindParam(':id', $id, PDO::PARAM_INT);
          $stmt->execute();
          if($stmt){
          header('location: index.php');
        }


      }

    
   
  ?>
  <?php
   $title='Edit User';
   include('inc/header.php'); 
 
   ?>
    <div class="container">
      <div class="card mt-5">
        <div class="card-header">
          <h2 class="text-muted "><i class="fas fa-edit"></i> EDIT USERS</h2>
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
              <input type="text" name="name" id="name" class="form-control" value="<?= $user->name ?>">
            </div>
             <div class="form-group">
              <label for="email" class="label-control">EMAIL *</label>
              <input type="email" name="email" id="email" class="form-control" value="<?= $user->email?>">
            </div>
            <div class="form-group">
              <button type="submit"  class="btn btn-info">Edit User</button>
            </div>
          </form>
        </dv>
      </div>
    </div>

  <?php include('inc/footer.php'); ?>  

    
