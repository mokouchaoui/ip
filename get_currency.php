<?php
// Get user's IP from the client's JSON request
$data = json_decode(file_get_contents("php://input"));
$userIP = $data->ip;

// Fetch user's country code based on IP using ipinfo.io
$userCountryCode = fetchCountryCode($userIP);

if ($userCountryCode !== null) {
    $currency = detectCurrency($userCountryCode);
    $usdAmount = convertToUSD(1, $currency);

    // Send the response back to the client
    $response = array(
        'currency' => $currency,
        'usdAmount' => $usdAmount
    );

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    echo 'Error fetching user country code.';
}

// Function to fetch user's country code based on IP using ipinfo.io
function fetchCountryCode($ip) {
    $url = "http://ipinfo.io/{$ip}/country";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $countryCode = curl_exec($ch);
    curl_close($ch);

    return trim($countryCode);
}

// Function to detect currency based on country code
function detectCurrency($countryCode) {
    $currencyMap = array(
          'AF' => 'AFN',
                                'DZ' => 'DZD',
                                'AD' => 'EUR',
                                'AO' => 'AOA',
                                'AG' => 'XCD',
                                'AR' => 'ARS',
                                'AM' => 'AMD',
                                'AU' => 'AUD',
                                'AT' => 'EUR',
                                'AZ' => 'AZN',
                                'BS' => 'BSD',
                                'BH' => 'BHD',
                                'BD' => 'BDT',
                                'BB' => 'BBD',
                                'BY' => 'BYN',
                                'BE' => 'EUR',
                                'BZ' => 'BZD',
                                'BJ' => 'XOF',
                                'BT' => 'BTN',
                                'BO' => 'BOB',
                                'BA' => 'BAM',
                                'BW' => 'BWP',
                                'BR' => 'BRL',
                                'BN' => 'BND',
                                'BG' => 'BGN',
                                'BF' => 'XOF',
                                'BI' => 'BIF',
                                'CV' => 'CVE',
                                'KH' => 'KHR',
                                'CM' => 'XAF',
                                'CA' => 'CAD',
                                'CF' => 'XAF',
                                'TD' => 'XAF',
                                'CL' => 'CLP',
                                'CN' => 'CNY',
                                'CO' => 'COP',
                                'KM' => 'KMF',
                                'CD' => 'CDF',
                                'CG' => 'XAF',
                                'CR' => 'CRC',
                                'CI' => 'XOF',
                                'HR' => 'HRK',
                                'CU' => 'CUP',
                                'CY' => 'EUR',
                                'CZ' => 'CZK',
                                'DK' => 'DKK',
                                'DJ' => 'DJF',
                                'DM' => 'XCD',
                                'DO' => 'DOP',
                                'EC' => 'USD',
                                'EG' => 'EGP',
                                'SV' => 'USD',
                                'GQ' => 'XAF',
                                'ER' => 'ERN',
                                'EE' => 'EUR',
                                'ET' => 'ETB',
                                'FJ' => 'FJD',
                                'FI' => 'EUR',
                                'FR' => 'EUR',
                                'GA' => 'XAF',
                                'GM' => 'GMD',
                                'GE' => 'GEL',
                                'DE' => 'EUR',
                                'GH' => 'GHS',
                                'GR' => 'EUR',
                                'GD' => 'XCD',
                                'GT' => 'GTQ',
                                'GN' => 'GNF',
                                'GW' => 'XOF',
                                'GY' => 'GYD',
                                'HT' => 'HTG',
                                'HN' => 'HNL',
                                'HU' => 'HUF',
                                'IS' => 'ISK',
                                'IN' => 'INR',
                                'ID' => 'IDR',
                                'IR' => 'IRR',
                                'IQ' => 'IQD',
                                'IE' => 'EUR',
                                'IL' => 'ILS',
                                'IT' => 'EUR',
                                'JM' => 'JMD',
                                'JP' => 'JPY',
                                'JO' => 'JOD',
                                'KZ' => 'KZT',
                                'KE' => 'KES',
                                'KI' => 'AUD',
                                'KP' => 'KPW',
                                'KR' => 'KRW',
                                'KW' => 'KWD',
                                'KG' => 'KGS',
                                'LA' => 'LAK',
                                'LV' => 'EUR',
                                'LB' => 'LBP',
                                'LS' => 'LSL',
                                'LR' => 'LRD',
                                'LY' => 'LYD',
                                'LI' => 'CHF',
                                'LT' => 'EUR',
                                'LU' => 'EUR',
                                'MG' => 'MGA',
                                'MW' => 'MWK',
                                'MY' => 'MYR',
                                'MV' => 'MVR',
                                'ML' => 'XOF',
                                'MT' => 'EUR',
                                'MH' => 'USD',
                                'MR' => 'MRU',
                                'MU' => 'MUR',
                                'MX' => 'MXN',
                                'FM' => 'USD',
                                'MD' => 'MDL',
                                'MC' => 'EUR',
                                'MN' => 'MNT',
                                'ME' => 'EUR',
                                'MA' => 'MAD',
                                'MZ' => 'MZN',
                                'MM' => 'MMK',
                                'NA' => 'NAD',
                                'NR' => 'AUD',
                                'NP' => 'NPR',
                                'NL' => 'EUR',
                                'NZ' => 'NZD',
                                'NI' => 'NIO',
                                'NE' => 'XOF',
                                'NG' => 'NGN',
                                'MK' => 'MKD',
                                'NO' => 'NOK',
                                'OM' => 'OMR',
                                'PK' => 'PKR',
                                'PW' => 'USD',
                                'PA' => 'PAB',
                                'PG' => 'PGK',
                                'PY' => 'PYG',
                                'PE' => 'PEN',
                                'PH' => 'PHP',
                                'PL' => 'PLN',
                                'PT' => 'EUR',
                                'QA' => 'QAR',
                                'RO' => 'RON',
                                'RU' => 'RUB',
                                'RW' => 'RWF',
                                'KN' => 'XCD',
                                'LC' => 'XCD',
                                'VC' => 'XCD',
                                'WS' => 'WST',
                                'SM' => 'EUR',
                                'ST' => 'STN',
                                'SA' => 'SAR',
                                'SN' => 'XOF',
                                'RS' => 'RSD',
                                'SC' => 'SCR',
                                'SL' => 'SLL',
                                'SG' => 'SGD',
                                'SK' => 'EUR',
                                'SI' => 'EUR',
                                'SB' => 'SBD',
                                'SO' => 'SOS',
                                'ZA' => 'ZAR',
                                'SS' => 'SSP',
                                'ES' => 'EUR',
                                'LK' => 'LKR',
                                'SD' => 'SDG',
                                'SR' => 'SRD',
                                'SZ' => 'SZL',
                                'SE' => 'SEK',
                                'CH' => 'CHF',
                                'SY' => 'SYP',
                                'TW' => 'TWD',
                                'TJ' => 'TJS',
                                'TZ' => 'TZS',
                                'TH' => 'THB',
                                'TL' => 'USD',
                                'TG' => 'XOF',
                                'TO' => 'TOP',
                                'TT' => 'TTD',
                                'TN' => 'TND',
                                'TR' => 'TRY',
                                'TM' => 'TMT',
                                'TV' => 'AUD',
                                'UG' => 'UGX',
                                'UA' => 'UAH',
                                'AE' => 'AED',
                                'GB' => 'GBP',
                                'US' => 'USD',
                                'UY' => 'UYU',
                                'UZ' => 'UZS',
                                'VU' => 'VUV',
                                'VA' => 'EUR',
                                'VE' => 'VES',
                                'VN' => 'VND',
                                'WS' => 'WST',
                                'YE' => 'YER',
                                'ZM' => 'ZMW',
                                'ZW' => 'ZWL',
    );

    $defaultCurrency = 'USD';

    return isset($currencyMap[$countryCode]) ? $currencyMap[$countryCode] : $defaultCurrency;
}

// Function to convert to USD using an API
function convertToUSD($amount, $currency) {
    $apiKey = 'S9oy7TqGeT0OwHL72QYMwyOqJWEzU96J';
    $fromCurrency = $currency;
    $toCurrency = 'USD';

    $url = "https://api.apilayer.com/exchangerates_data/convert?to={$toCurrency}&from={$fromCurrency}&amount={$amount}";
    $myHeaders = array('apikey: ' . $apiKey);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeaders);
    $response = curl_exec($ch);
    curl_close($ch);

    $conversionResult = json_decode($response, true);

    if (isset($conversionResult['success']) && $conversionResult['success']) {
        return number_format($conversionResult['result'], 2);
    } else {
        return 'N/A';
    }
}
?>
