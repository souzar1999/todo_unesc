<?php
header('Content-Type: application/json');

require_once '../class/todo.php';

$cod_todo = $_POST['cod_todo'];

$todo = new todo;

$todo->postCompleteTodo($cod_todo);

if($todo->getError() != null){
    $return_arr = $todo->getError();
}else{
    $return_arr = $todo->getResponse();
}

echo json_encode($return_arr);

?>