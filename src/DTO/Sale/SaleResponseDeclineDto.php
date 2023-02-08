<?php

namespace App\DTO\Sale;

/**
 * @object-type DTO
 */
class SaleResponseDeclineDto implements ISaleDto
{
    use SalePropertiesTrait;

    public string $declineReason;

    public function __construct(array $response)
    {
        $this->action = $response['action'];
        $this->result = $response['result'];
        $this->status = $response['status'];
        $this->orderID = $response['order_id'];
        $this->transID = $response['trans_id'];
        $this->transDate = $response['trans_date'];
        $this->declineReason = $response['decline_reason'];
    }

}//end class
