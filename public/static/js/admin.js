
var route = document.getElementsByName('routeName')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded', function () {
    route_active = document.getElementsByClassName('lk-' + route)[0].classList.add('active');
});