//!Do NOT Edit on this file
// Custom alert box START
var alert_container = document.getElementById('alert-boxes-container');

// Create an instance of the alert box HTML structure (alert_box)
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

// Function to display the alert box
function box_alert(type,message,duration = 5000){
  if(duration<1000){
    duration = 1000;
  }
  duration+=400;
  // Clone an instance of the alert_box we made above (alert_box)
  let this_alert = alert_box.cloneNode(true);
  // add the type of the alert_box (can be success, warning, etc..)
  this_alert.classList.add(type);
  // add the alert box to the page body
  alert_container.appendChild(this_alert);
  // add the message content to the alert box
  this_alert.querySelector('.content').innerHTML = message;
  // by default, the alert box isn't visible. We use the bellow code to show it with an animation
  setTimeout(function(){
    this_alert.classList.add('show');
  },100);

  // Hide the alert_box after being displayed for amount of time (duration)
  setTimeout(function(){
    //check if user already hide the alert_box
  if(document.body.contains(this_alert)){
    // animate the alert_box to be hidden
  this_alert.classList.remove('show');
    // remove the alert_box from the DOM after the animation
  setTimeout(function(){
    if(document.body.contains(this_alert)){
      alert_container.removeChild(this_alert);
    }
    },400);
  }
  },duration-400);
  // function to handle the close button click event
  box_alert_close_button(this_alert);
}
// function to handle the close button click event
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
