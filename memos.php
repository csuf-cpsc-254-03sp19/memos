<?php include("core/officer.php"); ?>
<?php include("core/head.php"); ?>
<?PHP include 'functions/connect.php'; ?>
    <div class="container">
        <div class="grid">
            <h1>Memos</h1>
            <div class="span11">
            <?php
            $query = "SELECT m.timestamp, m.title, m.message, u.name FROM memos m JOIN users u ON (m.createdBy = u.id) WHERE m.code='$code' AND m.isDeleted='0' ORDER BY m.id DESC LIMIT 25";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($result)){
                echo "
                    <table class='table bordered'>
                        <tbody>
                        <tr style='text-align: center'>
                            <td width='60%'>" . $row['title'] . "</td>
                            <td width='20%'>" . $row['name'] . "</td>
                            <td width='20%'>" . $row['timestamp'] . "</td>
                        <tr>
                            <td colspan='3'>" . $row['message'] . "</td>
                        </tbody>
                    </table>";
            }
            ?>

            <?php
            if(mysqli_num_rows($result) == 0) {
                echo "<h2 class='bg-amber fg-darker' style='text-align: center;'>No memos yet.</h2>";
            }
            ?>
            </div>
        </div>
    </div>
<?php mysqli_close($con); ?>
