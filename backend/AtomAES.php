<?php

/*
 * Author  : Mr. Ankit Sharma (21/11/2018)
 * Designation/Company    : Web Developer/atom technologies ltd.
 */

class AtomAES {

    public function encrypt($data = '', $key = NULL, $salt = "") {
        if($key != NULL && $data != "" && $salt != ""){
            
            $method = "AES-256-CBC";
            
            //Converting Array to bytes
            $iv = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
            $chars = array_map("chr", $iv);
            $IVbytes = join($chars);
            
            
            $salt1 = mb_convert_encoding($salt, "UTF-8"); //Encoding to UTF-8
            $key1 = mb_convert_encoding($key, "UTF-8"); //Encoding to UTF-8
            
            //SecretKeyFactory Instance of PBKDF2WithHmacSHA1 Java Equivalent
            $hash = openssl_pbkdf2($key1,$salt1,'256','65536', 'sha1'); 
            
            $encrypted = openssl_encrypt($data, $method, $hash, OPENSSL_RAW_DATA, $IVbytes);
            
            return bin2hex($encrypted);
        }else{
            return "String to encrypt, Salt and Key is required.";
        }
    }

    public function decrypt($data="", $key = NULL, $salt = "") {
        if($key != NULL && $data != "" && $salt != ""){
            $dataEncypted = hex2bin($data);
            $method = "AES-256-CBC";
            
            //Converting Array to bytes
            $iv = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
            $chars = array_map("chr", $iv);
            $IVbytes = join($chars);
            
            $salt1 = mb_convert_encoding($salt, "UTF-8");//Encoding to UTF-8
            $key1 = mb_convert_encoding($key, "UTF-8");//Encoding to UTF-8
            
            //SecretKeyFactory Instance of PBKDF2WithHmacSHA1 Java Equivalent
            $hash = openssl_pbkdf2($key1,$salt1,'256','65536', 'sha1'); 
             
            $decrypted = openssl_decrypt($dataEncypted, $method, $hash, OPENSSL_RAW_DATA, $IVbytes);
            return $decrypted;
        }else{

            return "Encrypted String to decrypt, Salt and Key is required.";

        }
    }

}

?>