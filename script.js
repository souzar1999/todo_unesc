$( document ).ready(function() {

  var tb_todo = document.getElementById("tbToDo");
  var tb_complete = document.getElementById("tbComplete");

  function addItem(cod, name, complete, table){

    var tr = document.createElement("tr");
    var td_input = document.createElement("td");
    var td_text = document.createElement("td");
    var input = document.createElement("input");

    if( complete == 0 ) {
      input.setAttribute("type", "checkbox");
      input.setAttribute("id", cod);
      input.setAttribute("class", "checkbox");
      input.onclick = function() { completeTodo(cod) };
      td_input.appendChild(input);
      tr.appendChild(td_input);
    }

    var text = document.createTextNode(name);
    td_text.appendChild(text);
    tr.appendChild(td_text);

    table.appendChild(tr);
  };

  function carregaTodoList(){

    $.ajax({
      type: 'GET',
      dataType: 'json',
      url: 'requests/getTodoList.php',
      success: function(res){
        $(tb_todo).empty();
        res.map((item) => {
          addItem(item.cod_todo, item.name_todo, item.complete_todo, tb_todo);
        });
      } 
    })
  };

  function carregaTodoComplete(){

    $.ajax({
      type: 'GET',
      dataType: 'json',
      url: 'requests/getTodoComplete.php',
      success: function(res){
        $(tb_complete).empty();
        res.map((item) => {
          addItem(item.cod_todo, item.name_todo, item.complete_todo, tb_complete);
        });
      } 
    })
  };

  function completeTodo(cod_todo){

    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: 'requests/postCompleteToDo.php',
      data: {cod_todo: cod_todo},
      success: function(res){
        $(tb_complete).empty();
        carregaTodoList();
        res.map((item) => {
          addItem(item.cod_todo, item.name_todo, item.complete_todo, tb_complete);
        });
      } 
    })
  };

  carregaTodoList();
  carregaTodoComplete();
});
