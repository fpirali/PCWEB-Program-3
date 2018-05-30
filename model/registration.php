<?php

class registration {
      private $id, $date;

    public function __construct($date) {
        $this->date = $date;
       
    }

    public function getID() {
        return $this->id;
    }
    public function setID($value) {
        $this->id = $value;
    }

    public function getDate() {
        return $this->date;
    }
     public function setDate($value) {
        $this->date = $value;
    }
}
