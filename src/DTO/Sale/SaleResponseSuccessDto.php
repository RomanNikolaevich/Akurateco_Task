<?php

namespace App\DTO\Sale;

/**
 * @object-type DTO
 */
class SaleResponseSuccessDto implements ISaleDto
{
    use SalePropertiesTrait;

    public string $descriptor;
    public float $amount;
    public string $currency;

    public function __construct(array $response)
    {
        $this->action = $response['action'];
        $this->result = $response['result'];
        $this->status = $response['status'];
        $this->orderID = $response['order_id'];
        $this->transID = $response['trans_id'];
        $this->transDate = $response['trans_date'];
        $this->descriptor = $response['descriptor'];
        $this->amount = $response['amount'];
        $this->currency = $response['currency'];
    }

}//end class
