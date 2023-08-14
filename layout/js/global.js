var inputs = document.getElementsByTagName("input");
var selects = document.getElementsByTagName("select");
var cards_nums = document.querySelectorAll(".nums .num");


(function () {
  // add astrisk
  add_astrisk(selects);
  add_astrisk(inputs);

  // check if cards of nums not empty
  if (cards_nums != null) {
    cards_nums.forEach((element) => start_count(element));
  }
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

/**
 * start_count function
 * start count from 0 to the target goal
 */
function start_count(el) {
  let goal = el.dataset.goal;
  let count = setInterval(() => {
    // check if goal not equal zero
    if (goal != 0) {
      el.textContent++;
    }
    // condition to check the stop point
    if (el.textContent == goal) {
      clearInterval(count);
    }
  }, 2000 / goal);
}

/**
 * confirm_delete function
 * accepts forward url to go after confirm delete
 */
function confirm_delete(url) {
  // check if user really want to delete
  if (!confirm('هل انت متأكد؟')) return;
  // if want to delete redirect page to target url
  window.location.href = url;
}
