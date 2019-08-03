<?php
/**
 * Class designed to handle functionlality specific to the phrase
 * in the game show app
 * @author Randy Layne
 */
class Phrase 
{
  // -----------------------------------------------------------
  //        properties
  // -----------------------------------------------------------
  private $currentPhrase;       // string to hold phrase
  private $selectedArray = [];  // array of selected letters in phrase
  private $currentLetter = null;// store the current selected letter



  // -----------------------------------------------------------
  //        methods
  // -----------------------------------------------------------
  /**
   * Constructor
   * @param String $phrase optional A phrase to use
   * @param array $selected optional Indexed array of letters
   */
  public function __construct(string $phrase = null, array $selectedArray = null)
  {
    if (empty($phrase)) {
      $this->currentPhrase = $this->getRandomPhrase();
    } else {
      $this->currentPhrase = $phrase;
    }

    if (!empty($selectedArray)) {
      $this->selectedArray = $selectedArray;
    }
  }

  /**
   * Adds the selected phrase to the browser
   */
  public function addPhraseToDisplay()
  {
    echo '<div id="phrase" class="section"><ul>';
    // iterate over each character in phrase and display
    foreach (str_split($this->currentPhrase) as $char) {
      if ($char == ' ') {
        echo '<li class="hide space"> </li>';
      } else {
        echo '<li class="';  
        // check if the selected letter is also the current letter
        // if so, add a transition class
        if (!empty($this->currentLetter) && $char == $this->currentLetter) {
          echo 'trans ';
        }

        // check if the current letter has been selected, if so show it
        if (!empty($this->selectedArray) && in_array($char, $this->selectedArray)) {
          echo 'show';
        } else {
          echo 'hide';
        }

        echo ' letter">' . $char .  '</li>';
      }
    }
    echo '</ul></div>';
  }

  /**
   * Checks currently selected letter to see if its in the phrase
   * @param string $letter A single letter
   * @return bool If the letter is in the phrase
   */
  public function checkLetter(string $letter)
  {
    // add letter to selected array if not already there
    if ((empty($this->selectedArray) || !in_array($letter, $this->selectedArray)) && strpos($this->currentPhrase, $letter) !== false)  {
      $this->selectedArray[] = $letter;
      // * for use with adding a show transition
      $this->currentLetter = $letter;
      return true;
    }
    return false;
  }

  /**
   * @return array the current phrase
   */
  public function getSelectedArray()
  {
    return $this->selectedArray;
  }

  /**
   * @return string the current selected letters in phrase
   */
  public function getCurrentPhrase()
  {
    return $this->currentPhrase;
  }

  /**
   * Gets a random phrase from a json file
   * @return string A random phrase
   */
  protected function getRandomPhrase()
  {
    try {
      $data = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] 
        . '/inc/phrases.json'));

      // get a random phrase from the array, use the array length as upper bound
      return $data->phrases[mt_rand(0, count($data->phrases) - 1)];
    } catch (Exception $ex) {
      $ex->getMessage();
      die();
    }
  }
}