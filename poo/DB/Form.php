<?php
class Form {
    private $data="toto";
    private $surround="p";

    public function __construct($data){
        $this->data=$data;
    }

    private function getValue($index =null){
        //if ($index&&isset($this->data[$index])) return $this->data[$index];
    }
    private function surround($html){
        return "<".$this->surround.">".$html."</".$this->surround.">";
    }
    public function input($name,$type) {
        return $this->surround("<input  name='$name' type='$type' value='".$this->getValue($name)."'/>");
    }

    public function submit($label){
        return $this->surround("<button type='submit'>$label</>");
    }
}
?>