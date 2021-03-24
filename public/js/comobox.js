window.addEventListener('DOMContentLoaded', () => {

    //VARIABLE COMBO
    const estado = document.querySelector('#estado'); //combo box

    //VARIABLE CHECK PARA DESACTIVARLOS
    const check_fiebre1 = document.querySelector('#check_fiebre1');
    const check_fiebre2 = document.querySelector('#check_fiebre2');
    const check_garganta1 = document.querySelector('#check_garganta1');
    const check_garganta2 = document.querySelector('#check_garganta2');
    const check_covid1 = document.querySelector('#check_covid1');
    const check_covid2 = document.querySelector('#check_covid2');
    const check_embarazo1 = document.querySelector('#check_embarazo1');
    const check_embarazo2 = document.querySelector('#check_embarazo2');
    const check_alergia1 = document.querySelector('#check_alergia1');
    const check_alergia2 = document.querySelector('#check_alergia2');
    const borde = document.querySelector('.borde');

    const habilitarTriaje = () => {
        if (estado.value === '3') {
            console.log(estado.value);
            check_fiebre1.disabled = true; //true --> esconde  false --> muestra
            check_fiebre2.disabled = true;
            check_garganta1.disabled = true;
            check_garganta2.disabled = true;
            check_covid1.disabled = true;
            check_covid2.disabled = true;
            check_embarazo1.disabled = true;
            check_embarazo2.disabled = true;
            check_alergia1.disabled = true;
            check_alergia2.disabled = true;
            borde.classList.add('green');//agregando clase css
            borde.classList.remove('blue');
            borde.classList.remove('yellow');
        } if (estado.value === '4') {
            console.log(estado.value);
            check_fiebre1.disabled = true; //true --> esconde  false --> muestra
            check_fiebre2.disabled = true;
            check_garganta1.disabled = true;
            check_garganta2.disabled = true;
            check_covid1.disabled = true;
            check_covid2.disabled = true;
            check_embarazo1.disabled = true;
            check_embarazo2.disabled = true;
            check_alergia1.disabled = true;
            check_alergia2.disabled = true;
            borde.classList.add('yellow');//agregando clase css
            borde.classList.remove('blue');
            borde.classList.remove('green');
        } else if (estado.value === '0') {
            check_fiebre1.disabled = false;//habilitamos
            check_fiebre2.disabled = false;
            check_garganta1.disabled = false;
            check_garganta2.disabled = false;
            check_covid1.disabled = false;
            check_covid2.disabled = false;
            check_embarazo1.disabled = false;
            check_embarazo2.disabled = false;
            check_alergia1.disabled = false;
            check_alergia2.disabled = false;
            borde.classList.add('blue');
            borde.classList.remove('green');
            borde.classList.remove('yellow');
        }
    }


    //EVENTOS
    estado.addEventListener('click', habilitarTriaje);
});