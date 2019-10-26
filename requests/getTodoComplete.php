<?php
header('Content-Type: application/json');

require_once '../class/todo.php';

$todo = new todo;
$todo->getToDoComplete();

if($todo->getError() != null){
    $return_arr = $todo->getError();
}else{
    $return_arr = $todo->getResponse();
}

echo json_encode($return_arr);

?>