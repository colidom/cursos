import sys

VOWELS = "aeiou"
DIGITS = "0123456789"


def num_vowels(text):
    vowels_count = 0
    for letras in text:
        if letras.lower() in VOWELS:
            vowels_count += 1
    return vowels_count


def num_whitespaces(text):
    whites_count = 0
    for letras in text:
        if letras == " ":
            whites_count += 1
    return whites_count


def num_digits(text):
    num_count = 0
    for letras in text:
        if letras in DIGITS:
            num_count += 1
    return num_count


def num_words(text):
    cadenatexto = text.split()
    words = len(cadenatexto)
    return words


def reverse(text):
    size = len(text)
    reverse_word = ""
    for ch in range(1, size + 1):
        reverse_word += (text[-ch])
    return reverse_word


def length(text):
    text_length = len(text)
    return text_length


def halfs(text):
    text_half = len(text) / 2
    first_half = text[:int(text_half)]
    second_half = text[int(text_half):]
    return first_half + "|" + second_half


def upper_vowels(text):
    upper_vowels = ""
    for vowel in text:
        if vowel in VOWELS:
            upper_vowels += vowel.upper()
        else:
            upper_vowels += vowel
    return upper_vowels


def sorted_by_words(text):
    string_text = text.split()
    stringlist = sorted(string_text)
    sorted_words = " ".join(stringlist)
    return sorted_words


def length_of_words(text):
    string_text = text.split()
    list1 = list()
    list_size = len(string_text)
    for i in range(list_size):
        value = len(string_text[i])
        list1.append(str(value))
    low = " ".join(list1)
    return low


text = sys.argv[1]
print("Number of vowels: ", num_vowels(text))
print("Number of whitespaces: ", num_whitespaces(text))
print("Number of digits: ", num_digits(text))
print("Number of words: ", num_words(text))
print("Reverse of text: ", reverse(text))
print("Length of text: ", length(text))
print("Halfs of text: ", halfs(text))
print("Text with uppercased vowels: ", upper_vowels(text))
print("Sorted by words: ", sorted_by_words(text))
print("Length of words: ", length_of_words(text))
