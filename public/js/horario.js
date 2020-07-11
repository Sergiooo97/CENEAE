var today = new Date();
var hourNow = today.getHours();
var greeting;

if (hourNow > 18) {
    greeting = 'Cerrado ahora!';
} else if (hourNow > 15) {
    greeting = 'Cerrado ahora';
} else if (hourNow >= 6) {
    greeting = 'Abierto ahora!';
} else {
    greeting = 'Cerrado ahora!';
}

document.write(greeting);
