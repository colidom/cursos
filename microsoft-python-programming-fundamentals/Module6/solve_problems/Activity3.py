"""Activity 3: Sorting Test Scores with Error Handling
Introduction
You are a coder working with test scores, focusing on sorting techniques and error handling in
Python. You’ll use common sorting algorithms and write robust functions that account for possible
errors.

Task 1: Creating and Sorting Test Scores
You have a list of students and their corresponding test scores. Your task is to organize and
analyze the scores using sorting algorithms and Python's error-handling mechanisms.

"""

""" Step 1: Create the List of Students
Create a list called students that contains the following student names: John, Lisa, Mary, Chris,
Linda, Matt """

students = ["John", "Lisa", "Mary", "Chris", "Linda", "Matt"]

""" Step 2: Create a Dictionary of Test Scores
Create a dictionary called test_performance and assign the following scores to each student as follows:

John: 87
Lisa: 90
Mary: 75
Chris: 100
Linda: 100
Matt: 70 """

test_performance = {
    "John": 87,
    "Lisa": 90,
    "Mary": 75,
    "Chris": 100,
    "Linda": 100,
    "Matt": 70,
}

""" 
Step 3: Extract the Scores from the Dictionary
Create a list called scores and extract each student's score using a for loop. """
scores = []
for student in students:
    try:
        score = test_performance[student]
        scores.append(score)
    except KeyError:
        print(f"Error: No score found for student {student}.")


""" Step 4: Sorting the Scores with a Custom Function
Define a function called bubble_sort that sorts the list of scores in ascending order. """


def bubble_sort(score_list):
    n = len(score_list)
    for i in range(n):
        for j in range(0, n - i - 1):
            if score_list[j] > score_list[j + 1]:
                score_list[j], score_list[j + 1] = score_list[j + 1], score_list[j]
    return score_list


""" Step 5: Assign the Sorted Scores to sorted_scores¶
Call the bubble_sort function you defined above and assign the return value to sorted_scores. """

sorted_scores = bubble_sort(scores)

""" Task 2: Calculating and Handling Errors
Step 1: Calculate the Highest and Lowest Scores
Use the sorted_scores list you defined above to assign the correct values to highest_score and lowest_score below. """

highest_score = sorted_scores[-1]
lowest_score = sorted_scores[0]
print(f"Highest Score: {highest_score}")
print(f"Lowest Score: {lowest_score}")

""" Step 2: Define a Function to Calculate the Class Average
Define a function called average_class_score to calculate the average score. Add error handling for cases when the student list is empty. """


def average_class_score(class_list, score_list):
    """
    Calcula la puntuación promedio de una lista de notas.
    Maneja el error de una lista de notas vacía.

    Aunque la lista de clases (class_list) no se usa en el cálculo,
    se mantiene como argumento para ajustarse a la definición original del paso.
    """
    try:
        # La comprobación de error se realiza sobre la lista que contiene las puntuaciones.
        if len(score_list) == 0:
            # Genera un ValueError si la lista está vacía, tal como se pide en el paso.
            raise ValueError(
                "La lista de puntuaciones está vacía. No se puede calcular el promedio."
            )

        # Realiza el cálculo del promedio
        average_score = sum(score_list) / len(score_list)
        return average_score

    except ValueError as ve:
        # Captura y muestra el error
        print(f"Error: {ve}")
        # Retorna None para indicar que el cálculo no pudo realizarse


""" Step 3: Calculate the Average Score
Use the average_class_score function you defined above to assign the average score to 
average_score below. """
average_score = average_class_score(students, sorted_scores)
print(f"Task 2 - Promedio calculado: {average_score}")

""" Step 4: Handle the Case of an Empty Class
Check that the average_class_score function can handle an empty class list by running the following code. """
empty_class = []
empty_scores = []
error_average = average_class_score(empty_class, empty_scores)
print(f"Task 2 - Resultado con listas vacías (esperando None): {error_average}")
