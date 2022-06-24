<?php


include "ContactDetails.php";

class AddressBookSystem
{

    public $contactArray = [];
    public $person;


    function welcome()
    {
        echo "Welcome to AddressBook system\n";
    }
    
    function addContact()
    {
        $this->firstName  = readline("Enter your first name : ");
        $this->lastName   = readline("Enter your last name : ");
        $this->address    = readline("Enter your address : ");
        $this->city       = readline("Enter your city : ");
        $this->state      = readline("Enter your state : ");
        $this->zip        = readline("Enter your zip code : ");
        $this->phoneNumber = readline("Enter your phone Number : ");
        $this->email      = readline("Enter your email : ");

        $this->person = new ContactDetails($this->firstName, $this->lastName, $this->address, $this->city, $this->state, $this->zip, $this->phoneNumber, $this->email);
        array_push($this->contactArray, $this->person);
        $this->contactArray[] = $this->person;

        $this->displayContactDetails();
    }

    function displayContactDetails()
    {
        for ($i = 0; $i < count($this->contactArray); $i++) {

            echo "\nContactDetails :
                 \nName : " . $this->person->getFirstName() . " " . $this->person->getLastName() . "\n"
                . "Address : " . $this->person->getAddress() . "\n"
                . "City : " . $this->person->getCity() . "\n"
                . "State : " . $this->person->getState() . "\n"
                . "ZipCode : " . $this->person->getZip() . "\n"
                . "Phone Number : " . $this->person->getPhoneNumber() . "\n"
                . "Email Id : " . $this->person->getEmail() . "\n";
        }
    }
}



$addressBook = new AddressBookSystem();
$addressBook->welcome();
while (true) {
    $options = readline("\nEnter 1 to Add New Contact\nEnter 2 to Exit\n");
    switch ($options) {
        case 1:
            $addressBook->addContact();
            break;
        case 2:
            echo "Exit From AddressBook";
            exit;

            break;
        case 3:
            echo "Please Choose Option";
    }
}
