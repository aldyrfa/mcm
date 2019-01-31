   <!-- Footer -->
        <footer>
            <!-- Footer top -->
            <div class="container footer_top">
                <div class="row">
                    <div class="col-lg-4 col-sm-7">
                        <div class="footer_item">
                            <h4>About Company</h4>
                            <img class="logo" src="images/logo.png" alt="Construction" />
                            <p>-</p>

                            <ul class="list-inline footer_social_icon">
                                <li><a href=""><span class="fa fa-facebook"></span></a></li>
                                <li><a href=""><span class="fa fa-twitter"></span></a></li>
                                <li><a href=""><span class="fa fa-youtube"></span></a></li>
                                <li><a href=""><span class="fa fa-google-plus"></span></a></li>
                                <li><a href=""><span class="fa fa-linkedin"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2 col-sm-5">
                        <div class="footer_item">
                            <h4>Explore link</h4>
                            <ul class="list-unstyled footer_menu">
                                <li><a href=""><span class="fa fa-play"></span> Our services</a>
                                <li><a href=""><span class="fa fa-play"></span> Meet our team</a>
                                <li><a href=""><span class="fa fa-play"></span> Forum</a>
                                <li><a href=""><span class="fa fa-play"></span> Help center</a>
                                <li><a href=""><span class="fa fa-play"></span> Contact Cekas</a>
                                <li><a href=""><span class="fa fa-play"></span> Privacy Policy</a>
                                <li><a href=""><span class="fa fa-play"></span> Cekas terms</a>
                                <li><a href=""><span class="fa fa-play"></span> Site map</a>
                            </ul>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-3 col-sm-7">
                        <div class="footer_item">
                            <h4>Latest post</h4>
                            <ul class="list-unstyled post">
                                <li><a href=""><span class="date">20 <small>AUG</small></span>  Luptatum omittantur duo ne mpetus indoctum</a></li>
                                <li><a href=""><span class="date">20 <small>AUG</small></span>  Luptatum omittantur duo ne mpetus indoctum</a></li>
                                <li><a href=""><span class="date">20 <small>AUG</small></span>  Luptatum omittantur duo ne mpetus indoctum</a></li>
                                <li><a href=""><span class="date">20 <small>AUG</small></span>  Luptatum omittantur duo ne mpetus indoctum</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="col-lg-3 col-sm-5">
                        <div class="footer_item">
                            <h4>Contact us</h4>
                            <ul class="list-unstyled footer_contact">
                                <li><a href=""><span class="fa fa-map-marker"></span>Jl. Cingised No.48B, Cisaranten Endah, Arcamanik, Kota Bandung, Jawa Barat 40293</a></li>
                                <li><a href=""><span class="fa fa-envelope"></span> mcm@maratama.com</a></li>
                                <li><a href=""><span class="fa fa-mobile"></span><p>(022) 8724662 
                            </p></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- Footer top end -->

            <!-- Footer bottom -->
            <div class="footer_bottom text-center">
                <p class="wow fadeInRight">
                    Made with 
                    <i class="fa fa-heart"></i>
                    by 
                    <a target="_blank" href="index.php">PT.MARATAMA CIPTA MANDIRI</a> 
                    2018. All Rights Reserved
                </p>
            </div><!-- Footer bottom end -->
        </footer><!-- Footer end -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    
    // 26.000.000 untuk 25 MB
    $(document).ready(function(){
        validate_upload_file_cv("cv");
        validate_upload_file("ijazah");
        validate_upload_file("sertifikat_keahlian");
        validate_upload_file("fotocopy_ktp");
        validate_upload_file("npwp");
    });

function validate_upload_file_cv(file)
    {
        uploadField = document.getElementById(file);

        uploadField.onchange = function() {

            var val = this.value.toLowerCase();
            var regex = new RegExp("(.*?)\.(pdf|doc|docx)$");

            if(!(regex.test(val))) {
                swal("Upload Failed", "Maaf, File yang diperbolehkan hanya Pdf, Doc, img, jpg, png, JPEG", "error");
                this.value = "";
            }else if(this.files[0].size > 3000000){
                swal("warning", "Data Upload Tidak Boleh > 3MB", "error");
                this.value = "";
            }
        };
    }    

    function validate_upload_file(file)
    {
        uploadField = document.getElementById(file);

        uploadField.onchange = function() {

            var val = this.value.toLowerCase();
            var regex = new RegExp("(.*?)\.(pdf|jpg|PNG|png|jpeg|JPEG)$");

            if(!(regex.test(val))) {
                swal("Upload Failed", "Maaf, File yang diperbolehkan hanya Pdf, Doc, img, jpg, png, JPEG", "error");
                this.value = "";
            }else if(this.files[0].size > 3000000){
                swal("warning", "Data Upload Tidak Boleh > 3MB", "error");
                this.value = "";
            }
        };
    }

</script>