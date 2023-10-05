document.addEventListener('DOMContentLoaded', (event) => {
    const form = document.querySelector('.form_item');

    form.addEventListener('submit', (e) => {
        e.preventDefault();  // Prevents the form from submitting the traditional way

        // Assuming success, but you'd replace the next two lines with your actual form processing logic
        const success = true;

        if (success) {
            alert('Item created successfully!');
        } else {
            alert('Failed to create item. Please try again.');
        }
    });
});
