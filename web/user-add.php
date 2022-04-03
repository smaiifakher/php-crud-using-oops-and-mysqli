<?php require_once "web/header.php"; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <h3 class="mb-4 text-center">Create Record</h3>
            <div class="form-body bg-light p-4">
                <form name="frmAdd" method="post" action="" id="frmAdd"
                      onSubmit="return validate();">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="fname" class="form-label">Firstname *</label>
                            <input type="text" class="form-control demoInputBox" id="fname" name="fname">
                            <small id="fname-info" class="text-danger"></small>

                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="lname" class="form-label">Lastname*</label>
                            <input type="text" class="form-control demoInputBox" id="lname" name="lname">
                            <small id="lname-info" class="text-danger"></small>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="email" class="form-label">Email Address*</label>
                            <input type="email" class="form-control demoInputBox" id="email" name="email">
                            <small id="email-info" class="text-danger"></small>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="city" class="form-label">City*</label>
                            <input type="text" class="form-control demoInputBox" id="city" name="city">
                            <small id="city-info" class="text-danger"></small>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <label for="state" class="form-label">State*</label>
                            <input type="text" class="form-control demoInputBox" id="state" name="state">
                            <small id="state-info" class="text-danger"></small>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" name="add" id="btnSubmit" value="Add"
                                   class="btn btn-primary form-control">
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

        if (!$("#fname").val()) {
            $("#fname-info").html("*This field is required");
            $("#fname").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#lname").val()) {
            $("#lname-info").html("*This field is required");
            $("#lname").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#email").val()) {
            $("#email-info").html("*This field is required");
            $("#email").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#city").val()) {
            $("#city-info").html("*This field is required");
            $("#city").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#state").val()) {
            $("#state-info").html("*This field is required");
            $("#state").css('background-color', '#FFFFDF');
            valid = false;
        }
        return valid;
    }
</script>
</body>
</html>