<?php                                                                                                                                                            
require './vendor/autoload.php';                                                                                                                                 
//date_default_timezone_set('PRC');                                                                                                                              
//use Monolog\Logger;                                                                                                                                            
//use Monolog\Handler\StdoutHandler;                                                                                                                             
// Create the logger                                                                                                                                             
//$logger = new Logger('my_logger');                                                                                                                             
// Now add some handlers                                                                                                                                         
//$logger->pushHandler(new StdoutHandler());                                                                                                                     
                                                                                                                                                                 
$config = \Kafka\ConsumerConfig::getInstance();                                                                                                                  
$config->setMetadataRefreshIntervalMs(10000);                                                                                                                    
$config->setMetadataBrokerList('kafka0527:9092');                                                                                                                
$config->setGroupId('whkafka001');                                                                                                                               
$config->setBrokerVersion('0.10.1.0');                                                                                                                           
$config->setTopics(array('whkafka001'));                                                                                                                         
//$config->setOffsetReset('earliest');                                                                                                                           
$consumer = new \Kafka\Consumer();                                                                                                                               
//$consumer->setLogger($logger);                                                                                                                                 
$consumer->start(function($topic, $part, $message) {                                                                                                             
        var_dump($message);                                                                                                                                      
}); 
