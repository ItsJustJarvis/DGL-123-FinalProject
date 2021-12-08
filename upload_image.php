<!DOCTYPE html>
<html lang="en">

<head>
    <!-- 
        Document Details:

        Course:         DGL-123 - PHP
        Assignment:     Final Project
        Filename:       upload_image.php
        Author:         Reeve Jarvis
        Student#:       N0189975
        Date:           12/08/2021  

        USAGE INSTRUCTIONS:

        1. Create a new database in phpMyAdmin named: rjarvis_simpsons_archive
        2. Import rjarvis_simpsons_archive.sql dump file located in repository
        3. Load webpage: localhost/dgl-123-finalproject-rjarvis
    -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Handler</title>
</head>

<body>
    <?php

    define("FAILED_UPLOAD", "<div><h3>File failed to upload</h3></div>");
    define("INVALID_FILE", "<div><h3>File is not an image.</h3></div>");
    define("DUPLICATE_FILE", "<div><h3>That file already exists.</h3></div>");
    define("FILE_TOO_LARGE", "<div><h3>The file is too large to upload.</h3></div>");
    define("INVALID_FORMAT", "<div><h3>File is not the correct format.</h3></div>");

    function isImage($file)
    {
        $check = getimagesize($file["tmp_name"]);
        return ($check !== false) ? true : false;
    }

    function fileAlreadyExists($file)
    {
        return (file_exists($file)) ? true : false;
    }

    function isFileSizeOk($file)
    {
        return ($file["size"] > 500000) ? false : true;
    }

    function isImageFormatOk($file_type)
    {
        $acceptedFormats = ["jpg", "png", "jpeg", "gif"];
        return (in_array($file_type, $acceptedFormats)) ? true : false;
    }

    function handleImageUpload($upload, $target_image_file, $image_file_type)
    {
        $upload_status = false;
        if (isImage($upload)) {
            if (!fileAlreadyExists($target_image_file)) {
                if (isFileSizeOk($upload)) {
                    if (isImageFormatOk($image_file_type)) {
                        if (move_uploaded_file($upload["tmp_name"], $target_image_file)) {
                            echo "<div><p>The file " . htmlspecialchars(basename($upload["name"])) . " has been uploaded.</p></div>";
                            $upload_status = true;
                        } else {
                            echo FAILED_UPLOAD;
                            die;
                        }
                    } else {
                        echo INVALID_FORMAT;
                        die;
                    }
                } else {
                    echo FILE_TOO_LARGE;
                    die;
                }
            } else {
                echo DUPLICATE_FILE;
                die;
            }
        } else {
            echo INVALID_FILE;
            die;
        }
        return $upload_status;
    }
