<?php
    // require the class autoloader file
    require_once 'inc/config.php';

    // start a browser session
    session_start();

    $selectedKeys = [];     // array to contain selected keys
    $correctKeys = [];      // array to contain correct keys
    $currentPhrase = null;  // the current phrase as a string
    $currentKey;            // currently pressed or clicked key
    $lives = 0;             // the number of previous wrong guesses


    // set the local variables to the corresponding session variables
    if (isset($_GET['key'])) {
        $currentKey = filter_input(INPUT_GET, 'key', FILTER_SANITIZE_STRING);
    } 

    if (isset($_GET['reset'])) {
        session_destroy();
        header('Location: play.php');
    } 
    
    if (isset($_SESSION['phrase'])) {
        $currentPhrase = filter_var($_SESSION['phrase']);
    }

    if (isset($_SESSION['selectedKeys'])) {
        $selectedKeys = $_SESSION['selectedKeys'];
    }

    if (isset($_SESSION['lives'])) {
        $lives = filter_var($_SESSION['lives']);
    }

    if (isset($_SESSION['correctKeys'])) {
        $correctKeys = $_SESSION['correctKeys'];
    }

    // initialize a new Phrase object
    $phrase = new Phrase($currentPhrase, $correctKeys);
    // store the phrase in a session variable so that it can be
    // used to create a new instance when a letter is guessed
    $_SESSION['phrase'] = $phrase->getCurrentPhrase();

    // initialize a new game
    $game = new Game($phrase, $lives, $selectedKeys);
    
    // play a turn if a key was selected
    if (!empty($currentKey)) {
        $game->play($currentKey);
        $selectedKeys[] = $currentKey;
        $_SESSION['selectedKeys'] = $selectedKeys;
        $_SESSION['lives'] = $game->getLives();
        $_SESSION['correctKeys'] = $phrase->getSelectedArray();
    }

    if ($game->checkForWin()) {
        $background = "win";
    }  elseif($game->checkForLose()) {
        $background = "lose";
    }

	include 'inc/header.php';

    if ($game->gameOver()) {
        // if the game is over, add a reset button
		echo '<form action="play.php">';
		echo '<input type="hidden" name="reset" value="true" />';
		echo '<input id="btn__reset" type="submit" value="Start Game" />';
		echo '</form>';

    } else {
        // otherwise display the phrase, keyboard, and score
        $phrase->addPhraseToDisplay();
        echo $game->displayKeyboard();
        echo $game->displayScore();
    }

// JavaScript for keyboard events
echo '<script src="js/keyboard.js"></script>';

include 'inc/footer.php';

?>