<?php
$signatureurl = "./signature_imgs/";
$dataname = "unterschrift_";
$datatype =".png";
$image = $_POST["image"];
$image = str_replace('data:image/png;base64,', '', $image);
$image = str_replace(' ', '+', $image);
$data = base64_decode($image);

$filecount = count(glob("$signatureurl"."*$datatype"));

$file = $signatureurl.$dataname.$filecount.$datatype;
file_put_contents($file, $data);

$server = "localhost";
$username = "root";
$password = "";
$dbname = "julianprojekte";
$conn = mysqli_connect($server,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO unterschriften_speichern (dateiname, pfad, unterschrift_erstellt)
VALUES ('".$dataname.$filecount.$datatype."', '$signatureurl
$dataname$filecount$datatype', NOW())";

define('TEST_CONST', 'Hallo');
if ($conn->query($sql) === true) {
    echo "success ".TEST_CONST;
}
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
?>