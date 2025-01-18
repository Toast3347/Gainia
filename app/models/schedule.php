<?php
    class schedule{
        private $id;
        private $user_id;
        private $excercise_id;
        private $day;
        private $time;
        
        public function getId() {
            return $this->id;
        }
    
        public function getUserId() {
            return $this->user_id;
        }
    
        public function getExerciseId() {
            return $this->excercise_id;
        }
    
        public function getDay() {
            return $this->day;
        }
    
        public function getTime() {
            return $this->time;
        }

        
    }