<?php
    $itemList = Nav::fetchItemListFromLocalDb();
    var_dump($itemList);

/*
  
  // http://fgi-dev-sql.fgoldman.com:7047/DynamicsNAV/WS/TEST-FGI/Codeunit/PIS
  define('USERPWD', 'fgoldman\webservice:Fred!gold1949');
 
      // Unregister the current HTTP wrapper 
      stream_wrapper_unregister('http'); 
      // Register the new HTTP wrapper 
      stream_wrapper_register('http', 'NTLMStream') or die("Failed to register protocol");
      
      // Set the NAV Webservice URI. 
      // username: fgoldman\webservice password: Fred!gold1949
      $baseURI = 'http://fgi-dev-sql.fgoldman.com:7047/DynamicsNAV/WS/';
      $wsdl = $baseURI . 'TEST-FGI/Codeunit/PIS';
      
      //error_reporting(0);
      
      // Initialize Soap Client 
      $client = new NTLMSoapClient($wsdl, array(
                                            'trace' => TRUE,
                                            'cache_wsdl' => WSDL_CACHE_NONE));
      
      //echo($client);
exec('curl http://fgoldman%5Cwebservice:Fred%21gold1949@fgi-dev-sql.fgoldman.com:7047/DynamicsNAV/WS/TEST-FGI/Codeunit/PIS', $array);
echo implode('<br />', $array);

// http://fgi-dev-sql.fgoldman.com:7047/DynamicsNAV/WS/TEST-FGI/Codeunit/PIS


      require('ntlmstream.php');
      require('ntlmsoapclient.php');
      define('USERPWD', 'pisservice:Jewel1949');
 
      // Unregister the current HTTP wrapper 
      stream_wrapper_unregister('http'); 
      // Register the new HTTP wrapper 
      stream_wrapper_register('http', 'NTLMStream') or die("Failed to register protocol");
      // Set the NAV Webservice URI. 
      // username: fgoldman\webservice password: Fred!gold1949
      $baseURI = 'http://fgi-dev-sql.fgoldman.com:7047/DynamicsNAV/WS/';
      $wsdl = $baseURI . 'TEST-FGI/Codeunit/PIS';

      //error_reporting(0);
      
      // Initialize Soap Client 
      $client = new NTLMSoapClient($wsdl, array(
                                            'trace' => 1, 
                                            'cache_wsdl' => WSDL_CACHE_NONE, 
                                            'exceptions' => true));

      
      $goldmanAppPISXMLObject = new stdClass(); 
      $result = $client->GoldManAppPISTest($goldmanAppPISXMLObject);              
      //echo $client->__soapCall(GoldManAppPIS());
      //$soapParams = array('parameters'  => 'goldmanAppPISXML');
      
      echo('<pre>');
        var_export($result);
      echo('</pre>');

/*
      
      $wdsl = array();
$returnCode = 0;
$result = exec('curl -v -u pisservice:Jewel1949 http://172.16.1.178:7047/DynamicsNAV/WS/TEST-FGI/Codeunit/PIS --anyauth', $wdsl, $returnCode);
//echo('<pre>');
echo($result);

$url = 'http://fgoldman%5Cwebservice:Fred%21gold1949@fgi-dev-sql.fgoldman.com:7047/DynamicsNAV/WS/TEST-FGI/Codeunit/PIS';

$xml = simplexml_load_string($result);
echo('<pre>');var_export($xml);echo('</pre>');
*/