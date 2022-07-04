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
                $firstName = readline("Enter First Name : ");
                foreach ($this->contactArray as $key => $values) {
                    if ($key == $newBookContact) {
                        if ($values == NULL) {
                            $this->contactArray[$newBookContact][$i] = $this->addressBook->addContact($firstName);
                            break;
                        }
                        for ($j = 0; $j < $size; $j++)
                            //if(in_array($firstName, $values)) {
                            if ($firstName == $values[$j]->getFirstName()) {
                                echo "The entered person is already exist.\n";
                                $i--;
                                break;
                            } else {
                                $this->contactArray[$newBookContact][$i] = $this->addressBook->addContact($firstName);
                                echo "Contact added successfully. \n";
                                break;
                            }
                    }
                }
            }
        } else {
            echo "No Address book Exist\n";
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

    public function searchPersonByCity($cityName)
    {
        foreach ($this->contactArray as $key => $values) {
            for ($i = 0; $i < count($values); $i++) {
                if ($cityName == $values[$i]->getCity()) {
                    echo "Address Book : " . $key . "\n";
                    echo "First Name : " . $values[$i]->getFirstName() . "\n";
                    echo "Last Name : " . $values[$i]->getLastName() . "\n";
                    echo "\n";
                }
            }
        }
    }

    public function searchPersonByState($stateName)
    {
        foreach ($this->contactArray as $key => $values) {
            for ($i = 0; $i < count($values); $i++) {
                if ($stateName == $values[$i]->getState()) {
                    echo "Address Book : " . $key . "\n";
                    echo "First Name : " . $values[$i]->getFirstName() . "\n";
                    echo "Last Name : " . $values[$i]->getLastName() . "\n";
                    echo "\n";
                }
            }
        }
    }

    public function searchPerson()
    {
        echo "1. for search by city \n2 . for search by state\n";
        $option = readline();
        switch ($option) {
            case 1:
                $cityName = readline("Enter city name : ");
                $this->searchPersonByCity($cityName);
                break;
            case 2:
                $stateName = readline("Enter state name : ");
                $this->searchPersonByState($stateName);
                break;
            default:
                echo "Invalid Input :\n";
                continue;
        }
    }


    public function contactsCount($name)
    {
        $count = 0;
        foreach ($this->contactArray as $key => $values) {
            for ($i = 0; $i < count($values); $i++) {
                if ($name == $values[$i]->getState() || $name == $values[$i]->getCity()) {
                    $count++;
                }
            }
        }
        return $count;
    }

    public function sorting()
    {
        echo "1. View By first name \n2. View By city \n3. View By state \n4. View by Zip code \n5. Back\n";
        $sort = readline();
        switch ($sort) {
            case 1:
                $this->sortByName();
                break;
            case 2:
                $this->sortByCity();
                break;
            case 3:
                $this->sortByState();
                break;
            case 4:
                $this->sortByZipCode();
                break;
            case 5:
                return;
            default:
                echo "Invalid choice \n";
        }
    }

    public function sortByName()
    {
        $addressBook = readline("Enter Name of Address Book : ");
        foreach ($this->contactArray as $key => $values) {
            if ($key == $addressBook) {
                $num = count($values);
                for ($i = 0; $i < $num - 1; $i++) {
                    for ($j = $i + 1; $j <= $num - 1; $j++) {
                        if ($values[$i]->getFirstName() > $values[$j]->getFirstName()) {
                            $tmp = $values[$i];
                            $values[$i] = $values[$j];
                            $values[$j] = $tmp;
                        }
                    }
                }
                foreach ($values as $contact) {
                    echo $contact;
                }
            }
        }
    }

    public function sortByCity()
    {
        $addressBook = readline("Enter Name of Address Book : ");
        foreach ($this->contactArray as $key => $values) {
            if ($key == $addressBook) {
                $num = count($values);
                for ($i = 0; $i < $num - 1; $i++) {
                    for ($j = $i + 1; $j <= $num - 1; $j++) {
                        if ($values[$i]->getCity() > $values[$j]->getCity()) {
                            $tmp = $values[$i];
                            $values[$i] = $values[$j];
                            $values[$j] = $tmp;
                        }
                    }
                }
                foreach ($values as $contact) {
                    echo $contact;
                }
            }
        }
    }

    /**
     * sortByName method is used to sort the address book contact by state
     */
    public function sortByState()
    {
        $addressBook = readline("Enter Name of Address Book : ");
        foreach ($this->contactArray as $key => $values) {
            if ($key == $addressBook) {
                $num = count($values);
                for ($i = 0; $i < $num - 1; $i++) {
                    for ($j = $i + 1; $j <= $num - 1; $j++) {
                        if ($values[$i]->getState() > $values[$j]->getState()) {
                            $tmp = $values[$i];
                            $values[$i] = $values[$j];
                            $values[$j] = $tmp;
                        }
                    }
                }
                foreach ($values as $contact) {
                    echo $contact;
                }
            }
        }
    }

    /**
     * sortByName method is used to sort the address book contact by zip code
     */
    public function sortByZipCode()
    {
        $addressBook = readline("Enter Name of Address Book : ");
        foreach ($this->contactArray as $key => $values) {
            if ($key == $addressBook) {
                $num = count($values);
                for ($i = 0; $i < $num - 1; $i++) {
                    for ($j = $i + 1; $j <= $num - 1; $j++) {
                        if ($values[$i]->getZip() > $values[$j]->getZip()) {
                            $tmp = $values[$i];
                            $values[$i] = $values[$j];
                            $values[$j] = $tmp;
                        }
                    }
                }
                foreach ($values as $contact) {
                    echo $contact;
                }
            }
        }
    }
}
