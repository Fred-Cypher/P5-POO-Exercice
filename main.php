<?php
require('Command.php');

while (true) {
    $line = readline("Entrez votre commande : ");

    if ($line == 'list'){
        $command = new Command;

        echo $command->list();
    }

    if (preg_match("/^detail (.*)$/", $line, $matches)) {
        $command = new Command;

        echo $command->detail($matches[1]);
    }
}