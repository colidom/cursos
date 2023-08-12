import os
import helpers


def launch():
    while True:
        helpers.clean_screen()

        print("========================")
        print("  Welcome to Manager ")
        print("========================")
        print("[1] Customers List      ")
        print("[2] Find Customer       ")
        print("[3] Add Customer        ")
        print("[4] Modify Customer     ")
        print("[5] delete Customer     ")
        print("[6] Close the Manager   ")
        print("========================")

        opcion = input("> ")
        helpers.clean_screen()

        match opcion:
            case "1":
                print("Listing customers...\n")
            case "2":
                print("Looking for a customer...\n")
            case "3":
                print("Adding a customer...\n")
            case "4":
                print("Modifying a customer...\n")
            case "5":
                print("Deleting a customer...\n")
            case "6":
                print("Leaving...\n")
            case _:
                print("Please choose one of the options above...\n")

        input("\nPress ENTER to continue...")
