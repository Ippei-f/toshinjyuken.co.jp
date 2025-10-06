/**
 * カードフリップUI制御
 */
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.cardList .card').forEach(function(card) {
        card.addEventListener('mouseenter', function() {
            card.classList.add('flipped');
        });
        card.addEventListener('click', function(e) {
            card.classList.add('flipped');
        });
    });
});