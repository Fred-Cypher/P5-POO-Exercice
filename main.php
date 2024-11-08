<?php

require('Command.php');

/**
 * Boucle pour passer les instructions au programme
 */
while (true) {
    // Affichage des instructions du programme
    $line = readline("Entrez votre commande (help, list, detail, create, delete, quit) : ");

    // Affichage de la liste des contacts
    if ($line == 'list') {
        $command = new Command;

        echo $command->list();
        continue;
    }

    // Affichage d'un contact à partir de son id
    if (preg_match("/^detail (.*)$/", $line, $matches)) {
        $command = new Command;

        echo $command->detail($matches[1]);
        continue;
    }

    // Création d'un nouveau contact
    if (preg_match("/^create (.*), (.*), (.*)$/", $line, $matches)) {
        $command = new Command;

        echo $command->create($matches[1], $matches[2], $matches[3]);
        continue;
    }

    // Suppression d'un contact
    if (preg_match("/^delete (.*)$/", $line, $matches)) {
        $command = new Command;

        echo $command->delete($matches[1]);
        continue;
    }

    // Affichage des commandes disponibles
    if ($line == 'help') {
        $command = new Command;

        echo $command->help();
        continue;
    }

    // Sortie de l'application
    if ($line == 'quit') {
        break;
    }

    // Message d'erreur en cas de commande erronée
    echo "Cette commande n'existe pas, vérifiez les commandes disponibles en executant la commande help \n";
}
