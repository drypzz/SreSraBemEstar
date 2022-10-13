const btn_max = document.querySelector('#btn-max');
const btn_min = document.querySelector('#btn-min');


let settings_p = document.querySelector('.about .about-container .about-content p');
let count = 16;

btn_max.addEventListener('click', () => {
    count += 10;
    
    settings_p.style = 'font-size: '+ (count) +'px';

    console.log((count));
});

btn_min.addEventListener('click', () => {

    count -= 15;

    if(count <= 0 || count <= 15){
        count = 16;
    };

    settings_p.style = 'font-size: '+ (count) +'px';

    console.log((count));
});