const elementDate = document.querySelector('#date');

// function's

date = function(){
    return elementDate.innerHTML = new Date().getFullYear();
};

// callback

if(elementDate){
    date();
};