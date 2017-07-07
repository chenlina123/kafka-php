<?php                                                                                                                                                            
require './vendor/autoload.php';                                                                                                                                 
//date_default_timezone_set('PRC');                                                                                                                              
//use Monolog\Logger;                                                                                                                                            
//use Monolog\Handler\StdoutHandler;                                                                                                                             
// Create the logger                                                                                                                                             
//$logger = new Logger('my_logger');                                                                                                                             
// Now add some handlers                                                                                                                                         
//$logger->pushHandler(new StdoutHandler());                                                                                                                     
                                                                                                                                                                 
$config = \Kafka\ProducerConfig::getInstance();                                                                                                                  
$config->setMetadataRefreshIntervalMs(10000);                                                                                                                    
$config->setMetadataBrokerList('kafka0628:9092');                                                                                                                
$config->setBrokerVersion('0.10.1.0');                                                                                                                           
$config->setRequiredAck(1);                                                                                                                                      
$config->setIsAsyn(false);                                                                                                                                       
$config->setProduceInterval(500);

echo "Will send a demo message to Kafka Service......";                                                                                                          
echo date('Y-m-d H:i:s').',77.373,110.89,6.769,7.698,-0.52,-0.69,-0.48,0.0,-0.01,0.0,15.9,15.9,16.0,675.2,980.172,6557.186,-0.012,0.016,0.0,0.0,0.0,2100.0,29,38,
503,284,86,1';

$producer = new \Kafka\Producer(function() {                                                                                                                     
        return array(                                                                                                                                            
                array(                                                                                                                                           
                        'topic' => 'test0706',                                                                                                                 
                        'value' => date('Y-m-d H:i:s').',77.373,10.89,6.769,7.698,-0.52,-0.69,-0.48,0.0,-0.01,0.0,15.9,15.9,16.0,675.2,980.172,6557.186,-0.012,0.016,0.0,0.0,0.0,2100.0,29,38,503,284,86,1',                                                                                                           
                        'key' => '',  
                ),                                                                                                                                               
        );                                                                                                                                                       
});                                                                                                                                                              
//$producer->setLogger($logger);                                                                                                                                 
$producer->success(function($result) {                                                                                                                           
        var_dump($result);                                                                                                                                       
});                                                                                                                                                              
$producer->error(function($errorCode, $context) {                                                                                                                
        var_dump($errorCode);                                                                                                                                    
}); 
$producer->send();

echo 'Demo message send OK!';
