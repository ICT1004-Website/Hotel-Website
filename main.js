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

