<?php

class AddressBookSystem
{
   
    function welcome()
    {
        echo "Welcome to AddressBook system\n";
    }
}

$addressBook = new AddressBookSystem();
$addressBook->welcome();
