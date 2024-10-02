<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.querySelector('#login-form');

    if (loginForm) {
        loginForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            const email = document.querySelector('input[name="email"]').value;
            const password = document.querySelector('input[name="password"]').value;

            const response = await fetch('{{ route("login") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email, password })
            });

            const result = await response.json();

            if (result.auth) {
                // Store login status in localStorage
                localStorage.setItem('auth', 'true');

                // Redirect to home page
                window.location.href = '/';
            } else {
                alert(result.message);
            }
        });
    }

    // Check localStorage for authentication state and modify the UI accordingly
    const auth = localStorage.getItem('auth');
    if (auth === 'true') {
        document.querySelector('.nav-links-login').style.display = 'none';
        document.querySelector('.logout-button').style.display = 'block';
    } else {
        document.querySelector('.nav-links-login').style.display = 'flex';
        document.querySelector('.logout-button').style.display = 'none';
    }
});
</script>


<style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-color: #ff5a00;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }

    .header a {
      color: white;
      text-decoration: none;
      margin: 0 10px;
      font-size: 14px;
    }

    .hero-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 50px;
      background-color: #ff5a00;
    }

    .hero-content {
      width: 50%;
      color: #000;
      background-color: #fff;
      padding: 50px;
      border-radius: 10px;
      position: relative;
    }

    .hero-content h1 {
      font-size: 50px;
      line-height: 1.2;
      margin-bottom: 20px;
    }

    .hero-content h1 span {
      color: #ff5a00;
    }

    .hero-content p {
      margin-bottom: 30px;
      font-size: 16px;
      color: #555;
    }

    .hero-content .buttons {
      display: flex;
      gap: 15px;
    }

    .hero-content .buttons a {
      padding: 12px 30px;
      text-align: center;
      border-radius: 5px;
      color: white;
      font-size: 14px;
    }

    .hero-content .read-more {
      background-color: #ff5a00;
    }

    .hero-content .contact-us {
      background-color: #333;
    }

    .hero-image {
      width: 50%;
      position: relative;
    }

    .hero-image img {
      max-width: 100%;
      border-radius: 20px;
      transform: translateY(50px);
    }

    .navigation-arrows {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      left: -50px;
    }

    .navigation-arrows a {
      display: block;
      padding: 10px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    .navigation-arrows a:nth-child(2) {
      background-color: #ff5a00;
    }

    @media (max-width: 768px) {
      .hero-section {
        flex-direction: column;
      }

      .hero-content, .hero-image {
        width: 100%;
      }

      .navigation-arrows {
        left: 10px;
      }
    }
  </style>



</head>




<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="https://themewagon.github.io/trator/images/logo.png" alt="Logo"> 
            </div>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="{{ route('voiture.index') }}">Vehicles</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Content -->
    <div class="container">
    <ul class="nav-links-login">
        @guest
            <!-- If the user is not logged in -->
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <!-- If the user is logged in -->
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @endguest
    </ul>
    @yield('content')
</div>



  <div class="hero-section">
    <div class="hero-content">

      <h1>Car Rent <span>For You</span></h1>
      <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
      <div class="buttons">
        <a href="#" class="read-more">Read More</a>
        <a href="#" class="contact-us">Contact Us</a>
      </div>
    </div>
    <div class="hero-image">
      <img src="https://themewagon.github.io/trator/images/banner-img.png" alt="Jeep Car">
    </div>
  </div>



    <section id = "about" class = "section2">
        <div>
            <img src="https://themewagon.github.io/trator/images/about-img.png" alt="img">
        </div>

        <div>
     <div >
        <h1 class="details">
        About Us
        </h1>
        <p class="about_text">
        going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
        </p>

        <button class= "read-more">
            Read More
        </button>
        </div>
        </div>
    </section>





    <section class="search-section">
    <div class="search-container">
      <h1>Search Your Best Cars</h1>
      <p>Using 'Content here, content here', making it look like readable</p>
      <div class="search-filters">
        <select>
          <option>Any Brand</option>
        </select>
        <select>
          <option>Any type</option>
        </select>
        <select>
          <option>Price</option>
        </select>
        <button class="search-btn">SEARCH NOW</button>
      </div>
    </div>
  </section>

  <!-- Best Offers Section -->
  <section id= 'services' class="offers-section">
  <h2>OUR BEST OFFERS</h2>
  <div class="offers-container">
    <!-- Offer 1 -->
    <div class="offer-card">
      <img src="https://themewagon.github.io/trator/images/banner-img.png" alt="Toyota Car">
      <h3>TOYOTA CAR</h3>
      <p>Start per day $4500</p>
      <a href="{{ route('reservation.create') }}" class="book-btn">Book Now</a>
    </div>
    <!-- Offer 2 -->
    <div class="offer-card">
      <img src="https://themewagon.github.io/trator/images/banner-img.png" alt="Toyota Car">
      <h3>TOYOTA CAR</h3>
      <p>Start per day $4500</p>
      <a href="{{ route('reservation.create') }}" class="book-btn">Book Now</a>
    </div>
    <!-- Offer 3 -->
    <div class="offer-card">
      <img src="https://themewagon.github.io/trator/images/banner-img.png" alt="Toyota Car">
      <h3>TOYOTA CAR</h3>
      <p>Start per day $4500</p>
      <a href="{{ route('reservation.create') }}" class="book-btn">Book Now</a>
    </div>
    <div class="offer-card">
      <img src="https://themewagon.github.io/trator/images/banner-img.png" alt="Toyota Car">
      <h3>TOYOTA CAR</h3>
      <p>Start per day $4500</p>
      <a href="{{ route('reservation.create') }}" class="book-btn">Book Now</a>
    </div>
    <div class="offer-card">
      <img src="https://themewagon.github.io/trator/images/banner-img.png" alt="Toyota Car">
      <h3>TOYOTA CAR</h3>
      <p>Start per day $4500</p>
      <a href="{{ route('reservation.create') }}" class="book-btn">Book Now</a>
    </div>
  </div>
</section>




  <section id="contact" class="contact-section">
        <div class="contact-container">
            <h2>GET IN TOUCH</h2>
            <form class="contact-form">
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="tel" placeholder="Phone Number">
                <textarea placeholder="Message"></textarea>
                <button type="submit" class="submit-btn">SEND</button>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer-section">
        <div class="footer-container">
            <!-- Subscribe Now -->
            <div class="footer-col">
                <h3>Subscribe Now</h3>
                <p>There are many variations of passages of Lorem Ipsum available.</p>
                <input type="email" placeholder="Enter Your Email">
                <button class="subscribe-btn">SUBSCRIBE</button>
            </div>
            <!-- Information -->
            <div class="footer-col">
                <h3>Information</h3>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
            </div>
            <!-- Helpful Links -->
            <div class="footer-col">
                <h3>Helpful Links</h3>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
            </div>
            <!-- Investments -->
            <div class="footer-col">
                <h3>Investments</h3>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
            </div>
            <!-- Contact Us -->
            <div class="footer-col">
                <h3>Contact Us</h3>
                <p><i class="fa fa-map-marker"></i> Location</p>
                <p><i class="fa fa-phone"></i> (+71) 8322369417</p>
                <p><i class="fa fa-envelope"></i> demo@gmail.com</p>
                <div class="social-links">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <p class="footer-note">2023 All Rights Reserved. Design by Free Html Templates Distributed By ThemeWagon</p>
    </footer>
</body>
</html>
