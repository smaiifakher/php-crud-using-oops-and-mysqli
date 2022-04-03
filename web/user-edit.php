<?php require_once "header.php"; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <h3 class="mb-4 text-center">Update Record</h3>
            <div class="form-body bg-light p-4">
                <form name="frmAdd" method="post" action="" id="frmAdd"
                      onSubmit="return validate();">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="fname" class="form-label">Firstname *</label>
                            <input type="text" class="form-control demoInputBox" id="fname" name="fname"
                                   value="<?php echo $result[0]["fname"]; ?>">
                            <small id="fname-info" class="text-danger"></small>

                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="lname" class="form-label">Lastname*</label>
                            <input type="text" class="form-control demoInputBox" id="lname" name="lname"
                                   value="<?php echo $result[0]["lname"]; ?>">
                            <small id="lname-info" class="text-danger"></small>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="city" class="form-label">City*</label>
                            <input type="text" class="form-control demoInputBox" id="city" name="city"
                                   value="<?php echo $result[0]["city"]; ?>">
                            <small id="city-info" class="text-danger"></small>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <label for="state" class="form-label">State*</label>
                            <input type="text" class="form-control demoInputBox" id="state" name="state"
                                   value="<?php echo $result[0]["state"]; ?>">
                            <small id="state-info" class="text-danger"></small>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" name="add" id="btnSubmit" value="Update"
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

        if (!$("#name").val()) {
            $("#name-info").html("(required)");
            $("#name").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#roll_number").val()) {
            $("#roll-number-info").html("(required)");
            $("#roll_number").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#dob").val()) {
            $("#dob-info").html("(required)");
            $("#dob").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#class").val()) {
            $("#class-info").html("(required)");
            $("#class").css('background-color', '#FFFFDF');
            valid = false;
        }
        return valid;
    }
</script>
</body>
</html>

