    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>🎼Ruydo - A sua loja de discos!</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../style/index.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script type="module" src="../script/index.js"></script>
    </head>


    <body>
        <?php
        require "../php/header.php";
        echo returnHeaders();
        ?>

        <div id="notification"></div>

        <div id="cart"><a href="cart.php"><img src="https://cdn-icons-png.flaticon.com/512/57/57451.png?w=360" alt=""></a></div>
        <main>        
            <nav id="sidebar">
                    <button class="catBtn" value='cd'>💿<p>CDs</p></button>
                    <button class="catBtn" value='lp'>💽<p>LPs</p></button>
                    <button class="catBtn" value='audio'>🎧<p>Audio</p></button>
                    <button class="catBtn" value='merch'>🧥<p>Merch</p></button>
            </nav>

            <div id="productsContainer">
                <div id="searchBar">
                    <form action=""><input type="text" placeholder="O que você quer ouvir?"><button>🔎</button></form>
                </div>
                <div class="products"></div>
            </div>
        </main>
    </body>
    </html>