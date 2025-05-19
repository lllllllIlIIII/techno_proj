document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la suppression
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
                e.preventDefault();
            }
        });
    });

    // Animation des cartes
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s ease';
        });
    });
});