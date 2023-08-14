/**
 * form_validation function
 * is used to check the required fields in form
 */
function form_validation(form = null, btn = null) {
  // error array
  let errorArray = Array();

  if (form != null) {
    // get all required inputs in the form
    var inputs = document.querySelectorAll(`#${form.getAttribute('id')} input`);
    // get all required select in the form
    var selects = document.querySelectorAll(`#${form.getAttribute('id')} select`);

    console.log(inputs)
    console.log(selects)
  } else {
    // get all required inputs in the form
    var inputs = document.querySelectorAll("input");
    // get all required select in the form
    var selects = document.querySelectorAll("select");
  }

  // loop on inputs
  inputs.forEach(input => {
    // check the required
    if (input.hasAttribute('required')) {
      // get input type
      let type = input.getAttribute('type');
      // check if type of input is text
      switch (type) {
        case 'text': case 'password': case 'date':
          // check if empty
          if (input.value.length == 0 || input.dataset.valid == "false") {
            errorArray.push(input);
          } else {
            input_validation(input);
          }
          break;
      }
    }
  })

  // loop on selects
  selects.forEach(select => {
    // check the required
    if (select.hasAttribute('required')) {
      // check if user not select anything
      if (select.selectedIndex == 0 || select.dataset.valid == "false") {
        errorArray.push(select);
      } else {
        input_validation(select);
      }
    }
  })

  // check array of the error
  if (errorArray.length > 0) {
    // loop on inputs to validate it
    errorArray.forEach(el => {
      if ((el.hasAttribute('onkeyup') && el.value.length == 0) || el.dataset.valid != "true") {
        input_validation(el);
      } else if (el.hasAttribute('onkeyup') && el.value.length > 0) {
        el.focus();
        el.blur();
      }
    })

    form.dataset.valid = false
    // scroll on the top of the page
    document.body.scrollTo(0, 0);
  } else {
    form.dataset.valid = true
    // no error => check if the form is null
    // if not null submit it
    if (btn != null && form != null && form.dataset.valid == "true") {
      form.submit();
    }
  }
}


/**
 * input_validation function
 * is used to check the specific required input in form
 */
function input_validation(input) {

  if ((input.tagName.toLowerCase() == 'input' && input.value.length == 0) || (input.tagName.toLowerCase() == 'select' && input.selectedIndex == 0)) {
    // check if have an valid class
    input.classList.contains('is-valid') ? input.classList.replace('is-valid', 'is-invalid') : input.classList.add('is-invalid');
    input.classList.add('is-invalid-left');
    input.dataset.valid = "false";
  } else {
    input.classList.contains('is-invalid') ? input.classList.replace('is-invalid', 'is-valid') : input.classList.add('is-valid');
    input.classList.add('is-valid-left')
    input.dataset.valid = "true";
  }
}

function create_alert(type, message) {
  // create alert container
  let alert_container = document.createElement('div');
  // add alert classes
  alert_container.classList.add('alert', (type == 'warn' ? 'alert-warning' : 'alert-success'), 'mt-1');
  // add alert role
  alert_container.role = 'alert';
  // create a text node
  let alert_text_node = document.createTextNode(message)
  // append text node to alert container
  alert_container.appendChild(alert_text_node);
  // create a dismiss button
  let dismiss_btn = document.createElement('button');
  // add button attribute
  dismiss_btn.type = 'button';
  dismiss_btn.classList.add('btn-close');
  dismiss_btn.dataset.bsDismiss = 'alert';
  dismiss_btn.ariaLabel = 'Close';
  dismiss_btn.style.position = 'absolute';
  dismiss_btn.style.left = '10px';
  // append dismiss button to alert container
  alert_container.appendChild(dismiss_btn);
  // return alert
  return alert_container;
}

function delete_alerts(container) {
  let alerts = document.querySelectorAll('div.alert')

  if (alerts != null) {
    alerts.forEach((alert) => {
      if (container.contains(alert)) {
        alert.remove()
      }
    })
  }
}