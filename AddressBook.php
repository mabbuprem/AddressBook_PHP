<?php


include "ContactDetails.php";

class AddressBookSystem
{

    public $contactArray = [];
    public $person;


    function welcome()
    {
        echo "\n----Welcome to AddressBook system------\n";
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
        //array_push($this->contactArray, $this->person);

        //pushing the elements to the array
        $this->contactArray[] = $this->person;

        $this->displayContactDetails();
    }

    public function editContact()
    {
        $editName = readline("Enter the first name of person to edit contact : ");
        $edit = false;
        for ($i = 0; $i < count($this->contactArray); $i++) {
            $name = $this->contactArray[$i];
            echo $name->getFirstName();
            if ($editName == $name->getFirstName()) {
                $firstName = readline("Edit First Name : ");
                $lastName = readline("Edit Last Name : ");
                $address = readline("Edit Address : ");
                $city = readline("Edit City : ");
                $state = readline("Edit State : ");
                $zip = readline("Edit ZipCode : ");
                $phoneNumber = readline("Edit Phone Number : ");
                $email = readline("Edit EmailId : ");

                $name->setFirstName($firstName);
                $name->setLastName($lastName);
                $name->setAddress($address);
                $name->setCity($city);
                $name->setState($state);
                $name->setZip($zip);
                $name->setPhoneNumber($phoneNumber);
                $name->setEmail($email);

                $this->contactArray[$i] = $name;
                $this->displayContactDetails();

                $edit = true;
                break;
            }
        }
        if (!$edit) {
            echo "\nThe Name You Entered does not exist\n";
        }
    }

    public function deleteContact()
    {
        $deleteName = readline("Enter the first name of person to delete contact : ");

        for ($i = 0; $i < count($this->contactArray); $i++) {
            $name = $this->contactArray[$i];
            if ($deleteName == $name->getFirstName()) {
                unset($this->contactArray[$i]);
                $this->displayContactDetails();
            }
        }
    }

    function displayContactDetails()
    {
        for ($i = 0; $i < count($this->contactArray); $i++) {

            foreach ($this->contactArray as $contact) {
                echo $contact;
            }
        }
    }
}


//Creating Object for AddressBook Class
$addressBook = new AddressBookSystem();
$addressBook->welcome();

//Loop will run Infinite times till we choose exit.
while (true) {
    $options = readline("\nEnter 1 to Add New Contact \nEnter 2 to Edit Contact\nEnter 3 to Delete Contact\nEnter 4 to exit ");
    switch ($options) {
        case 1:
            $addressBook->addContact();
            break;
        case 2:
            $addressBook->editContact();
            break;
        case 3:
            $addressBook->deleteContact();
            break;
        case 4:
            echo "Exit From AddressBook";
            exit;
            break;
        default:
            echo "Please Choose Option";
    }
}