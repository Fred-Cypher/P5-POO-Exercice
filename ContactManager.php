<?php

class ContactManager
{
    private $cnx;

    public function __construct()
    {
        $this->cnx = DBConnect::getInstance()->getPDO();
    }

    public function findAll(): array
    {
        $query = $this->cnx->prepare("SELECT * FROM contact");
        $query->execute();

        $contacts = [];

        return $contacts;
    }
}

?>
<p>Contact Manager</p>