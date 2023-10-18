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

function toggleSubmenu(menuId) {
    const menu = document.getElementById(menuId);
    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block';  /* Changed to 'block' to show the submenu */
    } else {
        menu.style.display = 'none';
    }
}
function applyFilters() {
    let categoryValue = document.getElementById("categoryDropdown").value;
    let sortValue = document.getElementById("sortDropdown").value;
    let currentUrl = window.location.href.split('?')[0]; // Get the current URL without parameters
    window.location.href = currentUrl + "?category=" + categoryValue + "&sortBy=" + sortValue;
}
//statistic
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',  // This makes it a vertical bar chart
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Monthly Sales',
                data: [12, 19, 3, 5, 2, 3, 8, 6, 10, 4, 6, 7],  // Your sales data goes here
               backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ]
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
