<?php

    class Exercise implements JsonSerializable {
        private $id;
        private $name;
        private $muscle_group;
        private $description;
        private $user_id;

        public function jsonSerialize() : mixed {
            return get_object_vars($this);
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function setName(string $name): self
        {
            $this->name = $name;

            return $this;
        }

        public function getMuscleGroup(): string
        {
            return $this->muscle_group;
        }

        public function setMuscleGroup(string $muscleGroup): self
        {
            $this->muscle_group = $muscleGroup;

            return $this;
        }

        public function getDescription(): string
        {
            return $this->description;
        }

        public function setDescription(string $description): self
        {
            $this->description = $description;

            return $this;
        }

        public function getUserId(): string
        {
            return $this->user_id;
        }

        public function setUserId(string $userId): self
        {
            $this->user_id = $userId;

            return $this;
        }
    }
?>