<?php
require('Command.php');

while (true) {
    $line = readline("Entrez votre commande : ");

    if ($line == 'list'){
        $command = new Command;

        echo $command->list();
    }
}