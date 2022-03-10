<?php 

class Car{

  function moveWheels(){
    echo 'Wheels move';
  }
}

$bmw = new Car();
$merces_benz = new Car();

$bmw->moveWheels();
$merces_benz->moveWheels();
?>