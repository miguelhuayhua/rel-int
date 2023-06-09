<footer class="container-fluid p-0 position-relative">
    <div style="position: relative">
        <img src="{{ url('images/footer.jpg') }}" class="footer-back" alt="" srcset="">
        <div class="footer-banner row mx-0">
            <p>
                rrnnii.upea.bo
            </p>
            <div class="col-8 offset-2 offset-md-0  col-md-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d696.1029977892914!2d-68.19423781342965!3d-16.49309315755684!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sbo!4v1685413112352!5m2!1ses!2sbo"
                    width="100%" height="250px" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
            <div class="col-12 col-md-8">
                <div class="row">
                    <div class="col-6">
                        <h4>
                            <i class="fa fa-phone-square" aria-hidden="true"></i> Teléfono:
                            {{ $informacion->telefono }}

                        </h4>
                        <h4>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            Celular:
                            {{ $informacion->celular }}
                        </h4>
                    </div>
                    <div class="col-6">
                        <h4>
                            <i class="fa fa-fax" aria-hidden="true"></i>
                            Fax:
                            {{ $informacion->fax }}
                        </h4>

                        <h4>
                            <i class="fa fa-paper-plane" aria-hidden="true"></i> Correo:
                            {{ $informacion->correo }}
                        </h4>

                    </div>
                    <div class="col-12 ubicacion">
                        <h3>Ubicación
                            Dirección Relaciones Internacionales</h3>
                        <h4>
                            <i class="fa fa-map" aria-hidden="true"></i>
                            {{ $informacion->ubicacion }}
                        </h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <section class="container-fluid py-0 my-0  info-dev ">
        <div class="row position-relative">
            <div class="decoracion2"></div>

            <div class="col-12 col-md-6">
                <p style="color: #AAA">
                    ©2023 SIE - DRNI - UPEA
                </p>
                <p style="color: #999">
                    Diseñado y Desarrollado por: Miguel Huayhua
                </p>
            </div>
            <div class="col-12 col-md-6">
                <img class="logo-sie" src="{{ url('iconos/logosie.png') }}" alt="" srcset="">
            </div>
        </div>
    </section>
</footer>
