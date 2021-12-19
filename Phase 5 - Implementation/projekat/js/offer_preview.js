
function updateCardPanel() {
    var cardPanels = document.getElementsByClassName('cardpanel');
    var cardImages = document.getElementsByClassName('card');
    var optionsCard = document.getElementById('optionscard');
    var pagination = document.getElementById('pagination');
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
            cardImages[i].style.width = '23%';
        }
        optionsCard.style.width = '15%';
        
        optionsCard.style.marginLeft = '2.5%';
        pagination.style.marginLeft = '17.5%';
    }
}

function toggle(heartId) {
    $("#"+heartId).toggleClass("fas");
    $("#"+heartId).toggleClass("far");
 }

 document.addEventListener('DOMContentLoaded',updateCardPanel);

