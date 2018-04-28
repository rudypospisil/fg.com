 <?php
/**
  * NTLMSoapClient library.
  * 
  * 
  * @author Rudy Pospisil <rudy@rudypospisil.com>
  * @package Frederick Goldman Photo Image System
  * @version 1.0.0
  * @date May 2013
  *
  * Most of this code from Microsoft's blog: 
  * http://blogs.msdn.com/b/freddyk/archive/2010/01/19/connecting-to-nav-web-services-from-php.aspx
  *
  * 
  */

 
class NTLMSoapClient extends SoapClient 
{ 
    
  function __doRequest($request, $location, $action, $version) 
  { 
    $headers = array( 
        'Method: POST', 
        'Connection: Keep-Alive', 
        'User-Agent: PHP-SOAP-CURL', 
        'Content-Type: text/xml; charset=utf-8', 
        'SOAPAction: "' . $action . '"', 
    ); 
    $this->__last_request_headers = $headers; 
    $ch = curl_init($location); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt($ch, CURLOPT_POST, true ); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request); 
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
    curl_setopt($ch, CURLOPT_USERPWD, USERPWD); 
    $response = trim(curl_exec($ch)); 
    return $response; 
  }

/*
  function __getFunctions() 
  { 
    return($this->__getFunctions); 
  } 
  function __getLastResponse() 
  { 
    return($this->__getLastResponse); 
  } 
  function __getLastRequest() 
  { 
    return($this->__getLastRequest); 
  } 
  function __getLastRequestHeaders() 
  { 
    return($this->__last_request_headers); 
  } 
*/
}