<?php
declare( strict_types=1 );

namespace ApiBundle\Response;

use ContainerSypt7fh\appDevDebugProjectContainer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiResponse implements ApiResponseInterface, \JsonSerializable
{
    /**
     * @var string
     */
    private $format = 'json';

    /**
     * @var int
     */
    private $status = 200;

    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $message = "";

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @var array
     */
    private $data = [];

    /**
     * ApiResponse constructor.
     * @param int $code
     * @param string $message
     */
    public function __construct( $code = ApiResponseCode::SUCCESS, $message = "" )
    {
        $this->code    = $code;
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode( int $code ): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus( int $status ): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage( string $message ): void
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
    public function setErrors( $errors ): void
    {
        $this->errors = $errors;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData( array $data ): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat( string $format ): void
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
    public function jsonSerialize(): array
    {
        $responseArray = [
            "code"    => $this->getCode(),
            "message" => $this->getMessage()
        ];

        if ( $this->getErrors() ) {
            $responseArray["errors"] = $this->getErrors();
        }

        if ( $this->getData() ) {
            $responseArray["data"] = $this->getData();
        }

        return $responseArray;
    }

    public function getResponse(): Response
    {
        if ( $this->getFormat() === "json" ) {
            return new JsonResponse( $this, $this->getStatus() );
        } else {
            throw new \Exception( sprintf( "%s format is not supported yet", $this->getFormat() ) );
            // TODO: implement other data-formats
        }
    }


}