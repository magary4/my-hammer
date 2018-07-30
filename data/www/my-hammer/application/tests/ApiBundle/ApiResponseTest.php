<?php

use PHPUnit\Framework\TestCase;
use ApiBundle\Response\ApiResponse;

final class ApiResponseTest extends TestCase
{
    public function testResponseIsCorrectJson()
    {
        $expected = [
            "code"    => \ApiBundle\Response\ApiResponseCode::SUCCESS,
            "message" => "success",
            "data"    => [ "id" => 123 ]
        ];

        $apiResponse = new ApiResponse();
        $apiResponse->setFormat( "json" );
        $apiResponse->setMessage( "success" );
        $apiResponse->setData( [ "id" => 123 ] );

        $this->assertEquals(
            $apiResponse->getResponse()->getContent(),
            json_encode($expected)
        );

    }

    public function testResponseInvalidFormat()
    {
        $apiResponse = new ApiResponse();
        $apiResponse->setFormat( "xml" );


        $this->expectException(\Exception::class);
        $apiResponse->getResponse();;
    }
}