<?php require_once "header.php"; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <h3 class="mb-4 text-center">Update Record</h3>
            <div class="form-body bg-light p-4">
                <form name="frmAdd" method="post" action="" id="frmAdd"
                      onSubmit="return validate();">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="fname" class="form-label">Name *</label>
                            <input type="text" class="form-control demoInputBox" id="name" name="name"
                                   value="<?php echo $result[0]["name"]; ?>">
                            <small id="name-info" class="text-danger"></small>

                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="text" class="form-control demoInputBox" id="email" name="email"
                                   value="<?php echo $result[0]["email"]; ?>">
                            <small id="email-info" class="text-danger"></small>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="roll_number" class="form-label">Roll Number*</label>
                            <input type="text" class="form-control demoInputBox" id="roll_number" name="roll_number"
                                   value="<?php echo $result[0]["roll_number"]; ?>">
                            <small id="roll_number-info" class="text-danger"></small>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <label for="class" class="form-label">Class*</label>
                            <input type="text" class="form-control demoInputBox" id="class" name="class"
                                   value="<?php echo $result[0]["class"]; ?>">
                            <small id="class-info" class="text-danger"></small>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" name="edit" id="btnSubmit" value="Update"
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
            $("#name-info").html("*This field is required");
            $("#name").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#email").val()) {
            $("#email-info").html("*This field is required");
            $("#email").css('background-color', '#FFFFDF');
            valid = false;
        }

        if (!$("#roll_number").val()) {
            $("#roll_number-info").html("*This field is required");
            $("#roll_number").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#class").val()) {
            $("#class-info").html("*This field is required");
            $("#class").css('background-color', '#FFFFDF');
            valid = false;
        }
        return valid;
    }
</script>
</body>
</html>

