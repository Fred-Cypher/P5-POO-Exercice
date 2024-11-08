<?php

require('ContactManager.php');

class Command
{
    private $contactManager;

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->contactManager = new ContactManager;
    }

    /**
     * Affichage de tous les contacts
     *
     * @return void
     */
    public function list(): void
    {
        $contacts = $this->contactManager->findAll();

        foreach ($contacts as $contact) {
            echo $contact->__toString();
        }
    }

    /**
     * Affichage d'un seul contact à partir de son id
     *
     * @param [type] $id
     * @return void
     */
    public function detail($id): void
    {
        $contact = $this->contactManager->findById($id);
        echo $contact->__toString();
    }

    /**
     * Enregistrement d'un nouveau contact
     *
     * @param [type] $name
     * @param [type] $email
     * @param [type] $telephone
     * @return void
     */
    public function create($name, $email, $telephone): void
    {
        $contact = $this->contactManager->newContact($name, $email, $telephone);

        echo "Nouveau contact créé avec succès \n" . $contact->__toString();
    }

    /**
     *Suppression d'un contact à partir de son id
     * @param [type] $id
     * @return void
     */
    public function delete($id): void
    {
        $this->contactManager->deleteContact($id);

        echo "Le contact a bien été supprimé \n";
    }

    // Affichage de la liste des commandes disponibles
    public function help(): void
    {
        echo "Liste des commandes disponibles : \n
        help : afficher les différentes commandes \n
        list : afficher tous les contacts \n
        detail : afficher un contact à partir de son id, commande : detail id \n
        create : créer un nouveau contact, commande : create nom, email, numéro de téléphone \n
        delete : supprimer un contact à partir de son id, commande : delete id \n
        quit : quitter l'application \n \n";
    }
}
