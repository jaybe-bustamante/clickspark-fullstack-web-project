<x-main-layout>
    <div class="landing">
        {{-- Hero Section --}}
        <div class="container-fluid px-lg-5 pb-4">
            <div class="row justify-content-center gap-0 mt-0 pt-0">
                <div class="col-xl-5 col-lg-6 my-lg-3 my-xl-auto pb-4 text-lg-start text-center">
                    <h1 class="hero-text display-4 lh-1">Elevate</h1>
                    <h1 class="hero-text display-4 lh-1">Your Brand</h1>
                    <h1 class="hero-text display-4 lh-1">
                        with <span class="hero-1">ClickSpark.</span>
                    </h1>
                    <p class="cs-font hero-p mx-auto mx-xl-0 fs-5">
                        A graphic design and web development agency, creating
                        brands, multimedia designs and modern website for
                        small-to-medium sized businesses and startups.
                    </p>
                    <div class="">
                        <a href="{{ route('register') }}" class="btn button-2 me-2 fw-bold">GET STARTED</a>
                        <a href="{{ ('contact') }}" class="btn button-1 fw-bold">LET'S TALK</a>
                    </div>
                </div>

                <div class="col-lg-6 col-10 mt-4 mt-lg-0 mx-lg-0 text-center">
                    <img src="/img/hero-main.png" alt="Landing Image" class="img-fluid px-sm-5 px-lg-0 pe-none" style="max-height: 566px" />
                </div>
            </div>
        </div>

        {{-- Customers --}}
        <div class="py-4 my-2 border-top border-opacity-10 d-block mx-auto px-xl-5 container-fluid ">
            <h2 class="text-center mt-5 cs-font fw-bold px-3">
                Over Hundreds+ of Clients Trust Us
            </h2>
            <div class="customers row mx-auto justify-content-center align-items-center">
                <div class="col-lg-2 col-sm-4 col-6">
                    <img src="/img/clogos/clogo-1.png" alt="Customer logo 1" class="img-fluid" />
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <img src="/img/clogos/clogo-2.png" alt="Customer logo 2" class="img-fluid" />
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <img src="/img/clogos/clogo-3.png" alt="Customer logo 3" class="img-fluid" />
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <img src="/img/clogos/clogo-4.png" alt="Customer logo 4" class="img-fluid" />
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <img src="/img/clogos/clogo-5.png" alt="Customer logo 5" class="img-fluid" />
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <img src="/img/clogos/clogo-6.png" alt="Customer logo 6" class="img-fluid" />
                </div>
            </div>
        </div>

        {{-- Services --}}
        <div class="container-fluid services px-lg-5">
            <div class="pt-4 pb-5 my-5 d-block mx-auto">
                <h2 class="text-center mt-5 cs-font fw-bold mb-4">
                    Custom Designs to Make Your Brand Stand Out
                </h2>
                <div class="row mx-auto justify-content-center align-items-center">
                    <div class="col-lg-3 col-md-6 col-sm-8 col-10 position-relative">
                        <div class="card card-services text-center my-3">
                            <img src="/img/services/service-1.png" alt="Service 1" class="img-fluid serv-img card-img mx-auto mx-4 mt-4 mb-2" />
                            <h5 class="cs-font fw-bold">Branding</h5>
                            <p class="cs-font px-xl-2">
                                We design unique logos and establish impactful brand
                                identities.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-8 col-10">
                        <div class="card card-services text-center my-3">
                            <img src="/img/services/service-2.png" alt="Service 2" class="img-fluid serv-img card-img mx-auto mx-4 mt-4 mb-2" />
                            <h5 class="cs-font fw-bold">Prints</h5>
                            <p class="cs-font px-lg-2">
                                We design engaging print materials for your
                                brand and business.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-8 col-10">
                        <div class="card card-services text-center my-3">
                            <img src="/img/services/service-3.png" alt="Service 3" class="img-fluid serv-img card-img mx-auto mx-4 mt-4 mb-2" />
                            <h5 class="cs-font fw-bold">Products & Labels</h5>
                            <p class="cs-font px-xl-3">
                                We design captivating product labels that enhance
                                your product.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-8 col-10">
                        <div class="card card-services text-center my-3">
                            <img src="/img/services/service-4.png" alt="Service 3" class="img-fluid serv-img card-img mx-auto mx-4 mt-4 mb-2" />
                            <h5 class="cs-font fw-bold">Websites</h5>
                            <p class="cs-font">
                                We create modern and responsive websites for your
                                brand and business.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Portfolio Carousel --}}
        <div class="container-fluid px-lg-5 my-lg-5 my-2">
            <div class="row justify-content-center px-lg-4">
                <h2 class="text-center mt-lg-3 cs-font fw-bold mb-4">Our Works</h2>

                <div class="owl-carousel owl-theme z-0 ">
                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-1.jpg" alt="Portfolio 1" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">
                                    The Football Advisor Logo
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-2.jpg" alt="Portfolio 2" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">Evntures Logo</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-3.jpg" alt="Portfolio 3" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">
                                    One Vision Army Shirt
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-4.jpg" alt="Portfolio 4" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">Supplement Web Ads</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-5.jpg" alt="Portfolio 5" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">Phytocet Webpage</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-6.jpg" alt="Portfolio 6" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">Phytocet Label</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-7.jpg" alt="Portfolio 7" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">
                                    Business Card Design
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-8.jpg" alt="Portfolio 8" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">Sales Panel Design</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-9.jpg" alt="Portfolio 9" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">Papaya Naturals Label</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-10.jpg" alt="Portfolio 10" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">Preservation50 Banner</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-11.jpg" alt="Portfolio 11" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">Matthew 6:10 T-shirt</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card card-portfolio border-0">
                            <img src="/img/portfolios/portfolio-12.jpg" alt="Portfolio 12" class="img-fluid card-img rounded-bottom-0" />
                            <div class="card-body">
                                <h6 class="cs-font fw-bold">DIgital BodyGuard Webpage</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Our Challenges --}}
        <div class="container-fluid challenges px-lg-5 py-3">
            <div class="row justify-content-center mt-3">
                <div class="col-xl-5 col-lg-5 col-md-8 col-10 mt-lg-5 pt-3">
                    <img src="/img/challenges01.png" alt="Challenges" class="img-fluid challenge-img d-block mx-auto p-0" />
                </div>

                <div class="col-xl-6 col-lg-7 col-md-11 col-10 text-lg-start text-center">
                    <h2 class="my-3 cs-font fw-bold">
                        We Like to Challenge our Skills
                    </h2>
                    <p class="cs-font mb-3">
                        At our design studio, we thrive on pushing the boundaries of
                        creativity and innovation. We're not just about making
                        things look good - we're about creating impactful design
                        solutions that drive results. Our team is constantly
                        challenging their skills and exploring new design techniques
                        to ensure we deliver the best possible solutions for our
                        clients. We believe in the power of design to transform
                        businesses and we're committed to helping our clients
                        achieve their goals through exceptional design.
                    </p>
                    <div class="row text-center">
                        <div class="col-3">
                            <h1 class="cs-font">124</h1>
                            <p class="cs-font small">Projects Delivered</p>
                        </div>
                        <div class="col-3">
                            <h1 class="cs-font">100%</h1>
                            <p class="cs-font small">Satisfaction Rate</p>
                        </div>
                        <div class="col-3">
                            <h1 class="cs-font">98</h1>
                            <p class="cs-font small">Happy Clients</p>
                        </div>
                        <div class="col-3">
                            <h1 class="cs-font">3</h1>
                            <p class="cs-font small">Experts</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- The Team --}}
        <div class="container-fluid team px-lg-5">
            <h2 class="text-center pt-5 cs-font fw-bold mb-4">We are Your Design Team</h2>
            <p class="cs-font text-center mb-5">
                We are a Team of Strategist, Designer and Developer
            </p>
            <div class="row gap-xl-4 justify-content-center">
                <div class="col-xl-3 col-sm-4 col-9 mb-4">
                    <div class="card card-team text-center p-3 border-0 shadow">
                        <img src="/img/team/carj.png" alt="Team 1" class="img-fluid card-img-top" />
                        <div class="card-body">
                            <h5 class="cs-font fw-bold">Carj</h5>
                            <p class="cs-font">Designer / SEO</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-4 col-9 mb-4">
                    <div class="card card-team text-center p-3 border-0 shadow">
                        <img src="/img/team/jef.png" alt="Team 2" class="img-fluid card-img-top" />
                        <div class="card-body">
                            <h5 class="cs-font fw-bold">Jef</h5>
                            <p class="cs-font">Multimedia Designer</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-4 col-9 mb-4">
                    <div class="card card-team text-center p-3 border-0 shadow">
                        <img src="/img/team/jb.png" alt="Team 3" class="img-fluid card-img-top" />
                        <div class="card-body">
                            <h5 class="cs-font fw-bold">Jaybe</h5>
                            <p class="cs-font">Designer / Developer</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-main-layout>
