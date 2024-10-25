<?php

require_once('DBConnect.php');

class Contact
{
    private int $id;
    private string $name;
    private string $email;
    private string $telephone;
        
    /**
     * __construct
     *
     * @param  mixed $id
     * @param  mixed $name
     * @param  mixed $email
     * @param  mixed $telephone
     * @return void
     */
    public function __construct($id = null, $name = null, $email = null, $telephone = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->telephone = $telephone;
    }

    public function __toString()
    {
        return $this->id . ", " . $this->name . ", " . $this->email . ", " . $this->telephone . "\n";
    }

    /**
     * getId
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * setId
     *
     * @param  mixed $id
     * @return void
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    
    /**
     * getName
     *
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    
    /**
     * setName
     *
     * @param  mixed $name
     * @return void
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
    
    /**
     * getEmail
     *
     * @return string
     */
    public function getEmail(): ?string 
    {
        return $this->email;
    }
    
    /**
     * setEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    
    /**
     * getTelephone
     *
     * @return string
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }
    
    /**
     * setTelephone
     *
     * @return void
     */
    public function setTelephone($telephone) : void 
    {
        $this->telephone = $telephone;
    }
}