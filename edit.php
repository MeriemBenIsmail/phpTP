<?php session_start();
include_once 'autoload.php';

$title = 'Edit Person';
include_once 'head.php';

$cin=$_GET['cin'];

$persons=new PersonRepository();


  if(isset($_POST['firstname']) && !empty($_POST['firstname']))
{
  $persons->update('firstname',$_POST['firstname'],$cin);
  

}
if(isset($_POST['lastname']) && !empty($_POST['lastname']))
{
  $persons->update('lastname',$_POST['lastname'],$cin);
  
}
if(isset($_POST['section']) && !empty($_POST['section']))
{
  $persons->update('section',$_POST['section'],$cin);
  
}
if(isset($_POST['age']) && !empty($_POST['age']))
{
  $persons->update('age',$_POST['age'],$cin);
 
}

if(isset($_FILES['image']) && !empty($_FILES['image']))
{
  $img_blob = file_get_contents ($_FILES['image']['tmp_name']);
  $persons->updatePic('image',$img_blob,$cin);
 
}

if(isset($_POST['submit'])){
  header('location:acceuil.php');
}


?>

<body>

<div class="container">
        <form action="edit.php?cin=<?=$cin?>" method="post" enctype="multipart/form-data">

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


            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </form>
    
    </div>

 
  
</body>
</html>
