<?php 
 require('db.php'); 
  $sql='SELECT * FROM users';
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $users = $stmt->fetchAll();
 ?>
<?php
   $title = "Lists of Users"; 
   include('inc/header.php');
?>

 <div class="container">
   <div class="card mt-5">
     <div class="card-header">
       <h2 class="text-muted "><i class="far fa-list-alt"></i> Lists of Users</h2>
     </div>
     <div class="card-body">
       <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NAME</th>
              <th scope="col">EMAIL</th>
              <th scope="col">ACTOINS</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($users as $user):?>
            <tr>
              <th scope="row"><?= $user->id; ?></th>
              <td><?= $user->name; ?></td>
              <td><?= $user->email; ?></td>
               <td><a href="edit.php?id=<?= $user->id; ?>" class="btn btn-info" ><i class="far fa-edit"></i> Edit</a> <a   onclick="return confirm(Are you sure?)" href="delete.php?id=<?= $user->id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
     </div>
   </div>
 </div>


<?php include('inc/footer.php')?>