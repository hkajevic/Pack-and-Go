
function updateCardPanel() {
    var cardPanels = document.getElementsByClassName('cardpanel');
    var cardImages = document.getElementsByClassName('responsive-img');
    if (window.outerWidth<=600) {
        for (var i = 0;i<cardPanels.length;i++) {
            cardPanels[i].style.flexDirection = 'column';
        }
        for (var i = 0;i<cardImages.length;i++) {
            cardImages[i].style.width = '100%';
        }
    }
    else {
        for (var i = 0;i<cardPanels.length;i++) {
            cardPanels[i].style.flexDirection = 'row';
        }
        for (var i = 0;i<cardImages.length;i++) {
            cardImages[i].style.width = '300px';
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems, {});
});

