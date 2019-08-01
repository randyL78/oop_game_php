<?php
/**
 * Class that runs the game logic of the phrase hunting game
 * @author Randy Layne
 */
class Game
{

  // -----------------------------------------------------------
  //        properties
  // -----------------------------------------------------------
  private $phrase;  // instance of the Phrase class
  private $lives;   // int number of wrong guesses 

  // -----------------------------------------------------------
  //        methods
  // -----------------------------------------------------------
  /**
   * Constructor
   * @param Phrase $phrase sets the current phrase
   */
  public function __constructor(Phrase $phrase, int $lives)
  {
    // TODO: Implement constructor
  }

  /**
   * Checks if a player has won 
   */
  public function checkWin()
  {
    // TODO: Implement check for win
  }

  /**
   * Check if a player lost
   */
  public function checkLose()
  {
    // TODO: Implement check for lose
  }

  /**
   * Displays win or lose overlays if game is over
   * @return bool If the game is over
   */
  public function gameOver()
  {
    // TODO: Implement game over
  }

  /**
   * Displays the onscreen keyboard
   * @return string HTML for keyboard
   */
  public function displayKeyboard()
  {

  }

  /**
   * Display the number of guesses available
   * @return string HTML for scoreboard
   */
  public function displayScore()
  {
    // TODO: Implement displaying of score
  }


}

