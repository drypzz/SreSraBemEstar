
// cards

const controls = document.querySelectorAll('.button-control');

const items = document.querySelectorAll('.item-cards');
const maxItems = items.length;

let count = 1;

controls.forEach(control => {
    control.addEventListener('click', () => {
        const isLeft = control.classList.contains('arrow-left');

        if(isLeft){
            count -= 1;
        }else{
            count += 1;
        };

        if(count >= maxItems){
            count = 0;
        };

        if(count < 0){
            count = maxItems - 1;
        };

        items.forEach(item => item.classList.remove('focus'));
        items.forEach(item => item.style = 'display: none;');
        
        controls.forEach(item => item.classList.remove('active-btn'));

        items[count].classList.add('focus');
        items[count].style = 'display: block;';
        controls[count].classList.add('active-btn');
    });
});