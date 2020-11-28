import sys

sentence = sys.argv[1]


def count_words(sentence):
    text = sentence.split()
    summary = {}
    for word in text:
        if word in summary:
            summary[word] += 1
        else:
            summary[word] = 1
    return summary
for name, count in (count_words(sentence)).items():
    print(name + ":" + str(count))
