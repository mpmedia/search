<?php
namespace Doctrine\Search\Http\Client;

<<<<<<< HEAD
use Doctrine\Search\Http\Request\Buzz as Request;
use Doctrine\Search\Http\Response\Buzz as Response;
=======
use Doctrine\Search\Http\Response\Buzz;

use Doctrine\Search\Http\Request\Buzz;

use Doctrine\Search\Http\Request;

use Doctrine\Search\Http\Response;

>>>>>>> upstream/master
use Doctrine\Search\Http\Client;
use Buzz\Browser;

class Buzz implements Client
{
    private $browser;
    
    private $host;
    
    private $url;
    
    private $port;
    
    private $request;
    
    private $response;
    
    public function __construct(Browser $browser, $host, $url, $port = 80)
    {
        $this->setHost($host);
        $this->setPort($port);
        $this->setUrl($url);
        $this->browser = $browser;
    }
    
    public function setHost($host)
    {
        $this->host = $host;
    }
    
    public function setPort($port)
    {
        $this->port = $port;
    }
    
    public function setUrl($url)
    {
        $this->url = $url;
    }
    
    
    /* (non-PHPdoc)
     * @see Doctrine\Search\Http.Client::getRequest()
     */
    public function getRequest() 
    {
        return $this->request;
    }

    /* (non-PHPdoc)
     * @see Doctrine\Search\Http.Client::getResponse()
     */
    public function getResponse() 
    {
        return $this->response;
    }

    /* (non-PHPdoc)
     * @see Doctrine\Search\Http.Client::sendRequest()
     */
    public function sendRequest($method = 'GET', $headers = array(), $body = '') 
    {
        $method = strtolower($method);
        
        if($method == 'post' || $method == 'put' || $method == 'delete') {
           $this->response = $this->browser->$method($this->host . ':' . $this->port . '/' . $this->url, $body);
        }
        else {
<<<<<<< HEAD
            $this->response = new Response($this->browser->$method($this->host . ':' . $this->port . '/' . $this->url));
=======
            $this->response = new BuzzResponse($this->browser->$method($this->url . ':' . $this->port . '/' . $this->url));
>>>>>>> upstream/master
        }
        
        $this->request = new BuzzRequest($this->browser->getJournal()->getLastRequest());
    }

}