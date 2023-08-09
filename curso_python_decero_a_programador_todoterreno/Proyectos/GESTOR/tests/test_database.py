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
