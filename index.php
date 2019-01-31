<?php 

session_start();
include 'koneksi.php';

 ?>




<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>PT. MARATAMA CIPTA MANDIRI</title>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="custom-font/fonts.css" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <!-- Bootsnav -->
        <link rel="stylesheet" href="css/bootsnav.css">
        <!-- Fancybox -->
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />	
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="css/custom.css" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>

      <?php include 'navbar.php'; ?>


        <section id="home" class="home">
            <!-- Carousel -->
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel-inner -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="gambar/mantap.jpg" alt="Construction">
                        <div class="overlay">
                            <div class="carousel-caption">
                                <!-- <h3>We are Certified Engineers</h3>
                                <h1>Construction Services</h1> -->
                                <h1 class="second_heading">PT. MARATAMA CIPTA MANDIRI</h1>
                                <p>In this globalization era and an even stricter competition rising along with economic growth in general and the world onf construction in particular, PT. MARATAMA CIPTA MANDIRI trying to face these challenges by focusing on structure, architecture, and environment planning service. We continuously seeking for new innovation to improve the company's competitiveness in facing this global market. </p>
                                <!-- <a  class="btn know_btn">know more</a>
                                <a  class="btn know_btn">view project</a> -->
                            </div>					
                        </div>
                    </div>
                    <div class="item">
                        <img src="gambar/mantap2.jpg" alt="Construction">
                       
                    </div>
                    <div class="item">
                        <img src="gambar/mantap3.jpg" alt="Construction">
                        <
                    </div>
                </div><!-- Carousel-inner end -->



                <!-- Controls -->
                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><!-- Carousel end-->

        </section>


        <!-- About -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="about_content">
                            <h2>PT. MARATAMA CIPTA MANDIRI</h2>
                        
                            <p>Menghadapi era globalisasi dan kompetisi yang semakin ketat seiring dengan pertumbuhan ekonomi pada umumnya dan dunia konstruksi pada khususnya. PT. MARATAMA CIPTA MANDIRI berusaha menjawab tantangan ini dengan mulai memfokuskan diri pada Jasa Perencanaan Struktur, Arsitektur, dan Lingkungan.</p>
                            <p>Terobosan-terobosan inovatif terus kami lakukan untuk meningkatkan daya saing perusahaan dalam menghadapi pasar global ini. Kami percaya, setiap inovasi yang kami berikan akan menghasilkan nilai tambah bagi setiap proses perencanaan dan pembangunan yang akan dilaksanakan dan semakin menjamin kepuasan para pengguna jasa. </p>

                        </div>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="about_content">
                            <h2>Info Lowongan Pekerjaan</h2>
                        
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                      <th>
                                          No
                                      </th> 
                                      <th>
                                          Nama Divisi
                                      </th> 
                                      <th>
                                          Tanggal Mulai
                                      </th>
                                      <th>
                                          Tanggal Berakhir
                                      </th>
                                      <th>
                                         Persyaratan
                                      </th>
                                      <th>
                                          Info
                                      </th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor=1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM lowongan WHERE DATE(NOW()) BETWEEN tanggal_mulai AND tanggal_selesai"); ?>
        <?php while($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_divisi']; ?></td>
            <td><?php echo $pecah['tanggal_mulai']; ?></td>
            <td><?php echo $pecah['tanggal_selesai']; ?></td>
            <td><?php echo $pecah['persyaratan']; ?></td>
            <td><a href="erequiretment.php?id=<?php echo $pecah['id_lowongan']; ?>">Daftar</a></td>
            
        </tr>

        <?php $nomor++; ?>
        <?php } ?>
                                    
                                </tbody>
                            </table>
                            <a  class="btn know_btn">know more</a>
                        </div>
                    </div>

                  
                </div>







            </div>
        </section><!-- About end -->

        <!-- Why us -->
        <!-- <section id="why_us">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="head_title">
                            <h2>WHY CHOOSE US?</h2>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="why_us_item">
                            <span class="fa fa-leaf"></span>
                            <h4>We deliver quality</h4>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="why_us_item">
                            <span class="fa fa-futbol-o"></span>
                            <h4>Always on time</h4>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="why_us_item">
                            <span class="fa fa-group"></span>
                            <h4>We are pasionate</h4>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="why_us_item">
                            <span class="fa fa-line-chart"></span>
                            <h4>Professional Services</h4>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- Why us end -->
 
        <!-- Services -->
        <section id="services">
            <div class="container">
                <h2>LAYANAN</h2>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="service_item">
                            <img src="images/1.jpg" alt="Our Services" />
                            <h3>STRUCTURE</h3>
                            <p>-</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="service_item">
                            <img src="images/2.jpg" alt="Our Services" />
                            <h3>ARCHITECTURE</h3>
                            <p>-</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="service_item">
                            <img src="images/3.jpg" alt="Our Services" />
                            <h3>ENGINEERING</h3>
                            <p>-</p>
                            <a href="#services" class="btn know_btn">know more</a>

                        </div>
                    </div>
                    
                    </div>
                    <div class="col-sm-4">
                        <div class="service_item">
                            <img src="images/4.jpg" alt="Our Services" />
                            <h3>MASTER PLAN</h3>
                            <p>-</p>
                            <a href="#services" class="btn know_btn">know more</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- Services end -->

        <!-- Portfolio -->
        <section id="portfolio">
            <div class="container portfolio_area text-center">
                <h2>HASIL PROJECT</h2>
                <p>Berikut Hasil Project yang telah dikerjakan oleh PT.Maratama Cipta Mandiri</p>

                <div id="filters">
                    <button class="button is-checked" data-filter="*">Show All</button>
                    <button class="button" data-filter=".buildings">Buildings</button>
                    <button class="button" data-filter=".interior">HIGH WAY</button>
                    <button class="button" data-filter=".isolation">BRIDGE</button>
                    <button class="button" data-filter=".plumbing">FLY OVER</button>
                </div>
                <!-- Portfolio grid -->		
                <div class="grid">
                    <div class="grid-sizer"></div>
                    <div class="grid-item grid-item--width2 grid-item--height2 buildings ">
                        <img alt="" src="images/f1.jpg" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="images/f1.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-link"></span></a>
                        </div>  
                    </div>
                    <!-- Building / bangunan -->
                    <div class="grid-item buildings ">
                        <img alt="" src="images/f2.jpg" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="images/f2.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-link"></span></a>
                        </div>   
                    </div>

                    <div class="grid-item buildings">
                        <img alt="" src="images/f3.jpg" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="images/f3.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-link"></span></a>
                        </div>  
                    </div>
                    <!-- Akhir Building / bangunan -->
                    <!-- Highway / Jalan tol -->
                    <div class="grid-item interior ">
                        <img alt="" src="images/h1.jpg" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="images/h1.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-link"></span></a>
                        </div>  
                    </div>

                    <div class="grid-item interior">
                        <img alt="" src="images/h2.jpg" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="images/h2.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-link"></span></a>
                        </div>  
                    </div>
                    <!-- Akhir Highway / Jalan tol -->
                    <!-- Bridge / jembatan -->
                    <div class="grid-item isolation">
                        <img alt="" src="images/j1.jpg" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="images/j1.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-link"></span></a>
                        </div>  
                    </div>
                     <div class="grid-item isolation">
                        <img alt="" src="images/j2.jpg" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="images/j2.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-link"></span></a>
                        </div>  
                    </div>
                    
                    <!-- Akhir Bridge / jembatan -->
                     <div class="grid-item plumbing">
                        <img alt="" src="images/o1.jpg" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="images/o1.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-link"></span></a>
                        </div>  
                    </div>
                     <div class="grid-item plumbing">
                        <img alt="" src="images/j3.jpg" >
                        <div class="portfolio_hover_area">
                            <a class="fancybox" href="images/j3.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><span class="fa fa-search"></span></a>
                            <a href="#"><span class="fa fa-link"></span></a>
                        </div>  
                    </div>
                </div><!-- Portfolio grid end -->
            </div>
        </section><!-- Portfolio end -->

        
       
       
<?php include 'footer.php'; ?>

        <!-- JavaScript -->
        <script src="js/jquery-1.12.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Bootsnav js -->
        <script src="js/bootsnav.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="js/isotope.js"></script>
        <script src="js/isotope-active.js"></script>
        <script src="js/jquery.fancybox.js?v=2.1.5"></script>

        <script src="js/jquery.scrollUp.min.js"></script>

        <script src="js/main.js"></script>
    </body>	
</html>	