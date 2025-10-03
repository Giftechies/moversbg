// Example custom JavaScript interactions
document.addEventListener('DOMContentLoaded', function() {
    // Example: Confirm delete with a bit more styling
    const deleteForms = document.querySelectorAll('form[action*="destroy"]');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const confirmed = confirm('Are you sure you want to delete this item?');
            if (!confirmed) {
                e.preventDefault();
            }
        });
    });
});