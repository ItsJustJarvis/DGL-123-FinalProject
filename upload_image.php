<!DOCTYPE html>
<html lang="en">

<head>
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

