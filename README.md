# Currency Detection and Conversion

This PHP and HTML code combination is designed to detect a user's currency based on their IP address and convert it to USD using external APIs. It provides a simple web interface that displays the detected currency and its equivalent in USD.

## Table of Contents

- [Introduction](#introduction)
- [Prerequisites](#prerequisites)
- [Getting Started](#getting-started)
- [Usage](#usage)
- [Code Explanation](#code-explanation)
- [License](#license)

## Introduction

This repository contains code for detecting a user's currency based on their IP address and converting it to USD using external APIs. It utilizes two main components:

1. **PHP Server (`get_currency.php`):** This PHP script handles the backend logic. It receives the user's IP address, determines their country code, detects the currency associated with that country, and then converts that currency to USD using an external API.

2. **HTML Frontend (`index.html`):** This HTML file provides a simple web interface that displays the detected currency and its equivalent in USD.

## Prerequisites

Before you can use this code, ensure you have the following prerequisites:

- A web server running PHP (PHP version 5.6 or higher).
- Internet connectivity to access external APIs.
- An API key for the `apilayer.com` API, which is used for currency conversion (replace `'S9oy7TqGeT0OwHL72QYMwyOqJWEzU96J'` in the `convertToUSD` function with your API key).

## Getting Started

1. Clone this repository to your local machine or upload it to your web server.

2. Configure your web server to run PHP scripts. Ensure PHP is installed and properly configured.

3. Replace the API key in the `convertToUSD` function with your own API key.

4. Open the `index.html` file in a web browser to see the interface.

## Usage

1. Access the `index.html` file in a web browser. You should see a card displaying the detected currency and its equivalent in USD.

2. The JavaScript code in `index.html` fetches the user's IP address using the `api64.ipify.org` service and sends it to the PHP script (`get_currency.php`) for currency detection and conversion.

3. The PHP script uses the `ipinfo.io` API to determine the user's country code based on their IP address and then maps it to a currency code. It then uses the `apilayer.com` API to convert the detected currency to USD.

4. The detected currency and its USD equivalent are displayed on the web page.

## Code Explanation

- `get_currency.php` contains the PHP server-side logic for fetching the user's IP, detecting the country code, mapping it to a currency code, and converting it to USD.

- `index.html` provides the frontend interface that displays the detected currency and USD equivalent.

- JavaScript code in `index.html` fetches the user's IP address and sends it to the server using AJAX for currency detection and conversion.

## License

This code is provided under the MIT License. You are free to use, modify, and distribute it as needed. Refer to the [LICENSE](LICENSE) file for more details.

---

Feel free to customize and enhance this code according to your project requirements. If you encounter any issues or have questions, please refer to the code comments or seek assistance from the community or maintainers.
