<!DOCTYPE html>
<html lang="en">

<head>
    <!-- 
        Document Details:

        Course:         DGL-123 - PHP
        Assignment:     Final Project
        Filename:       characters.php
        Author:         Reeve Jarvis
        Student#:       N0189975
        Date:           12/03/2021  
    -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Characters</title>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'simpsons_archive') or die("Error " . mysqli_error($conn));

    define("CHAR_DATA", "./characters.json");
    define('DATA_ERROR', "<div><h3>Character Data could not be obtained. Contact administrator.</h3></div>");
    define('INVALID_INPUT', "<div><h3>Invalid input.</h3></div>");

    function isDataAvailable($file)
    {
        if (file_exists($file) && is_readable($file) && is_writable($file)) {
            return true;
        }
        return false;
    }

    function getData($filePath)
    {
        if (is_string($filePath)) {
            $json = file_get_contents($filePath);
            $data = json_decode($json, true);
            return $data;
        } else {
            echo INVALID_INPUT;
        }
    }

    function getFormSubmission()
    {
        $selectedCharacters = $_POST;
        return $selectedCharacters;
    }

    function outputAttributes($character)
    {
        $age = $character["age"] ?? "";
        $occupation = $character["occupation"] ?? "";
        $voice = $character["voiced_by"] ?? "";
        $audio = $character["audio_url"] ?? "";

        if (!empty($age)) {
            echo "<div class='characters__age characters__attribute'>
            <b>Age:</b> $age
            </div>";
        }
        if (!empty($occupation)) {
            echo "<div class='characters__occupation characters__attribute'>
            <b>Occupation:</b> $occupation
            </div>";
        }
        if (!empty($voice)) {
            echo " <div class='characters__voicedBy characters__attribute'>
            <b>Voiced by:</b> $voice
            </div>";
        }
        if (!empty($audio)) {
            echo "<div class='characters__voicedBy characters__attribute'>
                <audio controls class='audio'>
                    <source src='$audio' type='audio/wav'>    
                    Your browser does not support the audio element.
                </audio> 
            </div>";
        }
    }

    function createCard($character)
    {
        $image = $character["image_url"];
        $firstName = $character["first_name"];
        $lastName = $character["last_name"];


        echo "<li class='characters__itemContainer'>
                <div class='characters__item'>
                    <img src='$image' alt='$firstName' class='characters__image'>
                    <div class='characters__info'>
                        <h3 class='characters__name'>$firstName $lastName</h3>";
        outputAttributes($character);
        echo "</div></div></li>";
    }

    if (isDataAvailable(CHAR_DATA)) {
        $characterDetails = getData(CHAR_DATA);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $selectedCharacters = getFormSubmission();
            foreach ($selectedCharacters as $key => $value) {
                if ($value == "on") {
                    createCard($characterDetails[$key]);
                }
            }
        }
    } else {
        echo DATA_ERROR;
    }
    ?>
</body>

</html>