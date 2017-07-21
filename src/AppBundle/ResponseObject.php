<?php

namespace AppBundle;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;

/**
 * Base Class for API Response Generation
 * 
 */
class ResponseObject {
    
    /**
     * Tells the API status
     * 
     * boolean
     * 
     */
    private $status = false;
    
    /**
     * Message String
     *
     * string
     * 
     */
    private $message = '';
    
    /**
     * Messages Array // Used in Validation rules where multiple error can occur
     * 
     * array
     * 
     */
    private $messages = [];
    
    
    /**
     * Holds API Specific data
     *
     * object
     * 
     */
    private $response;
    
    /**
     * Detailed message for developers.
     *
     * string
     */
    private $developerMessage = "";
    
    /**
     * Error object
     * Detail error Trace. Error code & message.
     * 
     * @todo Discuss keep it or remove
     * object
     * 
     */
    private $error;
    
    /**
     * Help Text for debugging
     *
     * string
     */
    private $debugTrace = "";
    
    /**
     * object
     *
     */
    private $serviceResponse;
    
    public function __construct() {
        $this->response             = new \stdClass();
        
        //@todo
        $this->error            = new \stdClass();
        $this->error->code      = 0;
        $this->error->message   = '';
        $this->error->messages  = [];
        $this->error->data      = new \stdClass();
    }

    /**
     * Setter for $this->status property
     *
     * @param boolean $status describes API status property
     *
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * Setter for $this->message property
     *
     * @param string $message Message for users at client
     *
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * Setter for $this->messages property
     *
     * @param array $messages Messages for users at client e.g Validation errors
     *
     */
    public function setMessages($messages) {
        $this->messages = $messages;
    }

    /**
     * Setter for $this->response->data property
     *
     * @param object $data data for particular API
     *
     */
    public function setResponseData($data) {
        $this->response = $data;
    }

    /**
     * Setter for $this->developerMessage property
     *
     * @param string $message message for developers (client)
     *
     */
    public function setDeveloperMessage($message) {
        $this->developerMessage = $message;
    }

    /**
     * Setter for $this->debugTrace property
     *
     * @param string $debugMessage message for developers (server)
     *
     */
    public function setDebugTraceMessage($debugMessage) {
        if ($this->debugMode == 1) {
            $this->debugTrace = $debugMessage;
        }
    }

    /**
     * Wrapper Method to Prepare Service Response.
     *
     *
     */
    public function getServiceResponse() {
        $this->prepareServiceResponse();
        return $this->serviceResponse;
    }

    /**
     * Method to Prepare Service Response.
     * Exposed to end Users
     *
     */
    public function prepareServiceResponse() {
        $response = array(
            'status'                => $this->status,
            'message'               => $this->message,
            'messages'              => $this->messages,
            'response'              => $this->response,
            'developer_message'     => $this->developerMessage,
            'debug_trace'           => $this->debugTrace,
        );
        $this->serviceResponse = json_encode($response);
        
    }

}