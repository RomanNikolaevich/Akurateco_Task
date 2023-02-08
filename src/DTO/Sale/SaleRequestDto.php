<?php

namespace App\DTO\Sale;

/**
 *  Данные для передачи в API
 *  В конструкторе парсим данные и сохраняем их в параметры.
 *
 * @object-type DTO
 */
class SaleRequestDto
{

    public string $action;
    public string $clientKey;
    public string $clientPass;
    public string $orderId;
    public string $orderAmount;
    public string $orderCurrency;
    public string $orderDescription;
    public string $cardNumber;
    public string $cardExpMonth;
    public string $cardExpYear;
    public string $cardCvv2;
    public string $payerFirstName;
    public string $payerLastName;
    public string $payerAddress;
    public string $payerCountry;
    public string $payerState;
    public string $payerCity;
    public int $payerZip;
    public string $payerEmail;
    public string $payerPhone;
    public string $termUrl3ds;
    public string $payerIP;
    public string $hash;

    public function saleRequest():array
    {
        return [
            'action'            => $this->action,
            'client_key'        => $this->clientKey,
            'order_id'          => $this->orderId,
            'order_amount'      => $this->orderAmount,
            'order_currency'    => $this->orderCurrency,
            'order_description' => $this->orderDescription,
            'card_number'       => $this->cardNumber,
            'card_exp_month'    => $this->cardExpMonth,
            'card_exp_year'     => $this->cardExpYear,
            'card_cvv2'         => $this->cardCvv2,
            'payer_first_name'  => $this->payerFirstName,
            'payer_last_name'   => $this->payerLastName,
            'payer_address'     => $this->payerAddress,
            'payer_country'     => $this->payerCountry,
            'payer_state'       => $this->payerState,
            'payer_city'        => $this->payerCity,
            'payer_zip'         => $this->payerZip,
            'payer_email'       => $this->payerEmail,
            'payer_phone'       => $this->payerPhone,
            'payer_ip'          => $this->payerIP,
            'term_url_3ds'      => $this->termUrl3ds,
            'hash'              => $this->hash,
        ];
    }//end saleRequest()

}//end class
