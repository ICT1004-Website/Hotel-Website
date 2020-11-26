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

$(document).ready( function() {
    var now = new Date();
    var month = (now.getMonth() + 1);               
    var day = now.getDate();
    if (month < 10) 
        month = "0" + month;
    if (day < 10) 
        day = "0" + day;
    var today = now.getFullYear() + '-' + month + '-' + day;
    $('#arrival_update').val;
    $('#checkout_update').val;
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
document.getElementById("arrival_update").setAttribute("min", today);
document.getElementById("checkout_update").setAttribute("min", today);

