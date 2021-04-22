<?php
include_once 'autoload.php';

include_once 'isAuthentificated.php';
$title = 'Acceuil';
include_once 'head.php';

$PersonRepository = new PersonRepository();
$persons = $PersonRepository->findAll();
?>

<body>  
    <div class="alert alert-success">Bienvenu <?= $_SESSION['user'] ?></div>
    <a href="logout.php" class="btn btn-secondary">Logout</a>

    <table class="table">
    <tr>
        <th>CIN</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Section</th>
        <th>Age</th>
        <th>Image</th>
    </tr>
    <?php foreach ($persons as $personne) {
    ?>
    <tr>
        <td><?= $personne->cin?></td>
        <td><?= $personne->firstname ?></td>
        <td><?= $personne->lastname ?></td>
        <td><?= $personne->section ?></td>
        <td><?= $personne->age ?></td>
    
        <td><?php echo " <img width='300' ;height='300'  src='data:image/jpeg;base64,".base64_encode($personne->image)."'></img>" ?></td>
        <td><button type="button" class="btn btn-outline-secondary"><a href="edit.php?cin=<?=$personne->cin?>">Edit</a></button></td>

        <td><button type="button" class="btn btn-outline-danger"><a href="delete.php?cin=<?=$personne->cin?>">Delete</a></button></td>
    </tr>
    <?php
    }
    ?>
</table>
<div>
<button  type="button" class="btn btn-primary"><a href="addPerson.php">Add Person</a></button>
</div>

</body>

</html>