<?php

/*
 * class for emails page
 */

class Email {

    protected $host = 'localhost';
    protected $user = 'root';
    protected $pass = '';
    protected $base = 'project';
    protected $conn;
    protected $key  = 'secret_key123456';

    /**
     * construct
     */
    public function __construct()
    {
        try {
            $this->conn = mysql_connect($this->host, $this->user, $this->pass);
            mysql_select_db($this->base, $this->conn);
        } catch (\Exception $ex) {
            echo 'database connecting error';
            exit;
        }
    }

    /**
     * encode text
     * 
     * @param string $text
     * @return string
     */
    protected function encode($text)
    {
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND);

        return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->key, $text, MCRYPT_MODE_ECB, $iv);
    }

    /**
     * decode text
     * 
     * @param string $text
     * @return string
     */
    protected function decode($text)
    {
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND);

        return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key, $text, MCRYPT_MODE_ECB, $iv);
    }

    /**
     * save email
     */
    public function save()
    {
        $email = $_POST['email'];

        $parts = explode('@', $email);
        $uname = $parts[0];
        $domen = $parts[1];

        $crypttext = $this->encode($uname);

        $sql = 'INSERT INTO emails (email) VALUES (\'' . mysql_real_escape_string($crypttext . '@' . $domen) . '\')';

        mysql_query($sql, $this->conn);
    }

    /**
     * get emails
     * 
     * @return string
     */
    public function getEmails()
    {
        $sql = 'SELECT * FROM emails';

        if (isset($_POST['email_search'])) {
            $sql .= ' WHERE email LIKE \'%' . mysql_real_escape_string($_POST['email_search']) . '%\'';
        }

        $rows   = mysql_query($sql, $this->conn);
        $emails = array();
        while ($row    = mysql_fetch_array($rows)) {
            $email = explode('@', $row['email']);

            $decrypttext = $this->decode($email[0]);

            $emails[] = $decrypttext . '@' . $email[1];
        }

        return $emails;
    }

}
