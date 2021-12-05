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
}
