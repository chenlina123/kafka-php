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
$config->setMetadataBrokerList('kafka0527:9092');                                                                                                                
$config->setBrokerVersion('0.10.1.0');                                                                                                                           
$config->setRequiredAck(1);                                                                                                                                      
$config->setIsAsyn(false);                                                                                                                                       
$config->setProduceInterval(500);                                                                                                                                
$producer = new \Kafka\Producer(function() {                                                                                                                     
        return array(                                                                                                                                            
                array(                                                                                                                                           
                        'topic' => 'whkafka001',                                                                                                                 
                        'value' => 'test....message.',                                                                                                           
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
