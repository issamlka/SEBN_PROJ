<div class="container2">
<aside class="sidebar2" id="sidebar">

        <ul>
        <div id="chart-container">
        <canvas id="keysPieChart" width="300" height="300"></canvas>
<div id="keysInfo"></div> <!-- This div will display keys info -->
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
                let labels = response.labels;
                let data = response.percentages;

                // Generate random colors
                function getRandomColor() {
                    return `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.7)`;
                }

                let backgroundColors = labels.map(() => getRandomColor());

                // Sort data from largest to smallest percentage
                let sortedData = labels.map((label, index) => ({
                    label: label,
                    value: data[index],
                    color: backgroundColors[index]
                })).sort((a, b) => b.value - a.value); // Sorting by value (percentage) in descending order

                // Extract sorted values
                labels = sortedData.map(item => item.label);
                data = sortedData.map(item => item.value);
                backgroundColors = sortedData.map(item => item.color);

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
                            legend: { display: false }, // Hide default legend
                            title: { display: true, text: 'KEYS Chart' }
                        }
                    }
                });

                // Display keys info below the pie chart in sorted order
                const keysInfoDiv = $("#keysInfo");
                keysInfoDiv.empty(); // Clear previous data
                labels.forEach((label, index) => {
                    keysInfoDiv.append(
                        `<div style="display: flex; align-items: center; margin: 5px 0;">
                            <div style="width: 20px; height: 20px; background-color: ${backgroundColors[index]}; margin-right: 10px; border-radius: 5px;"></div>
                            <span>${label} (${data[index]}%)</span>
                        </div>`
                    );
                });
            }
        });
    });
</script>