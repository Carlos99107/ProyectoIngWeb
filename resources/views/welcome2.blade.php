<style>
    body {
      font-family: system-ui;
      text-align: center;
      font-size: 16%;
    }
    .site-footer {
        position: relative;
        background-color:#1A1F24;
        width: 100%;
        bottom: 0;
    }

    .site-footer .container {
        max-width: 85%;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
        padding-top: 20px;
    }

    .site-footer .container h1 {
        font-size: 40px;
    }

    .site-footer .container h2 {
        font-size: 40px;
        float: right;
    }

    .site-footer .grid-container a {
        color: #A2845C;
        text-decoration: none;
        font-size: 15px;
        line-height: 16.25px;
    }

    .site-footer .grid-item {
        padding: 10px;
        color: #A2845C;
    }


    .site-footer .grid-container .inner-grid-container {
        display: grid;
        grid-template-columns: auto auto auto auto;
        text-align: left;
    }

    .site-footer .container hr {
        display: block;
        height: 1px;
        border: 0; border-top: 1px solid #A2845C;
        margin: 1px;
        padding: 0;
    }

    .site-footer .container p {
        font-size: 14px;
        text-align: right;
        color: #A2845C;
        font-weight: 500;
    }

    .site-footer .container .logo-img {
        width: 200px;
        height: 140px;
        cursor: pointer;
    }

    .site-footer .grid-container .grid-item .social-buttons {
        padding-top: 20px;
    }

    .site-footer .grid-container .grid-item .social-buttons a {
        display: inline-flex;
        text-decoration: none;
        font-size: 30px;
        width: 60px;
        height: 100px;
        color: #1A1F24;
        justify-content: center;
        align-items: center;
        position: relative;
        margin: 0 8px;
    }


    .site-footer .grid-container .grid-item .social-buttons a i{
        transition: 0.3s ease-in;
    }

    .site-footer .grid-container .grid-item .social-buttons a:hover i {
        background: linear-gradient(45deg,#A2845C,#ffffff8f);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        transform: scale(1.5);
    }

    .circle-icon {
        background: #A2845C;
        padding:12px;
        border-radius: 50%;
    }

    @media only screen and (max-width: 600px) {

        .site-footer {
            height: 620px;
            bottom: 0;
        }

        .site-footer .grid-container {
            display: grid;
            grid-template-columns: 400px;
        }

        .site-footer .grid-container .inner-grid-container {
            display: grid;
            grid-template-columns: auto auto ;
            text-align: left;
        }


    }
    @media only screen and (min-width: 992px) {

        .site-footer {
            height: 260px;
            bottom: 0;
        }

        .site-footer .grid-container {
            display: grid;
            grid-template-columns: 350px auto 350px;
        }

        .site-footer .grid-container .inner-grid-container{
            display: grid;
            grid-template-columns: auto auto auto auto;
            text-align: left;
        }
        .carousel, .carousel-inner > .item > img {
        height: 550px;
        }
    }

    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"  />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand">Restaurant App</a>
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('cliente') }}" class="btn btn-dark">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-dark">Log in</a>

                    @if (Route::has('registerUser'))
                        <a href="{{ route('registerUser') }}" class="btn btn-dark">Register</a>
                    @endif
                @endauth
        @endif
    </div>
    </div>
  </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="9000">
                        <img src="https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg" class="d-block w-100 h-100" alt="Img1" >
                        <div class="carousel-caption d-none d-md-block" style="background-color: rgba(250, 250, 250, 0.747)">
                          <h4>Los mejores platos</h4>
                          <p>El mejor sabor y precio para tu familia.</p>
                        </div>
                      </div>
                      <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://cdn.pixabay.com/photo/2015/03/26/09/42/breakfast-690128_960_720.jpg" class="d-block w-100 h-100" alt="Img2" >
                        <div class="carousel-caption d-none d-md-block" style="background-color: rgba(250, 250, 250, 0.747)">
                          <h4>Ambiente familiar</h4>
                          <p>Disfruta de nuestro ambiente.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="https://cdn.pixabay.com/photo/2017/01/26/02/06/platter-2009590_960_720.jpg" class="d-block w-100 h-100" alt="Img3">
                        <div class="carousel-caption d-none d-md-block" style="background-color: rgba(250, 250, 250, 0.747)">
                          <h4>Sabores únicos</h4>
                          <p>Los mejores ingredientes para ti y tu familia.</p>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden" >Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>

    </div>
      <script>
          document.getElementById("defaultOpen").click();
          function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";

      }
      </script>
            <footer class="site-footer">
            <div class = "container">

                <div class="grid-container">
                    <div class="grid-item">
                        <div class="grid-item"><a href="">About Me</a></div>
                    </div>
                    <div class="grid-item inner-grid-container">
                    </div>

                    <div class="grid-item">
                        <div class = "social-buttons">
                            <div class="grid-item">Social Networks:</div>
                            <a href= ""><i class="fab fa-instagram circle-icon"></i></a>
                            <a href= ""><i class="fab fa-facebook circle-icon"></i></a>
                            <a href= ""><i class="fab fa-linkedin-in circle-icon"></i></a>
                            <a href= ""><i class="fab fa-twitter circle-icon"></i></a>
                        </div>
                    </div>
                </div>
                <hr>

                <p>Copyright © 2021 | Developed by Carlos Martínez</p>

            </div>
        </footer>
