<?php
session_start();
include_once ("autoload.php");

$username=$_POST['username']; //  htmlSpecialchar($_POST['username'])
$password=$_POST['password'];


  if((isset($username)) && (isset($password))){

    if(empty($username) || empty($password)){
      $_SESSION['requiredFieldsError']='Please enter username & password';
      header('location:inscription.php');
    }
    else if (strlen($password) <8){
      $_SESSION['shortPwdError']='Password too short';
      header('location:inscription.php');
    }
    else{

      $user=new UserRepository();
      $query=$user->findByUsername($username);
      if($query){
        $_SESSION['usernameUsed']='Username unavailable';
        header('location:inscription.php');
      }
      else{
        $request = "INSERT INTO ".$user->tableName. "(username,password) VALUES ('".$username."','".$password."')";
        $response=$user->bd->prepare($request);
        $response->execute();
        $_SESSION['user']=$username;
        header('location:acceuil.php');

    }
  }

}

?>