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
    var member_id = warningButton.getAttribute('data-id');
    warningButton.addEventListener('click',function(){
        warning_confirmation(member_id);
    });
  }

  var arrows = document.getElementsByClassName('arrow');
  for(let i = 0; i<arrows.length; i++){
    arrows[i].addEventListener('click',function(){
      if(this.parentElement.classList.contains('open'))
        this.parentElement.classList.remove('open');
      else
        this.parentElement.classList.add('open');
    });
  }
