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
        <header>
            <table>
                <tr>
                    <td><a href="#about"><i class="bx bxs-coffee-alt"></i><br>About</a></td>
                    <td><a href="#reviews"><i class="bx bxs-star"></i><br>Reviews</a></td>
                    <td><a href="#buy"><i class="bx bxs-dollar-circle"></i><br>Buy</a></td>
                </tr>
            </table>
        </header>
        <main>
            <div class="section" id="about">
                <div class="grid one">
                    <div class="grid-section">
                        <center><img style="width: 500px; height: 500px;" src="/preview.png"></center>
                    </div>
                    <div class="grid-section">
                        <h2>About</h2>
                        <p>Retweeting is cool and all, but have you ever printed one of your favorite tweets onto a coffee mug? Come on! You know you want to look at this every morning.</p>
                    </div>
                </div>
            </div>
            <div class="section" id="buy">
            <div class="grid two">
                <div class="grid-section">
                    <h2>Buy</h2>
                    <p>What are you waiting for? You can get your favorite tweet printed on a coffee mug for only $12 (with free shipping included)!</p>
                    <form>
                        <input type="text" id="tweet_url" placeholder="Tweet Link">
                        <button type="button" id="preview-button">Preview</button>
                    </form>
                </div>
                <div class="grid-section">
                    <center>
                        <h2>Preview</h2>
                        <div id="image-holder">
                            <img id="preview-img" style="width: 250px; height: 250px;" src="/preview.png">
                        </div>
                        <br>
                        <button type="submit">Buy Now</button>
                    </center>
                </div>
            </div>
        </main>
        <footer>
            <p>&copy; <span id="automatic_copyright_year"></span> Print My Tweets a product of <a href="https://lynndigital.com">Lynn Digital LLC</a></p>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js" integrity="sha256-YCbKJH6u4siPpUlk130udu/JepdKVpXjdEyzje+z1pE=" crossorigin="anonymous"></script>
        <script>
            $(document).on('load', () => {
                document.getElementById('automatic_copyright_year').innerHTML = new Date().getFullYear();

                $('#preview-button').on('click', function() {
                    $('#image-holder').html('<i class="bx bxs-coffee spinner"></i>');

                    var url = $('#tweet_url').val();

                    $.ajax({
                        url: 'https://printmytweets.coffee/api/preview?url=' + url,
                        success: (data) => {
                            $('#image-holder').html('<img id="preview-img" style="width: 250px; height: 250px;" src="data:image/jpeg;base64,' + data.base64 + '">');
                        }
                    })
                });
            });
        </script>
    </body>
</html>