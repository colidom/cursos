import os
import helpers
import database as db


def launch():
    CUSTOMER_NOT_FOUND = "Customer not found❌"
    DNI_LENGTH = "DNI (8 int 1 char)"

    while True:
        helpers.clean_screen()

        print("========================")
        print("  Welcome to Manager ")
        print("========================")
        print("[1] Customers List      ")
        print("[2] Find Customer       ")
        print("[3] Add Customer        ")
        print("[4] Modify Customer     ")
        print("[5] Delete Customer     ")
        print("[6] Close the Manager   ")
        print("========================")

        opcion = input("> ")
        helpers.clean_screen()

        match opcion:
            case "1":
                print("Listing customers...\n")
                for customer in db.Customers.customers_list:
                    print(customer)
            case "2":
                print("Looking for a customer...\n")
                dni = helpers.read_text(9, 9, DNI_LENGTH).upper()
                customer = db.Customers.find(dni)
                print(customer) if customer else print(CUSTOMER_NOT_FOUND)
            case "3":
                print("Adding a customer...\n")
                dni = helpers.read_text(9, 9, DNI_LENGTH).upper()
                name = helpers.read_text(2, 30, "Name (2 int 30 char)").capitalize()
                surname = helpers.read_text(
                    2, 30, "Surname (2 int 30 char)"
                ).capitalize()
                db.Customers.create(dni, name, surname)
                print("Customer successfully added ✅")
            case "4":
                print("Modifying a customer...\n")
                dni = helpers.read_text(9, 9, DNI_LENGTH).upper()
                customer = db.Customers.find(dni)
                if customer:
                    name = helpers.read_text(
                        2, 30, f"Name (2 int 30 char) [{customer.name}]"
                    ).capitalize()
                    surname = helpers.read_text(
                        2, 30, f"Surname (2 int 30 char)[{customer.surname}]"
                    ).capitalize()
                    db.Customers.update(dni, name, surname)
                    print("Customer successfully modified ✅")
                print(CUSTOMER_NOT_FOUND)
            case "5":
                print("Deleting a customer...\n")
                dni = helpers.read_text(3, 3, "DNI (2 int 1 char)").upper()
                print("Customer successfully deleted ✅") if db.Customers.delete(
                    dni
                ) else print(CUSTOMER_NOT_FOUND)
            case "6":
                print("Leaving...\n")
            case _:
                print("Please choose one of the options above...\n")

        input("\nPress ENTER to continue...")
