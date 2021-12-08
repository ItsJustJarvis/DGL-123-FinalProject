<!-- 
    Document Details:

    Course:         DGL-123 - PHP
    Assignment:     Final Project
    Filename:       characters_unit_tests.php
    Author:         Reeve Jarvis
    Student#:       N0189975
    Date:           12/03/2021 

    I have based the following unit tests off of the example given for Lab-10. For each function that takes a single value and returns a boolean, I have supplied tests for both true and false cases.
 -->
<?php
echo "Loading characters.php<br> upload_image.php<br> add_character_handler.php<br><br>";

require 'characters.php';
require 'upload_image.php';

// characters.php Test Functions
// =======================================================================================


function testIsDataAvailable($test_input, $expectedResult)
{
    if (isDataAvailable($test_input) === $expectedResult) {
        echo "Test PASSED with input \"$test_input\"<br>";
    } else {
        echo "FAILED test with input \"$test_input\"<br>";
    }
}

function testIsDataAvailableIsTrue($test_input)
{
    testIsDataAvailable($test_input, true);
}

function testIsDataAvailableIsFalse($test_input)
{
    testIsDataAvailable($test_input, false);
}

// upload_image.php Test Functions
// =======================================================================================



function testIsImage($test_input, $expectedResult)
{
    if (isImage($test_input) === $expectedResult) {
        echo "Test PASSED with input \"$test_input\"<br>";
    } else {
        echo "FAILED test with input \"$test_input\"<br>";
    }
}

function testIsImageIsTrue($test_input)
{
    testIsImage($test_input, true);
}

function testIsImageIsFalse($test_input)
{
    testIsImage($test_input, false);
}


function testFileAlreadyExists($test_input, $expectedResult)
{
    if (fileAlreadyExists($test_input) === $expectedResult) {
        echo "Test PASSED with input \"$test_input\"<br>";
    } else {
        echo "FAILED test with input \"$test_input\"<br>";
    }
}

function testFileAlreadyExistsIsTrue($test_input)
{
    testFileAlreadyExists($test_input, true);
}

function testFileAlreadyExistsIsFalse($test_input)
{
    testFileAlreadyExists($test_input, false);
}

function testIsFileSizeOk($test_input, $expectedResult)
{
    if (isFileSizeOk($test_input) === $expectedResult) {
        echo "Test PASSED with input \"$test_input\"<br>";
    } else {
        echo "FAILED test with input \"$test_input\"<br>";
    }
}

function testIsFileSizeOkIsTrue($test_input)
{
    testIsFileSizeOk($test_input, true);
}

function testIsFileSizeOkIsFalse($test_input)
{
    testIsFileSizeOk($test_input, false);
}

function testIsImageFormatOk($test_input, $expectedResult)
{
    if (isImageFormatOk($test_input) === $expectedResult) {
        echo "Test PASSED with input \"$test_input\"<br>";
    } else {
        echo "FAILED test with input \"$test_input\"<br>";
    }
}

function testIsImageFormatOkIsTrue($test_input)
{
    testIsImageFormatOk($test_input, true);
}

function testIsImageFormatOkIsFalse($test_input)
{
    testIsImageFormatOk($test_input, false);
}


// Tests
// =======================================================================================

// characters.php Tests:

echo "Running Tests for: characters.php<br><br>";

// Valid JSON files
testIsDataAvailableIsTrue("./characters.json");
testIsDataAvailableIsTrue("./test.json");
// Invalid JSON files
testIsDataAvailableIsFalse("./character.json"); // Spelling error
testIsDataAvailableIsFalse(12345); // Garbage input

echo "Completed Running Tests for characters.php<br><br>";


// upload_image.php Tests:

// I wasnt able to figure out the unit testing for these functions that involved file uploads. I wanted to show my work so you could see that I tried. 

// echo "Running Tests for: upload_image.php<br><br>";

// echo "<form method='post' action=''><label for='image_upload'>Image * </label>
//         <input type='file' name='image_upload' id='image_upload' required>
//         <input class='form__button' type='submit' value='Upload' name='upload' />
//         </form>";

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["upload"])) {

//     if (!empty($_FILES["image_upload"])) {
//         $target_dir = "./testImages/";
//         $upload = $_FILES["image_upload"];
//         $target_image_file = $target_dir . basename($upload["name"]);
//         $image_file_type = strtolower(pathinfo($target_image_file, PATHINFO_EXTENSION));
//     } else {
//         echo "No upload";
//     }

//     // Valid
//     testIsImageIsTrue($upload);
//     // Invalid
//     testIsImageIsFalse($upload);

//     // Valid
//     testFileAlreadyExistsIsTrue($target_image_file);
//     //Invalid
//     testFileAlreadyExistsIsFalse($target_image_file);

//     // Valid
//     testIsFileSizeOkIsTrue($upload);
//     //Invalid
//     testIsFileSizeOkIsFalse($upload);

//     // Valid
//     testIsImageFormatOkIsTrue($image_file_type);
//     //Invalid
//     testIsImageFormatOkIsFalse($image_file_type);

//     echo "Completed Running Tests for upload_image.php<br>";
// }





?>