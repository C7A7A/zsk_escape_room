<!-- Modal Login-->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logowanie</h5>
                <button type="button" class="close login_close_button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="login_form">
                    <div class="message"></div>
                    <div class="form-group email_div">
                        <input type="email" id="email_login" name="email_login" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group password_div">
                        <input type="password" id="password_login" name="password_login" class="form-control" placeholder="Hasło">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-dark login_close_button" data-dismiss="modal">Zamknij</button>
                <button type="button" class="btn btn-primary login_button btn-warning">Zaloguj się</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.login_close_button').on('click', function(){
        $('.warning').remove();
        $('.success').remove();
    });

    $('.login_button').on('click', function(){
        let email = $('#email_login').val();
        let password = $('#password_login').val();
        let regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;        

        $('.warning').remove();

        if(email == ''){
            $('.email_div').append('<span class="warning">Podaj swój adres email</span>');
            $('#email_login').focus();
        }
        else if(!regex.test(email)){
            $('.email_div').append('<span class="warning">Podaj prawidłowy adres email</span>');
            $('#email_login').focus();
        }else if(password == ''){
            $('.password_div').append('<span class="warning">Podaj swoje hasło</span>');
            $('#password_login').focus();
        }
        else{
            var data = $('.login_form').serialize();

            $.ajax({
                type: 'POST',
                url : 'login_submit.php',
                data: data,
                beforeSend: function(){
                    $('.warning').fadeOut();
                },
                success: function(response){
                    if(response == 'success'){
                        $('.message').html('<span class="success">Zostałeś Zalogowany!</span>');
                        $('#email_login').val('');
                        $('#password_login').val('');
                        window.location = './index.php';
                    }else if(response == 'query_erorr'){
                        $('.message').html('<span class="warning">Wystąpił błąd w zapytaniu. Spróbuj ponownie</span>');
                    }else if(response == 'equal_error'){
                        $('.message').html('<span class="warning">Podano błędny email lub hasło</span>');
                    }else if(response == 'check_error'){
                        $('.message').html('<span class="warning">Uzupełnij wszystkie pola</span>');
                    }
                }
            });
        }
    });
</script>