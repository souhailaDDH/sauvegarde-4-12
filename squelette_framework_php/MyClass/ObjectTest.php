<?php

namespace MyClass;

Class ObjectTest {

    public $test;
    private $fp;
    private $filename;

    public function __construct() {
        $this->test="PLOP";
        $this->filename="log/mylog.txt";
    }

    public function writeLog($somecontent){
        if (fwrite($this->fp, $somecontent) === FALSE) {
            echo "Impossible d'écrire dans le fichier ($this->filename)";
            exit;
        }
    }
    public function openLog() {
        if (!$this->fp = fopen($this->filename, 'a')) {
         echo "Impossible d'ouvrir le fichier ($this->filename)";
         exit;
        }
    }

}