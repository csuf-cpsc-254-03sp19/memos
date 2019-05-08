<?php include("core/management.php"); ?>

<form id="memoForm" method="post">
    <p>Title</p>
    <div class="input-control text">
        <input type="text" name="title" />
    </div>
    <p>Message</p>
    <div class="input-control textarea">
        <textarea name="message" cols="50"></textarea>
    </div>
    <center><a class="button large" onclick="submitMemo();" id="saveBtn">Send</a></center>
</form>

<script>
    function submitMemo(){
        $("#saveBtn").addClass("disabled");
        $("#saveBtn").html("Sending...");
        try {
            $.ajax({
                url:'functions/new-memo.php',
                type:'post',
                data:$('#memoForm').serialize(),
                success:function(output){
                    $.Notify({
                        shadow: true,
                        position: 'top-right',
                        content: "Memo sent."
                    });
                    parent.$.fancybox.close();
                }
            });
        } catch(err) {
            $("#saveBtn").removeClass("disabled");
            $("#saveBtn").html("Save");
            alert("Error sending memo. Please try again.");
        }
    }
</script>