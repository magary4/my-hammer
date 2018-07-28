<?php

namespace ApiBundle\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponse implements ApiResponseInterface, \JsonSerializable
{

   private $format = 'json';

   private $status = 200;

   private $code = 200;

   private $message = "";

   private $errors = [];

   private $data = [];

   public function __construct( $code=1003, $message = "")
   {
       $this->code = $code;
       $this->message = $message;
   }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode( $code )
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus( $status )
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage( $message )
    {
        $this->message = $message;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors( $errors )
    {
        $this->errors = $errors;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData( $data )
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat( $format )
    {
        $this->format = $format;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $responseArray = [
            "code" => $this->getCode(),
            "message" => $this->getMessage()
        ];

        if($this->getErrors()){
            $responseArray["errors"] = $this->getErrors();
        }

        if($this->getData()){
            $responseArray["data"] = $this->getData();
        }

        return $responseArray;
    }

    public function getResponse()
    {
        if($this->getFormat()==="json") {
            return new JsonResponse($this,$this->getStatus());
        } else {
            // TODO: implement other data-formats
        }
    }


}