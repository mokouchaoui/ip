<!DOCTYPE html>
<html>
<head>
    <title>Detected Currency Display with USD Conversion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Detected Currency Display with USD Conversion</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success text-center">
                            Detected Currency: <span id="currency"></span>
                            <br>
                            Converted to USD: <span id="usdAmount"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Get user's IP address using a free IP API service
        fetch('https://api64.ipify.org?format=json')
            .then(response => response.json())
            .then(data => {
                const userIP = data.ip;

                // Send the user's IP address to the server using AJAX
                const requestOptions = {
                    method: 'POST',  // You can change this to GET if needed
                    body: JSON.stringify({ ip: userIP }),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                };

                fetch('get_currency.php', requestOptions) // Replace with your server script URL
                    .then(response => response.json())
                    .then(result => {
                        // Process the response from the server as needed
                        document.getElementById('currency').innerText = result.currency;
                        document.getElementById('usdAmount').innerText = result.usdAmount;
                    })
                    .catch(error => console.error('Error:', error));
            })
            .catch(error => console.error('Error:', error));
    </script>
</body>
</html>
