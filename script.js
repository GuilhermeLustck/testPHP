const form = document.getElementById('form-back');
const campos = document.querySelectorAll('.required');
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const formulario = document.querySelector('form-back');

formulario.addEventListener('submit', function (e) {
  const cpf = document.querySelector('cpf').value; // Substitua '#cpf' pelo ID do seu campo de CPF

  if (!validarCPF(cpf)) {
    e.preventDefault(); // Impede o envio do formulário se o CPF for inválido
    alert('Por favor, insira um CPF válido.');
  }
});

// const formulario = document.querySelector('form');

formulario.addEventListener('submit', function (e) {
  const telefone = document.querySelector('#telefone').value; // Substitua '#telefone' pelo ID do seu campo de telefone

  if (!validarTelefone(telefone)) {
    e.preventDefault(); // Impede o envio do formulário se o telefone for inválido
    alert('Por favor, insira um número de telefone válido.');
  }
});

function validarNome(nome) {
    // Verificar se o campo está vazio
    if (nome.trim() === '') {
      return false; // Campo vazio
    }
  
    // Verificar se o campo contém apenas letras e espaços
    const regex = /^[a-zA-Z\s]+$/;
    return regex.test(nome);
  }

  
  function validarCPF(cpf) {
    // Remover caracteres não numéricos
    cpf = cpf.replace(/\D/g, '');
  
    // Verificar se o CPF tem 11 dígitos
    if (cpf.length !== 11) {
      return false;
    }
  
    // Verificar CPFs com todos os dígitos iguais
    if (/^(\d)\1{10}$/.test(cpf)) {
      return false;
    }
  
    // Calcular o primeiro dígito verificador
    let soma = 0;
    for (let i = 0; i < 9; i++) {
      soma += parseInt(cpf.charAt(i)) * (10 - i);
    }
    let resto = 11 - (soma % 11);
    const primeiroDigito = (resto === 10 || resto === 11) ? 0 : resto;
  
    // Verificar o primeiro dígito verificador
    if (primeiroDigito !== parseInt(cpf.charAt(9))) {
      return false;
    }
  
    // Calcular o segundo dígito verificador
    soma = 0;
    for (let i = 0; i < 10; i++) {
      soma += parseInt(cpf.charAt(i)) * (11 - i);
    }
    resto = 11 - (soma % 11);
    const segundoDigito = (resto === 10 || resto === 11) ? 0 : resto;
  
    // Verificar o segundo dígito verificador
    if (segundoDigito !== parseInt(cpf.charAt(10))) {
      return false;
    }
  
    // Se passar por todas as verificações, o CPF é válido
    return true;
  }
  

  function validarTelefone(telefone) {
    // Remover caracteres não numéricos
    telefone = telefone.replace(/\D/g, '');
  
    // Verificar se o telefone tem 11 dígitos
    if (telefone.length !== 11) {
      return false;
    }
  
    // Verificar se os dois primeiros dígitos representam um DDD válido (11 a 99)
    const ddd = parseInt(telefone.substring(0, 2));
    if (ddd < 11 || ddd > 99) {
      return false;
    }
  
    // Se passar por todas as verificações, o telefone é considerado válido
    return true;
  }
