class Customer:
    def __init__(self, dni, name, surname) -> None:
        self.dni = dni
        self.name = name
        self.surname = surname

    def __str__(self) -> str:
        return f"({self.dni}) {self.name} {self.surname}"


class Customers:
    customers_list: list = []

    @staticmethod
    def find(dni):
        for customer in Customers.customers_list:
            if customer.dni == dni:
                return customer

    @staticmethod
    def create(dni, name, surname):
        customer = Customer(dni, name, surname)
        Customers.customers_list.append(customer)
        return customer

    @staticmethod
    def update(dni, name, surname):
        for index, customer in enumerate(Customers.customers_list):
            if customer.dni == dni:
                Customers.customers_list[index].name = name
                Customers.customers_list[index].surname = surname
                return Customers.customers_list[index]

    @staticmethod
    def delete(dni):
        for index, customer in enumerate(Customers.customers_list):
            if customer.dni == dni:
                return Customers.customers_list.pop[index]
