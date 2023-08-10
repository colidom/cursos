import os


def launch():
    while True:
        os.system("clear")  # cls in Windows

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
        os.system("clear")  # cls en Windows

        if opcion == "1":
            print("Listing customers...\n")
        if opcion == "2":
            print("Looking for a customer...\n")
        if opcion == "3":
            print("Adding a customer...\n")
        if opcion == "4":
            print("Modifying a customer...\n")
        if opcion == "5":
            print("Deleting a customer...\n")
        if opcion == "6":
            print("Leaving...\n")
            break

        input("\nPress ENTER to continue...")
