<!-- 
    Document Details:

    Course:         DGL-123 - PHP
    Assignment:     Final Project
    Filename:       characters_unit_tests.php
    Author:         Reeve Jarvis
    Student#:       N0189975
    Date:           12/03/2021 

    I have based the following unit tests off of the example given for Lab-10. For each function that takes a single value and returns a boolean, I have supplied tests for both true and false cases. The tests all pass according to their specifications.
 -->
<?php
echo "Loading characters.php<br>";

require 'characters.php';

echo "Running Tests for characters.php<br>";

// Data Availability Test Functions
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


// Tests
// =======================================================================================

// Data Availability Tests:

// Valid JSON files
testIsDataAvailableIsTrue("./characters.json");
testIsDataAvailableIsTrue("./test.json");
// Invalid JSON files
testIsDataAvailableIsFalse("./character.json"); // Spelling error
testIsDataAvailableIsFalse(12345); // Garbage input

echo "Completed Running Tests for newsletter.php<br>";
?>