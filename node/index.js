var mysql = require('mysql');
var mqtt= require('mqtt');
var con = mysql.createConnection({
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

  var client = mqtt.connect("mqtt://suwebya.tk", options);

  //SE REALIZA LA CONEXION
  client.on('connect', function () {
    console.log("Conexión  MQTT Exitosa!");
    client.subscribe('device/#', function (err) {
      console.log("Subscripción exitosa!")
    });
  })  
  
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
   