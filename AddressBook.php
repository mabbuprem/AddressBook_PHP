<?php


include "ContactDetails.php";

class AddressBook
{

    //public $contactArray = [];
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

        //pushing the elements to  array
        //$this->contactArray[] = $this->person;
        // $this->displayContactDetails();
        return $this->person;
    }

    /**Edit contact details by set method */
    public function editContact()
    {
        echo "1->To Edit FirstName\n 2->To Edit LastName\n 3->To Edit Address\n 4->To Edit City\n 5->To Edit State\n 6->To Edit Zip\n 7->To Edit Phone Number\n 8->To Edit Email\n";
        $option = readline("Choose which Information You want to Edit : \n");

        switch ($option) {
            case 1:
                $firstName = readline("Edit First Name : ");
                $this->person->setFirstName($firstName);
                break;
            case 2:
                $lastName = readline("Edit Last Name : ");
                $this->person->setLastName($lastName);
                break;
            case 3:
                $address = readline("Edit Address : ");
                $this->person->setAddress($address);
                break;
            case 4:
                $city = readline("Edit City : ");
                $this->person->setCity($city);
                break;
            case 5:
                $state = readline("Edit State : ");
                $this->person->setState($state);
                break;
            case 6:
                $zip = readline("Edit ZipCode : ");
                $this->person->setZip($zip);
                break;
            case 7:
                $phoneNumber = readline("Edit Phone Number : ");
                $this->person->setPhoneNumber($phoneNumber);
                break;
            case 8:
                $email = readline("Edit EmailId : ");
                $this->person->setEmail($email);
                break;
            default:
                echo "Choose Any one of the Option !! ";
        }


        return $this->person;
    }



    /**Delete contact by first name 
     * Used Unset function to remove the element from an array
     */
    public function deleteContact($book)
    {
        $deleteName = readline("Enter the first name of person to delete contact : ");
        foreach ($book as $key => $values) {
            for ($i = 0; $i < count($values); $i++) {
                $name = $values[$i];
                if ($deleteName == $name->getFirstName()) {
                    unset($values[$i]);
                }
            }
        }
        return $book;
    }
}