window.addEventListener('DOMContentLoaded', () => {

    //VARIABLES
    const personalSinVacuna = document.querySelector('#personalSinVacunacion').value;//0
    const personalVacunado = document.querySelector('#personalVacunado').value; //1
    const personalDesistio = document.querySelector('#personalDesistio').value; //3
    const personalVacunadoOtroSalud = document.querySelector('#personalVacunadoOtroSalud').value; //4

    const personalTotal = document.querySelector('#personalTotal').value;//total 100%


    const graficoVacunacion = (personalSinVacuna,personalVacunado,personalDesistio,personalVacunadoOtroSalud,personalTotal) => {
        console.log('revo' ,personalVacunado);
        console.log('desisti: ',personalDesistio);
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sin Vacunación', 'Con Vacunación','Desistieron', 'otro centro de Salud','Totales'],
                datasets: [{
                    label: '', 
                    data: [personalSinVacuna,personalVacunado,personalDesistio,personalVacunadoOtroSalud,personalTotal],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgb(22, 236, 40, 0.2)',
                        'rgba(243, 10, 41, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(22, 236, 40, 1)',
                        'rgba(243, 10, 41, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }


    //EVENTOS
    window.addEventListener('load', graficoVacunacion(personalSinVacuna,personalVacunado,personalDesistio,personalVacunadoOtroSalud,personalTotal));
});