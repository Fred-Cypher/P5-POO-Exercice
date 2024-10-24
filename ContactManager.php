<?php

require 'DBConnect.php'; 

$db = DBConnect::getInstance()->getPDO();

class ContactManager
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnect::getInstance()->getPDO();
    }

    public function findAll(): array
    {
        $query = $this->db->prepare("SELECT * FROM contact");
        $query->execute();

        $contacts = [];

        return $contacts;
    }
}
