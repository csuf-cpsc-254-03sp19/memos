<?php include("../core/management.php"); ?>
<?PHP include 'connect.php'; ?>
<?php

$timestamp = date("m-d-Y H:i:s");

ob_start();

$_POST = str_replace("'","\'",$_POST);

$sql="INSERT INTO memos (code, createdBy, timestamp, title, message)
	VALUES
	('$_SESSION[code]','$_SESSION[id]','$timestamp','$_POST[title]','$_POST[message]')";

if (!mysqli_query($con,$sql))
{
    die('Error: ' . mysqli_error($con));
}

$result = mysqli_query($con,"SELECT email FROM users WHERE code='$_SESSION[code]' AND active='1'");

mysqli_close($con);

$headers  = "From: $_SESSION[agencyname] <no-reply@memo-management.com>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

while($row = mysqli_fetch_array($result)){

    if($row['email'] != ""){
        $message = "<center><h1>$_POST[title]</h1></center>
                    <p>$_POST[message]</p>";

        mail($row['email'], "Memo from $_SESSION[name]", $message, $headers);
    }
}

printf("<script>location.href='../memos.php'</script>");
?>
