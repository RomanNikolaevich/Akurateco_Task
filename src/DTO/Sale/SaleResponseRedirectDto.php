<?php

namespace App\DTO\Sale;

/**
 * @object-type DTO
 */
class SaleResponseRedirectDto implements ISaleDto
{
    use SalePropertiesTrait;

    public string $descriptor;
    public string $amount;
    public string $currency;
    public string $redirectURL;
    public string $redirectParams;
    public string $redirectMethod;

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
        $this->redirectURL = $response['redirect_url'];
        $this->redirectParams = $response['redirect_params'];
        $this->redirectMethod = $response['redirect_method'];
    }

}//end class
