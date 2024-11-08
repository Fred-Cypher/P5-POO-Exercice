<?php

require 'DBConnect.php';
require 'Contact.php';

$db = DBConnect::getInstance()->getPDO();

class ContactManager
{
    private $db;

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->db = DBConnect::getInstance()->getPDO();
    }

    /**
     * Récupère les contacts dans la base de données
     *
     * @return array
     */
    public function findAll(): array
    {
        $query = $this->db->prepare("SELECT * FROM contact");
        $query->execute();

        $contacts = $query->fetchAll();

        $result = [];

        foreach ($contacts as $contact) {
            $result[] = new Contact($contact['id'], $contact['name'], $contact['email'], $contact['telephone']);
        }

        return $result;
    }

    /**
     * Récupère un contact dans la base de données à partir de son id
     *
     * @param integer $id
     * @return Contact|null
     */
    public function findById(int $id): ?Contact
    {
        $query = $this->db->prepare("SELECT * FROM contact WHERE id = :id");
        $query->execute(['id' => $id]);

        $contact = $query->fetch(PDO::FETCH_ASSOC);

        $contact = Contact::fromContactsArray($contact);

        return $contact;
    }

    /**
     * Permet de créer un contact et de l'enregistrer dans la base de données
     *
     * @param string $name
     * @param string $email
     * @param string $telephone
     * @return Contact
     */
    public function newContact(string $name, string $email, string $telephone): Contact
    {
        $query = $this->db->prepare("INSERT INTO contact (name, email, telephone) values (:name, :email, :telephone)");

        $query->execute(["name" => $name, "email" => $email, "telephone" => $telephone]);

        $id = $this->db->lastInsertId();

        return $this->findById($id);
    }

    /**
     * Permet de supprimer un contact de la base de données
     *
     * @param integer $id
     * @return void
     */
    public function deleteContact(int $id): void
    {
        $query = $this->db->prepare("DELETE FROM contact WHERE id = :id");

        $query->execute(['id' => $id]);
    }
}
