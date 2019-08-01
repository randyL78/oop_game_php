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
  private $selectedArray = [];  // array of letters in phrase



  // -----------------------------------------------------------
  //        methods
  // -----------------------------------------------------------
  /**
   * Constructor
   * @param String $phrase optional A phrase to use
   * @param array $selected optional Indexed array of letters
   */
  public function __constructor(string $phrase = null, array $selectedArray = null)
  {
    // TODO: Implement Constructor
  }

  /**
   * Adds the selected phrase to the browser
   */
  public function addPhraseToDisplay()
  {
    // TODO: Implement add phrase to display
  }

  /**
   * Checks currently selected letter to see if its in the phrase
   * @param string $letter A single letter
   * @return bool If the letter is in the phrase
   */
  public function checkLetter(string $letter)
  {
    // TODO: Implement checking the letter guessed
  }
}