// assets/js/form-validation.js
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('signo-form');
    const dataInput = document.getElementById('data_nascimento');
  
    form.addEventListener('submit', function (e) {
      if (!dataInput.value) {
        e.preventDefault();
        alert('Por favor, insira sua data de nascimento.');
      }
    });
  });