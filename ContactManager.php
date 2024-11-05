<?php

require 'DBConnect.php'; 
require 'Contact.php';

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

        $contacts = $query->fetchAll();

        $result = [];

        foreach($contacts as $contact){
            $result[]= new Contact($contact['id'], $contact['name'], $contact['email'], $contact['telephone']);
        }

        return $result;
    }

    public function findById(int $id): ?Contact
    {
        $query = $this->db->prepare("SELECT * FROM contact WHERE id = :id");
        $query->execute(['id' => $id]);

        $contact = $query->fetch(PDO::FETCH_ASSOC);

        $contact = Contact::fromContactsArray($contact);

        return $contact;
    }
}