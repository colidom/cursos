def get_full_name(first_name: str, last_name: str):
    """Generate a full name from first and last names.
    Args:
        first_name (str): The first name.
        last_name (str): The last name.
    Returns:
        str: The full name formatted as "First Last".
    """
    full_name = first_name.title() + " " + last_name.title()
    return full_name


print(get_full_name("john", "doe"))


def get_name_with_age(name: str, age: int):
    """Generate a string with name and age.
    Args:
        name (str): The name of the person.
        age (int): The age of the person.
    Returns:
        str: A string formatted as "Name is this old: Age".
    """
    name_with_age = name.capitalize() + " is this old: " + str(age)
    return name_with_age


print(get_name_with_age("john", "33"))


def get_items(item_a: str, item_b: int, item_c: float, item_d: bool, item_e: bytes):
    """Return a tuple of various items.
    Args:
        item_a (str): A string item.
        item_b (int): An integer item.
        item_c (float): A float item.
        item_d (bool): A boolean item.
        item_e (bytes): A bytes item.
    Returns:
        tuple: A tuple containing the items in the order they were passed.
    """
    return item_a, item_b, item_c, item_d, item_d, item_e


print(get_items("apple", 5, 3.14, True, b"hello"))


def process_items(items: list[str]):
    """Process a list of items.
    Args:
        items (list[str]): A list of string items.
    Returns:
        None
    """
    for item in items:
        print(item)


items_list = ["apple", "banana", "cherry"]
print(process_items(items_list))


def process_items_tuple(items_t: tuple[int, int, str], items_s: set[bytes]):
    """Process a tuple and a set of items.
    Args:        items_t (tuple[int, int, str]): A tuple containing two integers and a string.
        items_s (set[bytes]): A set containing byte strings.
    Returns:
        tuple[int, int, str]: The input tuple.
        set[bytes]: The input set.
    """
    return items_t, items_s


items_tuple = (1, 2, "apple")
items_set = {b"apple", b"banana", b"cherry"}
print(process_items_tuple(items_tuple, items_set))


def process_items_dict(prices: dict[str, float]):
    """Process a dictionary of item prices.
    Args:
        prices (dict[str, float]): A dictionary where keys are item names and values are their prices.
    Returns:
        None
    """
    for item_name, item_price in prices.items():
        print(item_name)
        print(item_price)


prices_dict = {"apple": 1.0, "banana": 0.5, "cherry": 2.0}
print(process_items_dict(prices_dict))


def process_item(item: int | str):
    """Process an item that can be either an integer or a string.
    Args:
        item (int | str): The item to process, which can be an integer or a string.
    Returns:
        None
    """
    print(item)


item_var: int | str = 42  # This variable can be either an int or a str
print(process_item(item_var))  # or a str


from typing import Optional


def say_hi(name: str | None = None):
    """Greet a person by name or say hello to the world.
    Args:
        name (str | None): The name of the person to greet. If None, a generic greeting is used.
    Returns:
        None
    """
    if name is not None:
        print(f"Hey {name}!")
    else:
        print("Hello World")


say_hi("John")  # This will print "Hey John!"
say_hi()  # This will print "Hello World" since no name is provided


class Person:
    """A class representing a person with a name."""

    def __init__(self, name: str):
        self.name = name


def get_person_name(one_person: Person):
    """Get the name of a person.
    Args:
        one_person (Person): An instance of the Person class.
    Returns:
        str: The name of the person.
    """
    return one_person.name


person_instance = Person("Alice")
print(get_person_name(person_instance))  # This will print "Alice"


from datetime import datetime

from pydantic import BaseModel


class User(BaseModel):
    """A class representing a user with various attributes."""

    id: int
    name: str = "John Doe"
    signup_ts: datetime | None = None
    friends: list[int] = []


external_data = {
    "id": "123",
    "signup_ts": "2017-06-01 12:22",
    "friends": [1, "2", b"3"],
}

user = User(**external_data)
print(user)
# > User id=123 name='John Doe' signup_ts=datetime.datetime(2017, 6, 1, 12, 22) friends=[1, 2, 3]

print(user.id)
# > 123


from typing import Annotated


def say_hello(name: Annotated[str, "this is just metadata"]) -> str:
    """Greet a person by name.
    Args:
        name (str): The name of the person to greet.
    Returns:
        str: A greeting message.
    """
    return f"Hello {name}"


print(say_hello("Alice"))  # This will print "Hello Alice"
