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

    function getData($file)
    {
        $json = file_get_contents($file);
        $data = json_decode($json, true);
        return $data;
    }

    function getFormSubmission()
    {
        $selectedCharacters = $_POST;
        return $selectedCharacters;
    }

    function createCard($character)
    {
        $image = $character["image_url"] ?? "N/A";
        $firstName = $character["first_name"] ?? "N/A";
        $lastName = $character["last_name"] ?? "N/A";
        $age = $character["age"] ?? "N/A";
        $occupation = $character["occupation"] ?? "N/A";
        $voice = $character["voiced_by"] ?? "N/A";

        echo "<li class='characters__itemContainer'>
                    <div class='characters__item'>
                        <img src='$image' alt='$firstName' class='characters__image'>
                        <div class='characters__info'>
                            <h3 class='characters__name'>$firstName $lastName</h3>
                            <div class='characters__age characters__attribute'>
                                <b>Age:</b> $age
                            </div>
                            <div class='characters__occupation characters__attribute'>
                                <b>Occupation:</b> $occupation
                            </div>
                            <div class='characters__voicedBy characters__attribute'>
                                <b>Voiced by:</b> $voice
                            </div>
                        </div>
                    </div>
                </li>";
    }
    ?>
</body>

</html>