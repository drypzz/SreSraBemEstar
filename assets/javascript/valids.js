// cpf's

const input_01 = document.querySelector('#cpfLogin');

input_01.addEventListener('keypress', (e) => {
    let inputLength = input_01.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        document.querySelector('#span-error-cpflogin').innerHTML = '';
        if (inputLength === 3 || inputLength === 7){
            input_01.value += '.';
        }else if(inputLength === 11){
            input_01.value += '-';
        };
    }else{
        document.querySelector('#span-error-cpflogin').innerHTML = '* Insira penas numeros';
    };
});

const input_02 = document.querySelector('#cpf');

input_02.addEventListener('keypress', (e) => {
    let inputLength = input_02.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        document.querySelector('#span-error-cpf').innerHTML = '';
        if (inputLength === 3 || inputLength === 7){
            input_02.value += '.';
        }else if(inputLength === 11){
            input_02.value += '-';
        };
    }else{
        document.querySelector('#span-error-cpf').innerHTML = '* Insira penas numeros';
    };
});

const input_05 = document.querySelector('#cpfR');

input_05.addEventListener('keypress', (e) => {
    let inputLength = input_05.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        document.querySelector('#span-error-cpfR').innerHTML = '';
        if (inputLength === 3 || inputLength === 7){
            input_05.value += '.';
        }else if(inputLength === 11){
            input_05.value += '-';
        };
    }else{
        document.querySelector('#span-error-cpfR').innerHTML = '* Insira penas numeros';
    };
});

// data de nascimento

const input_03 = document.querySelector('#date');

input_03.addEventListener('keypress', (e) => {
    let inputLength = input_03.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        document.querySelector('#span-error-date').innerHTML = '';
        if (inputLength === 2 || inputLength === 5){
            input_03.value += '-';
        };

    }else{
        document.querySelector('#span-error-date').innerHTML = '* Insira penas numeros';
    };
});

// telefone

const input_04 = document.querySelector('#phone');

input_04.addEventListener('keypress', (e) => {
    let inputLength = input_04.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        document.querySelector('#span-error-phone').innerHTML = '';
        if (inputLength === 2){
            input_04.value = '('+ (input_04.value.length === 2 ? input_04.value : 0) + ')';
        }else if(inputLength === 5){
            input_04.value += ' ';
        }else if(inputLength === 10){
            input_04.value += '-';
        };
    }else{
        document.querySelector('#span-error-phone').innerHTML = '* Insira penas numeros';
    };
});

// admin

document.getElementById('resp').onclick = function(){
    if(document.getElementById('resp').checked){
        document.querySelector('#divCpf').style = 'display: block';
        document.querySelector('#cpfR').setAttribute('required', '');
    }else{
        document.querySelector('#divCpf').style = 'display: none';
        document.querySelector('#cpfR').removeAttribute('required');
    };
};