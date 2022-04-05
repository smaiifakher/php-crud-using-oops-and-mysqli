<?php require_once "header.php"; ?>
<div class="container mt-5">
    <a href="index.php?action=student-add" id="btnAddAction" class="btn btn-secondary"><i
                class="fas fa-plus-circle"></i> Add Student</a>

    <table class="table table-bordered table-striped mt-4">
        <caption>Records of Students</caption>
        <thead>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Roll Number</th>
            <th>Email Address</th>
            <th>Class</th>
            <th>Operations</th>
        </tr>

        </thead>
        <tbody>
        <?php
        if (!empty($result)) {
            foreach ($result as $k => $v) {
                ?>
                <tr>
                    <td><?= $result[$k]["id"]; ?></td>
                    <td class="text-capitalize"><?php echo $result[$k]["name"]; ?></td>
                    <td class="text-capitalize"><?php echo $result[$k]["roll_number"]; ?></td>
                    <td><?php echo $result[$k]["email"]; ?></td>
                    <td class="text-uppercase"><?php echo $result[$k]["class"]; ?></td>
                    <td><a class="btn btn-primary"
                           href="index.php?action=student-edit&id=<?php echo $result[$k]["id"]; ?>">
                            <i class="far fa-edit"></i>Update
                        </a>
                        <a class=" btn btn-danger"
                           href="index.php?action=student-delete&id=<?php echo $result[$k]["id"]; ?>"
                           onclick="return checkDelete();">
                            <i class="far fa-trash-alt"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        <tbody>
    </table>
</div>
<script>
    function checkDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>
</body>
</html>