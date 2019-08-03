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
  
  const MAX_LIVES = 5;    // the maximum number of wrong guesses
  private $phrase;        // instance of the Phrase class
  private $lives;         // int number of wrong guesses 
  private $keys = [       // array representing keyboard
    'q'=>false,
    'w'=>false,
    'e'=>false,
    'r'=>false,
    't'=>false,
    'y'=>false,
    'u'=>false,
    'i'=>false,
    'o'=>false,
    'p'=>false,
    'a'=>false,
    's'=>false,
    'd'=>false,
    'f'=>false,
    'g'=>false,
    'h'=>false,
    'j'=>false,
    'k'=>false,
    'l'=>false,
    'z'=>false,
    'x'=>false,
    'c'=>false,
    'v'=>false,
    'b'=>false,
    'n'=>false,
    'm'=>false,
  ];

  
  // -----------------------------------------------------------
  //        methods
  // -----------------------------------------------------------
  /**
   * Constructor
   * @param Phrase $phrase sets the current phrase
   */
  public function __construct(Phrase $phrase, int $lives = 0, $selected = null)
  {
    $this->phrase = $phrase;
    $this->lives = $lives;
    $this->setKeys($selected);
  }

  /**
   * Checks if a player has won 
   * @return bool If the player won
   */
  public function checkForWin()
  {
    // get the phrase as an array without spaces
    $phraseArray = str_split(str_replace(' ', '',  $this->phrase->getCurrentPhrase()));

    // remove duplicates from array
    $phraseArray = array_unique($phraseArray);

    // get the correct letters
    $correctLetters = $this->phrase->getSelectedArray();

    // compare the length of the phrase to the correct letters
    if (count($phraseArray) == count($correctLetters)) {
      return true;
    }

    return false;
  }

  /**
   * Check if a player lost
   * @return bool If the player lost
   */
  public function checkForLose()
  {
    return $this->lives >= self::MAX_LIVES;    
  }

  /**
   * Displays win or lose overlays if game is over
   * @return bool If the game is over
   */
  public function gameOver()
  {
    if ($this->checkForWin()) {
      echo '<h1 id="game-over-message">Congratulations on guessing: "' . $this->phrase->getCurrentPhrase() .  '"</h1>';
      return true;
    }

    if ($this->checkForLose()) {
      echo '<h1 id="game-over-message">The phrase was: "' . $this->phrase->getCurrentPhrase() .  '". Better luck next time!</h1>';
      return true;
    }
    return false;
  }

  /**
   * Displays the onscreen keyboard
   * @return string HTML for keyboard
   */
  public function displayKeyboard()
  {
    // track the number of the key being displayed to set rows by
    $counter = 0;  
    $output = '<form action="play.php" method="get" id="qwerty" class="section"><div class="keyrow">';

    // iterate through the keys
    foreach ($this->keys as $key => $value) {
      // break for a new row after 'p' and 'l'
      if ($counter == 10 || $counter == 19) {
        $output .= '</div><div class="keyrow">';
      }
      $output .= '<input type="submit" name="key" value="' . $key . '" class="key ';

      // if the value is true add chosen class and disable button
      if ($value) {
        $output .= 'chosen" disabled />';
      } else {
        $output .= '" />';
      }
      $counter++;
    }
    $output .= '</div></form>';
    return $output;
  }

  /**
   * Display the number of guesses available
   * @return string HTML for scoreboard
   */
  public function displayScore()
  {
    $output = '<div id="scoreboard" class="section"></ol>';
    for ($i = 0; $i < self::MAX_LIVES; $i++) {
      if($i < $this->lives) {
        $output .= '<li class="tries"><img src="images/lostHeart.png" height="35px" widght="30px"></li>';
      } else {
        $output .= '<li class="tries"><img src="images/liveHeart.png" height="35px" widght="30px"></li>';
      }
    }

    $output .= '</ol></div>';

    return $output;
  }

  /**
   * @return int the number of wrong guesses
   */
  public function getLives()
  {
    return $this->lives;
  }

  /**
   * Perform a game turn
   * @param string $letter The currently selected letter
   */
  public function play($letter)
  {
    // if letter has not been previously selected,
    // check the letter. Check is used for the physical keyboard.
    if (!$this->keys[$letter]) {
      if (!$this->phrase->checkLetter($letter)) 
      {
        $this->lives++;
      }
      $this->keys[$letter] = true;
    }
  }

  /**
   * Updates keys based on selected values
   * @param array $selected An array of keys that have been pressed
   */
  protected function setKeys($selected)
  {
    if (empty($selected)) {
      return;
    }

    foreach($selected as $key) {
      $this->keys[$key] = true; 
    }
  }
}

