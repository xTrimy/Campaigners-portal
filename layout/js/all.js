  var debugging = 1;
  //Pop Up Window Functions START
  function warning_confirmation(member_id){
    pop['type'] = 1; // The popup type is 1 = "warning", you can also use type = "warning" instead of type = 1
    pop['message'] = "You're about to send a warning to a member"; //Popup message
    pop['confirmation'] = "Are you sure you want to warn this member?";//Confirmation message
    pop['button1']['url'] = "warnings.php?id="+member_id;//Url of the first button
    pop['button1']['color'] = "red";//Color of the first button
    pop['button2']['function'] = function(){toggle_popup();};//Function that will run when second button is clicked
    pop['button2']['color'] = "blue";//Color of the second button
    toggle_popup();//Show the popup with the above data
  }
  //Pop Up Window Functions END

  var warning_button = document.getElementsByClassName('warningButton');
  for(let i =0; i<warning_button.length;i++){
    var warningButton = warning_button[i];
    let member_id = warningButton.getAttribute('data-id');
    warningButton.addEventListener('click',function(){
        warning_confirmation(member_id);
    });
  }

// Sidebar dropdown arrow START
  var arrows = document.getElementsByClassName('arrow');
  for(let i = 0; i<arrows.length; i++){
    arrows[i].addEventListener('click',function(){
      if(this.parentElement.classList.contains('open'))
        this.parentElement.classList.remove('open');
      else
        this.parentElement.classList.add('open');
    });
  }
// Sidebar dropdown arrow END

// XMLHTTPRequest functions START
function send_request(type,url,data,response_function=false){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
      if(!this.responseText.length > 0)
        return;
      var response = JSON.parse(this.responseText);
      if (this.readyState == 4 && this.status == 200) {
        if(debugging)
          console.log(response);
        box_alert('success',response['message']);
        if(response_function){
          ()=>{
            response_function();
          }
        }
      }else if(this.readyState == 4){
        if(response['error']){
          if(debugging)
          console.log(response);
          box_alert('warning',response['error']);
        }
      }
  };
  var params = data;
  xhttp.open(type, url, true);
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

  xhttp.send(params);
}
// XMLHTTPRequest functions END

// Task finished checkbox START
function set_task(checkbox){
  var task_id = checkbox.getAttribute('data-id');
  var value = checkbox.checked;
  var data = "id="+task_id+"&value="+value;
  send_request('POST','functions/set_task_status.php',data);
}

var finished_checkbox = document.querySelectorAll('.finished-checkbox');
for(let i =0 ;i<finished_checkbox.length;i++){
  finished_checkbox[i].addEventListener('click',function(){
    set_task(this);
  });
}
// Task finished checkbox END

// Friend Requests START
function add_friend(element){
  var clone_element = element.cloneNode(true);
  element.parentNode.replaceChild(clone_element, element);
  element = clone_element;
  element.classList.remove('add-friend');
  element.classList.add('cancel-friend');
  element.addEventListener('click',function(){
  cancel_friend(element);
  });  var user_id = element.getAttribute('data-id');
  var data = "id="+user_id;
  send_request('POST','functions/add_friend.php',data);
}

function cancel_friend(element){
  var clone_element = element.cloneNode(true);
  element.parentNode.replaceChild(clone_element, element);
  element = clone_element;
  element.classList.remove('cancel-friend');
  element.classList.add('add-friend');
  element.addEventListener('click',function(){
    add_friend(element);
  });
  var user_id = element.getAttribute('data-id');
  var data = "id="+user_id;
  send_request('POST','functions/cancel_friend.php',data);
}


function remove_friend(element){
  var clone_element = element.cloneNode(true);
  element.parentNode.replaceChild(clone_element, element);
  element = clone_element;
  element.classList.remove('remove-friend');
  element.classList.add('add-friend');
  element.addEventListener('click',function(){
    add_friend(element);
  });
  var user_id = element.getAttribute('data-id');
  var data = "id="+user_id;
  send_request('POST','functions/remove_friend.php',data);
}
function accept_friend(element){
  var clone_element = element.cloneNode(true);
  element.parentNode.replaceChild(clone_element, element);
  element = clone_element;
  element.classList.remove('accept-friend');
  element.classList.add('remove-friend');
  element.addEventListener('click',function(){
    accept_friend(element);
  });
  var user_id = element.getAttribute('data-id');
  var data = "id="+user_id;
  send_request('POST','functions/accept_friend.php',data);
}
function remove_friend_confirmation(element){
  pop['type'] = 1; // The popup type is 1 = "warning", you can also use type = "warning" instead of type = 1
  pop['message'] = "You're about to remove a friend"; //Popup message
  pop['confirmation'] = "Are you sure you want to remove this friend?";//Confirmation message
  pop['button1']['function'] = function(){remove_friend(element);toggle_popup();};//Function of first button
  pop['button1']['color'] = "red";//Color of the first button
  pop['button2']['function'] = function(){toggle_popup();};//Function that will run when second button is clicked
  pop['button2']['color'] = "blue";//Color of the second button
  toggle_popup();//Show the popup with the above data
}

function add_friend_event(element){
  element.addEventListener('click',function(){
    if(debugging)
    console.log('Friend request sent');
  add_friend(element);
  })
}
function accept_friend_event(element){
  element.addEventListener('click',function(){
    if(debugging)
    console.log('Friend request accepted');
  accept_friend(element);
  })
}
function cancel_friend_event(element){
  element.addEventListener('click',function(){
    if(debugging)
    console.log('Friend request cancelled');
  cancel_friend(element);
  })
}

function remove_friend_event(element){
  element.addEventListener('click',function(){
    if(debugging)
    console.log('Friend removed');
    remove_friend_confirmation(element);
  })
}

var add_friend_button = document.querySelectorAll('.add-friend');
var cancel_friend_button = document.querySelectorAll('.cancel-friend');
var remove_friend_button = document.querySelectorAll('.remove-friend');
var accept_friend_button = document.querySelectorAll('.accept-friend');
for(let i =0;i<add_friend_button.length;i++){
    add_friend_event(add_friend_button[i]);
}
for(let i =0;i<cancel_friend_button.length;i++){
  cancel_friend_event(cancel_friend_button[i]);
}
for(let i =0;i<remove_friend_button.length;i++){
  remove_friend_event(remove_friend_button[i]);
}
for(let i =0;i<accept_friend_button.length;i++){
  accept_friend_event(accept_friend_button[i]);
}
// Friend Requests END