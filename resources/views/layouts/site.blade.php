<html>

    <style>
        .container{
            max-width: 1300px;
            margin-left: auto;
            margin-right: auto;
        }

        .second {
            padding-top: 100px;
            text-align: center;
        }

        .header{ 
            margin-top: 25px;
        }

        .header-flex{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
        }

        ul {
            list-style-type: none;
        }

        .header-links {
            display: flex;
            color: gray;
        }

        .header-links li + li{
        margin-left: 15px;
        }

        .link :hover{
            color: pink;
        }

        .cart{
        display: flex;
        align-items: center;
        }

        .cart li + li{
            margin-left: 15px;
        }

        footer {
            margin-top: 200px;
            background-color: aliceblue;
        }

        .footer-container {
            padding-top: 150px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 50px;
        }

        .footer-left {
            max-width: 300px;
        }

        footer ul {
            padding-left: 0px;
            display:flex;
            gap: 60px;
        }

        footer h1 {
            font-size: 30px;
            padding-bottom: 10px;
        }

        footer p {
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 15px;
        }

        .partners h1 {
        font-weight: 600;
        }
    </style>

    <head>
        <title>@yield('title')</title>
    </head>

    <body>

        <header class="header">
            <div class="container">
                <div class="header-flex">
                    <h2 class="logo">logo</h2>
                    <ul class="header-links">
                        <li><a class="link" href="#">Home</a></li>
                        <li><a class="link" href="#">About</a></li>
                        <li><a class="link" href="#">Contact</a></li>
                        <li><a class="link" href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
        </header>        

        <div class='container'>
            <div id='content'>
                @yield('content')
            </div>
        </div>
        
        <footer>
            <div class="container">
            <div class="footer-container">
            <div class="footer-left">
                <h1>UI.desk</h1>
                <p>On formed merits hunted unable merely by mr whence or.</p>
            </div>
            <div class="footer-right">
                <ul>
                    <li>
                        <h1><a href="#">Home</a></h1>
                        <p><a href="#">Company</a></p>
                        <p><a href="#">News</a></p>
                        <p><a href="#">Team</a></p>
                    </li>
                    <li>
                        <h1><a href="#">About</a></h1>
                        <p><a href="#">History</a></p>
                        <p><a href="#">Service</a></p>
                        <p><a href="#">Pricing</a></p>
                    </li>
                    <li>
                        <h1><a href="#">Partner</a></h1>
                        <p><a href="#">Business</a></p>
                        <p><a href="#">Plan</a></p>
                        <p><a href="#">Marketing</a></p>
                    </li>
                    <li>
                        <h1><a href="#">Contact</a></h1>
                        <p><a href="#">Name</a></p>
                        <p><a href="#">(465)954-8487</a></p>
                        <p><a href="#">Somewhere</a></p>
                    </li>
                </ul>
            </div>
        </footer>
    </body>
</html>