<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="theme-color" content="#6f4e37">

        <title>Print My Tweets </title>

        <link href="https://fonts.googleapis.com/css?family=PT+Mono:400,700" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/boxicons@1.9.1/css/boxicons.min.css" rel="stylesheet">
        <link href="/jakescoffee.css" rel="stylesheet">
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
                        <center><img src="https://i.imgur.com/TAPm20X.jpg"></center>
                    </div>
                    <div class="grid-section">
                        <h2>About</h2>
                        <p>Retweeting is cool and all, but have you ever printed one of your favorite tweets onto a coffee mug? Come on! You know you want to look at this every morning.</p>
                    </div>
                </div>
            </div>
            <div class="section" id="reviews">
                <h2>Reviews</h2>
                <p><i>No customers yet :( You should be our first!</i></p>
            </div>
            <div class="section" id="buy">
            <div class="grid two">
                <div class="grid-section">
                    <h2>Buy</h2>
                    <p>What are you waiting for? You can get your favorite tweet printed on a coffee mug for only $12 (with free shipping included)!</p>
                    <form action="https://account.1mb.site" method="POST">
                        <input type="text" name="tweet" placeholder="Tweet Link">
                        <button type="submit">Buy Now</button>
                    </form>
                </div>
                <div class="grid-section">
                    <center>
                        <h2>Preview</h2>
                        <img src="https://i.imgur.com/TAPm20X.jpg">
                    </center>
                </div>
            </div>
        </main>
        <footer>
            <p>Jake's Coffee &copy; <span id="automatic_copyright_year"></span> - <a href="https://twitter.com/jakescoffee" target="_blank"><i class="bx bxl-twitter"></i> jakescoffee</a> - Designed by <a href="https://dalton.1mb.site" target="_blank">DE</a></p>
        </footer>
        <script>
            document.getElementById('automatic_copyright_year').innerHTML = new Date().getFullYear();
        </script>
    </body>
</html>