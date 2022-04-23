// This
const reservation = {
    name: 'Carlos',
    surname: 'Oliva',
    total: 5000,
    paid: false,
    information: function() {
        console.log(`El cliente ${this.name} reservó y su cantidad a pagar es ${this.total}`);
    }
}

const reservation2 = {
    name: 'Pedro',
    surname: 'Oliva',
    total: 6000,
    paid: false,
    information: function() {
        console.log(`El cliente ${this.name} reservó y su cantidad a pagar es ${this.total}`);
    }
}

reservation.information();
reservation2.information();