/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*
 * 
 * Perform initialization tasks after the DOM is fully parsed. Requires jQuery.
 */
$(document).ready(function ()
{
    // Register event handlers:
    registerEventHandlers();
    activateMenu();
    checkPassword();
});


function checkPassword() {
    if ($('#pwd_confirm').val() !== $('#pwd').val()) {
        $('#pwd_confirm')[0].setCustomValidity('Passwords must match.');
    } else {
        $('#pwd_confirm')[0].setCustomValidity('');
    }
}

//disable end date if start date not selected//
document.getElementById("start").disabled = false;
document.getElementById("end").disabled = true;
 
var dis1 = document.getElementById("start");
dis1.onchange = function () {
   if (this.value != "start" || this.value.length > 0) {
      document.getElementById("end").disabled = false;
     //enable end date after start date has been selected.  
   }
}

//set start default value to 
$(document).ready( function() {
    var now = new Date();
    var month = (now.getMonth() + 1);               
    var day = now.getDate();
    if (month < 10) 
        month = "0" + month;
    if (day < 10) 
        day = "0" + day;
    var today = now.getFullYear() + '-' + month + '-' + day;
    $('#start').val(today);
});

//Set minimum start date to today//
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0 so need to add 1
var yyyy = today.getFullYear();
if(dd<10){
    dd='0'+dd;
} 
if(mm<10){
    mm='0'+mm;
} 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("start").setAttribute("min", today);

//Set end date minimum according to chosen start date//
var start = document.getElementById('start');
var end = document.getElementById('end');

start.addEventListener('change', function() {
    if (start.value)
        end.min = start.value;
}, false);
end.addEventLiseter('change', function() {
    if (end.value)
        start.max = end.value;
}, false);
