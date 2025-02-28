<div class="container2">
<aside class="sidebar2" id="sidebar">

        <ul>
        <div id="chart-container">
        <canvas id="keysPieChart"></canvas>
    </div>
        </ul>
      </aside>

     


      <script>
        $(document).ready(function() {
            $.ajax({
                url: "/chart-data",
                method: "GET",
                success: function(response) {
                    // Get data from API
                    const labels = response.labels;
                    const data = response.percentages;

                    // Generate random colors
                    function getRandomColor() {
                        return `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.7)`;
                    }

                    const backgroundColors = labels.map(() => getRandomColor());

                    // Create Pie Chart
                    const ctx = document.getElementById('keysPieChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: data,
                                backgroundColor: backgroundColors,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: false,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { position: 'top' },
                                title: { display: true, text: 'KEYS Chart' }
                            }
                        }
                    });
                }
            });
        });
    </script>
