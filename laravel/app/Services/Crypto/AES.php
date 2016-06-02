<?php

namespace App\Services\Crypto;

class AES {

    private $cipher;

    public function __construct()
    {;
        $this->cipher = new \Crypt_AES();
    }

    public function encrypt($data, $password)
    {
        $this->cipher->setKey($password);
        $this->cipher->setIV(crypt_random_string($cipher->getBlockLength() >> 3));
        return $this->cipher->encrypt($data);
    }

    public function decrypt($data, $password)
    {
        $raw = base64_decode($data);
        $this->cipher->setIV(substr($raw, 0, 16));
        $this->cipher->setKey($password);
        return $this->cipher->decrypt(substr($raw, 16));
    }

}
