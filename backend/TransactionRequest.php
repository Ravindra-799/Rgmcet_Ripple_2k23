<?php
require_once 'AtomAES.php';


/**
 * Version 1.0
 */
class TransactionRequest
{
    private $login;

    private $password;

    private $transactionType;

    private $productId;

    private $amount;

    private $transactionCurrency;

    private $transactionAmount;

    private $clientCode;

    private $transactionId;

    private $transactionDate;

    private $customerAccount;

    private $customerName;

    private $customerEmailId;

    private $customerMobile;

    private $customerBillingAddress;

    private $returnUrl;

    private $mode = "test";

    private $transactionUrl;

    private $nbType = "NBFundTransfer";

    private $ccType = "CCFundTransfer";

    private $reqHashKey = "";

    private $salt = "";

    private $requestEncypritonKey = "";

    private $responseEncryptionKey = "";


    public function setRequestEncypritonKey($key){
        $this->requestEncypritonKey = $key;
    }

    public function setResponseEncypritonKey($key){
        $this->responseEncryptionKey = $key;
    }

    public function setSalt($saltEntered){
        $this->salt = $saltEntered;
    }


    /**
     * @return string
     */
    public function getReqHashKey()
    {
        return $this->reqHashKey;
    }

    /**
     * @param string $reqHashKey
     */
    public function setReqHashKey($reqHashKey)
    {
        $this->reqHashKey = $reqHashKey;
    }

    /**
     * @return string
     */
    public function getRespHashKey()
    {
        return $this->respHashKey;
    }

    /**
     * @param string $respHashKey
     */
    public function setRespHashKey($respHashKey)
    {
        $this->respHashKey = $respHashKey;
    }




    /**
     * @return the $login
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return the $transactionType
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * @param string $transactionType
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;
    }

    /**
     * @return the $productId
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return the $amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return the $transactionCurrency
     */
    public function getTransactionCurrency()
    {
        return $this->transactionCurrency;
    }

    /**
     * @param string $transactionCurrency
     */
    public function setTransactionCurrency($transactionCurrency)
    {
        $this->transactionCurrency = $transactionCurrency;
    }

    /**
     * @return the $transactionAmount
     */
    public function getTransactionAmount()
    {
        return $this->transactionAmount;
    }

    /**
     * @param string $transactionAmount
     */
    public function setTransactionAmount($transactionAmount)
    {
        $this->transactionAmount = $transactionAmount;
    }

    /**
     * @return the $transactionId
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return the $transactionDate
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * @param string $transactionDate
     */
    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    /**
     * @return the $customerAccount
     */
    public function getCustomerAccount()
    {
        return $this->customerAccount;
    }

    /**
     * @param string $customerAccount
     */
    public function setCustomerAccount($customerAccount)
    {
        $this->customerAccount = $customerAccount;
    }

    /**
     * @return the $customerName
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * @return the $customerEmailId
     */
    public function getCustomerEmailId()
    {
        return $this->customerEmailId;
    }

    /**
     * @param string $customerEmailId
     */
    public function setCustomerEmailId($customerEmailId)
    {
        $this->customerEmailId = $customerEmailId;
    }

    /**
     * @return the $customerMobile
     */
    public function getCustomerMobile()
    {
        return $this->customerMobile;
    }

    /**
     * @param string $customerMobile
     */
    public function setCustomerMobile($customerMobile)
    {
        $this->customerMobile = $customerMobile;
    }

    /**
     * @return the $customerBillingAddress
     */
    public function getCustomerBillingAddress()
    {
        return $this->customerBillingAddress;
    }

    /**
     * @param string $customerBillingAddress
     */
    public function setCustomerBillingAddress($customerBillingAddress)
    {
        $this->customerBillingAddress = $customerBillingAddress;
    }

    /**
     * @return the $returnUrl
     */
    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    /**
     * @param string $returnUrl
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
    }

    /**
     * @return the $mode
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return the $transactionUrl
     */
    public function getTransactionUrl()
    {
        return $this->transactionUrl;
    }

    /**
     * @param string $transactionUrl
     */
    public function setTransactionUrl($transactionUrl)
    {
        $this->transactionUrl = $transactionUrl;
    }

    public function getnbType() {
        return $this->nbType;
    }

    public function getccType() {
        return $this->ccType;
    }

    public function setUrl($url) {
        $port = 443;		
        $this->setTransactionUrl($url);
        $this->setPort($port);
    }

    public function setClientCode($clientCode) {
        if($clientCode == NULL || $clientCode == ""){
            $this->clientCode = urlencode(base64_encode(123));
        } else {
            $this->clientCode = urlencode(base64_encode($clientCode));
        }
    }

    private function getClientCode() {
        return $this->clientCode;
    }

    private function setPort($port) {
        $this->port = $port;
    }

    private function getPort() {
        return $this->port;
    }


    public function getChecksum(){
        $str = $this->login . $this->password . "NBFundTransfer" . $this->productId . $this->transactionId . $this->amount . "INR";
        $signature = hash_hmac("sha512",$str,$this->reqHashKey);

        return $signature;
    }

    //Change & to | in production
    private function getData(){
        $datenow = date("d/m/Y h:m:s");
        $transactionDate = str_replace(" ", "%20", $datenow);
        $strReqst = "";
        $strReqst .= "login=".$this->getLogin();
        $strReqst .= "&pass=".$this->getPassword();

        $strReqst .= "&ttype=NBFundTransfer";

        $strReqst .= "&prodid=".$this->getProductId();
        $strReqst .= "&amt=".$this->getAmount();
        $strReqst .= "&txncurr=".$this->getTransactionCurrency();
        $strReqst .= "&txnscamt=".$this->getTransactionAmount();
        $strReqst .= "&ru=".$this->getReturnUrl();
        $strReqst .= "&clientcode=".$this->getClientCode();
        $strReqst .= "&txnid=".$this->getTransactionId();
        $strReqst .= "&date=".$this->getTransactionDate();
        $strReqst .= "&udf1=".$this->getCustomerName();
        $strReqst .= "&udf2=".$this->getCustomerEmailId();
        $strReqst .= "&udf3=".$this->getCustomerMobile();
        $strReqst .= "&udf4=".$this->getCustomerBillingAddress();
        $strReqst .= "&custacc=".$this->getCustomerAccount();
        $strReqst .= "&signature=".$this->getChecksum();
        $atomenc = new AtomAES();
        $encData = $atomenc->encrypt($strReqst, $this->requestEncypritonKey, $this->salt);
        return "login=".$this->getLogin()."&encdata=".strtoupper($encData); // do not change in this line
    }

    /**
     * This function returns transaction token url
     * @return string
     */
    public function getPGUrl(){
        if ($this->mode != null && $this->mode != "") {
            try {
                $data = $this->getData();
                $this->writeLog($data);
                return $this->transactionUrl . "?" .$data;
            } catch ( Exception $ex ) {
                echo "Error while getting transaction token : " . $ex->getMessage();
                return;
            }
        } else {
            return "Please set mode live or test";
        }
    }

    private function writeLog($data){
        $fileName = "date".date("Y-m-d").".txt";
        $fp = fopen("log/".$fileName, 'a+');
        $data = date("Y-m-d H:i:s")." - ".$data;
        fwrite($fp,$data);
        fclose($fp);
    }


}
