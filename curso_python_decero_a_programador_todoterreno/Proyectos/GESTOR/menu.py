import os
import helpers
import database as db


def launch():
    CUSTOMER_NOT_FOUND = "Customer not found❌"
    DNI_LENGTH = "DNI (8 int 1 char)"

    while True:
        helpers.clean_screen()
        helpers.show_menu()

        opcion = input("> ")
        helpers.clean_screen()
        customers_list = db.Customers.customers_list

        match opcion:
            case "1":
                print("Listing customers...\n")
                for customer in customers_list:
                    print(customer)
            case "2":
                print("Looking for a customer...\n")
                dni = helpers.read_text(9, 9, DNI_LENGTH).upper()
                customer = db.Customers.find(dni)
                print(customer) if customer else print(CUSTOMER_NOT_FOUND)
            case "3":
                print("Adding a customer...\n")

                dni = None
                while True:
                    dni = helpers.read_text(9, 9, DNI_LENGTH).upper()
                    if helpers.validate_dni(dni, customers_list):
                        break
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

                if not customer:
                    print(CUSTOMER_NOT_FOUND)
                    return

                name = helpers.read_text(2, 30, f"New name for {customer.name}: ").capitalize()
                surname = helpers.read_text( 2, 30, f"New surname for {customer.surname}: ").capitalize()
                db.Customers.update(dni, name, surname)
                print("Customer modified ✅")

            case "5":
                print("Deleting a customer...\n")
                dni = helpers.read_text(9, 9, DNI_LENGTH).upper()
                print("Customer successfully deleted ✅") if db.Customers.delete(
                    dni
                ) else print(CUSTOMER_NOT_FOUND)
            case "6":
                print("Leaving...\n")
                break
            case _:
                print("Please choose one of the options above...\n")

        input("\nPress ENTER to continue...")
