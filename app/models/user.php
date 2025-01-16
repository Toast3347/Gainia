<?php

class user {
    private $id;
    private $username;
    private $password;
    private $salt;
    private $height;
    private $weight;
    private $age;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserName(): string
    {
        return $this->username;
    }

    public function setUserName(string $userName): self
    {
        $this->username = $userName;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function checkPassword(): string
    {
        return $this->password . $this->salt;
    }

    public function setPassword(string $password): self
    {
        $salt = bin2hex(random_bytes(16));
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->salt = $salt;
        return $this;
    }

    public function getSalt(){
        return $this->salt;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function setHeight(string $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }
    

}