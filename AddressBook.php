<?php

class AddressBookSystem
{
    public $firstName;
    public $lasrName;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $phoneNumber;
    public $email;

    function welcome()
    {
        echo "Welcome to AddressBook system\n";
    }


    function ContactDetails()
    {
        $this->firstName  = readline("Enter your first name : ");
        $this->lastName   = readline("Enter your last name : ");
        $this->address    = readline("Enter your address : ");
        $this->city       = readline("Enter your city : ");
        $this->state      = readline("Enter your state : ");
        $this->zip        = readline("Enter your zip code : ");
        $this->phoneNumber = readline("Enter your phone Number : ");
        $this->email      = readline("Enter your email : ");
    }

    function displayContactDetails()
    {
        echo "Contact Details  : ";
        echo "\nFirst Name     : " . $this->firstName;
        echo "\nLast Name      : " . $this->lastName;
        echo "\nAddress        : " . $this->address;
        echo "\nCity           : " . $this->city;
        echo "\nState          : " . $this->state;
        echo "\nZip Code       : " . $this->zip;
        echo "\nPhone Number   : " . $this->phoneNumber;
        echo "\nEmail address  : " . $this->email;
    }
}



$addressBook = new AddressBookSystem();
$addressBook->welcome();
$addressBook->ContactDetails();
$addressBook->displayContactDetails();
