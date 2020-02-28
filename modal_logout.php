<!-- Modal Logout-->
<div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Wylogowywanie</h5>
                <button type="button" class="close logout_close_button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="logout_form">
                    <div class="message"></div>
                    <h6 class="center"> Czy na pewno chcesz się wylogować? </h6>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-dark login_close_button" data-dismiss="modal">Anuluj</button>
                <a href="./logout.php?logout"><button type="button" class="btn btn-primary logout_button btn-warning">Wyloguj się</button></a>
            </div>
        </div>
    </div>
</div>

