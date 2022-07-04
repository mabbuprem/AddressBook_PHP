<?php

include "MultipleAddressBook.php";

$multipleAddressBook = new MultipleAddressBook();


while (true) {

    echo "MENU\n1. To add The new AddressBook\n2. To Add contact in AddressBook\n"
        . "3. To Edit the contact in AddressBook\n4. To Delete the AddressBook\n"
        . "5. To Delete the contact in AddressBook\n"
        . "6. To Display the AddressBook\n"
        . "7. Search person from a city\n"
        . "8. Search person from a State\n"
        . "9. Count of contacts by City or State\n0. To exit\n";;

    $option = readline("Choose your option : ");
    switch ($option) {
        case 1:
            $multipleAddressBook->addAddressBook();
            break;
        case 2:
            $multipleAddressBook->addContactInAddressBook();
            break;
        case 3:
            $multipleAddressBook->editContactInAddressBook();
            break;
        case 4:
            $multipleAddressBook->deleteAddressBook();
            break;
        case 5:
            $multipleAddressBook->deleteContactInAddressBook();
            break;
        case 6:
            $multipleAddressBook->displayContact();
            break;
        case 7:
            $cityName = readline("Enter city name : ");
            $multipleAddressBook->searchPersonByCity($cityName);
            break;
            case 8:
                $name = readline("Enter state name : ");
                echo "Number of contact persons in " . $name . " is " . $multipleAddressBook->contactsCount($name) . "\n";
                break;
            case 9:
                $multipleAddressBook->sorting();
                break;
            case 0:
                echo "---Exit From AddressBook---";
                exit;
                break;
            default:
                echo "Please choose your Option !!\n";
        }
    }