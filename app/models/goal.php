<?php
    class goal{
        private $id;
        private $user_id;
        private $excercise_id;
        private $target;
        private $deadline;
        private $status;

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
            $this->excercise_id = $excercise_id;

            return $this;
        }

        public function getExcercise(): int
        {
            return $this->excercise_id;
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