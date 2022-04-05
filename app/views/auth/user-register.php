<?php require_once "app/views/header.php"; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <h3 class="mb-4 text-center">Register</h3>
            <div class="form-body bg-light p-4">
                <form name="frmAdd" method="post" action="" id="frmAdd"
                      onSubmit="return validate();">
                    <div class="row">

                        <div class="col-lg-12 mb-3">
                            <label for="name" class="form-label">Name*</label>
                            <input type="text" class="form-control demoInputBox" id="name" name="name">
                            <small id="name-info" class="text-danger"></small>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="email" class="form-label">Email Address*</label>
                            <input type="email" class="form-control demoInputBox" id="email" name="email">
                            <small id="email-info" class="text-danger"></small>
                        </div>

                        <div class="col-lg-12 mb-4">
                            <label for="password" class="form-label">Password*</label>
                            <input type="password" class="form-control demoInputBox" id="password" name="password">
                            <small id="password-info" class="text-danger"></small>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" name="register" id="btnSubmit" value="Register"
                                   class="btn btn-primary form-control">
                            <br>
                            <br>
                            <a href="index.php?action=user-login"
                               class="btn btn-outline-secondary form-control">Login ? </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
<script>
    function validate() {
        var valid = true;
        $(".demoInputBox").css('background-color', '');
        $(".info").html('');

        if (!$("#name").val()) {
            $("#name-info").html("*This field is required");
            $("#name").css('background-color', '#FFFFDF');
            valid = false;
        }

        if (!$("#email").val()) {
            $("#email-info").html("*This field is required");
            $("#email").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#password").val()) {
            $("#password-info").html("*This field is required");
            $("#password").css('background-color', '#FFFFDF');
            valid = false;
        }
        return valid;
    }
</script>
</body>
</html>