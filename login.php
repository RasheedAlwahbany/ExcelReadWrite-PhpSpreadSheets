<?php require_once "Pages/login.php"; ?>
<!-- The Modal -->
<form action="" method="POST" class="was-validated">
<div class="modals" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <input type="hidden" class="form-control" name="Controller" value="LogIn" required>
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <!-- <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" name="UserEmail" placeholder="Enter email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="UserPWD" placeholder="Enter password" id="pwd" required>
                    </div>
                    <!-- <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                    </div> -->
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Login</button>
            </div>

        </div>
    </div>
</div>
</form>