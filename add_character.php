<?php
require "upload_image.php";

define("INVALID_DATA", "<div><p>That is not a valid entry.</p></div>");
define("SUCCESS", "<div><p>Character successfully uploaded to database. Please refresh the page.</p></div>");
define("FAILURE", "<div><p>Character upload failed.</p></div>");
define("ALREADY_EXISTS", "<div><p>Character already in database.</p></div>");

$conn = mysqli_connect('localhost', 'root', '', 'simpsons_archive') or die("Error " . mysqli_error($conn));

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["upload"])) {

    $first_name = $_POST["first_name"] ?? null;
    $last_name = $_POST["last_name"] ?? null;
    $age = $_POST["age"] ?? null;
    $occupation = $_POST["occupation"] ?? null;
    $voiced_by = $_POST["voiced_by"] ?? null;
    $image_url = null;
    $audio_url = null;

    if (!empty($first_name)) {
        if (!is_string($first_name)) {
            echo "Entered:" . $first_name . INVALID_DATA;
            die;
        }
    }

    if (!empty($last_name)) {
        if (!is_string($last_name)) {
            echo "Entered:" . $last_name . INVALID_DATA;
            die;
        }
    }

    if (!empty($age)) {
        if (!ctype_digit($age)) {
            echo "Entered:" . $age . INVALID_DATA;
            die;
        }
    }

    if (!empty($occupation)) {
        if (!is_string($occupation)) {
            echo "Entered:" . $occupation . INVALID_DATA;
            die;
        }
    }

    if (!empty($voiced_by)) {
        if (!is_string($voiced_by)) {
            echo "Entered:" . $voiced_by . INVALID_DATA;
            die;
        }
    }


    if (!isCharacterAlreadyStored($conn, $first_name, $last_name)) {

        if (!empty($_FILES["image_upload"])) {
            $target_dir = "./images/";
            $upload = $_FILES["image_upload"];
            $target_image_file = $target_dir . basename($upload["name"]);
            $image_file_type = strtolower(pathinfo($target_image_file, PATHINFO_EXTENSION));

            $image_url = $target_image_file;
            handleImageUpload($upload, $target_image_file, $image_file_type);
        }

        $sql = "INSERT into characters (first_name, last_name, age, occupation, voiced_by, image_url, audio_url) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param('ssissss', $first_name, $last_name, $age, $occupation, $voiced_by, $image_url, $audio_url);
        $statement->execute();

        if (mysqli_affected_rows($conn) == 1) {
            echo SUCCESS;
        } else {
            echo FAILURE;
        }
    } else {
        echo ALREADY_EXISTS;
    }
}

function isCharacterAlreadyStored($db, $first_name, $last_name)
{
    $sql = "SELECT * FROM characters WHERE first_name = ? AND last_name = ?";
    $statement = $db->prepare($sql);
    $statement->bind_param('ss', $first_name, $last_name);
    $statement->execute();

    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
