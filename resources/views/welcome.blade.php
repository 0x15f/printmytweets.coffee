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
        </style>
    </head>
    <body>
        <div id="header-title"><h1><a href="#"><i class="bx bxs-coffee"></i><br>Print My Tweets</a></h1></div>
        <main>
            <div class="section" id="buy">
            <div class="grid two">
                <div class="grid-section">
                    <h2>Buy</h2>
                    <p>Retweeting is cool and all, but have you ever printed one of your favorite tweets onto a coffee mug? Come on! You know you want to look at this every morning.</p>
                    <p>What are you waiting for? You can get your favorite tweet printed on a coffee mug for only $15!</p>
                    <form id="preview-form">
                        <input type="text" id="tweet_url" onclick="this.setSelectionRange(0, this.value.length);" placeholder="Tweet Link" pattern="(https:\/\/)?(?:www\.)?twitter\.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-]*)">
                        <div class="center">
                            <button type="submit">Preview</button>
                        </div>
                    </form>
                </div>
                <div class="grid-section">
                    <center>
                        <h2>Preview</h2>
                        <div id="image-holder">
                            <img id="preview-img" style="width: 250px; height: 250px;" src="/preview.jpg">
                        </div>
                        <canvas id="canvas"></canvas>
                        <br>
                        <button id="buy-button" class="center" type="button" product-id="" disabled>Order Now</button>
                    </center>
                </div>
            </div>
        </main>
        <br>
        <footer>
            <p>&copy; <span id="automatic_copyright_year"></span> Print My Tweets a product of <a href="https://lynndigital.com">Lynn Digital LLC</a></p>
            <p><center><a href="https://twitter.com/printmytweetsco"><i class='bx bx-md bxl-twitter'></i></a></center></p>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                document.getElementById('automatic_copyright_year').innerHTML = new Date().getFullYear();

                $('#error').hide();
                $('#canvas').hide();

                $('#preview-form').on('submit', function(event) {
                    event.preventDefault();

                    var url = $('#tweet_url').val();

                    $('#image-holder').html('<i class="bx bx-lg bxs-coffee spinner"></i>');
                    $('#preview-button').attr('disabled', true);

                    $.ajax({
                        url: 'https://printmytweets.coffee/api/preview?url=' + url,
                        success: function(data) {
                            // $('#image-holder').html('<img id="preview-img" style="width: 250px; height: 250px;" src="data:image/jpeg;base64,' + data.base64 + '">');

                            var canvas = document.getElementById('canvas');
                            var ctx = canvas.getContext('2d');

                            var productImg = new Image();

                            productImg.width = 500;
                            productImg.height = 500;
                            
                            productImg.onload = function() {
                                var iw = productImg.width;
                                var ih = productImg.height;

                                canvas.width = iw;
                                canvas.height = ih;

                                ctx.drawImage(productImg, 0, 0, productImg.width, productImg.height,0, 0, iw, ih);

                                var img = new Image();
                                img.src = 'data:image/jpeg;base64,' + data.base64;
                                img.onload = function() {
                                    var iw = img.width;
                                    var ih = img.height;

                                    var xOffset = 101, yOffset = 110;

                                    var a = 75.0;
                                    var b = 10;

                                    var scaleFactor = iw / (4 * a);

                                    for (var X = 0; X < iw; X += 1) {
                                        var y = b / a * Math.sqrt(a * a - (X - a) * (X - a));
                                        ctx.drawImage(img, X * scaleFactor, 0, iw / 3, ih, X + xOffset, y + yOffset, 1, 174);
                                    }
                                };
                            };

                            productImg.src = '/mug-blank.png';

                            $('#image-holder').hide();
                            $('#canvas').show();

                            $('#preview-button').attr('disabled', false);
                            $('#buy-button').attr('disabled', false);
                            $('#buy-button').attr('product-id', data.product);

                            return false;
                        }
                    });
                });

                $('#buy-button').on('click', function() {
                    window.location.href = '/buy/' + $('#buy-button').attr('product-id') + '?url=' + $('#tweet_url').val();
                });
            });
        </script>
    </body>
</html>