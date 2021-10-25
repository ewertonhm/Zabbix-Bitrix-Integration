function BulkAckButton() {    
  var div_filter = document.createElement("div");
  div_filter.className = "filter-forms";

  var div_right = document.createElement("div");
  div_right.className = "right";

  var div_action = document.createElement("div");
  div_action.id = "action_buttons";
  div_action.className = "action_buttons";

  var btn = document.createElement("button");
  btn.value = "acknowledge.edit";
  btn.className = "btn-grey";
  btn.textContent = "Bulk acknowledge"; 
  btn.type = "submit";
  btn.name = "action";

  div_filter.appendChild(div_right);
  div_right.appendChild(div_action);
  div_action.appendChild(btn);

  var table = document.getElementsByClassName("list-table")[0];
  var form = table.parentElement;

  form.prepend(div_filter);
}

function ButtonCreateTask() {
  var btn = document.createElement("button");
  btn.className = "btn-grey";
  btn.type = "button";
  btn.textContent = "Create Task"; 
  btn.id = "btn-create";

  document.querySelector("#action_buttons").prepend(btn);
  onClickCreateTask();
}

function CopyToClipboardButton(){
  var btn = document.createElement("button");
  btn.className = "btn-grey";
  btn.type = "button";
  btn.textContent = "Copy to clipboard"; 
  btn.id = "btn-copy";

  document.querySelector("#action_buttons").prepend(btn);
  onClickCopyToClipboard();
}

function callback(){
  if (document.querySelector("#flickerfreescreen_problem > form > div.filter-forms") === null){
    BulkAckButton();
    CopyToClipboardButton();
    ButtonCreateTask();
    //console.log('Mutation Ocurred!')
  }
}

function observe(){
  callback();
  const observer = new MutationObserver(mutations => {
    //console.log(mutations);
    callback();
  });

  var article = document.querySelector("body > div.article");

  observer.observe(article, {
    attributes: true,
    childList: true,
    characterData: true,
    subtree: true
  });
}

function getSelected(){
  tableString = convertToTable(selectedToArray());
  copyToClipboard(tableString);
}

function getSelectedNoTable(){
  lista = document.querySelectorAll("table.list-table > tbody > tr.row-selected");
  
  let tr = [];

  lista.forEach(element => {
    data = element.querySelectorAll("td");

    a = [data[0].textContent,data[4].textContent,data[8].textContent,data[9].textContent];
    tr.push(a.join(' '));
  });

  tableString = tr.join("\r\n");
  copyToClipboard(tableString);
}

function convertToTable(a){
  table = ['[TABLE]'];
  a.forEach(e => {
    table.push('[TR]');
    e.forEach(x => {
      table.push('[TD]');
      table.push(x);
      table.push('[/TD]');
    })
    table.push('[/TR]');
  })
  table.push('[/TABLE]');

  return table.join(' ');
}

function copyToClipboard(s){
  //navigator.clipboard.writeText(s);
  copyStringToClipboard(s);
  console.log(s);
}

function copyStringToClipboard (str) {
  // Create new element
  var el = document.createElement('textarea');
  // Set value (string to be copied)
  el.value = str;
  // Set non-editable to avoid focus and move outside of view
  el.setAttribute('readonly', '');
  el.style = {position: 'absolute', left: '-9999px'};
  document.body.appendChild(el);
  // Select text inside element
  el.select();
  // Copy text to clipboard
  document.execCommand('copy');
  // Remove temporary element
  document.body.removeChild(el);
}

function onClickCopyToClipboard(){
  var btn = document.querySelector("#btn-copy");
  btn.addEventListener("click", function (e) {
    if (e.ctrlKey){
      getSelectedNoTable();
    } else {
      getSelected();
    }
  });
}

