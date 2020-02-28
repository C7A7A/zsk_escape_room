 <!-- Modal Register-->
 <div class="modal fade " id="register_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Rejestracja</h5>
            <button type="button" class="close register_close_button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="register_form">
                <div class="message"></div>
                <div class="form-group name_div">
                    <input type="text" id="name_register" name="name_register" class="form-control col-12" placeholder="Imie">
                </div>
                <div class="form-group email_div">
                    <input type="email" id="email_register" name="email_register" class="form-control col-12" placeholder="Email">
                </div>
                <div class="form-group email_confirm_div">
                    <input type="email" id="email_confirm" name="email_confirm" class="form-control col-12" placeholder="Potwierdź Email">
                </div>
                <div class="form-group password_div">
                    <input type="password" class="form-control col-12" id="password_register" name="password_register" placeholder="Hasło">
                </div>
                <div class="form-group password_confirm_div">
                    <input type="password" class="form-control col-12" id="password_confirm" name="password_confirm" placeholder="Potwierdź Hasło">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-dark register_close_button" data-dismiss="modal">Zamknij</button>
            <button type="button" class="btn btn-primary register_button btn-warning">Zarejestruj się</button>
        </div>
    </div>
    </div>
</div>

<script>
    $('.register_close_button').on('click', function(){
        $('.warning').remove();
        $('.success').remove();
    });

    $('.register_button').on('click', function(){
        let name = $('#name_register').val();
        let email = $('#email_register').val();
        let email_confirm = $('#email_confirm').val();
        let password = $('#password_register').val();
        let password_confirm = $('#password_confirm').val();
        let regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        $('.warning').remove();

        if(name == ''){
            $('.name_div').append('<span class="warning">Podaj swoje imie </span>');
            $('#name_register').focus();
        }else if(email == ''){
            $('.email_div').append('<span class="warning">Podaj swój adres email</span>');
            $('#email_register').focus();
        }else if(!regex.test(email)){
            $('.email_div').append('<span class="warning">Podaj prawidłowy adres email</span>');
            $('#email_register').focus();
        }else if(email_confirm == ''){
            $('.email_confirm_div').append('<span class="warning">Potwierdź swój adres email</span>');
            $('#email_confirm').focus();
        }else if(password == ''){
            $('.password_div').append('<span class="warning">Podaj swoje hasło</span>');
            $('#password_register').focus();
        }else if(password_confirm == ''){
            $('.password_confirm_div').append('<span class="warning">Potwierdź swoje hasło</span>');
            $('#password_confirm').focus();
        }else if(email != email_confirm){
            $('.email_confirm_div').append('<span class="warning">Podane adresy email nie są identyczne</span>');
            $('#email_confirm').focus();
        }else if(password != password_confirm){
            $('.password_confirm_div').append('<span class="warning">Podane hasła nie są identyczne</span>');
            $('#password_confirm').focus();
        }
        else{
            var data = $('.register_form').serialize();

            $.ajax({
                type: 'POST',
                url : 'register_submit.php',
                data: data,
                beforeSend: function(){
                    $('.warning').fadeOut();
                },
                success: function(response){
                    if(response == 'success'){
                        $('.message').html('<span class="success">Zostałeś Zarejestrowany!</span>');
                        $('#name_register').val('');
                        $('#email_register').val('');
                        $('#email_confirm').val('');
                        $('#password_register').val('');
                        $('#password_confirm').val('');
                    }else if(response == 'check_error'){
                        $('.message').html('<span class="warning">Uzupełnij wszystkie pola</span>');
                    }else if(response == 'equal_error'){
                        $('.message').html('<span class="warning">Email/hasło nie są identyczne</span>');
                    }else if(response == 'same_email'){
                        $('.message').html('<span class="warning">Na podany email założono już konto</span>');
                    }else if(response == 'query_error'){
                        $('.message').html('<span class="warning">Wystąpił błąd w zapytaniu. Spróbuj ponownie</span>');
                    }
                }
            })
        }
    })
</script>
