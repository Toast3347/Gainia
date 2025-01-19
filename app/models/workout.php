<?php

class workout {
    private $id;
    private $user_id;
    public $name;
    public $date;
    public $time;
    
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTime() {
        return $this->time;
    }

    public function setId($id) 
    { 
        $this->id = $id;
    }

    public function setUserId($userId) {
        $this->user_id = $userId;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function setTime($time) {
        $this->time = $time;
        return $this;
    }

}