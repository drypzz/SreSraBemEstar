// cpf's

const input_01 = document.querySelector('#cpf');

input_01.addEventListener('keypress', () => {
    let inputLength = input_01.value.length;

    if (inputLength === 3 || inputLength === 7){
        input_01.value += '.';
    }else if(inputLength === 11){
        input_01.value += '-';
    };
});

const input_02 = document.querySelector('#cpfR');

input_02.addEventListener('keypress', () => {
    let inputLengthR = input_02.value.length;

    if (inputLengthR === 3 || inputLengthR === 7){
        input_02.value += '.';
    }else if(inputLengthR === 11){
        input_02.value += '-';
    };
});

// data de nascimento

const input_03 = document.querySelector('#dateR');

input_03.addEventListener('keypress', () => {
    let inputLengthR = input_03.value.length;

    if (inputLengthR === 2 || inputLengthR === 5){
        input_03.value += '/';
    };
});

const input_04 = document.querySelector('#date');

input_04.addEventListener('keypress', () => {
    let inputLengthR = input_04.value.length;

    if (inputLengthR === 2 || inputLengthR === 5){
        input_04.value += '/';
    };
});

// telefone

const input_05 = document.querySelector('#phoneR');

input_05.addEventListener('keypress', () => {
    let inputLengthR = input_05.value.length;

    if (inputLengthR === 2){
        input_05.value = '('+ (input_05.value.length === 2 ? input_05.value : 0) + ')';
    }else if(inputLengthR === 5){
        input_05.value += ' ';
    }else if(inputLengthR === 10){
        input_05.value += '-';
    };
});

const input_06 = document.querySelector('#phone');

input_06.addEventListener('keypress', () => {
    let inputLengthR = input_06.value.length;

    if (inputLengthR === 2){
        input_06.value = '('+ (input_06.value.length === 2 ? input_06.value : 0) + ')';
    }else if(inputLengthR === 5){
        input_06.value += ' ';
    }else if(inputLengthR === 10){
        input_06.value += '-';
    };
});
