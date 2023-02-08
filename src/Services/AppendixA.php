<?php

namespace App\Services;

class AppendixA
{
    /**
     * @param string $email
     * @param string $clientPass
     * @param string $cardNumber
     *
     * @return string
     */
    public function generateHash(string $email, string $clientPass, string $cardNumber):string
    {
        return md5(
            strtoupper(
                strrev($email).$clientPass.strrev(
                    substr($cardNumber, 0, 6).substr($cardNumber, -4)
                )
            )
        );
    }//end generateHash()

}
