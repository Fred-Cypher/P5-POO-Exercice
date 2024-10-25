<?php
require('ContactManager.php');

while (true) {
    $line = readline("Entrez votre commande : ");
    //echo "Vous avez saisi : $line\n";
    if ($line == 'list'){
        $contactManager = new ContactManager;

        $contacts = $contactManager->findAll();

        foreach($contacts as $contact){
            echo $contact->__toString();
        }
    }
}