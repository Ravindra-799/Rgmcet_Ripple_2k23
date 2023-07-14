<?php

require_once 'AtomAES.php';

class TransactionResponse {

    private $respHashKey = "";
    private $responseEncryptionKey = "";
    private $salt = "";

    /**
     * @return string
     */
    public function getRespHashKey()
    {
        return $this->respHashKey;
    }
    
    public function setResponseEncypritonKey($key){
        $this->responseEncryptionKey = $key;
    }
    
    public function setSalt($saltEntered){
        $this->salt = $saltEntered;
    }

    /**
     * @param string $respHashKey
     */
    public function setRespHashKey($respHashKey)
    {
        $this->respHashKey = $respHashKey;
    }

    public function decryptResponseIntoArray($encdata){

        $atomenc = new AtomAES();
        $decrypted = $atomenc->decrypt($encdata, $this->responseEncryptionKey, $this->salt);
        $array_response = explode('&', $decrypted); //change & to | for production
        $equalSplit = array();
        foreach ($array_response as $ar) {
            $equalSub = explode('=', $ar);
            if(!empty($equalSub[1]) && !empty($equalSub[0])){
                $temp = array(
                    $equalSub[0] => $equalSub[1],
                );
                $equalSplit += $temp;
            }
        }
        
        return $equalSplit;

    }

    public function validateResponse($responseParams)
    {
        $str = $responseParams["mmp_txn"].$responseParams["mer_txn"].$responseParams["f_code"].$responseParams["prod"].$responseParams["discriminator"].$responseParams["amt"].$responseParams["bank_txn"];
        $signature =  hash_hmac("sha512",$str,$this->respHashKey,false);
        if($signature == $responseParams["signature"]){
            return true;
        } else {
            return false;
        }

    }
}
