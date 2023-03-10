<?php


include "classes/user.php";

$user1 = new user();

if(isset($_POST['add_user'])){
  $user1->send($_POST);
}

?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/my.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <title>crud-oop</title>
  </head>
  <body>
    <!-- crud -->

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="display-2 bg-primary text-center p-4 text-light">
            CRUD OPERATION
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <!-- form start -->
          <form action="" method="POST" class="shadow p-5">
            <h2 class="text-primary display-6 p-4 text-center">User Info.</h2>
            <div class="form-group mb-3">
              <input
                type="text"
                name="name"
                placeholder="Enter your name "
                class="form-control"
                required
              />
            </div>
            <div class="form-group mb-3">
              <input
                type="email"
                name="email"
                placeholder="Enter your email"
                class="form-control"
                required
              />
            </div>
            <div class="form-group mb-3">
              <input
                type="password"
                name="password"
                placeholder="Enter your password"
                class="form-control"
                required
              />
            </div>
            <div class="form-group mb-3">
              <input type="submit" value="Add User" class="btn btn-primary" name="add_user" />
            </div>
          </form>
        </div>
        <div class="col-lg-8">
          <table class="table table-striped">
            <tr>
              <th>#SL</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
            
            <?php 

            $alluser = $user1->show();
           // print_r($alluser);
            $i = 1;
            while($row = mysqli_fetch_assoc($alluser)){ ?>

              <tr>
                <td><?php echo $i++ ;?></td>
                <td><?php echo ucwords($row['name']);?></td>
                <td><?php echo ($row['email']);?></td>
                <td> 
                  <a href="edit.php?sl=<?php echo $row['sl'];?>" class="btn btn-info btn-sm">Edit</a>
                  <a href="delete.php?sl=<?php echo $row['sl'];?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>


            

              <?php 
              }
            
            
            ?>




             
          </table>
        </div>
      </div>
    </div>

    <script src="javascript/bootstrap.bundle.js"></script>
    <script src="javascript/main.js"></script>
  </body>
</html>
