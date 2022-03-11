<?php
$signatureurl = './signature_imgs/';
$timestamp = str_replace(":","-",date('YmdH:i:s'));
$timestamp = substr($timestamp, 0, 4) . "-" . substr($timestamp, 4);
$timestamp = substr($timestamp, 0, 7) . "-" . substr($timestamp, 7);
$timestamp = substr($timestamp, 0, 10) . "-" . substr($timestamp, 10);//seperiert mit "-" das datum im string
$dataname = $timestamp."unterschrift_";//fügt datum zum dateinamen an
$datatype =".png";
$image = $_POST["image"];
if($image=="")//checks if the user has not drawn anything
{
    header("Location: ./index.php");
    echo "bla";
    die();
}
$image = str_replace('data:image/png;base64,', '', $image);
$image = str_replace(' ', '+', $image);
$data = base64_decode($image);

$filecount = count(glob("$signatureurl"."*$datatype"));//um jedesmal die anzahl der bereits erstellten .png in den namen zu binden

$file = $signatureurl.$dataname.$filecount.$datatype;
file_put_contents($file, $data);
$server = "localhost";
$username = "root";
$password = "";
$dbname = "julianprojekte";
$conn = mysqli_connect($server,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection to the database failed: ");
}

$sql = "INSERT INTO unterschriften_speichern (dateiname, pfad, unterschrift_erstellt)
VALUES ('".$dataname.$filecount.$datatype."', '$signatureurl
$dataname$filecount$datatype', NOW())";

if ($conn->query($sql) === true) {
    echo '<center><img src="'.$_POST['image'].'" alt="img" style="border: 2px solid black;width:400px;height:400px;"></center>';//resultat image
}
else
{
    echo "Error: Could not update the database";
}
mysqli_close($conn);
?>