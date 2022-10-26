// error's

const error_cpf_login = document.querySelector('#span-error-cpflogin');
const error_cpf = document.querySelector('#span-error-cpf');
const error_cpfR = document.querySelector('#span-error-cpfR');
const error_date = document.querySelector('#span-error-date');
const error_phone = document.querySelector('#span-error-phone');
const error_cpf_idoso = document.querySelector('#span-error-cpfidoso')

// cpf's

const input_01 = document.querySelector('#cpfLogin');

input_01.addEventListener('keypress', (e) => {
    let inputLength = input_01.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        error_cpf_login.innerHTML = '';
        if (inputLength === 3 || inputLength === 7){
            input_01.value += '.';
        }else if(inputLength === 11){
            input_01.value += '-';
        };
    }else{
        error_cpf_login.innerHTML = '* Insira apenas numeros';
    };
});

const input_02 = document.querySelector('#cpf');

input_02.addEventListener('keypress', (e) => {
    let inputLength = input_02.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        error_cpf.innerHTML = '';
        if (inputLength === 3 || inputLength === 7){
            input_02.value += '.';
        }else if(inputLength === 11){
            input_02.value += '-';
        };
    }else{
        error_cpf.innerHTML = '* Insira apenas numeros';
    };
});

// cpf idoso - agenda

const input_06 = document.querySelector('#cpfidoso');

input_02.addEventListener('keypress', (e) => {
    let inputLength = input_02.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        error_cpf_idoso.innerHTML = '';
        if (inputLength === 3 || inputLength === 7){
            input_02.value += '.';
        }else if(inputLength === 11){
            input_02.value += '-';
        };
    }else{
        error_cpf_idoso.innerHTML = '* Insira penas numeros';
    };
});

const input_05 = document.querySelector('#cpfR');

input_05.addEventListener('keypress', (e) => {
    let inputLength = input_05.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        error_cpfR.innerHTML = '';
        if (inputLength === 3 || inputLength === 7){
            input_05.value += '.';
        }else if(inputLength === 11){
            input_05.value += '-';
        };
    }else{
        error_cpfR.innerHTML = '* Insira apenas numeros';
    };
});

// data de nascimento

const input_03 = document.querySelector('#date');

input_03.addEventListener('keypress', (e) => {
    let inputLength = input_03.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        error_date.innerHTML = '';
        if (inputLength === 2 || inputLength === 5){
            input_03.value += '-';
        };

    }else{
        error_date.innerHTML = '* Insira apenas numeros';
    };
});

// telefone

const input_04 = document.querySelector('#phone');

input_04.addEventListener('keypress', (e) => {
    let inputLength = input_04.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        error_phone.innerHTML = '';
        if (inputLength === 2){
            input_04.value = '('+ (input_04.value.length === 2 ? input_04.value : 0) + ')';
        }else if(inputLength === 5){
            input_04.value += ' ';
        }else if(inputLength === 10){
            input_04.value += '-';
        };
    }else{
        error_phone.innerHTML = '* Insira apenas numeros';
    };
});

// checked

const buttonCheckBox = document.getElementById('resp');
const inputCpfR = document.querySelector('#cpfR');
const divCpfR = document.querySelector('#divCpf');

buttonCheckBox.onclick = function(){
    if(buttonCheckBox.checked){
        divCpfR.classList.add('focus');
        divCpfR.style = 'display: block;';
        inputCpfR.setAttribute('required', '');
    }else{
        divCpfR.classList.remove('focus');
        divCpfR.style = 'display: none;';
        inputCpfR.removeAttribute('required');
    };
};