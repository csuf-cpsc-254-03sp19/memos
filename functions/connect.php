<?PHP 

$user = "root"; //update database username here
$pass = "password"; //update database password here
$db = ""; //database name

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(session_id() == '') {
    session_start();
}
$con=mysqli_connect("localhost","$user","$password","$db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
  }
?>
