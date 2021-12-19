
function updateCardPanel() {
    var cardPanels = document.getElementsByClassName('cardpanel');
    var cardImages = document.getElementsByClassName('responsive-img');
    var optionsCard = document.getElementById('optionscard');
    if (window.outerWidth<=600) {
        for (var i = 0;i<cardPanels.length;i++) {
            cardPanels[i].style.width = '95%';
            cardPanels[i].style.flexDirection = 'column';
        }
        for (var i = 0;i<cardImages.length;i++) {
            cardImages[i].style.width = '100%';
        }
        
    }
    else {
        for (var i = 0;i<cardPanels.length;i++) {
            cardPanels[i].style.width = '80%';
            cardPanels[i].style.marginLeft = '20%';
            cardPanels[i].style.flexDirection = 'row';
        }
        for (var i = 0;i<cardImages.length;i++) {
            cardImages[i].style.width = '270px';
            cardImages[i].style.height = '250px';
        }
        optionsCard.style.width = '15%';
        
        optionsCard.style.marginLeft = '2.5%';
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

