<?php
include "AddressBook.php";

class MultipleAddressBook
{
    public $contactArray;
    public $addressBook;

    public function __construct()
    {
        $this->addressBook = new AddressBook();
        $this->contactArray = [];
    }

    public function addAddressBook()
    {
        $addressBookName = readline("Enter the Name of Address Book :  \n");

        if (array_key_exists($addressBookName, $this->contactArray)) {
            echo " This AddressBook already Exists!!\n";
            $this->addAddressBook();
        } else {
            $this->contactArray[$addressBookName] = NULL;
            $newAdderssBook = readline("Enter 1 to add new Address book :   \n");
            if ($newAdderssBook == 1) {
                $this->addAddressBook();
            } else {
                return 0;
            }
        }
    }

    public function addContactInAddressBook()
    {

        $newBookContact = readline("Enter the name of AddressBook  to add the contact \n");
        $size = readline("Enter  the number of contacts you want to add \n");

        if (array_key_exists($newBookContact, $this->contactArray)) {

            for ($i = 0; $i < $size; $i++) {
                $this->contactArray[$newBookContact][$i] = $this->addressBook->addContact();
            }
        } else {
            echo "No Address Book Exist!!";
        }
    }

    public function editContactInAddressBook()
    {
        $editBookName = readline("Enter the Name of AddressBook to edit the contact:   \n");
        $editContact = readline("Enter the FirstName of person to edit the contact : \n ");
        $edit = false;

        if (array_key_exists($editBookName, $this->contactArray)) {
            foreach ($this->contactArray as $key => $values) {
                for ($i = 0; $i < count($values); $i++) {
                    $person = $values[$i];
                    if ($editContact == $person->getFirstName()) {
                        $this->contactArray[$key][$i] = $this->addressBook->editContact($values[$i]);
                        $edit = true;
                    }
                }
            }
        } else {
            echo "Addressbook not Exist!!\n";
            $this->editContactInAddressBook();
        }
        if ($edit == false) {
            echo "This person not exist !! \n";
            $this->editContactInAddressBook();
        }
    }

    public function deleteAddressBook()
    {
        $bookName = readline("Enter Name of Address Book you want to delete: \n");
        if (array_key_exists($bookName, $this->contactArray)) {
            unset($this->contactArray[$bookName]);
        } else {
            echo "AddressBook doesn't exist !!";
            $this->deleteAddressBook();
        }
    }

    public function deleteContactInAddressBook()
    {
        $bookName = readline("Enter Name of Address Book you want to delete the contacts in it : \n");
        $deleteName = readline("\n Enter the first name of person to delete contact \n");
        if (array_key_exists($bookName, $this->contactArray)) {
            foreach ($this->contactArray as $key => $values) {
                for ($i = 0; $i < count($values); $i++) {
                    $person = $values[$i];
                    if ($deleteName == $person->getFirstName()) {
                        unset($this->contactArray[$key][$i]);
                        //$this->contactArray = array_values($this->contactArray);
                    }
                }
            }
        }
    }

    public function displayContact()
    {
        $bookName = readline("\n--Enter Name of Address Book-- \n");
        foreach ($this->contactArray as $key => $values) {
            if ($key == $bookName) {
                echo $key . " Address Book : \n";
                foreach ($values as $contact) {
                    echo $contact;
                }
            } else {
                echo "Address Book Not Found :\n";
            }
        }
    }
}