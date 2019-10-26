<?php 

class todo {
  
  private $cod_todo;
  private $name_todo;
  private $complete_todo;
  
  private $Error;
  private $Response;
  
  function getToDoList(){
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "db_unesc";
    
    $con = mysqli_connect($host, $user, $password, $dbname);
    
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }    
    
    $return_arr = array();
    
    $query = "SELECT * FROM todos WHERE complete_todo = false";
    $result = mysqli_query($con, $query);
    
    if($result){
      
      while($row = mysqli_fetch_array($result)){
        
        $cod_todo = $row['cod_todo'];
        $name_todo = $row['name_todo'];
        $complete_todo = $row['complete_todo'];
        
        $return_arr[] = array(
          
          "cod_todo" => $cod_todo,
          "name_todo" => $name_todo,
          "complete_todo" => $complete_todo);
          
      }  
      
      $this->setResponse($return_arr);
      
    }else{
      
      $this->setError("Erro ao buscar dados");
    }
  }
  
  function getToDoComplete(){
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "db_unesc";
    
    $con = mysqli_connect($host, $user, $password, $dbname);
    
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }    
    
    $return_arr = array();
    
    $query = "SELECT * FROM todos WHERE complete_todo = true";
    $result = mysqli_query($con, $query);
    
    if($result){
      
      while($row = mysqli_fetch_array($result)){
        
        $cod_todo = $row['cod_todo'];
        $name_todo = $row['name_todo'];
        $complete_todo = $row['complete_todo'];
        
        $return_arr[] = array(
          
          "cod_todo" => $cod_todo,
          "name_todo" => $name_todo,
          "complete_todo" => $complete_todo);
          
      }  
        
      $this->setResponse($return_arr);
      
    }else{
      
      $this->setError("Erro ao buscar dados");
    }
  }
    
  function postCompleteTodo($cod_todo){
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "db_unesc";
    
    $con = mysqli_connect($host, $user, $password, $dbname);
    
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }    
    
    $query = "UPDATE todos SET complete_todo = true WHERE cod_todo = {$cod_todo}";
    
    mysqli_query($con, $query);

    $this->getToDoComplete();
  }    

  public function getError(){
    return $this->Error;
  }
  
  
  public function setError($Error){
    $this->Error = $Error;
  }
  
  public function getResponse(){
    return $this->Response;
  }
  
  public function setResponse($Response){
    $this->Response = $Response;
  }
  
  public function getCod_todo(){
    return $this->cod_todo;
  }
  
  public function setCod_todo($cod_todo){
    $this->cod_todo = $cod_todo;
  }
  
  public function getName_todo(){
    return $this->name_todo;
  }
  
  public function setName_todo($name_todo){
    $this->name_todo = $name_todo;
  }
  
  public function getComplete_todo(){
    return $this->complete_todo;
  }
  
  public function setComplete_todo($complete_todo){
    $this->complete_todo = $complete_todo;
  }
  
}
  
?>