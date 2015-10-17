<?php

/*
 * class for images page
 */

class Files {

    /**
     * upload file
     * 
     * @return string
     */
    public function upload()
    {
        $filename = $_FILES['file']['name'];
        $filepath = 'images/' . $filename;

        copy($_FILES['file']['tmp_name'], $filepath);

        $this->addCookies($filename);

        return $filepath;
    }

    /**
     * add file name in cookies
     * 
     * @param string $name
     */
    protected function addCookies($name)
    {
        if (isset($_COOKIE['test'])) {
            $names = explode(',', $_COOKIE['test']);

            if (!in_array($name, $names)) {
                $names[] = $name;
            }
            setcookie('test', implode(',', $names));
        } else {
            setcookie('test', $name);
        }
    }

    /**
     * check cookies
     * 
     * @param string $filepath
     * @return boolean
     */
    public function checkCookies($filepath)
    {
        $sections = explode('/', $filepath);
        $filename = end($sections);

        if (isset($_COOKIE['test'])) {
            $names = explode(',', $_COOKIE['test']);
            return in_array($filename, $names) ? true : false;
        }

        return false;
    }

}
