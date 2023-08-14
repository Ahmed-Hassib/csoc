// function to add a new specialization
function add_new_spec(btn, id) {
  // select form content
  let form_content = document.querySelector(`#${id}`);
  // get elements
  let elements = document.querySelectorAll(`#${id} .section-content`);
  // check number of elements
  let clone = elements[0].cloneNode(true);
  // create delete button
  let delete_btn = create_delete_btn();
  // add evenet to delete specialization
  delete_btn.addEventListener('click', (evt) => {
    evt.preventDefault();
    if (!confirm("هل انت متأكد؟")) return;
    delete_spec(clone);
  })
  // append delete button to clone
  clone.lastElementChild.appendChild(delete_btn)
  // appen new spec fields to form
  form_content.appendChild(clone)
}

// function to create delete button
function create_delete_btn() {
  // create button icon
  let btn_icon = document.createElement('i');
  // add icon classes
  btn_icon.classList.add('bi', 'bi-trash');
  // create a button element
  let delete_btn = document.createElement('button');
  // add some style to it
  delete_btn.classList.add('btn', 'btn-danger');
  // append icon to button
  delete_btn.appendChild(btn_icon)
  // return delet button
  return delete_btn;
}

// function to remove unused specialization
function delete_spec(spec) {
  spec.remove();
}