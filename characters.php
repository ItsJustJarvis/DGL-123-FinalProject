<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Characters</title>
</head>

<body>
    <?php

    define("CHAR_DATA", "./characters.json");
    define('ERROR_MESSAGE', "<div><h3>Character Data could not be obtained. Contact administrator.</h3></div>");

    function isDataAvailable($file)
    {
        if (file_exists($file) && is_readable($file)) {
            return true;
        }
        return false;
    }
    ?>
</body>

</html>