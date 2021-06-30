<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">

    <!-- Section: Links  -->
    <section>
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <img class="mr-3" style="width: 2em;" src="{{ asset('img/icons/fish.png') }}"
                            alt="Aquario">Aquario
                    </h6>
                    <p>
                        Aquario offers you the best shopping experience possible with a trusted selection of freshwater
                        fish, invertebrates, live plants, AND quality aquarium supplies.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    @foreach ($categories as $category)
                        <p>
                            <a class="btn-link text-dark" href="{{ url('/category', [$category->category_id]) }}">
                                {{ Str::ucfirst(Str::plural($category->category_name)) }}
                            </a>
                        </p>
                    @endforeach
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Contact
                    </h6>
                    <p> Aquario.test </p>
                    <p> support@aquario.com </p>
                    <p> +885 123 123 123</p>
                    <p> +885 012 123 123</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
