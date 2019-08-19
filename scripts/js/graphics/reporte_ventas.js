// ES MEJOR ASI PARA TENER TODO MAS ORGANIZADO

// LUEGO ESTO SE MANEJARA CON AJAX PARA OBTENER LOS DATOS

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx,
{
    type: 'line',
    data: 
    {
        labels: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
        datasets: 
        [
            { 
                data: [1,1,2,3,5,8,13,21,34,55,89,144],
                label: "Ventas",
                borderColor: "#3e95cd",
                fill: true
            }
        ]
    },
    options:
    {
        title:
        {
            display: false
        }
    }
});