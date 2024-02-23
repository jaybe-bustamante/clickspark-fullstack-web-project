<x-main-layout>
    <x-slot name="title">
        Services
    </x-slot>

    <div class=" container-fluid px-lg-5">
        <h1 class="text-center h3 fw-bold undline ">Services</h1>
        <p class="text-center cs-font ch60 fs-5">Our services are the best in the industry. We offer a wide range of services to meet every type of need.</p>
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4 g-4 g-lg-5 g-xl-3 mt-3 px-sm-5 px-lg-4 px-2 px-xl-3 card-group">
            <div class="col">
                <div class="card h-100 card-services2">
                    <img src="img/services/service-1A.png" class="card-img-top serv-img2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Branding Design</h5>
                        <p class="card-text">We design unique logos and establish impactful brand identities.</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#brandingDesign" class="btn button-1 py-2" onclick="showService1Details()">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 card-services2">
                    <img src="img/services/service-2A.png" class="card-img-top serv-img2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Print Design</h5>
                        <p class="card-text">We design engaging print materials for your brand and business.</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#printDesign" class="btn button-1 py-2" onclick="showService2Details()">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 card-services2">
                    <img src="img/services/service-3A.png" class="card-img-top serv-img2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product & Label Design</h5>
                        <p class="card-text">We design captivating product labels that enhance your product brand.</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#labelDesign" class="btn button-1 py-2" onclick="showService3Details()">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 card-services2">
                    <img src="img/services/service-4A.png" class="card-img-top serv-img2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Web Design & Development</h5>
                        <p class="card-text">We create modern and responsive websites for your brand and business.</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#webdev" class="btn button-1 py-2" onclick="showService4Details()">Learn More</a>
                    </div>
                </div>
            </div>

        </div>

        {{-- Branding Details --}}
        <div id="brandingDesign" class="service-details-hidden service-details-visible mt-5 ">
            <div class="container-fluid container-lg text-center">
                <h4 class="pt-5 display-6 fw-medium text-center undline mb-3">Branding Design</h4>
                <div class="row mt-4 justify-content-center">
                    <div class="col-xl-4 col-10 col-md-8">
                        <img src="img/services/brand1.jpg" class="img-fluid" alt="Branding Design">
                    </div>
                    <div class="col-xl-6 col-10 text-xl-start text-center mt-3 mt-xl-0">
                        <p class="cs-font fs-4">Our Branding Design service is dedicated to giving your business a unique and memorable identity. We focus on creating a comprehensive visual experience that resonates with your target audience and sets you apart from the competition. Our team of experienced designers will work closely with you to understand your business goals and values, and translate them into a compelling brand design.</p>
                    </div>
                </div>


                <div class="row mt-5 justify-content-center">

                    <div class="col-xl-6 col-10 text-xl-start text-center mt-3 mt-xl-0">
                        <h4 class=" fw-bold h3">What's Included</h4>
                        <p class="cs-font fs-4">Our service includes <strong class="undline">logo design</strong>, <strong class="undline">color palette selection</strong>, <strong class="undline">typography</strong>, and <strong class="undline">brand guideline creation</strong>. We also provide consultation on how to consistently apply your brand across different mediums such as print, digital, and social media. With our Branding Design service, you can ensure a cohesive and powerful brand presence that drives recognition and trust.</p>
                    </div>
                    <div class="col-xl-4 col-10 col-md-8 pt-5">
                        <img src="img/services/brand2.jpg" class="img-fluid" alt="Branding Design">
                    </div>
                </div>
                <a href="{{ route('register') }}" class="btn button-getstarted btn-lg py-2 mt-5 text-center">Get Started</a>
            </div>
        </div>

        {{-- Print Design Details --}}
        <div id="printDesign" class="service-details-hidden service-details-visible mt-5 ">

            <div class="container-fluid container-lg text-center">
                <h4 class="pt-5 display-6 fw-medium text-center undline mb-3">Print Design</h4>
                <div class="row mt-4 justify-content-center">
                    <div class="col-xl-4 col-10 col-md-8">
                        <img src="img/services/print1.jpg" class="img-fluid" alt="Print Design">
                    </div>
                    <div class="col-xl-6 col-10 text-xl-start text-center mt-3 mt-xl-0">
                        <p class="cs-font fs-4">Our Print Design service is dedicated to creating visually appealing and engaging print materials for your brand and business. We focus on delivering high-quality designs that effectively communicate your message and captivate your audience. Our team of experienced designers will work closely with you to understand your business goals and values, and translate them into compelling print materials.</p>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="col-xl-6 col-10 text-xl-start text-center mt-3 mt-xl-0">
                        <h4 class=" fw-bold h3">What's Included</h4>
                        <p class="cs-font fs-4">Our service includes <strong class="undline">business cards</strong>, <strong class="undline">brochures</strong>, <strong class="undline">flyers</strong>, <strong class="undline">posters</strong>, and <strong class="undline">other print materials</strong>. We also provide consultation on how to consistently apply your brand across different mediums such as print, digital, and social media. With our Print Design service, you can ensure a cohesive and powerful brand presence that drives recognition and trust.</p>
                    </div>
                    <div class="col-xl-4 col-10 col-md-8 pt-5">
                        <img src="img/services/print2.jpg" class="img-fluid" alt="Print Design">
                    </div>
                </div>
                <a href="{{ route('register') }}" class="btn button-getstarted btn-lg py-2 mt-5 text-center">Get Started</a>
            </div>
        </div>

        {{-- Label Design Details --}}
        <div id="labelDesign" class="service-details-hidden service-details-visible mt-5">
            <div class="container-fluid container-lg text-center">
                <h4 class="pt-5 display-6 fw-medium text-center undline mb-3">Product & Label Design</h4>
                <div class="row mt-4 justify-content-center">
                    <div class="col-xl-4 col-10 col-md-8">
                        <img src="img/services/product2.jpg" class="img-fluid" alt="Product & Label Design">
                    </div>
                    <div class="col-xl-6 col-10 text-xl-start text-center mt-3 mt-xl-0">
                        <p class="cs-font fs-4">Our Product & Label Design service is dedicated to creating captivating product labels that enhance your product brand. We focus on delivering high-quality designs that effectively communicate your message and captivate your audience. Our team of experienced designers will work closely with you to understand your business goals and values, and translate them into compelling product labels.</p>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="col-xl-6 col-10 text-xl-start text-center mt-3 mt-xl-0">
                        <h4 class=" fw-bold h3">What's Included</h4>
                        <p class="cs-font fs-4">Our service includes <strong class="undline">product label design</strong>, <strong class="undline">packaging design</strong>, and <strong class="undline">label printing consultation</strong>. We also provide consultation on how to consistently apply your product label across different mediums such as print, digital, and social media. With our Product & Label Design service, you can ensure a cohesive and powerful product brand presence that drives recognition and trust.</p>
                    </div>
                    <div class="col-xl-4 col-10 col-md-8 pt-5">
                        <img src="img/services/product1.jpg" class="img-fluid" alt="Product & Label Design">
                    </div>
                </div>
                <a href="{{ route('register') }}" class="btn button-getstarted btn-lg py-2 mt-5 text-center">Get Started</a>
            </div>
        </div>

        {{-- Web Design & Development Details --}}
        <div id="webdev" class="service-details-hidden service-details-visible mt-5">
            <div class="container-fluid container-lg text-center">
                <h4 class="pt-5 display-6 fw-medium text-center undline mb-3">Web Design & Development</h4>
                <div class="row mt-4 justify-content-center">
                    <div class="col-xl-6 col-10 col-md-8">
                        <div class="row justify-content-center g-2 ">
                            <div class="col-md-6 col-10">
                                <img src="img/services/web1.png" class="img-fluid" alt="Web Design & Development">
                            </div>
                            <div class="col-md-6 col-10">
                                <img src="img/services/web3.png" class="img-fluid" alt="Web Design & Development">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-10 text-xl-start text-center mt-3 mt-xl-0">
                        <p class="cs-font fs-4">Our Web Design & Development service is dedicated to creating modern and responsive websites for your brand and business. We focus on delivering high-quality designs that effectively communicate your message and captivate your audience. Our team of experienced designers and developers will work closely with you to understand your business goals and values, and translate them into a compelling website.</p>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="col-xl-6 col-10 text-xl-start text-center mt-3 mt-xl-0">
                        <h4 class=" fw-bold h3">What's Included</h4>
                        <p class="cs-font fs-4">Our service includes <strong class="undline">website design</strong>, <strong class="undline">website development</strong>, and <strong class="undline">website maintenance</strong>. We also provide consultation on how to consistently apply your brand across different mediums such as print, digital, and social media. With our Web Design & Development service, you can ensure a cohesive and powerful brand presence that drives recognition and trust.</p>
                    </div>
                    <div class="col-xl-4 col-10 col-md-8 pt-5">
                        <img src="img/services/web2.jpg" class="img-fluid" alt="Web Design & Development">
                    </div>
                </div>
                <a href="{{ route('register') }}" class="btn button-getstarted btn-lg py-2 mt-5 text-center">Get Started</a>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="assets/js/service.js"></script>
    </x-slot>

</x-main-layout>
