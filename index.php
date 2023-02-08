<?php

use App\DTO\Sale\SaleRequestDto;
use App\Services\AppendixA;
use App\Services\Sale\SaleApiService;

require_once __DIR__.'/vendor/autoload.php';

$fakeData = new SaleRequestDto();
$hashGenerator = new AppendixA();

$fakeData->action = 'SALE';
$fakeData->clientKey = '5b6492f0-f8f5-11ea-976a-0242c0a85007';
$fakeData->clientPass = 'd0ec0beca8a3c30652746925d5380cf3';
$fakeData->orderId = 'ORDER-12361';
$fakeData->orderAmount = '1.99';
$fakeData->orderCurrency = 'USD';
$fakeData->orderDescription = 'Product';
$fakeData->cardNumber = '4111111111111111';
$fakeData->cardExpMonth = '01';
$fakeData->cardExpYear = '2025';
$fakeData->cardCvv2 = '000';
$fakeData->payerFirstName = 'John';
$fakeData->payerLastName = 'Doe';
$fakeData->payerAddress = 'Big street';
$fakeData->payerCountry = 'US';
$fakeData->payerState = 'CA';
$fakeData->payerCity = 'City';
$fakeData->payerZip = '123456';
$fakeData->payerEmail = 'doe@example.com';
$fakeData->payerPhone = '199999999';
$fakeData->payerIP = $_SERVER['REMOTE_ADDR'];
$fakeData->termUrl3ds = 'http://client.site.com/return.php';
$fakeData->hash = $hashGenerator->generateHash($fakeData->payerEmail, $fakeData->clientPass, $fakeData->cardNumber);

$saleApiService = new SaleApiService();
dd($saleApiService->send($fakeData));
