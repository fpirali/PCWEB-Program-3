<?php
class Training {
    private $training_code, $training_name, $training_location, $training_date, $training_time;

    public function __construct($training_name, $training_location, $training_date, $training_time) {
        $this->training_name = $training_name;
        $this->training_location = $training_location;
        $this->training_date = $training_date;
        $this->training_time = $training_time;
    }

    public function getTrainingCode() {
        return $this->training_code;
    }
    public function setTrainingCode($value) {
        $this->training_code = $value;
    }

    public function getTrainingName() {
        return $this->training_name;
    }
    public function setTrainingName($value) {
        $this->training_name = $value;
    }

    public function getTrainingLocation() {
        return $this->training_location;
    }
    public function setTrainingLocation($value) {
        $this->training_location = $value;
    }

    public function getTrainingDate() {
        return $this->training_date;
    }
    public function setTrainingDate($value) {
        $this->training_date = $value;
    }

    public function getTrainingTime() {
        return $this->training_time;
    }
    public function setTrainingTime($value) {
        $this->training_time = $value;
    }

}
?>