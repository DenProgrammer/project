<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Email {

    protected $host = 'localhost';
    protected $user = 'root';
    protected $pass = '';
    protected $base = 'project';
    protected $conn;
    protected $key = 'secret_key123456';

    public function __construct() {
        $this->connect();
    }

    protected function connect() {
        $this->conn = mysql_connect($this->host, $this->user, $this->pass);
        mysql_select_db($this->base, $this->conn);
    }

    protected function encode($text) {
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND);

        return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->key, $text, MCRYPT_MODE_ECB, $iv);
    }

    protected function decode($text) {
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND);

        return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key, $text, MCRYPT_MODE_ECB, $iv);
    }

    public function save() {
        $email = $_POST['email'];

        $parts = explode('@', $email);
        $uname = $parts[0];
        $domen = $parts[1];

        $crypttext = $this->encode($uname);

        $sql = 'insert into emails (email) values (\'' . ($crypttext . '@' . $domen) . '\')';

        mysql_query($sql, $this->conn);
    }

    public function getEmails() {
        $sql = 'select * from emails';
        
        if (isset($_POST['email_search'])){
            $sql .= ' where email like \'%'.$_POST['email_search'].'%\'';
        }

        $rows = mysql_query($sql, $this->conn);
        $emails = array();
        while ($row = mysql_fetch_array($rows)) {
            $email = explode('@', $row['email']);

            $decrypttext = $this->decode($email[0]);

            $emails[] = $decrypttext . '@' . $email[1];
        }

        return $emails;
    }

}
