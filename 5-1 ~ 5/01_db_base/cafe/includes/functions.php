<?php 

function confirmQuery($query){
  global $connection;

  if(!$query){
    die('Query failed'. mysqli_error($connection));
  }
}

function useQuery($query){
global $connection;
$result_query = mysqli_query($connection,$query);
confirmQuery($result_query);
return $result_query;
}

?>