<?php
    switch($_SESSION['er']){
        case 'Hannibal':
            $er_time = array(
                '10:00 - 11:30',
                '12:00 - 13:30',
                '14:00 - 15:30',
                '16:00 - 17:30',
                '18:00 - 19:30'
            );
        $amount_max = 5;
        $amount_min = 2;
            break;
        case 'Joker':
            $er_time = array(
                '9:30 - 11:30',
                '12:00 - 14:00',
                '14:30 - 16:30',
                '17:00 - 18:00',
                '18:30 - 20:30'
            );
        $amount_max = 6;
        $amount_min = 2;
            break;
        case 'Game Over':
            $er_time = array(
                '10:30 - 11:45',
                '12:15 - 13:30',
                '14:00 - 15:15',
                '15:45 - 17:00',
                '17:30 - 18:45'
            );
        $amount_max = 4;
        $amount_min = 2;
            break;
        case 'Klątwa Czarnobrodego':
            $er_time = array(
                '12:00 - 13:00',
                '13:30 - 14:30',
                '15:00 - 16:00',
                '16:30 - 17:30',
                '18:00 - 19:00'
            );
        $amount_max = 4;
        $amount_min = 2;
            break;
    }

    // $query_1 = "SELECT `ID_Escape_Room`"
    $full_date = (isset($_SESSION['full_date'])) ? $_SESSION['full_date'] : date("d/m/Y");

    $query = "SELECT `reservations`.`Time` FROM `reservations` JOIN `escape_rooms` ON `reservations`.`ID_Escape_Room` = `escape_rooms`.`ID_Escape_Room` 
                WHERE `escape_rooms`.`Name` = '$_SESSION[er]' AND `Date` LIKE '$full_date'";
    if($result = $conn->query($query)){
        for($i = 0; $i < $result->num_rows; $i++){
            $row[$i] = $result->fetch_assoc();
        }
    }

    for($j = 0; $j < 5; $j++){
        $reserved[$j] = false;
    }

    if(isset($row)){
        for($i = 0; $i < sizeof($row); $i++){
            for($j = 0; $j < 5; $j++){
                if($er_time[$j] == $row[$i]['Time']){
                    $reserved[$j] = true;
                }
            }
        }
    }
    
?>

<!-- Modal Reservation-->
<div class="modal fade" id="reservation_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rezerwacja</h5>
                <button type="button" class="close reservation_close_button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="reservation_form">
                    <div class="reservation_content">
                        <div class="message"></div>
                        <div class="form-group escape_room_reservation">
                            <span class="span_res">Escape Room:</span> <span class="span_er_name"> <?php echo $_SESSION['er']; ?></span> <br>
                        </div>
                        <div class="form-group date_reservation">
                            <span class="span_res">Data:</span> <span class="span_time"><?php echo ($_SESSION['full_date']) ? $_SESSION['full_date'] : "" ; ?> </span> 
                        </div>
                        <div class="form-group amount_reservation">
                            <label class="label label-default" for="amount_res"><span class="amount_res_label">Ilość osób <span class="amount_min"> <?php echo $amount_min; ?></span> - <span class="amount_max"> <?php echo $amount_max; ?></span></span></label>
                            <input type="number" id="amount_res" name="amount_res" class="form-control" placeholder="Ilość osób" max="<?php echo $amount_max; ?>" min="<?php echo $amount_min; ?>">
                            <div class="amount_res_message"></div>
                        </div>
                        <div class="form-group datetime_reservation">
                            <h5>Wybierz godzinę:</h5>
                            <div class='radio <?php if($reserved[0]) echo "reserved";?>'>
                                <label><input class="radio_res" type="radio" name="time" value="<?php echo $er_time[0]; ?>" <?php if($reserved[0]) echo "disabled";?>> <?php echo $er_time[0]; ?></label>
                            </div>
                            <div class='radio <?php if($reserved[1]) echo "reserved";?>'>
                                <label><input class="radio_res" type="radio" name="time" value="<?php echo $er_time[1]; ?>" <?php if($reserved[1]) echo "disabled";?>> <?php echo $er_time[1]; ?></label>
                            </div>
                            <div class='radio <?php if($reserved[2]) echo "reserved";?>'>
                                <label><input class="radio_res" type="radio" name="time" value="<?php echo $er_time[2]; ?>" <?php if($reserved[2]) echo "disabled";?>> <?php echo $er_time[2]; ?></label>
                            </div>
                            <div class='radio <?php if($reserved[3]) echo "reserved";?>'>
                                <label><input class="radio_res" type="radio" name="time" value="<?php echo $er_time[3]; ?>" <?php if($reserved[3]) echo "disabled";?>> <?php echo $er_time[3]; ?></label>
                            </div>
                            <div class='radio <?php if($reserved[4]) echo "reserved";?>'>
                                <label><input class="radio_res" type="radio" name="time" value="<?php echo $er_time[4]; ?>" <?php if($reserved[4]) echo "disabled";?>> <?php echo $er_time[4]; ?></label>
                            </div>
                            <div class="datetime_reservation_message"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-dark reservation_close_button" data-dismiss="modal">Zamknij</button>
                <button type="button" class="btn btn-primary reservation_button btn-warning">Rezerwuj</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.reservation_close_button').on('click', function(){
        $('.warning').remove();
        $('.success').remove();
        window.location = window.location.href = "?";
    });

    $('.reservation_button').on('click', function(){
        $('.warning').remove();

        let er = $('.span_er_name').text();
        let date = $('.span_time').text();
        let amount_res = $('#amount_res').val();
        var time = $('input[name="time"]:checked').val();

        if(amount_res > $('.amount_max').text().trim() || amount_res < $('.amount_min').text().trim()){
           $('.amount_res_message').append('<span class="warning">Wpisz odpowiednią ilość osób</span>');
           $('.amount_res').focus();
        }else if($('.radio').not('reserved') > 0){
            $('.datetime_reservation_message').append('<span class="warning">Wszystkie terminy są już zajęte</span>');
        }else if(!$("input:radio[name=time]").is(":checked")){
           $('.datetime_reservation_message').append('<span class="warning">Wybierz jeden z terminów</span>');
        }else{
            $.ajax({
                type: 'POST',
                url : 'reservation_submit.php',
                data: {er: er, date: date, amount: amount_res, time: time},
                beforeSend: function(response){
                    $('.warning').fadeOut();
                },
                success: function(response){
                    if(response == 'success'){
                        $('.message').html('<span class="success">Termin został zarejestrowany!</span>');                
                    }else if(response == 'query_erorr'){
                        $('.message').html('<span class="warning">Wystąpił błąd w zapytaniu. Spróbuj ponownie</span>');                    
                    }else if(response == 'check_error'){
                        $('.message').html('<span class="warning">Uzupełnij wszystkie pola</span>');                    
                    }else if(response == 'logged_error'){
                        $('.message').html('<span class="warning">Musisz być zalogowany, aby zarezerwować jeden z terminów</span>');
                    }else if(response == 'reserved_error'){
                        $('.message').html('<span class="warning">Termin został już zarezerwowany</span>');
                    }
                }
            });
        }
    });
</script>