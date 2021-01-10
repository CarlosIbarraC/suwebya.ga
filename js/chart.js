var ctx = document.getElementById("myChart").getContext("2d");
//var tiempo = new Date();
//var segundos = tiempoSegundos()
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['min:'+startTime(), 'col2', 'col3','min:'+startTime(), 'col5', 'col6','col7','col8','col8','col9','col10','col11','col12'],
        defaultFontColor: ['#fff'],
        datasets: [{
            label: 'datos 1',
            data: [10, 9, 15,10, 9, 15,10, 9, 15,10, 9,15,6],
            backgroundColor: [ 'rgb(12,194,170,0.1)'],
            borderColor:['rgb(12,194,170)']
           

        },
        {
            label: 'datos 2',
            data: [7, 5, 6,9,12,5, 9, 13,9, 9,12,8,0],
            backgroundColor: [ 'rgb(104, 135, 255,0.3)'],
            borderColor:['rgb(104, 135, 255)']
        }
    ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "white",                    
                    beginAtZero: true
                },
                gridLines: {
                    color: 'rgb(102,102,102,0.2)' //give the needful color
                }
                
            },
            ],
            xAxes: [{
                ticks: {
                    fontColor: "white"
                   
                },
                gridLines: {
                    color: 'rgb(102,102,102,0.2)' //give the needful color
                }
                
            },
            ]
        },
        legend: {
            labels: {
                // This more specific font property overrides the global property
                fontColor: '#fff',
               
            }
        }
        
    }
});

function startTime() {

    today = new Date();

    m = today.getMinutes();
    s = today.getSeconds();
    console.log(m, s);
    return m;
}