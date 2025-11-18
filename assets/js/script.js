    const form = document.querySelector("form");

    form.addEventListener("submit", (e) => {
        const nome = form.nome.value.trim();
        const email = form.email.value.trim();
        const telefone = form.telefone.value.trim();

        // valida nome
        if (nome.length < 3) {
            alert("Nome muito curto, pô. Pelo menos 3 letras.");
            e.preventDefault();
            return;
        }

        // valida email (se preenchido)
        if (email !== "") {
            const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!regexEmail.test(email)) {
                alert("Email inválido, confere aí.");
                e.preventDefault();
                return;
            }
        }

        // valida telefone (se preenchido)
        if (telefone !== "") {
            const regexTel = /^[0-9]{8,15}$/;
            if (!regexTel.test(telefone)) {
                alert("Telefone só número, entre 8 e 15 dígitos.");
                e.preventDefault();
                return;
            }
        }
    });