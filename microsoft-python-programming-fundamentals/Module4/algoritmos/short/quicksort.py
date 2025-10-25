# QuickSort Algorithm Implementation
# python -m timeit -s "from quicksort import quicksort; import random; cards = [random.randint(1, 1000) for _ in range(500)]" "quicksort(list(cards))"
def quicksort(cards):
    if len(cards) < 2:
        return cards  # Base case: Already sorted if 0 or 1 element
    else:
        pivot = cards[0]  # Choose first card as pivot
        less = [i for i in cards[1:] if i <= pivot]
        greater = [i for i in cards[1:] if i > pivot]
        return quicksort(less) + [pivot] + quicksort(greater)