function selectedToArray(){
  lista = document.querySelectorAll("table.list-table > tbody > tr.row-selected");
  
  let tr = [];

  lista.forEach(element => {
    data = element.querySelectorAll("td");

    a = [data[0].textContent,data[4].textContent,data[8].textContent,data[9].textContent];
    tr.push(a);
  });
  return tr;
}

function createTaskSubmitField(){
  if (show == true){
    removeShownTask();
  }
  if (created != true){
    createSubmitField();
  }
  created = true;
}

function removeShownTask(){
  let form = document.querySelector("#id > div.table.filter-forms");
  form.removeChild(document.querySelector("#id > div.table.filter-forms > div.filter-container"));
  show = false;
}

function createSubmitField(){

  var div_container = document.createElement("div");
  div_container.className = "filter-container";
  div_container.style.display = "block";

    var div_table = document.createElement("div");
    div_table.className = "table filter-forms";
    div_container.appendChild(div_table);

  var div_row = document.createElement("div");
  div_row.className = "row";
  div_container.appendChild(div_row);

    var cell_1 = document.createElement("div");
    cell_1.className = "cell";
    div_row.appendChild(cell_1);
    
    var cell_2 = document.createElement("div");
    cell_2.className = "cell";
    div_row.appendChild(cell_2);

      var ul_table_forms = document.createElement("ul");
      ul_table_forms.className = "table-forms";
      cell_2.appendChild(ul_table_forms);

        var li_1 = document.createElement("li");
        ul_table_forms.appendChild(li_1);

          var div_1_0 = document.createElement("div");
          div_1_0.className = "table-forms-td-left";
          li_1.appendChild(div_1_0);

            var label_1 = document.createElement("label");
            label_1.textContent = "Título";
            div_1_0.appendChild(label_1);

          var div_1_1 = document.createElement("div");
          div_1_1.className = "table-forms-td-right";
          li_1.appendChild(div_1_1);

            var title = document.createElement("input");
            title.type = "text";
            title.value = "Zabbix Alarmes - ";
            title.id = "task-title";
            title.style.width = "500px";
            div_1_1.appendChild(title);

        var li_2 = document.createElement("li");
        ul_table_forms.appendChild(li_2);

          var div_2_0 = document.createElement("div");
          div_2_0.className = "table-forms-td-left";
          li_2.appendChild(div_2_0);

            var label_2 = document.createElement("label");
            label_2.textContent = "Descrição";
            div_2_0.appendChild(label_2);

          var div_2_1 = document.createElement("div");
          div_2_1.className = "table-forms-td-right";
          li_2.appendChild(div_2_1);

            var description = document.createElement("input");
            description.type = "text";
            description.value = "Boa <periodo> poderiam por gentileza verificar o(s) seguinte(s) alarme(s):";
            description.id = "task-description";
            description.style.width = "500px";
            div_2_1.appendChild(description);
            
        var li_3 = document.createElement("li");
        ul_table_forms.appendChild(li_3);

          var div_3_0 = document.createElement("div");
          div_3_0.className = "table-forms-td-left";
          li_3.appendChild(div_3_0);

            var label_3 = document.createElement("label");
            label_3.textContent = "Modelo";
            div_3_0.appendChild(label_3);

          var div_3_1 = document.createElement("div");
          div_3_1.className = "table-forms-td-right";
          li_3.appendChild(div_3_1);

            var model = document.createElement("select");
            model.id = "task-model";
            model.style.width = "500px";
            div_3_1.appendChild(model);
            modelos.forEach(function(modelo){
              let option = document.createElement('option');
              option.value = modelo['id'];
              option.textContent = modelo['nome'];
              model.appendChild(option);
            });

        var li_4 = document.createElement("li");
        ul_table_forms.appendChild(li_4);

          var div_4_0 = document.createElement("div");
          div_4_0.className = "table-forms-td-left";
          li_4.appendChild(div_4_0);

            var label_4 = document.createElement("label");
            //label_4.textContent = "Confirmar";
            div_4_0.appendChild(label_4);

          var div_4_1 = document.createElement("div");
          div_4_1.className = "table-forms-td-right";
          li_4.appendChild(div_4_1);

            var submit = document.createElement("button");
            submit.type = "button";
            submit.className = "btn-grey";
            submit.id = "task-submit";
            submit.textContent = "Confirmar"; 
            div_4_1.appendChild(submit);
            
  document.querySelector("#id > div.table.filter-forms").append(div_container);
  onClickConfirmar();
}

