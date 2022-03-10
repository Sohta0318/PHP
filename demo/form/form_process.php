<?php 
if(isset($_POST['submit'])){
  $name = array('Edwin','Student', 'peter', 'Samid', 'Mohad', 'Maria', 'Jane', 'Tom');
$minimum = 5;
$maximum = 10;

  $username = $_POST['username'];
  $password = $_POST['password'];

  if(strlen($username) < $minimum){
    echo 'Username has to be longer than five characters';
  }
  if(strlen($username) > $maximum){
    echo 'Username has to be less than ten characters';
  }

  if(!in_array($username,$name)){
    echo 'Sorry, You are not allowed';
  }else{
    echo 'Welcome';
  }

  // echo 'Hello'. $username;
  // echo 'Your Password is'.$password;
}
?>