# OOP Game PHP

A browser based word guessing game using Object Oriented Programming principles 

## Instructions

* [X] Create 3 PHP files to hold the program's logic
  * [X] play.php to handle the HTML, instantiating objects, storing sessions and calling appropriate methods
  * [X] Phrase.php to create a Phrase class to handle the phrases
  * [X] Game.php to create a Game class with methods for showing the game, handling interactions, and checking for game over.
* [X] Create the Phrase class in the Phrase.php file.
  * [X] The class must have at least two properties:
    * [X] $currentPhrase a string.
    * [X] $selected an array. Default to an empty array.
  * [X] The class must include a constructor that accepts two OPTIONAL parameters:
    * [X] $phrase a string, or if empty, get a random phrase
    * [X] $selected an array of selected letters
  * [X] The class must include the following methods:
    * [X] addPhraseToDisplay(): Builds the HTML for the letters of the phrase. Each letter is presented by an empty box, one list item for each letter. See the example_html/phrase.txt file for an example of what the render HTML for a phrase should look like when the game starts. When the player correctly guesses a letter, the empty box is replaced with the matched letter. Use the class "hide" to hide a letter and "show" to show a letter. Make sure the phrase displayed on the screen doesn't include boxes for spaces: see example HTML.
    * [X] checkLetter(): checks to see if a letter matches a letter in the phrase. Accepts a single letter to check against the phrase. Returns true or false.
* [X] Create the Game class in the Game.php file.
  * [X] The class must have at least two properties:
    * [X] $phrase an instance of the Phrase class to use with the game
    * [X] $lives an integer for the number of wrong chances to guess the phrase
  * [X] The class should include a constructor which accepts a Phrase object and sets the property
  * [X] The class must also have these methods:
    * [X] checkForWin(): this method checks to see if the player has selected all of the letters.
    * [X] checkForLose(): this method checks to see if the player has guessed too many wrong letters.
    * [X] gameOver(): this method displays one message if the player wins and another message if they lose. It returns false if the game has not been won or lost.
    * [X] displayKeyboard(): Create a onscreen keyboard form. See the example_html/keyboard.txt file for an example of what the render HTML for the keyboard should look like. If the letter has been selected the button should be disabled. Additionally, the class "correct" or "incorrect" should be added based on the checkLetter() method of the Phrase object. Return a string of HTML for the keyboard form.
    * [X] displayScore(): Display the number of guesses available. See the example_html/scoreboard.txt file for an example of what the render HTML for a scoreboard should look like. Return string HTML of Scoreboard.
* [x] Create the play.php file.
  * [X] This file creates a new instance of the Phrase class which OPTIONALLY accepts the current phrase as a string, and an array of selected letters.
  * [X] This file creates a new instance of the Game class which accepts the created instance of the Phrase class.
  * [x] The constructor should handle storing the phrase string and selected letters in sessions or another storage mechanism.
  * [x] In the body of the page you should play the game. To play the game:
    * [X] Use the gameOver method to check if the game has been won or lost and display appropriate messages.
    * [X] If the game is still in play, display the game items: displayPhrase(), displayKeyboard(), displayScore()
* [X] Reset the Game
  * [X] Add a button to the "game over” screens to restart the game. This will have to reset the selected letters and generate a new random phrase.
  * [X] Double check that your app properly and completely resets for subsequent games. Everything should work correctly and without errors every time a new game starts.
Add good code comments
Check for cross-browser consistency

## Extra credit

* [X] Add keyboard functionality
  * [X] Let players use the computer keyboard to enter guesses. You'll need to use the JavaScript keypress event.
* [x] Making the project your own
  * [x] The general layout should remain the same, but feel free to make the project your own by experimenting with things like color, background color, font, borders, shadows, transitions, animations and/or the exciting CSS filter property.