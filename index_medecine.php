 <?php
   
    include("include/headder.php");
?> 
        <main id="main">
            <section id="features">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-12 offset-lg-12">
                            <div class="section-header wow fadeIn" data-wow-duration="1s">
                            <h3 class="section-title"><i class="fas fa-table"></i>ตารางจัดการยาและเวชภัณฑ์</h3>
                            <span class="section-divider"></span>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" >
                            <div id="report-table" ></div>
                        </div>
                    </div>
                </div>
            </section><!-- #features -->

        </main>

        <!--==========================
            Footer
        ============================-->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        Copyright 2019 @Saraburi Provincial Health Office
                    </div>
                    <div class="credits">
                        <!--
                        All the links in the footer should remain intact.
                        You can delete the links only if you purchased the pro version.
                        Licensing information: https://bootstrapmade.com/license/
                        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
                        -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                    </div>
                </div>
            </div>
        </footer><!-- #footer -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="lib/jquery/jquery-3.3.1.min.js"></script>
        <script src="lib/jquery/jquery-migrate.min.js"></script>
        <script src="lib/popper.js/dist/umd/popper.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/superfish/hoverIntent.js"></script>
        <script src="lib/superfish/superfish.min.js"></script>
        <script src="lib/magnific-popup/magnific-popup.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="lib/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="lib/datatables-plugins/integration/bootstrap/4/dataTables.bootstrap4.min.js"></script>
        <script src="lib/datatables-plugins/integration/bootstrap/4/responsive.bootstrap4.min.js"></script>
        <!--toastr JavaScript -->
        <script src="lib/toastr/build/toastr.min.js"></script>
        <!-- confirm -->
        <script src="lib/confirm/jquery-confirm.min.js"></script>

        <!-- Contact Form JavaScript File -->
        <script src="contactform/contactform.js"></script>

        <!-- Template Main Javascript File -->
        <script src="js/main.js"></script>
        <script>
            $(document).ready(function () {
                map_get_table();
            });
            toastr.options = {
                "closeButton": false,
                "debug": true,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            function map_get_table(){
                $.ajax({
                    type: "POST",
                    url: "ajax/manage/medecin/manage-table-medecine.php",
                    data: {btnReportMain:"01"},
                    success: function (result) {
                        $("#report-table").html(result);
                        $('#dataTable').DataTable({
                            searching: true,
                            paging: true,
                            info: true,
                            responsive: true,
                        });
                    }
                });
            }
            function delete_map(cv_head_id,cv_head_date) {
                $.confirm({
                    title: 'กล่องแจ้งเตือน',
                    content: 'ต้องการลบรายงานวันที่ : ['+cv_head_date+']',
                    autoClose: 'ยกเลิก|8000',
                    animation: 'top',
                    closeAnimation: 'top',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        deleteUser: {
                            text: 'ลบรายงาน',
                            action: function () {
                                $.ajax({
                                    type: "POST",
                                    url: "ajax/manage/medecin/manage-medecine-delete.php",
                                    data: {cv_head_id:cv_head_id},
                                    dataType : 'json',
                                    success: function (result) {
                                        if(result.result == "1"){
                                            toastr.success("แจ้งเตือน","ลบรายงานวันที่ : "+cv_head_date+" สำเร็จ!");
                                            map_get_table();
                                        } else if(result.result == "0"){
                                            toastr.warning('ลบไม่สำเร็จ กรุณาลองใหม่อีกครั้ง!');
                                        }else {
                                            toastr.error('ติดต่อเซิฟเวอร์ไม่สำเร็จ!');
                                        }
                                    }
                                });
                            }
                        },
                        ยกเลิก: function () { }
                    }
                });
            }
        </script>
    </body>
</html>