function onClickCreateTask(){
  var btn = document.querySelector("#btn-create");
  btn.addEventListener("click", function (e) {
    createTaskSubmitField();
  });
}

function onClickConfirmar(){
  var btn = document.querySelector("#task-submit");
  btn.addEventListener("click", function (e) {
    createTask();
  });
}

function createTask(){
  let title = document.querySelector('#task-title');
  let description = document.querySelector('#task-description');
  let model = document.querySelector('#task-model');

  let task_id = sendTaskData(title.value,description.value,model.value,selectedToArray());

  let form = document.querySelector("#id > div.table.filter-forms");
  form.removeChild(document.querySelector("#id > div.table.filter-forms > div.filter-container"));
  created = false;
  show = true;
  showTaskCreated(task_id);
}

function showTaskCreated(task_id){
  var div_container = document.createElement("div");
  div_container.className = "filter-container";
  div_container.style.display = "block";

    var div_table = document.createElement("div");
    div_table.className = "table filter-forms";
    div_container.appendChild(div_table);

  var div_row = document.createElement("div");
  div_row.className = "row";
  div_container.appendChild(div_row);

    var cell_1 = document.createElement("div");
    cell_1.className = "cell";
    div_row.appendChild(cell_1);
    
    var cell_2 = document.createElement("div");
    cell_2.className = "cell";
    div_row.appendChild(cell_2);

      var ul_table_forms = document.createElement("ul");
      ul_table_forms.className = "table-forms";
      cell_2.appendChild(ul_table_forms);

        var li_1 = document.createElement("li");
        ul_table_forms.appendChild(li_1);

          var div_1_0 = document.createElement("div");
          div_1_0.className = "table-forms-td-left";
          li_1.appendChild(div_1_0);

            var label_1 = document.createElement("label");
            label_1.textContent = "https://tarefas.redeunifique.com.br/company/personal/user/1303/tasks/task/view/"+task_id+"/";
            div_1_0.appendChild(label_1);

  document.querySelector("#id > div.table.filter-forms").append(div_container);
  show = true;


}

function getModelList()
{
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open( "POST", 'http://10.255.12.128/api/get_models/', false ); // false for synchronous request
  xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlHttp.send( 'API_KEY='+API_KEY );
  return xmlHttp.responseText;
}

function sendTaskData(title,description,model,alarms){
  var xmlHttp = new XMLHttpRequest();



  alarmes_string = '';
  alarms.forEach(function(alarm){
    alarmes_string = alarmes_string +
    '&alarms_time[]='+alarm[0]+
    '&alarms_severity[]='+alarm[1]+
    '&alarms_host[]='+alarm[2]+
    '&alarms_problem[]='+alarm[3];
  });
  datastring =
    'API_KEY='+API_KEY+
    '&model_id='+model+
    '&title='+title+
    '&description='+description+
    alarmes_string+
    '&creator_id='+CREATOR_ID;


  xmlHttp.open( "POST", 'http://10.255.12.128/api/set_task/', false ); // false for synchronous request
  xmlHttp.setRequestHeader("Accept", "application/json");
  xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
  console.log( datastring );
  xmlHttp.send( datastring );
  console.log(xmlHttp.responseText);
  return xmlHttp.responseText;
}

const API_KEY = '262e8070d7d4157dfc01685f3b200b26';
const CREATOR_ID = '2831';

var created = false;
var show = false;
//fetchModelList();
var modelos_json = getModelList();
var modelos = eval('(' + modelos_json + ')');
observe();




