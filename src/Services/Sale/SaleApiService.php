<?php

namespace App\Services\Sale;

use App\DTO\Sale\ISaleDto;
use App\DTO\Sale\SaleRequestDto;
use App\DTO\Sale\SaleResponseDeclineDto;
use App\DTO\Sale\SaleResponseErrorDto;
use App\DTO\Sale\SaleResponseRedirectDto;
use App\DTO\Sale\SaleResponseSuccessDto;

class SaleApiService implements ISaleDto
{
    private string $apiUrl = 'https://dev-api.rafinita.com/post';

    /**
     * @param SaleRequestDto $saleRequestDto
     *
     * @return SaleResponseSuccessDto|SaleResponseDeclineDto|SaleResponseErrorDto|SaleResponseRedirectDto
     * @throws \JsonException
     */
    public function send(SaleRequestDto $saleRequestDto
    ):SaleResponseSuccessDto|SaleResponseDeclineDto|SaleResponseErrorDto|SaleResponseRedirectDto
    {
        $responseList = $this->sendRequest($saleRequestDto);

        return $this->getResponseDto($responseList);
    }//end send()

    /**
     * @param SaleRequestDto $request
     *
     * @return array
     * @throws \JsonException
     */
    private function sendRequest(SaleRequestDto $request):array
    {
        $curl = curl_init();

        curl_setopt_array(
            $curl,
            [
                CURLOPT_URL            => $this->apiUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => 'POST',
                CURLOPT_POSTFIELDS     => $request->saleRequest(),
            ]
        );

        $returne = curl_exec($curl);
        $error = curl_error($curl);

        if (empty($error)) {
            $responseList = json_decode($returne, true, 512, JSON_THROW_ON_ERROR);
        }

        curl_close($curl);

        return $responseList;
    }//end sendRequest()

    /**
     * @param $responseList
     *
     * @return SaleResponseDeclineDto|SaleResponseSuccessDto|SaleResponseErrorDto|SaleResponseRedirectDto
     */
    private function getResponseDto($responseList
    ):SaleResponseDeclineDto|SaleResponseSuccessDto|SaleResponseErrorDto|SaleResponseRedirectDto {
        if ($responseList['result'] === 'SUCCESS') {
            $response = new SaleResponseSuccessDto($responseList);
        } elseif ($responseList['result'] === 'DECLINED') {
            $response = new SaleResponseDeclineDto($responseList);
        } elseif ($responseList['result'] === 'REDIRECT') {
            $response = new SaleResponseRedirectDto($responseList);
        } else {
            $response = new SaleResponseErrorDto($responseList);
        }

        return $response;
    }//end getResponseDto()

}//end class
