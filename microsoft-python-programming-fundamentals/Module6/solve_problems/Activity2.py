"""Activity 2: Using Loops for Repetitive Tasks
Introduction
You are a product manager at a technology startup. Customers have been providing ratings for the company's latest app. The marketing team wants to categorize this feedback into three categories: "Low", "Medium", and "High" ratings. You will use Python's iteration techniques to process customer ratings efficiently.

Task 1: Categorize Customer Ratings
Define a function called categorize_ratings that takes a list of customer ratings as input. Each rating is a whole number between 1 and 10.

Your function will categorize the ratings as:

Low (1-4)
Medium (5-7)
High (8-10)
The output must print three statements, one for each category, in the following order (Low, then Medium, then High):
Low: {number_of_low_ratings}
Medium: {number_of_medium_ratings}
High: {number_of_high_ratings}

Example:
# There are two ratings in the range 1-4, two ratings in the range of 5-7 and two ratings in the range 8-10
categorize_ratings([1, 3, 5, 7, 8, 9])
Output:
Low: 2
Medium: 2
High: 2"""


def categorize_ratings(ratings):
    low_count = 0
    medium_count = 0
    high_count = 0

    for rating in ratings:
        if 1 <= rating <= 4:
            low_count += 1
        elif 5 <= rating <= 7:
            medium_count += 1
        elif 8 <= rating <= 10:
            high_count += 1

    print(f"Low: {low_count}")
    print(f"Medium: {medium_count}")
    print(f"High: {high_count}")
