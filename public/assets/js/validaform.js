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

  function fieldRules() {
    let createUser = document.querySelector("#createUser");
    let createPassword = document.querySelector("#createPassword");

    const userValue = createUser.value.trim();
    const passwordValue = createPassword.value.trim();

    const passwordRegex = /[A-Z]/; // Expressão regular para verificar se há pelo menos um caractere maiúsculo

    if (userValue.length < 3) {
      return "typeUserInvalide";
    }
    if (passwordValue.length < 3) {
      return "typeInvalide";
    }

    if (!passwordRegex.test(passwordValue)) {
      return "typeInvalide";
    }
    // Se todas as validações passarem, retorna false ou faça outra coisa aqui
    return false;
  }

  function customMessage(typeError) {
    const messages = {
      text: {
        valueMissing: "Por favor, Preencha este Campo",
        typeUserInvalide: "Usuário: Mínimo de 3 caracteres",
      },
      password: {
        valueMissing: "Senha é obrigatório",
        typeInvalide: "Senha: Mínimo 3 caracteres, e um Maiúsculo",
      },
    };

    return messages[field.type][typeError];
  }

  function setCustomMessage(message) {
    const spanError = field.parentNode.querySelector("span.error");

    if (message) {
      spanError.classList.add("active");
      spanError.innerText = message;
    } else {
      spanError.classList.remove("active");
      spanError.innerText = "";
    }
  }

  return function () {
    const verifyError = verifyErrors();
    const fieldRule = fieldRules();

    if (verifyError) {
      const message = customMessage(verifyError);
      setCustomMessage(message);
    } else if (fieldRule) {
      const message = customMessage(fieldRule);
      setCustomMessage(message);
    } else {
      setCustomMessage();
    }
  };
}

function customValidate(event) {
  const field = event.target;
  const validation = validateField(field);
  validation();
}

fields.forEach((field) => {
  field.addEventListener("invalid", (event) => {
    event.preventDefault();
    customValidate(event);
  });
  field.addEventListener("keyup", customValidate);
});

const formCreateUser = document.querySelector("#formCreateUser");
const formLoginUser = document.querySelector("#formLoginUser");

function eventList(form) {
  form.addEventListener("submit", (event) => {
    event.preventDefault();
  });
}

eventList(formCreateUser);
eventList(formLoginUser);
