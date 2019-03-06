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

            .braintree-option:hover {
                background-color: #e2dbd7;
                font-family: "PT Mono", monospace;
                font-size: 16px;
            }  
        </style>
    </head>
    <body>
        <div id="header-title"><h1><a href="#"><i class="bx bxs-coffee"></i><br>Print My Tweets</a></h1></div>
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
                    <div id="shipping-section">
                        <form id="shipping-form">
                            @csrf
                            <input type="text" id="address1" placeholder="Address" required>
                            <input type="text" id="city" placeholder="City" required>
                            <input type="text" id="state_code" placeholder="State/Province Code" required>
                            <input type="text" id="country_code" placeholder="Country Code" required>
                            <input type="text" id="zip" placeholder="Zip/Postal Code" required>
                            <button type="submit">Calculate Shipping Cost</button>
                            <button type="button" style="text-align: right; float: right;" id="next-step-button">Next</button>
                        </form>
                    </div>
                    <div class="billing-section">
                        <form id="billing-form">
                            @csrf
                            <input type="email" id="email" placeholder="Email" required>
                            <div id="dropin-container"></div>
                            <button type="button" style="text-align: left; float: left;" id="previous-step-button">Previous</button>
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

                $('#shipping-form').on('submit', function(event) {
                    event.preventDefault();

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

        <script type="text/javascript">
            braintree.dropin.create({
              authorization: '{{ \Braintree\ClientToken::generate() }}',
              selector: '#dropin-container',
              paypal: {
                flow: 'checkout'
              }
            }, function (createErr, instance) {
              if (createErr) {
                console.log('Create Error', createErr);
                return;
              }
              // form.addEventListener('submit', function (event) {
              //   event.preventDefault();
              //   instance.requestPaymentMethod(function (err, payload) {
              //     if (err) {
              //       console.log('Request Payment Method Error', err);
              //       return;
              //     }
              //     // Add the nonce to the form and submit
              //     document.querySelector('#nonce').value = payload.nonce;
              //     form.submit();
              //   });
              // });
            });
        </script>
    </body>
</html>