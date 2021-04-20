<?php

include_once 'isAuthentificated.php';
$pageTitle = 'Acceuil';
include_once 'head.php';
?>

<body>  
    <div class="alert alert-success">Bienvenu <?= $_SESSION['user'] ?></div>
    <a href="logout.php" class="btn btn-secondary">Logout</a>

</body>

</html>