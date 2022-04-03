<?php require_once "header.php"; ?>
<div class="container mt-5">
    <a href="index.php?action=user-add" id="btnAddAction" class="btn btn-secondary"><i
                class="fas fa-plus-circle"></i> Add User</a>

    <table class="table table-bordered table-striped mt-4">
        <caption>Records of Users</caption>
        <thead>
        <tr>
            <th>SN</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email Address</th>
            <th>City</th>
            <th>State</th>
            <th>Operations</th>
        </tr>

        </thead>
        <tbody>
        <?php
        if (!empty($result)) {
            $count = 1;
            foreach ($result as $k => $v) {
                ?>
                <tr>
                    <td><?= $count++; ?></td>
                    <td class="text-capitalize"><?php echo $result[$k]["fname"]; ?></td>
                    <td class="text-capitalize"><?php echo $result[$k]["lname"]; ?></td>
                    <td><?php echo $result[$k]["email"]; ?></td>
                    <td class="text-uppercase"><?php echo $result[$k]["city"]; ?></td>
                    <td class="text-capitalize"><?php echo $result[$k]["state"]; ?></td>
                    <td><a class="btn btn-primary"
                           href="index.php?action=user-edit&id=<?php echo $result[$k]["id"]; ?>">
                            <i class="far fa-edit"></i>Update
                        </a>
                        <a class=" btn btn-danger"
                           href="index.php?action=user-delete&id=<?php echo $result[$k]["id"]; ?>"
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