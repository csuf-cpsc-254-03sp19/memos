<?php include("core/officer.php"); ?>
<?php include("core/head.php"); ?>
<?PHP include 'functions/connect.php'; ?>
<?php
function ttruncat($text,$numb) {
    if (strlen($text) > $numb) {
        $text = substr($text, 0, $numb);
        $text = substr($text,0,strrpos($text," "));
        $etc = " ...";
        $text = $text.$etc;
    }
    return $text;
}
?>
<?php
$arr = explode(' ',trim($name));
$firstName = $arr[0];
?>

    <div class="container">
        <div class="grid">
            <h1>Memo Management</h1>
            <div class="span11">
                <div class="row">
                    <center><a class="button large" onclick="newMemo()">New Memo</a></center>
                </div>
                <?php
                $query = "SELECT m.id, m.timestamp, m.title, m.message, u.name FROM memos m JOIN users u ON (m.createdBy = u.id) WHERE m.code='$code' AND m.isDeleted='0' ORDER BY m.id DESC LIMIT 25";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)){
                    echo "
                        <table class='table bordered'>
                            <tbody>
                            <tr style='text-align: center'>
                                <td width='60%'>" . $row['title'] . "</td>
                                <td width='20%'>" . $row['name'] . "</td>
                                <td width='20%'>" . $row['timestamp'] . "</td>
                                <td width='1%' style='cursor: pointer;'><i class='icon-remove' onclick='removeMemo(" . $row['id'] . ");'></i></td>
                            <tr>
                                <td colspan='4'>" . $row['message'] . "</td>
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
<script>
    function newMemo() {
        $.fancybox({
            helpers : {
                overlay : {
                    css : {
                        'background' : 'rgba(36, 36, 36, 0.5)'
                    }
                }
            },
            type: 'ajax',
            href: 'memos-new.php',
            afterClose: function () {
                parent.location.reload(true);
            }
        });
    }

    function removeMemo(id) {
        $.ajax({
            url:'functions/remove-memo.php?id=' + id,
            type:'post',
            success:function(output){
                $.Notify({
                    shadow: true,
                    position: 'top-right',
                    content: "Memo removed."
                });
                parent.$.fancybox.close();
                parent.location.reload(true);
            }
        });
    }
</script>
<?php mysqli_close($con); ?>
