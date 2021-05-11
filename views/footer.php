
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6 footer-info">
                        <h3>Taskviewer 300</h3>
                        <p>Teste de desenvolvimento onde o objetivo era criar uma agenda de tarefas utilizando PHP, JQuery e AJAX</p>
                    </div>

                    <div class="col-lg-6 col-md-6 footer-contact">
                        <h4>Contato</h4>
                        <p>
                            <strong>GitHub:</strong> https://github.com/pentrU<br>
                            <strong>linkedIn:</strong> https://www.linkedin.com/in/pedrohbonel/<br>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Pedro H</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/serenity-bootstrap-corporate-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            //debugger;
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                events: "../api/Tarefas/readAll.php",
                headerToolbar: {
                    center: 'title',
                    right: 'prevYear,prev,next,nextYear'
                },
                initialView: 'dayGridMonth',
                eventClick: function(info) {
                      //alert('Event id: ' + info.event.id);
                    $.ajax({
                        type: "GET",
                        url: '../api/Tarefas/readId.php',
                        data: { id_Tarefa: info.event.id},
                        async: false,
                        success: function(response){
                            console.log(response);
                            $('#idTarefaEdit').val(response.id_Tarefa);
                            $('#deTituloEdit').val(response.de_TituloTarefa);
                            $('#dtDataInicioEdit').val(response.dt_DataInicio);
                            $('#dtDataFimEdit').val(response.dt_DataFim);
                            $('#deDescricaoEdit').val(response.de_Descricao);
                            $('#modalEdit').modal('show');
                        },
                        failure: console.log("nao deu certo")
                    });                   
                }
            });
            calendar.render();
        });

        function excluirModal(){
            confirm('Deseja realmente excluir a tarefa?');
            if(confirm){
                $.ajax({
                        type: "POST",
                        url: '../api/Tarefas/delete.php',
                        data: { id_Tarefa: $('#idTarefaEdit').val()},
                        async: false,
                        success: function(response){
                            location.reload(true);
                            console.log('deu certo');
                        },
                        failure: console.log("nao deu certo")
                    });
            }

        }

    </script>

</body>

</html>