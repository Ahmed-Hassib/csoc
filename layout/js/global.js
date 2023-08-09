var inputs = document.getElementsByTagName("input");
var selects = document.getElementsByTagName("select");

(function () {
  // add astrisk
  add_astrisk(selects);
  add_astrisk(inputs);
})()


/**
 * add_astrisk function
 * this function is used to add astrisk mark on required inputs
 */
function add_astrisk(inputs) {
  // loop on inputs
  for (const input of inputs) {
    // add astrisk on required field
    if (input.hasAttribute("required") && !input.hasAttribute("data-no-astrisk")) {
      // create span
      let astrisk = document.createElement("span");
      // add some classes
      astrisk.classList.add("text-danger", "astrisk");
      // check system language
      if (localStorage['systemLang'] == 'ar') {
        // add some classes
        astrisk.classList.add("astrisk-left");
      } else if (localStorage['systemLang'] == 'en') {
        // add some classes
        astrisk.classList.add("astrisk-right");
      } else {
        // add some classes
        astrisk.classList.add("astrisk-left");
      }
      astrisk.textContent = "*";
      // append astrisk
      input.parentElement.appendChild(astrisk);
    }
  }
}

/**
 * show_pass function
 * used to show/hide the password
 */
function show_pass(btn) {
  if (btn.classList.contains("bi-eye-slash")) {
    btn.classList.replace("bi-eye-slash", "bi-eye");
    btn.previousElementSibling.setAttribute("type", "text");
  } else {
    btn.classList.replace("bi-eye", "bi-eye-slash");
    btn.previousElementSibling.setAttribute("type", "password");
  }
}

