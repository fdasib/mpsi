<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8" /> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Proklim Purbayan</title>
    <link rel="stylesheet" href="asset/plugins/fontawesome/css/all.min.css" />
    <!-- style sendiri -->
    <link rel="stylesheet" href="asset/css/style.css" />
</head>

<body>
    <div class="container">
        <div class="navbar" id="navbar">
            <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href="#program"><i class="fa fa-fw fa-search"></i> Program</a>
            <a href="#about"><i class="fa fa-fw fa-envelope"></i> About</a>
            <a href="#kontak"><i class="fa fa-fw fa-user"></i> Kontak</a>
        </div>
        <div class="navbar-mobile" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </div>

    <header id="home">
        <div class="hero-img"></div>
        <div class="hero-text">
            <h1>Proklim Purbayan</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Iste, tempore.
            </p>
            <button>Selengkapnya!</button>
        </div>
    </header>

    <main>
        <div class="program" id="program">
            <h2 class="judul">Program</h2>

            <div class="row">
                <div class="column">
                    <div class="content">
                        <img src="asset/logo/logo kantin.jpg" alt="" />
                        <div class="content-text">
                            <h3>Kantin Bunga Raya</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Explicabo, pariatur?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="content">
                        <img src="asset/logo/logo bank sampah.jpg" alt="" />
                        <div class="content-text">
                            <h3>Bank Sampah Bunga Raya</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Explicabo, pariatur?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="content">
                        <img src="asset/logo/logo posyandu.jpg" alt="" />
                        <div class="content-text">
                            <h3>Posyandu Purbayan IX</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Explicabo, pariatur?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about" id="about">
            <h2 class="judul">About (Tentang)</h2>
            <div class="content-about">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis fugiat saepe, reiciendis voluptatum omnis iste odio quod mollitia similique officiis voluptates ut facere, rem sunt expedita! Nihil expedita laborum tempora, adipisci in asperiores est quis repellat perferendis, facilis veritatis sapiente repudiandae. Nemo libero, mollitia ipsam quisquam quae facilis rem fuga, pariatur deleniti non, aliquid debitis numquam repudiandae error obcaecati ipsum magnam quis iste voluptas! Quidem consectetur ea sit, tenetur excepturi commodi facere maiores, veritatis at voluptates necessitatibus. Nostrum voluptatum ipsum, quia reprehenderit eos tenetur provident tempore officiis natus doloremque molestias, commodi saepe consequatur minima. Cupiditate nam accusantium tempora tempore pariatur.</p>

                <div class="row-pp">
                    <div class="col-pp">Data Anak-anak</div>
                    <div class="col-pp">Data KK</div>
                    <div class="col-pp">Prestasi</div>
                    <div class="col-pp">Struktur Organisasi</div>
                </div>
            </div>
            <div class="gambar">
                <img src="asset/img/" alt="" />
            </div>
        </div>

        <div class="kontak" id="kontak">
            <h2 class="judul">Kontak</h2>
            <div class="content-kontak">
                <div class="row-pp">
                    <div class="col-pp">
                        <h2>By Phone</h2>
                        <p>
                            <p>Wa:</p>
                            <p>+62 0473856271039</p>
                        </p>
                    </div>
                    <div class="col-pp">
                        <h2>Email</h2>
                        <p>
                            <p>Gmail:</p>
                            <p>Loremipsum@gmail.com</p>
                        </p>
                    </div>
                    <div class="col-pp">
                        <h2>Location</h2>
                        <p>https://</p>
                    </div>
                </div>
            </div>
            <div class="gambar">
                <img src="asset/img/" alt="" />
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-top">
            <div class="button-top">
                <div class="circle-up" id="toup">
                    <p>UP</p>
                </div>
                <hr />
            </div>
        </div>
        <div class="footer-middle">
            <div class="row">
                <div class="column">
                    <img src="asset/img/logo-proklim2.png" alt="" />
                </div>
                <div class="column">
                    <h2>kontak</h2>
                    <address>
                        Perumahan Kelapa Gading, RT.03 / RW.11, Dusun I,
                        Purbayan, Kec. Baki, Kabupaten Sukoharjo, Jawa
                        Tengan 57556
                    </address>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy; 2023 Proklim Purbayan Indonesia</p>
        </div>
    </footer>
    </div>

    <script src="asset/js/script.js"></script>
    <script>
        document.querySelectorAll(".navbar a").forEach(e => {
            e.classList.add("navbar-top");
        });

        window.addEventListener("scroll", function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.querySelectorAll(".navbar a").forEach(e => {
                    e.classList.remove("navbar-top");
                    e.classList.remove("active");
                });
            } else {
                document.querySelectorAll(".navbar a").forEach(e => {
                    e.classList.add("navbar-top");
                });
            }
        });
    </script>
</body>

</html>