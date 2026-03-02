<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Data Science Academy Group</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url("{{ asset('images/dsag3.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: #333;
        }

        /* HEADER */
        header {
            background-color: rgba(255, 165, 0, 0.9);
            color: white;
            padding: 1rem;
        }

        .default-header,
        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap; /* ✅ permet de passer en colonne sur mobile */
        }

        .default-header .logo {
            flex: 1;
            text-align: left;
            font-size: 1.5rem;
        }
        .default-header .site-name {
            flex: 1;
            text-align: center;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .default-header .menu {
            flex: 1;
            text-align: right;
        }

        .form-header .back a {
            text-decoration: none;
            color: white;
            font-size: 1.5rem;
        }
        .form-header .title {
            flex: 1;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
        }
        .form-header .menu {
            text-align: right;
        }

        /* NAVIGATION */
        nav {
            display: none;
            background-color: #f9f9f9;
            border: 2px solid orange;
            border-radius: 10px;
            margin-top: 0.5rem;
            text-align: center;
            padding: 0.5rem;
        }
        nav.active {
            display: block;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap; /* ✅ s’adapte sur mobile */
        }
        nav a, nav button {
            text-decoration: none;
            color: orange;
            font-weight: bold;
            background: none;
            border: none;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        nav a:hover, nav button:hover {
            color: #333;
        }

        /* MAIN */
        main {
            background-color: rgba(255,255,255,0.9);
            padding: 2rem;
            min-height: 70vh;
            border-radius: 10px;
            margin: 1rem;
        }

        /* DROPDOWN */
        .dropdown {
            margin: 0.5rem 0;
        }
        .dropdown button {
            width: 100%;
            background-color: orange;
            color: white;
            border: none;
            padding: 0.8rem;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            position: relative;
            font-weight: bold;
        }
        .dropdown button.der::after {
            content: "▼";
            position: absolute;
            right: 1rem;
        }
        .dropdown-content {
            display: none;
            background-color: #f9f9f9;
            padding: 0.5rem;
            border: 1px solid orange;
            border-radius: 5px;
            margin-top: 0.3rem;
        }
        .dropdown.active .dropdown-content {
            display: block;
        }

        div h3 {
            color: red;
            border: 3px solid red;
            text-align: center;
            border-radius: 20px;
        }

        /* Bouton spécial formulaire */
        .form-btn {
            background-color: orange;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: bold;
            margin: 5px;
            padding: 1rem 2rem;
        }
        .form-btn:hover {
            background-color: darkorange;
        }

        /* FOOTER */
        footer {
            background-color: rgba(255, 165, 0, 0.9);
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }
        .contact-icons {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 5px;
            flex-wrap: wrap; /* ✅ s’adapte sur mobile */
        }
        .contact-icons img {
            cursor: pointer;
            transition: transform 0.2s;
        }
        .contact-icons img:hover {
            transform: scale(1.2);
        }

        /* ✅ Responsivité */
        @media (max-width: 768px) {
            .default-header .site-name {
                font-size: 1rem;
            }
            .default-header .logo img {
                width: 60px;
            }
            main {
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            .default-header,
            .form-header {
                flex-direction: column;
                text-align: center;
            }
            .default-header .menu {
                text-align: center;
                margin-top: 0.5rem;
            }
            nav ul {
                flex-direction: column;
                gap: 0.5rem;
            }
            .form-btn {
                width: 100%;
                padding: 0.8rem;
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Menu principal
            const menuButtons = document.querySelectorAll(".menu button");
            const nav = document.getElementById("nav-links");

            menuButtons.forEach(btn => {
                btn.addEventListener("click", function() {
                    nav.classList.toggle("active");
                });
            });

            // Dropdowns
            const dropdowns = document.querySelectorAll(".dropdown button.der");
            dropdowns.forEach(btn => {
                btn.addEventListener("click", function() {
                    const parent = this.parentElement;
                    parent.classList.toggle("active");
                });
            });
        });
    </script>
</head>
<body>
    <!-- HEADER -->
    <header>
        @if(Route::currentRouteName() === 'formulaire')
            <div class="form-header">
                <div class="back"><a href="{{ route('accueil') }}">⬅</a></div>
                <div class="title">Formulaire de pré-inscription</div>
                <div class="menu"><button>☰</button></div>
            </div>
        @else
            <div class="default-header">
                <div class="logo">
                    <img src="{{ asset('images/dsag3.png') }}" alt="Logo DSAG" width="80">
                </div>
                <div class="site-name">Data Science Academy Group</div>
                <div class="menu"><button>&#9776;</button></div>
            </div>
        @endif

        <!-- NAVIGATION dynamique -->
        <nav id="nav-links">
            <ul>
                @guest
                    <li><a href="{{ route('login') }}">Se connecter</a></li>
                    <li><a href="{{ route('register') }}">Créer un compte</a></li>
                @endguest

                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Se déconnecter</button>
                        </form>
                    </li>
                    <li>Bonjour, {{ Auth::user()->nom }}</li>
                @endauth
            </ul>
        </nav>
    </header>

    <!-- MAIN -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <h2>Contactez-nous</h2>
        <div class="contact-icons">
            <a href="https://wa.me/22870389566" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" width="40">
            </a>
            <a href="mailto:sondikomlan930@gmail.com">
                <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email" width="40">
            </a>
            <a href="tel:+22870389566">
                <img src="https://cdn-icons-png.flaticon.com/512/724/724664.png" alt="Téléphone" width="40">
            </a>
            <a href="https://maps.app.goo.gl/CaRe6bgLEeWS38FR9" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/684/684908.png" alt="Localisation" width="40">
            </a>
        </div>
    </footer>
</body>
</html>
