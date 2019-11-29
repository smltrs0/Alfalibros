// ES MEJOR ASI PARA TENER TODO MAS ORGANIZADO

// LUEGO ESTO SE MANEJARA CON AJAX PARA OBTENER LOS DATOS

$.ajax({
    "method"    : "POST",
    url         : 'controller/get_values_dashboard_graphic.php',
    success     : function(data)
    {
        var values = JSON.parse(data);

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
                        // data: [1,1,2,3,5,8,13,21,34,55,89,144],
                        data: [values[1],values[2],values[3],values[4],values[5],values[6],values[7],values[8],values[9],values[10],values[11],values[12]],
                        label: "Generado por ventas",
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

    },
    error   : function()
    {
        alert('error al cargar datos del grafico');
    }

});