$(document).ready(function() {

    $('#adminLink').click(function() {
        $('#adminLink').hide();
        $('#admin').slideDown();
    });

    $('#userAddLink').click(function() {
        $('#userAddLink').hide();
        $('#userAlt').hide();
        $('#userDel').hide();
        $('#dataAlt').hide();
        $('#dataAdd').hide();
        $('#userAdd').slideDown();
        $('#userAltLink').slideDown();
        $('#dataAddLink').slideDown();
        $('#dataAltLink').slideDown();
        $('#userDelLink').slideDown();
    });
    $('#userAltLink').click(function() {
        $('#userAltLink').hide();
        $('#userAdd').hide();
        $('#dataAdd').hide();
        $('#dataAlt').hide();
        $('#userDel').hide();
        $('#userAlt').slideDown();
        $('#userAddLink').slideDown();
        $('#dataAltLink').slideDown();
        $('#dataAddLink').slideDown();
        $('#userDelLink').slideDown();
    });
    $('#userDelLink').click(function() {
        $('#userDelLink').hide();
        $('#userAdd').hide();
        $('#dataAdd').hide();
        $('#dataAlt').hide();
        $('#userAlt').hide();
        $('#userDel').slideDown();
        $('#userAddLink').slideDown();
        $('#dataAltLink').slideDown();
        $('#dataAddLink').slideDown();
        $('#userAltLink').slideDown();
    });
    $('#dataAddLink').click(function() {
        $('#dataAddLink').hide();
        $('#userAdd').hide();
        $('#userAlt').hide();
        $('#dataAlt').hide();
        $('#userDel').hide();
        $('#dataAdd').slideDown();
        $('#userAddLink').slideDown();
        $('#userAltLink').slideDown();
        $('#dataAltLink').slideDown();
        $('#userDelLink').slideDown();
    });
    $('#dataAltLink').click(function() {
        $('#dataAltLink').hide();
        $('dataAdd').hide();
        $('#userAdd').hide();
        $('#userAlt').hide();
        $('#userDel').hide();
        $('#dataAlt').slideDown();
        $('#userAddLink').slideDown();
        $('#dataAddLink').slideDown();
        $('#userAltLink').slideDown();
        $('#userDelLink').slideDown();
    });

    $('.closeIcon').click(function() {
        $('.hide').slideUp();
        $('#adminLink').slideDown();
    });

    $('.closeIcon2').click(function() {
        $('.hide').hide();
        $('#userAddLink').slideDown();
        $('#dataAddLink').slideDown();
        $('#userAltLink').slideDown();
        $('#dataAltLink').slideDown();
        $('#userDelLink').slideDown();
    });
    
    // hide notification after 10sec
    setTimeout(notificationHide, 5000);
    function notificationHide() {
        $('#success').slideUp();
        $('#error').slideUp();
    }


});