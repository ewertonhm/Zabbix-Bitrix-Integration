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

function createTask(){
  createPopupWindow();
}

function createPopupWindow(){
  popup = window.open ('', 'pagina', "width=250 height=250");
  popup.document.write (getModelList());
}

function fecharPopup(){
  fecharWindow = popup.close()
}

function onClickCreateTask(){
  var btn = document.querySelector("#btn-create");
  btn.addEventListener("click", function (e) {
    createTask();
  });
}

function getModelList()
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", 'http://10.255.12.128/api/get_models/?API_KEY=262e8070d7d4157dfc01685f3b200b26', false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}

observe();



