<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Files {

    public function upload() {
        $filepath = 'images/' . $_FILES['file']['name'];

        copy($_FILES['file']['tmp_name'], $filepath);

        return $filepath;
    }

}
