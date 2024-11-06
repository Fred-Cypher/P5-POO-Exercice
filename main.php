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

    if (preg_match("/^create (.*), (.*), (.*)$/", $line, $matches)){
        $command = new Command;

        echo $command->create($matches[1], $matches[2], $matches[3]);
    }
}