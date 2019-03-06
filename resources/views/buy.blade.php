<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="theme-color" content="#6f4e37">

        <title>Print My Tweets </title>

        <link href="https://fonts.googleapis.com/css?family=PT+Mono:400,700" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/boxicons@1.9.1/css/boxicons.min.css" rel="stylesheet">
        <link href="/style.css" rel="stylesheet">

        <link rel="icon" type="image/png" href="/favicon.png">

        <style type="text/css">
            .spinner {
              animation-name: spin;
              animation-duration: 5000ms;
              animation-iteration-count: infinite;
              animation-timing-function: linear;
            }

            @keyframes spin {
                from {
                    transform:rotate(0deg);
                }
                to {
                    transform:rotate(360deg);
                }
            }

            .braintree-option {
                background-color: #e2dbd7;
                font-family: "PT Mono", monospace;
                font-size: 16px;
            }

            .braintree-card {
                background-color: #e2dbd7;
                font-family: "PT Mono", monospace;
                font-size: 16px;
            }

            .braintree-form {
                background-color: #e2dbd7;
                font-family: "PT Mono", monospace;
                font-size: 16px;
            }

            .braintree-large-button {
                background-color: #e2dbd7;
                font-family: "PT Mono", monospace;
                font-size: 16px;
            }

            .braintree-paypal {
                background-color: #e2dbd7;
                font-family: "PT Mono", monospace;
                font-size: 16px;
            }

            .braintree-sheet {
                background-color: #e2dbd7;
                font-family: "PT Mono", monospace;
                font-size: 16px;
            }

            .braintree-large-button:hover {
                background-color: #e2dbd7;
                font-family: "PT Mono", monospace;
                font-size: 16px;
            }

            .braintree-option:hover {
                background-color: #e2dbd7;
                font-family: "PT Mono", monospace;
                font-size: 16px;
            }  

            #loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background-color: #e2dbd7;
            }

            .loader-icon {
                position: fixed;
                top: 50%;
                left: 50%;
                z-index: 9999;
                background-color: #e2dbd7;
            }
        </style>

        <script type="text/javascript">
            window.countryCodes = {
                'AF' : 'Afghanistan',
                'AX' : 'Aland Islands',
                'AL' : 'Albania',
                'DZ' : 'Algeria',
                'AS' : 'American Samoa',
                'AD' : 'Andorra',
                'AO' : 'Angola',
                'AI' : 'Anguilla',
                'AQ' : 'Antarctica',
                'AG' : 'Antigua And Barbuda',
                'AR' : 'Argentina',
                'AM' : 'Armenia',
                'AW' : 'Aruba',
                'AU' : 'Australia',
                'AT' : 'Austria',
                'AZ' : 'Azerbaijan',
                'BS' : 'Bahamas',
                'BH' : 'Bahrain',
                'BD' : 'Bangladesh',
                'BB' : 'Barbados',
                'BY' : 'Belarus',
                'BE' : 'Belgium',
                'BZ' : 'Belize',
                'BJ' : 'Benin',
                'BM' : 'Bermuda',
                'BT' : 'Bhutan',
                'BO' : 'Bolivia',
                'BA' : 'Bosnia And Herzegovina',
                'BW' : 'Botswana',
                'BV' : 'Bouvet Island',
                'BR' : 'Brazil',
                'IO' : 'British Indian Ocean Territory',
                'BN' : 'Brunei Darussalam',
                'BG' : 'Bulgaria',
                'BF' : 'Burkina Faso',
                'BI' : 'Burundi',
                'KH' : 'Cambodia',
                'CM' : 'Cameroon',
                'CA' : 'Canada',
                'CV' : 'Cape Verde',
                'KY' : 'Cayman Islands',
                'CF' : 'Central African Republic',
                'TD' : 'Chad',
                'CL' : 'Chile',
                'CN' : 'China',
                'CX' : 'Christmas Island',
                'CC' : 'Cocos (Keeling) Islands',
                'CO' : 'Colombia',
                'KM' : 'Comoros',
                'CG' : 'Congo',
                'CD' : 'Congo, Democratic Republic',
                'CK' : 'Cook Islands',
                'CR' : 'Costa Rica',
                'CI' : 'Cote D\'Ivoire',
                'HR' : 'Croatia',
                'CU' : 'Cuba',
                'CY' : 'Cyprus',
                'CZ' : 'Czech Republic',
                'DK' : 'Denmark',
                'DJ' : 'Djibouti',
                'DM' : 'Dominica',
                'DO' : 'Dominican Republic',
                'EC' : 'Ecuador',
                'EG' : 'Egypt',
                'SV' : 'El Salvador',
                'GQ' : 'Equatorial Guinea',
                'ER' : 'Eritrea',
                'EE' : 'Estonia',
                'ET' : 'Ethiopia',
                'FK' : 'Falkland Islands (Malvinas)',
                'FO' : 'Faroe Islands',
                'FJ' : 'Fiji',
                'FI' : 'Finland',
                'FR' : 'France',
                'GF' : 'French Guiana',
                'PF' : 'French Polynesia',
                'TF' : 'French Southern Territories',
                'GA' : 'Gabon',
                'GM' : 'Gambia',
                'GE' : 'Georgia',
                'DE' : 'Germany',
                'GH' : 'Ghana',
                'GI' : 'Gibraltar',
                'GR' : 'Greece',
                'GL' : 'Greenland',
                'GD' : 'Grenada',
                'GP' : 'Guadeloupe',
                'GU' : 'Guam',
                'GT' : 'Guatemala',
                'GG' : 'Guernsey',
                'GN' : 'Guinea',
                'GW' : 'Guinea-Bissau',
                'GY' : 'Guyana',
                'HT' : 'Haiti',
                'HM' : 'Heard Island & Mcdonald Islands',
                'VA' : 'Holy See (Vatican City State)',
                'HN' : 'Honduras',
                'HK' : 'Hong Kong',
                'HU' : 'Hungary',
                'IS' : 'Iceland',
                'IN' : 'India',
                'ID' : 'Indonesia',
                'IR' : 'Iran, Islamic Republic Of',
                'IQ' : 'Iraq',
                'IE' : 'Ireland',
                'IM' : 'Isle Of Man',
                'IL' : 'Israel',
                'IT' : 'Italy',
                'JM' : 'Jamaica',
                'JP' : 'Japan',
                'JE' : 'Jersey',
                'JO' : 'Jordan',
                'KZ' : 'Kazakhstan',
                'KE' : 'Kenya',
                'KI' : 'Kiribati',
                'KR' : 'Korea',
                'KW' : 'Kuwait',
                'KG' : 'Kyrgyzstan',
                'LA' : 'Lao People\'s Democratic Republic',
                'LV' : 'Latvia',
                'LB' : 'Lebanon',
                'LS' : 'Lesotho',
                'LR' : 'Liberia',
                'LY' : 'Libyan Arab Jamahiriya',
                'LI' : 'Liechtenstein',
                'LT' : 'Lithuania',
                'LU' : 'Luxembourg',
                'MO' : 'Macao',
                'MK' : 'Macedonia',
                'MG' : 'Madagascar',
                'MW' : 'Malawi',
                'MY' : 'Malaysia',
                'MV' : 'Maldives',
                'ML' : 'Mali',
                'MT' : 'Malta',
                'MH' : 'Marshall Islands',
                'MQ' : 'Martinique',
                'MR' : 'Mauritania',
                'MU' : 'Mauritius',
                'YT' : 'Mayotte',
                'MX' : 'Mexico',
                'FM' : 'Micronesia, Federated States Of',
                'MD' : 'Moldova',
                'MC' : 'Monaco',
                'MN' : 'Mongolia',
                'ME' : 'Montenegro',
                'MS' : 'Montserrat',
                'MA' : 'Morocco',
                'MZ' : 'Mozambique',
                'MM' : 'Myanmar',
                'NA' : 'Namibia',
                'NR' : 'Nauru',
                'NP' : 'Nepal',
                'NL' : 'Netherlands',
                'AN' : 'Netherlands Antilles',
                'NC' : 'New Caledonia',
                'NZ' : 'New Zealand',
                'NI' : 'Nicaragua',
                'NE' : 'Niger',
                'NG' : 'Nigeria',
                'NU' : 'Niue',
                'NF' : 'Norfolk Island',
                'MP' : 'Northern Mariana Islands',
                'NO' : 'Norway',
                'OM' : 'Oman',
                'PK' : 'Pakistan',
                'PW' : 'Palau',
                'PS' : 'Palestinian Territory, Occupied',
                'PA' : 'Panama',
                'PG' : 'Papua New Guinea',
                'PY' : 'Paraguay',
                'PE' : 'Peru',
                'PH' : 'Philippines',
                'PN' : 'Pitcairn',
                'PL' : 'Poland',
                'PT' : 'Portugal',
                'PR' : 'Puerto Rico',
                'QA' : 'Qatar',
                'RE' : 'Reunion',
                'RO' : 'Romania',
                'RU' : 'Russian Federation',
                'RW' : 'Rwanda',
                'BL' : 'Saint Barthelemy',
                'SH' : 'Saint Helena',
                'KN' : 'Saint Kitts And Nevis',
                'LC' : 'Saint Lucia',
                'MF' : 'Saint Martin',
                'PM' : 'Saint Pierre And Miquelon',
                'VC' : 'Saint Vincent And Grenadines',
                'WS' : 'Samoa',
                'SM' : 'San Marino',
                'ST' : 'Sao Tome And Principe',
                'SA' : 'Saudi Arabia',
                'SN' : 'Senegal',
                'RS' : 'Serbia',
                'SC' : 'Seychelles',
                'SL' : 'Sierra Leone',
                'SG' : 'Singapore',
                'SK' : 'Slovakia',
                'SI' : 'Slovenia',
                'SB' : 'Solomon Islands',
                'SO' : 'Somalia',
                'ZA' : 'South Africa',
                'GS' : 'South Georgia And Sandwich Isl.',
                'ES' : 'Spain',
                'LK' : 'Sri Lanka',
                'SD' : 'Sudan',
                'SR' : 'Suriname',
                'SJ' : 'Svalbard And Jan Mayen',
                'SZ' : 'Swaziland',
                'SE' : 'Sweden',
                'CH' : 'Switzerland',
                'SY' : 'Syrian Arab Republic',
                'TW' : 'Taiwan',
                'TJ' : 'Tajikistan',
                'TZ' : 'Tanzania',
                'TH' : 'Thailand',
                'TL' : 'Timor-Leste',
                'TG' : 'Togo',
                'TK' : 'Tokelau',
                'TO' : 'Tonga',
                'TT' : 'Trinidad And Tobago',
                'TN' : 'Tunisia',
                'TR' : 'Turkey',
                'TM' : 'Turkmenistan',
                'TC' : 'Turks And Caicos Islands',
                'TV' : 'Tuvalu',
                'UG' : 'Uganda',
                'UA' : 'Ukraine',
                'AE' : 'United Arab Emirates',
                'GB' : 'United Kingdom',
                'US' : 'United States',
                'UM' : 'United States Outlying Islands',
                'UY' : 'Uruguay',
                'UZ' : 'Uzbekistan',
                'VU' : 'Vanuatu',
                'VE' : 'Venezuela',
                'VN' : 'Viet Nam',
                'VG' : 'Virgin Islands, British',
                'VI' : 'Virgin Islands, U.S.',
                'WF' : 'Wallis And Futuna',
                'EH' : 'Western Sahara',
                'YE' : 'Yemen',
                'ZM' : 'Zambia',
                'ZW' : 'Zimbabwe'
            };
        </script>
    </head>
    <body>
        <div id="loader"><i class="bx bx-lg bxs-coffee spinner loader-icon"></i></div>
        <div id="header-title"><h1><a href="/"><i class="bx bxs-coffee"></i><br>Print My Tweets</a></h1></div>
        <main>
            <div class="section" id="buy">
            <div class="grid two">
                <div class="grid-section">
                    <h2>Complete Order</h2>
                    <p>
                        Mug Cost: $15<br>
                        Shipping Cost: <span id="shipping_cost">----</span><br>
                        Total Cost: <span id="total-cost">----</span>
                    </p>

                    <p>
                        @foreach($errors->all() as $error)
                            <span style="color: red;">{{ $error }}<br></span>
                        @endforeach
                        @if (session()->get('error'))
                            <span style="color: red;">{{ session()->get('error') }}<br></span>
                        @endif
                        <span id="country-error" style="color: red;">Invalid country code<br></span>
                        <span id="payment-error" style="color: red;">Please select a payment method<br></span>
                    </p>

                    <div id="shipping-section">
                        <form id="shipping-form">
                            @csrf
                            <input type="text" id="address1" placeholder="Address" required>
                            <input type="text" id="city" placeholder="City" required>
                            <input type="text" id="state_code" placeholder="State/Province Code e.g NC" required>
                            <input type="text" id="country_code" placeholder="Country Code e.g US" maxlength="2" required>
                            <input type="text" id="zip" placeholder="Zip/Postal Code" required>
                            <button type="submit">Calculate Shipping Cost</button>
                            <button type="button" style="text-align: right; float: right;" id="next-step-button">Next</button>
                        </form>
                    </div>
                    <div class="billing-section">
                        <form id="billing-form" method="post" action="{{ url()->current() }}">
                            @csrf
                            <input type="email" id="email" name="email" placeholder="Email" required>
                            <input type="hidden" id="nonce" name="payment_method_nonce" required>
                            <div id="billing-loader">
                                <center><i class="bx bx-lg bxs-coffee spinner"></i></center>
                            </div>
                            <div id="dropin-container"></div>
                            <button type="button" style="text-align: left; float: left;" id="previous-step-button">Previous</button>
                            <button type="submit" style="text-align: right; float: right;" id="previous-step-button">Confirm Order</button>
                        </form>
                    </div>
                </div>
                <div class="grid-section">
                    <center>
                        <h2>Preview</h2>
                        <div id="image-holder">
                            <img id="preview-img" style="width: 250px; height: 250px;" src="/storage/{{ $id }}.png">
                        </div>
                    </center>
                </div>
            </div>
        </main>
        <br>
        <footer>
            <p>&copy; <span id="automatic_copyright_year"></span> Print My Tweets a product of <a href="https://lynndigital.com">Lynn Digital LLC</a></p>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://js.braintreegateway.com/web/dropin/1.16.0/js/dropin.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                document.getElementById('automatic_copyright_year').innerHTML = new Date().getFullYear();

                $('#next-step-button').hide();
                $('#billing-section').hide();
                $('#billing-form').hide();

                $('#country-error').hide();
                $('#payment-error').hide();

                $('#loader').fadeOut();

                $('#billing-loader').hide();

                $('#shipping-form').on('submit', function(event) {
                    event.preventDefault();

                    $('#country-error').hide();

                    if(typeof window.countryCodes[$('#country_code').val()] === 'undefined')
                    {
                        $('#country-error').show();
                        return false;
                    }

                    $.ajax({
                        url: '/api/shipping/calculate',
                        method: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'url': '{{ $url }}',
                            'product_id': '{{ $id }}',
                            'address1': $('#address1').val(),
                            'city': $('#city').val(),
                            'country_code': $('#country_code').val(),
                            'state_code': $('#state_code').val(),
                            'zip': $('#zip').val()
                        },
                        success: function(data) {
                            $('#shipping_cost').html('$' + data.shipping.rate + ' ' + data.shipping.name);
                            $('#next-step-button').show();
                            $('#total-cost').html('$' + data.total.total);

                            $('#dropin-container').hide();
                            $('#email').hide();
                            $('#billing-loader').show();

                            braintree.dropin.create({
                                authorization: '{{ \Braintree\ClientToken::generate() }}',
                                selector: '#dropin-container',
                                paypal: {
                                    flow: 'checkout',
                                    amount: data.total.total.toString(),
                                    currency: 'USD'
                                }
                            }, function (createErr, instance) {
                                if (createErr) {
                                    console.log('Create Error', createErr);
                                    return;
                                }

                                $('#billing-loader').hide();
                                $('#dropin-container').show();
                                $('#email').show();

                                document.getElementById('billing-form').addEventListener('submit', function (event) {
                                    event.preventDefault();
                                    instance.requestPaymentMethod(function (err, payload) {
                                        if (err) {
                                            $('#payment-error').show();
                                            console.log('Request Payment Method Error', err);
                                            return;
                                        }

                                        document.querySelector('#nonce').value = payload.nonce;
                                        document.getElementById('billing-form').submit();
                                    });
                                });
                            });
                        }
                    });
                });

                $('#next-step-button').on('click', function() {
                    $('#shipping-section').hide();
                    $('#shipping-form').hide();
                    $('#billing-section').show();
                    $('#billing-form').show();
                });

                $('#previous-step-button').on('click', function() {
                    $('#shipping-section').show();
                    $('#shipping-form').show();
                    $('#billing-form').hide();
                    $('#billing-section').hide();
                });
            });
        </script>
    </body>
</html>