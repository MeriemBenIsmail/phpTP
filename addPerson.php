<?php session_start();
include_once 'autoload.php';

$title = 'Add Person';
include_once 'head.php';

$persons=new PersonRepository();

if(isset($_POST['cin']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['section']) && isset($_POST['age']) && isset($_FILES['image'])){

  if(!empty($_POST['cin']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['section']) && !empty($_POST['age']) && !empty($_FILES['image'])){

    $img_blob = file_get_contents ($_FILES['image']['tmp_name']);
    $persons->add($_POST['cin'],$_POST['firstname'],$_POST['lastname'],$_POST['section'],$_POST['age'],$img_blob);
    

    header('location:acceuil.php');
  }
  
}
?>

<body>

<div class="container">
        <form action="addPerson.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
                <label for="cin">cin</label>
                <input type="text" class="form-control" name="cin" id="cin" placeholder="cin">
            </div>
            <div class="form-group">
                <label for="username">Firstname</label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname">
            </div>

            <div class="form-group">
                <label for="username">Lastname</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
            </div>

            <div class="form-group">
                <label for="username">Section</label>
                <input type="text" class="form-control" name="section" id="section" placeholder="Section">
            </div>

            <div class="form-group">
                <label for="username">Age</label>
                <input type="text" class="form-control" name="age" id="age" placeholder="Age">
            </div>
            <div class="form-group">
                <label for="username">Image</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="image">
            </div>


            <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </form>
    
    </div>

 
  
</body>
</html>