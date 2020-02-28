<?php
    session_start();
    require_once('header.php');
    require_once('connect.php');


    $query_1 = "SELECT * FROM `escape_rooms` WHERE `Name` = 'Hannibal'";
    $result_1 = $conn->query($query_1);
    $hannibal = $result_1->fetch_assoc();

    $query_2 = "SELECT * FROM `escape_rooms` WHERE `Name` = 'Joker'";
    $result_2 = $conn->query($query_2);
    $joker = $result_2->fetch_assoc();

    $query_3 = "SELECT * FROM `escape_rooms` WHERE `Name` = 'Game Over'";
    $result_3 = $conn->query($query_3);
    $game_over = $result_3->fetch_assoc();

    $query_4 = "SELECT * FROM `escape_rooms` WHERE `Name` = 'Klątwa Czarnobrodego'";
    $result_4 = $conn->query($query_4);
    $blackbeard = $result_4->fetch_assoc();

    $month = date('n');

    if(!isset($_SESSION['month'])){
        $_SESSION['month'] = $month;
    }

    if(!isset($_SESSION['er'])){
        $_SESSION['er'] = 'Hannibal';
    }

    // print_r($month);
    // print_r($_SESSION);
    // print_r($month);

    if(isset($_GET['open_modal'])){ 
?>
        <script>
            $(function(){
                $('#reservation_modal').modal('show');  
            });
        </script>
<?php
    }
?>



