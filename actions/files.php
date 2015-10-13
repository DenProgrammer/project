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
    public function upload() {
        $filepath = 'images/' . $_FILES['file']['name'];

        copy($_FILES['file']['tmp_name'], $filepath);

        return $filepath;
    }

}
