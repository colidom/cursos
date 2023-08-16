import helpers, database as db

CUSTOMER_NOT_FOUND = "Customer not found❌"
DNI_LENGTH = "DNI (8 int 1 char)"


def launch() -> None:
    while True:
        helpers.clean_screen()
        helpers.show_options()

        opcion = input("> ")
        helpers.clean_screen()

        match opcion:
            case "6":
                print("Leaving...\n")
                break
            case "1":
                print("Listing customers...\n", *db.Customers.customers_list, sep="\n")
            case "2":
                find_customer()
            case "3":
                add_customer()
            case "4":
                modify_customer()
            case "5":
                delete_customer()
            case _:
                print("Please choose one of the menu options...\n")
        input("\nPress ENTER to continue...")


def find_customer() -> None:
    print("Looking for a customer...\n")
    dni = helpers.read_text(9, 9, DNI_LENGTH).upper()
    customer = db.Customers.find(dni)
    print(customer) if customer else print(CUSTOMER_NOT_FOUND)


def add_customer() -> None:
    print("Adding a customer...\n")
    dni = helpers.read_text(9, 9, DNI_LENGTH).upper()
    if helpers.validate_dni(dni, db.Customers.customers_list):
        name = helpers.read_text(2, 30, "Name (2 int 30 char)").capitalize()
        surname = helpers.read_text(2, 30, "Surname (2 int 30 char)").capitalize()
        db.Customers.create(dni, name, surname)
        print("Customer added ✅")


def modify_customer() -> None:
    print("Modifying a customer...\n")
    dni = helpers.read_text(9, 9, DNI_LENGTH).upper()
    customer = db.Customers.find(dni)
    if customer:
        modify_existing_customer(customer)
    else:
        print(CUSTOMER_NOT_FOUND)


def modify_existing_customer(customer: db.Customer) -> None:
    name = helpers.read_text(2, 30, f"New name for {customer.name}: ").capitalize()
    surname = helpers.read_text(
        2, 30, f"New surname for {customer.surname}: "
    ).capitalize()
    db.Customers.update(customer.dni, name, surname)
    print("Customer modified ✅")


def delete_customer() -> None:
    print("Deleting a customer...\n")
    dni = helpers.read_text(9, 9, DNI_LENGTH).upper()
    print("Customer successfully deleted ✅") if db.Customers.delete(dni) else print(
        CUSTOMER_NOT_FOUND
    )
