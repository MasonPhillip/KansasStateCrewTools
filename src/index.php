<?php
// If the request is made from our space preview functionality then turn on PHP error reporting
if (isset($_SERVER['HTTP_X_FORWARDED_URL']) && strpos($_SERVER['HTTP_X_FORWARDED_URL'], '.w3spaces-preview.com/') !== false) {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}
?>

<html>
<head>
<title>PHP blank template</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php 
  echo '<h1>My awesome space</h1>'; 
?>

<?php
$servername = "localhost";


try {
  $conn = new PDO("sqlite:host=$servername;dbname=test");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//discord posting
$msg = ["content" => "login failed"];
$discordURL = 'https://discord.com/api/webhooks/1173034151683837962/Z0IBBo381LVHnhtggorbBjOOnOisbSvVX3_TRFP95fA0RTjeAQEyXKDtoZ9tT7ZnFaeE';


$headers = array('Content-Type: application/json');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $discordURL);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode( $msg ) );
$responses = curl_exec($ch);
curl_close($ch);
?>


</body>
</html>
