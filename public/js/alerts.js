
function successAlert(message){

$(".sucess-message").html(message);
$(".alert-success").animate({top: '+=500'}).delay(500).animate({top: '-=500'});


}

function errorAlert(message){

    $(".error-message").html(message);
    $(".alert-error").animate({top: '+=500'}).delay(500).animate({top: '-=500'});

}