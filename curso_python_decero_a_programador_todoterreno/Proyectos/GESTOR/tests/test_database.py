import copy
import unittest
import database as db


class TestDatabase(unittest.TestCase):
    def setUp(self):
        db.Customers.customers_list = [
            db.Customer("00000000T", "Martha", "Smith"),
            db.Customer("11111111T", "Jhon", "Doe"),
            db.Customer("33333333T", "Tim", "Berners-Lee"),
        ]

    def test_find_customer(self):
        existing_customer = db.Customers.find("00000000T")
        unexisting_customer = db.Customers.find("66666666T")
        self.assertIsNotNone(existing_customer)
        self.assertIsNone(unexisting_customer)

    def test_create_customer(self):
        new_customer = db.Customers.create("444444444T", "Carlos", "Oliva")
        self.assertEqual(len(db.Customers.customers_list), 4)
        self.assertEqual(new_customer.dni, "444444444T")
        self.assertEqual(new_customer.name, "Carlos")
        self.assertEqual(new_customer.surname, "Oliva")

    def test_update_customer(self):
        customer = copy.copy(db.Customers.find("00000000T"))
        modified_customer = db.Customers.update("00000000T", "Steve", "Jobs")
        self.assertEqual(customer.name, "Martha")
        self.assertEqual(modified_customer.name, "Steve")

    def test_delete_customer(self):
        deleted_customer = db.Customers.delete("00000000T")
        find_customer = db.Customers.find("00000000T")
        self.assertNotEqual(deleted_customer, find_customer)


if __name__ == "__main__":
    unittest.main()
