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
    </head>
    <body>
        <div id="header-title"><h1><a href="/"><i class="bx bxs-coffee"></i><br>Print My Tweets</a></h1></div>
        <main>
            <div class="section" id="buy">
            <div class="grid two">
                <div class="grid-section">
                    <h2>Order #{{ $order['id'] }}</h2>
                    <p>
                        Your order status is {{ $order['status'] }}! If you have any questions or concerns don't hesitate to reach out to <a href="mailto:support@printmytweets.coffee">support@printmytweets.coffee</a>.
                    </p><br>
                    <button type="button" onclick="window.location.href = '{{ @$order['shipments'][0]['tracking_url'] === null ? '#' : @$order['shipments'][0]['tracking_url'] }}'">Track Order</button>
                </div>
                <div class="grid-section">
                    <center>
                        <h2>Preview</h2>
                        <img style="width: 400px; height: 400px;" src="/storage/{{ $order['id'] }}.png">
                    </center>
                </div>
            </div>
        </main>
        <br>
        <footer>
            <p>&copy; <span id="automatic_copyright_year"></span> Print My Tweets a product of <a href="https://lynndigital.com">Lynn Digital LLC</a></p>
        </footer>

        <script type="text/javascript">
            document.getElementById('automatic_copyright_year').innerHTML = new Date().getFullYear();
        </script>
    </body>
</html>