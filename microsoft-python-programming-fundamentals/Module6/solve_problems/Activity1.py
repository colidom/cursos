"""Activity 1: Making Decisions with Conditional Statements
Introduction
As a data analyst for an online book store, you're tasked with analyzing customer purchasing patterns. The marketing team wants to send special discount codes to customers based on the number of books they’ve purchased. If a customer has purchased enough books, they’ll receive a discount. If they’ve purchased more, they might qualify for an even better discount.

Task 1: Define a Discount Function
You need to write a function that helps the marketing team decide which customers should receive a discount.

Define a function called send_discount that accepts two arguments:

books_purchased: The number of books a customer has purchased.
discount_threshold: The minimum number of books a customer needs to purchase to receive a discount.
The function must print either of the two possible messages, as shown below. Be careful not to miss the punctuation in your print statement.

Discount applied! if the customer qualifies for a discount.
No discount. if the customer does not qualify.
Example:
send_discount(books_purchased=3, discount_threshold=5)
# Output: No discount.

send_discount(books_purchased=7, discount_threshold=5)
# Output: Discount applied!"""


def send_discount(books_purchased, discount_threshold):
    if books_purchased >= discount_threshold:
        print("Discount applied!")
    else:
        print("No discount.")


send_discount(3, 5)  # Should print No discount.
send_discount(7, 5)  # Should print Discount applied!


""" Task 2: Add Logical Branching for Multiple Discount Levels
The store offers an additional promotion: If a customer purchases more than a certain number of books, they’ll receive an even bigger discount. Update your function to include this second level of discounts.

Add an additional argument, bonus_threshold, which represents the number of books needed to receive the better discount.

The function must print one of three possible messages, as shown below. Be careful not to miss the punctuation in your print statement.

Big discount applied! if the customer qualifies for the higher discount.
Discount applied! if the customer qualifies for the regular discount.
No discount. if they do not qualify for any discount.
Example:
send_discount(books_purchased=3, discount_threshold=5, bonus_threshold=10)
# Output: No discount.

send_discount(books_purchased=7, discount_threshold=5, bonus_threshold=10)
# Output: Discount applied!

send_discount(books_purchased=12, discount_threshold=5, bonus_threshold=10)
# Output: Big discount applied! """


def send_discount(books_purchased, discount_threshold, bonus_threshold):
    if books_purchased >= bonus_threshold:
        print("Big discount applied!")
    elif books_purchased >= discount_threshold:
        print("Discount applied!")
    else:
        print("No discount.")


# Checking your results
send_discount(3, 5, 10)  # Should print No discount.
send_discount(7, 5, 10)  # Should print Discount applied!
send_discount(12, 5, 10)  # Should print Big discount applied!
