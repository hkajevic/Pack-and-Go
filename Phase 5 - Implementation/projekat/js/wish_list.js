
function updateCardPanel() {
    var cardPanels = document.getElementsByClassName('cardpanel');
    var cardImages = document.getElementsByClassName('card');
    if (window.outerWidth <= 600) {
        for (var i = 0; i < cardPanels.length; i++) {
            cardPanels[i].style.flexDirection = 'column';
            cardPanels[i].style.marginLeft = "0%";
            cardPanels[i].style.width = "100%";
        }
        for (var i = 0; i < cardImages.length; i++) {
            cardImages[i].style.width = '100%';
        }
    }
    else {
        for (var i = 0; i < cardPanels.length; i++) {
            cardPanels[i].style.flexDirection = 'row';
            cardPanels[i].style.marginLeft = "5%";
            cardPanels[i].style.width = "90%";
        }
        for (var i = 0; i < cardImages.length; i++) {
            cardImages[i].style.width = '23%';
        }
    }

}
function toggle(heartId) {
    var heart = document.getElementById(heartId);
    var prefix = heart.getAttributeNode('data-prefix');
    if (prefix.value === 'far') {
        prefix.value = 'fas';
    }
    else {
        prefix.value = 'far';
    }

}

document.addEventListener('DOMContentLoaded', updateCardPanel);