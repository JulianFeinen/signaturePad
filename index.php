<?php
echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js" integrity="sha512-Hx7mfz/FnwNfy+erC6kvUftuP4gdTf/qNnDjLOcbQuHR9b8xZn2cWZ8GbdgCWZx5VpbxUZ2UzJWBl/vukUJ68A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="signature_form.js" type="text/javascript"></script>
    <link rel="stylesheet" href="style_form.css">
    <title>Unterschrift</title>
</head>
<body>
    <div class="wrapper">
        <canvas></canvas>
    </div>
    <form action="saveimage_form.php" method="POST">
        <input type="button" value="Clear" class="clear">
        <input type="submit" value="Submit">
        <input id="abbild" name="image" type="hidden" hidden>
    </form>
</body>
</html>';
?>