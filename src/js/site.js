var bgppink = "#FF458C";
var bgpgreen = "#1FD316";
var bgpyellow = "#EFD61D";
var bgpblack = "#000000";
var bgpwhite = "#FFFFFF";
var pink = "/assets/images/logo-pink.svg";
var number = Math.floor(Math.random() * 4) + 1;

var links = document.querySelectorAll('#menucolor a');
var logo = document.querySelector('#logo img');
var picto = document.querySelectorAll('#menucolor i');

var changeColorLinks = function(color) {
    [].slice.call(links).forEach(function(elem) {
        elem.style.color = color;
    });
}


var colorize = function (num) {
    switch (num) {
        case 1:
            document.getElementById("menucolor").style.backgroundColor = bgppink;
            changeColorLinks(bgpblack);
            logo.src = green;
            break;
        case 2:
            document.getElementById("menucolor").style.backgroundColor = bgpgreen;
            changeColorLinks(bgpblack);
            logo.src = pink;
            break;
        case 3:
            document.getElementById("menucolor").style.backgroundColor = bgppink;
            changeColorLinks(bgpwhite);
            logo.src =  fullpink;
            [].slice.call(picto).forEach(function(elem) {
                elem.classList.toggle('white-svg');
            });
            break;
        case 4:
            document.getElementById("menucolor").style.backgroundColor = bgpgreen;
            changeColorLinks(bgpwhite);
            logo.src =  fullgreen;
            [].slice.call(picto).forEach(function(elem) {
                elem.classList.toggle('white-svg');
            });
            break;
        default:
            document.body.style.color = "000000";
            break;
    }

}

document.addEventListener("DOMContentLoaded", function() {

    colorize(number);

});


document.addEventListener("DOMContentLoaded", function() {
    var timeoutHandle;
    var hasStarted = false;
   

    
    function countdown(minutes) {
        var seconds = 11;
        function tick() {
            var counter = document.getElementById("timer");
            seconds--;
            counter.innerHTML =
             (seconds < 10 ? "" : "") + String(seconds);
            if( seconds > 0 ) {
                timeoutHandle=setTimeout(tick, 1000);
            } 
            else {
                counter.innerHTML = "GAME OVER";
            }
        }
        tick();
    }

    var footer = document.querySelector('footer');
    var bounding = footer.getBoundingClientRect();
    if (isInViewport(footer) && hasStarted == false) {
            countdown(0);
        }
    else {
        window.addEventListener('scroll', function (event) {
        if (isInViewport(footer)) {
            countdown(0);
        }
    }, false);
    }
    
});

var isInViewport = function (elem) {
    var bounding = elem.getBoundingClientRect();
    return (
        bounding.top >= 0 &&
        bounding.left >= 0 &&
        bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
};
