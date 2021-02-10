//!Do NOT Edit on this file
// Custom alert box START
var alert_container = document.getElementById('alert-boxes-container');
var alert_box = document.createElement('div'),
    alert_icon = document.createElement('div'),
    alert_content = document.createElement('div'),
    alert_close = document.createElement('div');
alert_box.classList.add('alert-box');
alert_icon.classList.add('icon');
alert_content.classList.add('content');
alert_close.classList.add('close-button');
alert_box.appendChild(alert_icon);
alert_box.appendChild(alert_content);
alert_box.appendChild(alert_close);

function box_alert(type,message,duration = 5000){
  let this_alert = alert_box.cloneNode(true);
  this_alert.classList.add(type);
  alert_container.appendChild(this_alert);
  this_alert.querySelector('.content').innerHTML = message;
  setTimeout(function(){
    this_alert.classList.add('show');
  },100);
  setTimeout(function(){
  if(document.body.contains(this_alert)){
  this_alert.classList.remove('show');
  setTimeout(function(){
    if(document.body.contains(this_alert)){
      alert_container.removeChild(this_alert);
    }
    },400);
  }
  },duration-400);
  box_alert_close_button(this_alert);
}

function box_alert_close_button(el){
  let this_alert = el;
  this_alert.querySelector('.close-button').addEventListener('click',function(){
    this_alert.classList.remove('show');
    setTimeout(function(){
        alert_container.removeChild(this_alert);
      },400);
  })
}
// Custom alert box END
