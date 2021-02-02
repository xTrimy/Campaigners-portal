var popup = document.getElementById('pop-up');
  var pop = {
    type: 1, //1 = Warning, 2 = Notice
    message: "This is the popup message",
    confirmation: "This is the popup confirmation",
    button1: {
      function: null,
      url: null,
      color: 'red'
    },
    button2:{
      function: null,
      url: null,
      color: 'blue'
    }
  }
  function update_popup(){
    var popup_window = popup.querySelector('.window');
    var popup_header = popup_window.querySelector('.popup_header');
    var popup_message = popup_window.querySelector('.message');
    var popup_confirmation = popup_window.querySelector('.confirmation');
    var popup_button1 = popup_window.querySelector('.button1');
    var popup_button2 = popup_window.querySelector('.button2');
    popup_message.innerHTML = pop['message'];
    popup_confirmation.innerHTML = pop['confirmation'];
    var button1 = pop['button1'];
    var button2 = pop['button2'];
    if(pop['type'] == 1 || pop['type'] == "warning"){
      popup_header.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Warning';
    }else if(pop['type'] == 2 || pop['type'] == "notice"){
      popup_header.innerHTML = '<i class="fas fa-exclamation-circle"></i> Notice';
    }
    //Replace Buttons to Remove Event Listener
    var new_button1 = popup_button1.cloneNode(true);
      popup_button1.parentNode.replaceChild(new_button1, popup_button1);
      popup_button1 = new_button1;
    var new_button2 = popup_button2.cloneNode(true);
      popup_button2 = popup_button2.parentNode.replaceChild(new_button2, popup_button2);
      popup_button2 = new_button2;

    //Button1 START 
    if(button1['function'] !=null){
      popup_button1.addEventListener('click',button1['function']);
      popup_button1.style.display = "inline-table";
    }else if(button1['url'] !=null){
      popup_button1.addEventListener('click',function(){
        window.location.href = button1['url'];
      });
      popup_button1.style.display = "inline-table";
    }else{
      popup_button1.style.display = "none";
    }
    //Button1 END
    //Button2 START 
    if(button2['function'] !=null){
      popup_button2.addEventListener('click',button2['function']);
      popup_button2.style.display = "inline-table";
    }else if(button2['url'] !=null){
      popup_button2.addEventListener('click',function(){
        window.location.href = button2['url'];
      });
      popup_button2.style.display = "inline-table";
    }else{
      popup_button2.style.display = "none";
    }
    //Button2 END
  }
  function toggle_popup(){
    if(popup.classList.contains('show')){
      popup.classList.remove('show');
    }else{
      update_popup();
      popup.classList.add('show');
    }
  }