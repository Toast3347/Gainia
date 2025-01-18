<?php
    class goal{
        private $id;
        private $user_id;
        private $exercise_id;
        private $target;
        private $deadline;
        private $status;
        private $exercise_name;


        public function getExerciseName(): string
        {
            return $this->exercise_name;
        }
    
        public function setExerciseName(string $exercise_name): self
        {
            $this->exercise_name = $exercise_name;
            return $this;
        }

        public function setId(string $Id): self
        {
            $this->id = $Id;

            return $this;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function setUserId(string $userId): self
        {
            $this->user_id = $userId;

            return $this;
        }

        public function getUserId(): int
        {
            return $this->user_id;
        }


        public function setExercise(int $excercise_id): self
        {
            $this->exercise_id = $excercise_id;

            return $this;
        }

        public function getExcercise(): int
        {
            return $this->exercise_id;
        }

        public function setTarget(int $target): self
        {
            $this->target = $target;

            return $this;
        }

        public function getTarget(): int
        {
            return $this->target;
        }

        public function setDeadline(string $deadline): self
        {
            $this->deadline = $deadline;

            return $this;
        }

        public function getDeadline(): string
        {
            return $this->deadline;
        }

        public function setStatus(string $status): self
        {
            $this->status = $status;

            return $this;
        }

        public function getStatus(): string
        {
            return $this->status;
        }    
    }