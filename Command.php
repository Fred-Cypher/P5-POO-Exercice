<?php

require('ContactManager.php'); 

class Command
{
    private $contactManager;

    public function __construct()
    {
        $this->contactManager = new ContactManager;
    }

    public function list() : void 
    {
        $contacts = $this->contactManager->findAll();

        foreach ($contacts as $contact) {
            echo $contact->__toString();
        }
    }

    public function detail($id) : void
    {
        $contact = $this->contactManager->findById($id);
        echo $contact->__toString();
    } 
}