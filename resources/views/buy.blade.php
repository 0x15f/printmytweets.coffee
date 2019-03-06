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
                        Mug Cost: $12.99<br>
                        Shipping Cost: <span id="shipping_cost">----</span>
                    </p>
                    <form id="shipping-form">
                        @csrf
                        <input type="text" id="address1" placeholder="Address" required>
                        <input type="text" id="city" placeholder="City" required>
                        <input type="text" id="state_code" placeholder="State/Province Code" required>
                        <input type="text" id="country_code" placeholder="Country Code" required>
                        <input type="text" id="zip" placeholder="Zip/Postal Code" required>
                        <button type="submit">Calculate Shipping Cost</button>
                        <button type="button" id="next-step-button" disabled>Next Step</button>
                    </form>
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
        <script type="text/javascript">
            $(document).ready(function() {
                document.getElementById('automatic_copyright_year').innerHTML = new Date().getFullYear();

                $('#next-step-button').hide();

                $('#shipping-form').on('submit', function(event) {
                    event.preventDefault();

                    $.ajax({
                        url: '/api/shipping/calculate',
                        method: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'product_id': '{{ $id }}',
                            'address1': $('#address1').val(),
                            'city': $('#city').val(),
                            'country_code': $('#country_code').val(),
                            'state_code': $('#state_code').val(),
                            'zip': $('#zip').val()
                        },
                        success: function(data) {
                            $('#shipping_cost').html('$' + data.rate + ' ' + data.name);
                        }
                    });
                });
            });
        </script>
    </body>
</html>