window.onload = function() {
    // Get current date
    let currentDate = new Date();

    // Format the date as a string: YYYY-MM-DD
    let formattedDate = currentDate.getFullYear() + '-' + 
                        (currentDate.getMonth() + 1).toString().padStart(2, '0') + '-' + 
                        currentDate.getDate().toString().padStart(2, '0');

    // Set the value of the 'dateAdded' input to the current date
    document.getElementById('dateAdded').value = formattedDate;
};
