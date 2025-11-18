const form = document.querySelector("form"); // pega o formulário da página

form.addEventListener("submit", (e) => { // escuta o envio do form
    const nome = form.nome.value.trim(); // pega o nome sem espaços extras
    const email = form.email.value.trim(); // pega o email sem espaços extras
    const telefone = form.telefone.value.trim(); // pega o telefone sem espaços extras

    // valida nome
    if (nome.length < 3) { // impede nome com menos de 3 letras
        alert("Nome muito curto, pô. Pelo menos 3 letras.");
        e.preventDefault(); // cancela o envio
        return;
    }

    // valida email (se preenchido)
    if (email !== "") { // só valida se tiver algo digitado
        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // padrão básico de email
        if (!regexEmail.test(email)) { // testa se o email é válido
            alert("Email inválido, confere aí.");
            e.preventDefault(); // cancela envio
            return;
        }
    }

    // valida telefone (se preenchido)
    if (telefone !== "") { // só valida se o campo não estiver vazio
        const regexTel = /^[0-9]{8,15}$/; // aceita só números de 8 a 15 dígitos
        if (!regexTel.test(telefone)) { // verifica se bate com o padrão
            alert("Telefone só número, entre 8 e 15 dígitos.");
            e.preventDefault(); // cancela envio
            return;
        }
    }
});
