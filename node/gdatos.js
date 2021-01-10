import { createConnection } from 'mysql';
import { connect } from 'mqtt';
var con = createConnection({
    host:"suwebya.tk",
    user:"admin_ceiba",
    password:"121212",
    database:"admin_suwebya"

})
var options = {
    port: 1883,
    host: 'suwebya.tk',
    clientId: 'acces_control_server_' + Math.round(Math.random() * (0- 10000) * -1) ,
    username: 'web_client',
    password: '121212',
    keepalive: 60,
    reconnectPeriod: 1000,
    protocolId: 'MQIsdp',
    protocolVersion: 3,
    clean: true,
    encoding: 'utf8'
  };

  var client = connect("mqtt://suwebya.tk", options);

  //SE REALIZA LA CONEXION
  client.on('connect', function () {
    console.log("Conexión  MQTT Exitosa!");
    client.subscribe('valuesM2', function (err) {
    console.log("Subscripción exitosa!")
    });
  }); 
  var msgtotal="";
  var ciclos=0;
  var sp1=0;
  var sp2=0;
  var sp3=0;
  client.on('message',function (topic, message){    
    if (topic== "valuesM2"){
      var msg = message.toString();
      var sp= msg.split(",");
      sp1=sp1+parseInt(sp[0]);
      sp2=sp2+parseInt(sp[1]);
      sp3=sp3+parseInt(sp[2]);      
      ciclos=ciclos+1;
      console.log(sp1);
      if(ciclos==30){
        msgtotal=(sp1/ciclos).toFixed(2)+","+(sp2/ciclos).toFixed(2)+","+(sp3/ciclos).toFixed(2);
        console.log(msgtotal);
        var query ="INSERT INTO `admin_suwebya`.`datos_maq` (`datos_values`) VALUES ('"+ msgtotal +"')";
      con.query(query, function(err, result, fields){
        if(err) throw err;
        console.log("Fila insertada correctamente");
        
      });
      msgtotal="";
      ciclos=0;
      sp1=0;
      sp2=0;
      sp3=0;
      }

            
    }
  });
  
con.connect(function (err) {
    if(err) throw err;

    var query = "SELECT * FROM operarios WHERE 1";
    con.query(query, function (err, result, fields) {
      if (err) throw err;
      if(result.length>0){
      console.log(result);
      }
    });  
    
});

//,.,.,.,.,,...





setInterval(() => {
    var query='SELECT 1+1 as result';
    con.query(query,function(err,result, fields){
        if(err) throw err;
    })
}, 5000);
   