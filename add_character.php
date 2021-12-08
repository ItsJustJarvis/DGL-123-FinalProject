<!DOCTYPE html>
<html lang="en">

<head>
    <!-- 
        Document Details:

        Course:         DGL-123 - PHP
        Assignment:     Final Project
        Filename:       index.php
        Author:         Reeve Jarvis
        Student#:       N0189975
        Date:           12/03/2021  
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Character</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <header id="masthead" class="site-header layout-container">
        <a href="index.php">
            <img class="site-header__logo" src="images/logo.svg" alt="Logo" />
        </a>
    </header>
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <div id="main" class="site-main">
                <div class="form__container layout-container">
                    <div class="form__row layout-row">
                        <div class="form__itemsContainer">
                            <div class="form__imageContainer">
                                <img src="images/simpsons.jpg" alt="Simpsons" class="form__image" />
                            </div>
                            <div class="form__card">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <h3 class="form__heading">Enter Character details. Must have name and a picture.</h3>
                                    <ul class="form__items">
                                        <li class="form__item">
                                            <label for="first_name">First Name * </label>
                                            <input id="first_name" type="text" name="first_name" required />
                                        </li>
                                        <li class="form__item">
                                            <label for="last_name">Last Name * </label>
                                            <input id="last_name" type="text" name="last_name" required />
                                        </li>
                                        <li class="form__item">
                                            <label for="age">Age</label>
                                            <input id="age" type="number" name="age" />
                                        </li>
                                        <li class="form__item">
                                            <label for="occupation">Occupation</label>
                                            <input id="occupation" type="text" name="occupation" />
                                        </li>
                                        <li class="form__item">
                                            <label for="voiced_by">Voiced By</label>
                                            <input id="voiced_by" type="text" name="voiced_by" />
                                        </li>
                                        <li class="form__item">
                                            <label for="image_upload">Image * </label>
                                            <input type="file" name="image_upload" id="image_upload" required>
                                        </li>
                                    </ul>
                                    <input class="form__button" type="submit" value="Add Character" name="upload" />
                                    <?php require "add_character_handler.php" ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>