<body data-spy="scroll" data-target="#navbarSupportedContent" data-offset="0">
    <div class="container">
        <div class="all">
            <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
                <div class="brand">
                    <div class="brand_title">
                        <a class="navbar-brand" href="#">ESCAPE</a>
                    </div>
                    <div class="brand_subtitle">
                        <span class="navbar_brand_subtitle text-warning">The Escape Room</span> 
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about_section"><i class="fas fa-align-left"></i> O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#offer_section"><i class="far fa-thumbs-up"></i> Oferta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reservation_section"><i class="far fa-calendar-check"></i> Rezerwacje</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact_section"><i class="fas fa-envelope"></i> Kontakt</a>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <?php 
                            if(!isset($_SESSION['logged'])){
                        ?>                         
                            <button class="btn btn-outline-warning my-2 my-sm-0" type="button" data-toggle="modal" data-target="#login_modal"> Zaloguj się </button>
                            <button class="btn btn-outline-warning my-2 my-sm-0 register" type="button" data-toggle="modal" data-target="#register_modal"> Zarejestruj się </button>     
                        <?php
                            }else if($_SESSION['logged'] == true){
                        ?>
                            <button class="btn btn-outline-warning my-2 my-sm-0 logout" type="button" data-toggle="modal" data-target="#logout_modal"> Wyloguj się </button>    
                        <?php
                            }
                        ?>
                    </form>
                </div>
            </nav>
            <section class="carousel_section">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="img\Hannibal.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img\Joker.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img\Game_Over.jpg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img\Pirates.jpg" alt="Fourth slide">
                        </div>
                    </div>
                    <a  class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
            <br id="about_section">
            <br>  
            <section class="about_section">
                <div class="content">
                    <h2 class="text-center about_title">ESCAPE</h2>
                    <hr>
                    <p class="about_text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque tristique blandit. 
                        Morbi ut eleifend est. Suspendisse scelerisque at enim et tincidunt. Interdum et malesuada fames ac ante ipsum 
                        primis in faucibus. Nunc tincidunt lacus libero, vel ultricies risus egestas non. Maecenas mollis varius odio, 
                        eget interdpis eget ornare. Cras consectetur ante at augue congue, 
                        id consectetur odio pellentesque. Cras ut sagittis neque, in
                        <br><br>
                        Etiam fringilla urna et egestas vestibulum. Nunc ehicula consectetur nunc vel maximus. Nullam lobortis
                        diam ut dui mattis rutrum. Maecenas consequat gravida lobortis. Cras ac suscipit erat, eget semper urna.
                    </p>
                </div>
            </section>
            <section class="image_section">
                <div class="all_images">
                    <div class="image image_first">
                        <img src="img\teamwork.png" alt="TEAMWORK">
                        <h3> WSPÓŁPRACUJ </h3>
                    </div>
                    <div class="image image_second">
                        <img src="img\brain.png" alt="BRAIN">  
                        <h3> MYŚL </h3>                       
                    </div>
                    <div class="image image_last">
                        <img src="img\escape2.png" alt="ESCAPE">    
                        <h3> UCIEKAJ </h3>                     
                    </div>
                </div>
            </section>
            <br id="offer_section">
            <section class="offer_section">
                <div class="content">
                    <h2 class="text-center"> OFERTA </h2>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                          <div class="card_image">
                              <img src="img/hannibal_small.jpg" alt="Hannibal">
                          </div>
                          <div class="card_content">
                            <div class="content_title">
                                <h3> <?php echo $hannibal['Name'] ?> </h3>
                            </div>
                            <div class="content_descr">
                                <span>
                                    <?php echo $hannibal['Description'] ?>
                                </span>
                                <div class="content_icons">
                                    <div class="icon icon_user">
                                        <img src="img/user_icon.png" alt="User" width="40px" height="40px">
                                        <span> <?php echo $hannibal['Amount'] ?> Graczy </span>
                                    </div>
                                    <div class="icon icon_time">
                                        <img src="img/time_icon.png" alt="Time" width="40px" height="40px">
                                        <span> <?php echo $hannibal['Time'] ?> Minut </span>
                                    </div>
                                    <div class="icon icon_money">
                                        <img src="img/money_icon.png" alt="Money" width="40px" height="40px">
                                        <span> <?php echo $hannibal['Price'] ?> zł/Osobę</span> 
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-body">
                            <div class="card_image">
                                <img src="img/joker_small.png" alt="Joker">
                            </div>
                            <div class="card_content">
                                <div class="content_title">
                                    <h3> <?php echo $joker['Name'] ?>  </h3>
                                </div>                                
                                <div class="content_descr">
                                    <span>
                                        <?php echo $joker['Description'] ?> 
                                    </span>
                                    <div class="content_icons">
                                        <div class="icon icon_user">
                                            <img src="img/user_icon.png" alt="User" width="40px" height="40px">
                                            <span> <?php echo $joker['Amount'] ?> Graczy </span>
                                        </div>
                                        <div class="icon icon_time">
                                            <img src="img/time_icon.png" alt="Time" width="40px" height="40px">
                                            <span> <?php echo $joker['Time'] ?> Minut </span>
                                        </div>
                                        <div class="icon icon_money">
                                            <img src="img/money_icon.png" alt="Money" width="40px" height="40px">
                                            <span> <?php echo $joker['Price'] ?> zł/Osobę</span> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-body">
                            <div class="card_image">
                                <img src="img/game_over_small.jpg" alt="Anonymous">
                            </div>
                            <div class="card_content">
                                <div class="content_title">
                                    <h3> <?php echo $game_over['Name'] ?>  </h3>
                                </div>                                
                                <div class="content_descr">
                                    <span>
                                        <?php echo $game_over['Description'] ?> 
                                    </span>
                                    <div class="content_icons">
                                        <div class="icon icon_user">
                                            <img src="img/user_icon.png" alt="User" width="40px" height="40px">
                                            <span> <?php echo $game_over['Amount'] ?> Graczy </span>
                                        </div>
                                        <div class="icon icon_time">
                                            <img src="img/time_icon.png" alt="Time" width="40px" height="40px">
                                            <span> <?php echo $game_over['Time'] ?> Minut </span>
                                        </div>
                                        <div class="icon icon_money">
                                            <img src="img/money_icon.png" alt="Money" width="40px" height="40px">
                                            <span> <?php echo $game_over['Price'] ?> zł/Osobę</span> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="card">
                            <div class="card-body">
                                <div class="card_image">
                                    <img src="img/pirates_small.jpg" alt="Pirates">
                                </div>
                                <div class="card_content">
                                    <div class="content_title">
                                        <h3> <?php echo $blackbeard['Name'] ?>  </h3>
                                    </div>                                
                                    <div class="content_descr">
                                        <span>
                                            <?php echo $blackbeard['Description'] ?> 
                                        </span>
                                        <div class="content_icons">
                                            <div class="icon icon_user">
                                                <img src="img/user_icon.png" alt="User" width="40px" height="40px">
                                                <span> <?php echo $blackbeard['Amount'] ?> Graczy </span>
                                            </div>
                                            <div class="icon icon_time">
                                                <img src="img/time_icon.png" alt="Time" width="40px" height="40px">
                                                <span> <?php echo $blackbeard['Time'] ?> Minut </span>
                                            </div>
                                            <div class="icon icon_money">
                                                <img src="img/money_icon.png" alt="Money" width="40px" height="40px">
                                                <span> <?php echo $blackbeard['Price'] ?> zł/Osobę</span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                </div>
            </section>
            <br id="reservation_section">
            <section class="reservation_section">
                <div class="content">
                    <h2 class="text-center"> REZERWACJE </h2> 
                    <hr>
                    <div class="col-12 center-block">
                        <form action="reservation.php" class="reservation_form form-inline" method="GET">
                            <div class="input-group col-5">
                                <div class="input-group-prepand">
                                    <label class="input-group-text" for="reservation_month">Miesiąc</label>
                                </div>
                                <select name="reservation_month" id="reservation_month" class="reservation_month col-9">
                                    <option value="1" <?php if($_SESSION['month'] == 1) echo "selected" ?>>Styczeń</option>
                                    <option value="2" <?php if($_SESSION['month'] == 2) echo "selected" ?>>Luty</option>
                                    <option value="3" <?php if($_SESSION['month'] == 3) echo "selected" ?>>Marzec</option>
                                    <option value="4" <?php if($_SESSION['month'] == 4) echo "selected" ?>>Kwiecień</option>
                                    <option value="5" <?php if($_SESSION['month'] == 5) echo "selected" ?>>Maj</option>
                                    <option value="6" <?php if($_SESSION['month'] == 6) echo "selected" ?>>Czerwiec</option>
                                    <option value="7" <?php if($_SESSION['month'] == 7) echo "selected" ?>>Lipiec</option>
                                    <option value="8" <?php if($_SESSION['month'] == 8) echo "selected" ?>>Sierpień</option>
                                    <option value="9" <?php if($_SESSION['month'] == 9) echo "selected" ?>>Wrzesień</option>
                                    <option value="10" <?php if($_SESSION['month'] == 10) echo "selected" ?>>Październik</option>
                                    <option value="11" <?php if($_SESSION['month'] == 11) echo "selected" ?>>Listopad</option>
                                    <option value="12" <?php if($_SESSION['month'] == 12) echo "selected" ?>>Grudzień</option>
                                </select>
                            </div>
                            <div class="input-group col-5">
                                <div class="input-group-prepand">
                                    <label class="input-group-text" for="reservation_er">Escape Room</label>
                                </div>
                                <select name="reservation_er" id="reservation_er" class="reservation_er col-8">

                                    <?php 
                                        $query_5 = "SELECT * FROM `escape_rooms`";
                                        $result_5 = $conn->query($query_5);
                                        while($er = $result_5->fetch_assoc()){
                                    ?>
                                            <option value="<?php echo $er['Name'];?>" <?php if($_SESSION['er'] == $er['Name']) echo "selected"; ?>> <?php echo $er['Name'];?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="input-group col-2">
                                <button class="reservation_button btn btn-dark" type="submit"> Potwierdź </button>
                            </div>
                        </form>
                    </div>
                    <div id="calendar">
                        <ul>
                            <li>PONIEDZIAŁEK</li>
                            <li>WTOREK</li>
                            <li>ŚRODA</li>
                            <li>CZWARTEK</li>
                            <li>PIĄTEK</li>
                            <li>SOBOTA</li>
                            <li>NIEDZIELA</li>
                            <?php 
                                $days = cal_days_in_month(CAL_GREGORIAN, $_SESSION['month'], date('Y'));
                                $today_day = date('j');
                                for($i = 1; $i <= 35; $i++){
                                    if($i <= $days && $i > $today_day){
                            ?>
                                        <li class="reservation_day active"> <?php echo $i; ?> </li>
                            <?php
                                    }else{
                            ?>
                                        <li class="reservation_day <?php if($today_day == $i && $month == $_SESSION['month']) echo "today"; echo " "; if($month == $_SESSION['month']){echo "disabled";}else echo "active";?>"> <?php if($i <= 31){ echo $i; }else{echo '';}?> </li>
                            <?php
                                    }
                                }   
                            ?>
                        </ul>
                    </div>
                </div>
            </section>
            <br> <br> <br> <br>
            <br id="contact_section">
            <section class="contact_section">
                <div class="content">
                    <h2 class="text-center">KONTAKT </h2> 
                    <hr>
                    <div class="col-8 message_contact">
                        <form class="contact_form">
                            <div class="messages"></div>
                            <div class="form-group single_form row">
                                <label for="topic" class="col-3 col-form-label"><i class="fas fa-text-height"></i> Temat: </label>
                                <div class="col-9">
                                    <input class="form-control" type="text" id="topic" name="topic">     
                                    <div class="topic_message"></div>                      
                                </div>
                            </div>
                            <div class="form-group single_form row">
                                <label for="content" class="col-3 col-form-lable"><i class="fas fa-align-justify"></i> Wiadomość: </label>
                                <div class="col-9">
                                    <textarea class="form-control" id="content" name="content"></textarea>
                                    <div class="content_message"></div>
                                </div> 
                            </div>
                            <div class="form-group row button_div">
                                <button type="button" class="btn btn-warning float-right col-3 contact_button"><i class="far fa-envelope-open"></i> Wyślij</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-4 basic_contact">
                        <span class="bold_contact"><i class="fas fa-at"></i> Poczta: </span> <span> Kontakt.escape@gmail.com </span> <br>
                        <span class="bold_contact"><i class="fas fa-phone"></i> Telefon: </span> <span> 665 659 818</span> <br>
                        <span class="bold_contact"><i class="fas fa-home"></i> Adres: </span> <span> Poznań, ul. Fredry 24/7 </span> <br>
                    </div>
                </div>
            </section>
            <?php
                require_once('footer.php');
            ?>
        </div>
    </div>

    <?php
        require_once('modal_login.php');
        require_once('modal_register.php');
        require_once('modal_logout.php');
        require_once('modal_reservation.php');
        require_once('bootstrap_jquery.php');
    ?>
</body>
</html>

<script>
    //RESERVATION
    $('.reservation_day').on('click', function(){
        if($(this).hasClass('active')){
            var d = new Date;

            // console.log(d.getMonth());
            // console.log(d.getFullYear());

            var day = $(this).text();
            var month = $('.reservation_month').find(':selected').text();
            var year = d.getFullYear();

            var month_2 = $('.reservation_month').find(':selected').val();
            // console.log(month_2);
            
            if(month_2 < d.getMonth()+1){
                year += 1;
            }

            var full_date = day + '' + month + ' ' + year;

            var er = $('.reservation_er').find(':selected').val();
            // $('.span_er_name').text(er);    
            // $('.span_time').text(full_date);
            

        $.ajax({
            url : 'reservation_modal_date.php',
            type: 'POST',
            data: {full_date: full_date},
            success: function(response){
                if(response == 'success'){
                    window.location = window.location.href = "?open_modal";
                }          
            }   
        });

        }
    });
    // $('.reservation_month').on('change', function(){
    //     var month = this.value;
    //     console.log(month);
    //     $.ajax({
    //         type: 'POST',
    //         url : 'reservation_month.php',
    //         data: {month: month},
    //         success: function(response){
    //             if(response == 'success'){
    //                 window.location = './index.php';
    //             }
    //         }
    //     });
    // });

    // $('.reservation_er').on('change', function(){
    //     var er = this.value;
    //     console.log(er);
    //     $.ajax({
    //         type: 'POST',
    //         url : 'reservation_er.php',
    //         data: {er: er},
    //         success: function(response){
    //             if(response == 'success'){
    //                 window.location = './index.php';
    //             }
    //         }
    //     });
    // });

    //CONTACT US
    $('.contact_button').on('click', function(){
        $('.warning').remove();
        $('.success').remove();

        let topic = $('#topic').val();
        let content = $('#content').val();
        // console.log(topic);
        // console.log(message);

        if(topic == ''){
            $('.topic_message').append('<span class="warning">Podaj temat wiadomości</span>');
            $('#topic').focus();
        }else if(content == ''){
            $('.content_message').append('<span class="warning">Podaj zawartość wiadomości</span>');
            $('#content').focus();
        }else{
            // var data = $('.contact_form').serialize();
            $.ajax({
                type: 'POST',
                url : 'contact_submit.php',
                data: {topic: topic, content: content},
                beforeSend: function(){
                    $('.warning').fadeOut();
                },
                success: function(response){
                    if(response == 'success'){
                        $('.messages').html('<span class="success">Wiadomość została wysłana!</span>');
                        setTimeout(function(){
                            $('.success').fadeOut();
                        }, 3000);
                        $('#topic').val('');
                        $('#content').val('');
                    }else if(response == 'check_error'){
                        $('.messages').html('<span class="warning">Uzupełnij wszystkie pola</span>');
                    }else if(response == 'query_error'){
                        $('.messages').html('<span class="warning">Wystąpił błąd w zapytaniu. Spróbuj ponownie</span>');
                    }else if(response == 'logged_error'){
                        $('.messages').html('<span class="warning">Musisz być zalogowany, aby wysłać wiadomość</span>');
                    }
                }
            });
        }
    });
</script>