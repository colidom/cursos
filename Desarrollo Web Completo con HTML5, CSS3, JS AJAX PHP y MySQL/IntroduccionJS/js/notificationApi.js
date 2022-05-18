// Notification API
const button = document.querySelector('#button');

button.addEventListener('click', function () {
    Notification.requestPermission().then((result) =>
        console.log('El resultado es ' + result)
    );
});

if (Notification.requestPermission == 'granted') {
    new Notification('Esta es una notificación', {
        icon: 'img/JavaScript.jpg',
        body: 'Curso JavaScript'
    });
}
