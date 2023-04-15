const fields = document.querySelectorAll("[required]");

function validateField(field) {
  function verifyErrors() {
    let foundError = false;
    for (let erroKey in field.validity) {
      if (field.validity[erroKey] && !field.validity.valid) {
        foundError = erroKey;
      }
    }
    return foundError;
  }

  return verifyErrors();
}

function customValidate(event) {
  const field = event.target;
  let error = validateField(field);

  const spanError = field.parentNode.querySelector("span.error");

  if (error) {
    spanError.classList.add("active");
    spanError.innerText = "Campo Obrigatório";
  } else {
    spanError.classList.remove("active");
    spanError.innerText = "";
  }
}

fields.forEach((field) => {
  field.addEventListener("invalid", (event) => {
    event.preventDefault();
    customValidate(event);
  });
  field.addEventListener("keyup", customValidate);
});

const createUser = document.querySelector("#CreateUser");
const loginUser = document.querySelector("#LoginUser");

function eventList(form) {
  form.addEventListener("submit", (event) => {
    console.log("pode envia o forms.");
    event.preventDefault();
  });
}

eventList(createUser);
eventList(loginUser);
