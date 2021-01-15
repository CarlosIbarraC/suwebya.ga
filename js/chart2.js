


var ctx = document.getElementById("myChart").getContext("2d");
var myChart= new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['min:'+startTime(), 'col2', 'col3','min:'+startTime(), 'col5', 'col6','col7','col8','col8','col9','col10','col11','col12','.','.'],
        defaultFontColor: ['#fff'],
        datasets: [{
            label: 'datos 1',
            data: intervaloChart(),
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

function tabla() {
    var carro3=[];
    
	$.ajax({
		url:'DatosMaquina.php',
		type:'POST',
		success:function(res){
			var js=res;
            var dato1=[];
			for(var i=0;i<js.length;i++){
                var dato=[(js[i].datos).split(",")];
               
                dato1= dato1.concat(dato);
				//tabla.push(dato1);
				
			}
            console.log(parseFloat(dato1[0][0])); 
          
           dato1.length=13;
          for (var b = 0; b < 13; b++) {
            
             for (var c = 0;c < 3; c++) {
                 if(c==0){
                     carro3.push(dato1[b][c]);                   
                     
                 }
                 
             } 
            }
             
         

        }
       
    })

   
    return carro3;
       

}



function updateChart() { 
    myChart.data.datasets[0].data= intervaloChart(); 
    myChart.update();
     
}
setInterval(updateChart,2000);
//var mayor=[];
function intervaloChart(rpm){
    
    
	if(isNaN(rpm) ){		
		rpm=10;	
	}
	if(isNaN(kls) ){		
		kls=20;		
	}
	if(isNaN(temp) ){		
		temp=15;		
	}
	rpm=parseFloat(rpm);
	kls=parseFloat(kls);
    temp=parseInt(temp/3);
    
    numbers.push(rpm);
    numbers.length=15;
    var mayor=[];
    mayor.lenght=30;
    mayor.push(rpm);
   // mayor.push(numbers);
    //mayor.length=30;
    console.log(mayor);
    return numbers;
}
setInterval(() => {
    
    updateChart();
}, 500);
setTimeout(() => {
    intervaloChart();
   
}, 1000);