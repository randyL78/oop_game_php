
window.addEventListener('DOMContentLoaded', () => {
  // listen for keyboard presses
  window.addEventListener('keypress', (e) => {
    let letterCode = e.charCode;
    // if capital letter make lowercase
    if (letterCode >= 65 && letterCode <= 90) {
      letterCode += 32
    }
    // if a letter, redirect back to page
    if (letterCode >= 97 && letterCode <= 122) {
      window.location.assign(`play.php?key=${String.fromCharCode(letterCode)}`)
    }
  });

  // set the focus to the start button if it exists so user can just 
  // hit enter to start the game
  const start = document.getElementById('btn__reset');
  if (start) start.focus();
});


