/**
 * Applies a mask to the CNPJ input field.
 * 
 * @event DOMContentLoaded
 * @listens input
 */
 
/**
 * Applies a mask to the telefone fixo (landline phone) input field.
 * 
 * @event DOMContentLoaded
 * @listens input
 */
 
/**
 * Applies a mask to the celular (mobile phone) input field.
 * 
 * @event DOMContentLoaded
 * @listens input
 */
 
/**
 * Applies a mask to the CPF input field.
 * 
 * @event DOMContentLoaded
 * @listens input
 */
// Início da função para aplicar máscara no campo CNPJ
document.addEventListener('DOMContentLoaded', function() {
    var cnpjInput = document.getElementById('cnpj');
    cnpjInput.addEventListener('input', function() {
        var value = cnpjInput.value.replace(/\D/g, '');
        value = value.replace(/^(\d{2})(\d)/, '$1.$2');
        value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
        value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
        value = value.replace(/(\d{4})(\d)/, '$1-$2');
        cnpjInput.value = value;
    });
});
// Fim da função para aplicar máscara no campo CNPJ

// Início da função para aplicar máscara no campo telefone fixo
document.addEventListener('DOMContentLoaded', function() {
    var telefoneFixoInput = document.getElementById('telefone_fixo');
    telefoneFixoInput.addEventListener('input', function() {
        var value = telefoneFixoInput.value.replace(/\D/g, '');
        value = value.replace(/^(\d{2})(\d)/, '($1) $2');
        value = value.replace(/(\d{4})(\d)/, '$1-$2');
        telefoneFixoInput.value = value;
    });
});
// Fim da função para aplicar máscara no campo telefone fixo

// Início da função para aplicar máscara no campo celular
document.addEventListener('DOMContentLoaded', function() {
    var celularInput = document.getElementById('celular');
    celularInput.addEventListener('input', function() {
        var value = celularInput.value.replace(/\D/g, '');
        value = value.replace(/^(\d{2})(\d)/, '($1) $2');
        value = value.replace(/(\d{5})(\d)/, '$1-$2');
        celularInput.value = value;
    });
});
// Fim da função para aplicar máscara no campo celular

document.addEventListener('DOMContentLoaded', function() {
    var cpfInput = document.getElementById('cpf');
    cpfInput.addEventListener('input', function(e) {
        var value = e.target.value.replace(/\D/g, '');
        var formattedValue = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        e.target.value = formattedValue;
    });
});
