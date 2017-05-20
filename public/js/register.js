$(function(){

    $('#username_error').hide();
    $('#email_error').hide();
    $('#handle_error').hide();
    $('#password_error').hide();
    $('#password_confirm_error').hide();

    var username_error = false;
    var email_error = false;
    var handle_error = false;
    var password_error = false;
    var password_confirm_error = false;

    $('#username').focusout(function(){

        var username_length = $('#username').val().length;
        var username=$('#username').val();

        if(username_length < 6 || username_length > 20){
            $("#username_error").html('Username must be between 6-20 characters long!').show();
            username_error=true;
        }else if(/^\d/.test(username)){
            $("#username_error").html('Username cannot start with a number!').show();
            username_error=true;
        }else{
            $("#username_error").hide();
            username_error=false;
        }

    });

    $('#handle').focusout(function(){

        var handle_length = $('#handle').val().length;
        var handle = $('#handle').val();

        if(handle_length < 4 || handle_length > 15){
            $('#handle_error').html('Handle must be between 4 and 15 characters long!').show();
            handle_error=true;
        }else if(handle.match('^@')){
            $('#handle_error').html('Don\'t include @ in your handle!').show();
            handle_error=true;
        }else{
            $("#handle_error").hide();
            handle_error=false;
        }

        $.ajax({
            type:'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/checkHandle',
            data: {handle : $('#handle').val()},
            success:function(response){

                switch(response){
                    case('taken'):
                        $('#handle_error').html('Handle is already taken!').show();
                        handle_error=true;
                        break;
                    case('not taken'):
                        handle_error=false;
                        break;
                }
            },
            error:function(){
                alert('error');
            }

        });

    });

    $('#register-email').focusout(function(){


        var email = $('#register-email').val();
        var pattern = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);


        if(pattern.test(email)) {
            $("#email_error").hide();
            email_error=false;
        }else {
            $('#email_error').html('Invalid Email!').show();
            email_error = true;
        }


        $.ajax({
            type:'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/checkEmail',
            data: {email : $('#register-email').val()},
            success:function(response){

                switch(response){
                    case('taken'):
                        $('#email_error').html('Email is already taken!').show();
                        email_error=true;
                        break;
                    case('not taken'):
                        email_error=false;
                        break;
                }
            },
            error:function(){
                alert('error');
            }

        });

    });


    $('#register-password').focusout(function(){

        var password_length= $('#register-password').val().length;

        if(password_length < 6){
            $('#password_error').html('Password must be at least 6 characters long!').show();
            password_error=true;
        }else{
            $('#password_error').hide();
            password_error=false;
        }

    });

    $('#password-confirm').focusout(function(){

        var password  =  $('#register-password').val();
        var passwordConfirm = $('#password-confirm').val();
        var passwordConfirm_length = passwordConfirm.length;

        if(password !== passwordConfirm){
            $('#password_confirm_error').html('Passwords must match!').show();
            password_confirm_error=true;
        }else if(passwordConfirm_length < 6){
            $('#password_confirm_error').html('Password must be at least 6 characters long!').show();
            password_confirm_error=true;
        }else{
            $('#password_confirm_error').hide();
            password_confirm_error=false;
        }

    });

    $('#register-form').submit(function(){

        if(username_error || handle_error || email_error || password_error || password_confirm_error){
            return false;
        }else{
            return true;
        }

    });


});