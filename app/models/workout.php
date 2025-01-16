<?php

class workout {
    private $id;
    private $user_id;
    private $name;
    private $date;
    private $time;
    
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
}