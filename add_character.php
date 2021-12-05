<?php
require "upload_image.php";

define("INVALID_DATA", "<div><p>That is not a valid entry.</p></div>");
define("SUCCESS", "<div><p>Character successfully uploaded to database. Please refresh the page.</p></div>");
define("FAILURE", "<div><p>Character upload failed.</p></div>");
define("ALREADY_EXISTS", "<div><p>Character already in database.</p></div>");

$conn = mysqli_connect('localhost', 'root', '', 'simpsons_archive') or die("Error " . mysqli_error($conn));

