$(document).ready(function () {
    $('#btn_b_details').click(function () {
            $('#list_b_details').removeClass('active active_tab1');
            $('#list_b_details').removeAttr('href data-toggle');
            $('#b_details').removeClass('active');
            $('#list_b_details').addClass('inactive_tab1');
            $('#list_g_info').removeClass('inactive_tab1');
            $('#list_g_info').addClass('active_tab1 active');
            $('#list_g_info').attr('href', '#g_info');
            $('#list_g_info').attr('data-toggle', 'tab');
            $('#g_info').addClass('active in');
        });

    $('#previous_btn_g_info').click(function(){
        $('#list_g_info').removeClass('active active_tab1');
        $('#list_g_info').removeAttr('href data-toggle');
        $('#g_info').removeClass('active in');
        $('#list_g_info').addClass('inactive_tab1');
        $('#list_b_details').removeClass('inactive_tab1');
        $('#list_b_details').addClass('active_tab1 active');
        $('#list_b_details').attr('href', '#b_details');
        $('#list_b_details').attr('data-toggle', 'tab');
        $('#b_details').addClass('active in');
    });

    $('#btn_g_info').click(function () {
        var error_fname = '';
        var error_lname = '';
        var error_email = '';
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if ($.trim($('#fname').val()).length == 0)
        {
            error_fname = 'First Name is required';
            $('#error_fname').text(error_fname);
            $('#fname').addClass('has-error');
        } else
        {
            error_fname = '';
            $('#error_fname').text(error_fname);
            $('#fname').removeClass('has-error');
        }

        if ($.trim($('#lname').val()).length == 0)
        {
            error_lname = 'Last Name is required';
            $('#error_lname').text(error_lname);
            $('#lname').addClass('has-error');
        } else
        {
            error_lname = '';
            $('#error_lname').text(error_lname);
            $('#lname').removeClass('has-error');
        }
        
        if ($.trim($('#email').val()).length == 0)
        {
            error_email = 'Email is required';
            $('#error_email').text(error_email);
            $('#email').addClass('has-error');
        } else
        {
            if (!filter.test($('#email').val()))
            {
                error_email = 'Invalid Email';
                $('#error_email').text(error_email);
                $('#email').addClass('has-error');
            } else
            {
                error_email = '';
                $('#error_email').text(error_email);
                $('#email').removeClass('has-error');
            }
        }

        if (error_fname != '' || error_lname != '' || error_email != '')
        {
            return false;
        } else
        {
            $('#list_g_info').removeClass('active active_tab1');
            $('#list_g_info').removeAttr('href data-toggle');
            $('#g_info').removeClass('active');
            $('#list_g_info').addClass('inactive_tab1');
            $('#list_payment').removeClass('inactive_tab1');
            $('#list_payment').addClass('active_tab1 active');
            $('#list_payment').attr('href', '#payment');
            $('#list_payment').attr('data-toggle', 'tab');
            $('#payment').addClass('active in');
        }
    });

    $('#previous_btn_payment').click(function () {
        $('#list_payment').removeClass('active active_tab1');
        $('#list_payment').removeAttr('href data-toggle');
        $('#payment').removeClass('active in');
        $('#list_payment').addClass('inactive_tab1');
        $('#list_g_info').removeClass('inactive_tab1');
        $('#list_g_info').addClass('active_tab1 active');
        $('#list_g_info').attr('href', '#g_info');
        $('#list_g_info').attr('data-toggle', 'tab');
        $('#g_info').addClass('active in');
    });

    $('#btn_payment').click(function () {
        var error_card_holder = '';
        var error_card_number= '';
        var error_expiry_date= '';
        var error_cvc= '';
        
        if ($.trim($('#card_holder').val()).length == 0)
        {
            error_card_holder = 'Card Holder name is required';
            $('#error_card_holder').text(error_card_holder);
            $('#card_holder').addClass('has-error');
        } else
        {
            error_card_holder = '';
            $('#error_card_holder').text(error_card_holder);
            $('#card_holder').removeClass('has-error');
        }

       if ($.trim($('#card_number').val()).length == 0)
        {
            error_card_number = 'Card Number is required';
            $('#error_card_number').text(error_card_number);
            $('#card_number').addClass('has-error');
        } else
        {
            error_card_number = '';
            $('#error_card_number').text(error_card_number);
            $('#card_number').removeClass('has-error');
        }
        
        if ($.trim($('#expiry_date').val()).length == 0)
        {
            error_expiry_date = 'Expiry Date is required';
            $('#error_expiry_date').text(error_expiry_date);
            $('#expiry_date').addClass('has-error');
        } else
        {
            error_card_number = '';
            $('#error_expiry_date').text(error_expiry_date);
            $('#expiry_date').removeClass('has-error');
        }
        
        if ($.trim($('#cvc').val()).length == 0)
        {
            error_cvc = 'CVC Number is required';
            $('#error_cvc').text(error_cvc);
            $('#card_cvc').addClass('has-error');
        } else
        {
            error_cvc = '';
            $('#error_cvc').text(error_cvc);
            $('#cvc').removeClass('has-error');
        }
        
        if (error_card_holder != '' || error_card_number != '' || error_expiry_date != '' || error_cvc != '')
        {
            return false;
        } else
        {
            $('#btn_payment').attr("disabled", "disabled");
            $(document).css('cursor', 'prgress');
            $("#register_form").submit();
        }

    });

});
