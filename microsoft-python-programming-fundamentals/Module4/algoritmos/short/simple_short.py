# Simple sorting algorithm implementation
# python -m timeit -s "from simple_short import simple_sort; import random; cards = [random.randint(1, 1000) for _ in range(500)]" "simple_sort(list(cards))"


def simple_sort(cards):
    sorted_cards = []
    while cards:
        lowest_card = min(cards)
        sorted_cards.append(lowest_card)
        cards.remove(lowest_card)
    return sorted_cards
