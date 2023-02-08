<?php

namespace App\DTO\Sale;

/**
 * @object-type DTO
 */
class SaleResponseErrorDto implements ISaleDto
{
    public string $result;
    public string $errorCode;
    public string $errorMessage;
    public ?array $errors;

    public function __construct(array $response)
    {
        $this->result = $response['result'];
        $this->errorCode = $response['error_code'];
        $this->errorMessage = $response['error_message'];
        $this->errors = $response['errors'];
    }

}//end class
