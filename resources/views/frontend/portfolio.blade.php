<x-main-layout>
    <x-slot name="title">
        Portfolio
    </x-slot>
    <div class="container-fluid px-lg-5">
        <h1 class="text-center h3 fw-bold undline">Portfolio</h1>
        <p class="text-center cs-font fs-5 ch60">Our portfolio showcases our best work. Search through our projects to see the type of work we do.</p>
        <!-- Portfolio with All, Brands, Prints, Labels, Webs Sorting buttons. In 4 column  -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <button class="btn btn-primary btn-sm button-1" id="allSort" data-filter="all">All</button>
                <button class="btn btn-primary btn-sm  button-1" id="brandOnly" data-filter="Brand">Brands</button>
                <button class="btn btn-primary btn-sm  button-1" id="printOnly" data-filter="Print">Prints</button>
                <button class="btn btn-primary btn-sm  button-1" id="labelOnly" data-filter="Label">Labels</button>
                <button class="btn btn-primary btn-sm  button-1" id="webOnly" data-filter="Web">Webs</button>
            </div>
        </div>
        <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 mt-3 px-sm-5 px-lg-0 px-4 g-3 g-xl-4 justify-content-center" id="portfolio">

            <!-- Newly added -->
            @foreach($portfolios as $portfolio)
            <div class="col shadow-sm portbox {{ $portfolio->category }}">
                <img src="{{ asset('storage/' . $portfolio->image) }}" class="img-fluid" alt="{{ $portfolio->description }}">
                <!-- Optionally display the description or category -->
            </div>
            @endforeach

            <!-- Brand design -->
            <div class="portbox Brand">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-1.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Brand">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-2.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Brand">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-1.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Brand">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-2.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Brand">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-1.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Brand">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-2.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Brand">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-1.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Brand">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-2.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <!-- Print Design -->
            <div class="portbox Print">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-3.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Print">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-11.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Print">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-3.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Print">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-11.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Print">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-3.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Print">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-11.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Print">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-3.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Print">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-11.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <!-- Label Design -->
            <div class="portbox Label">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-6.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Label">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-8.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Label">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-6.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Label">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-8.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Label">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-6.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Label">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-8.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Label">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-6.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Label">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-8.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <!-- Web Design -->
            <div class="portbox Web">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-5.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Web">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-12.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Web">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-5.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Web">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-12.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Web">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-5.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Web">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-12.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Web">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-5.jpg" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="portbox Web">
                <div class="col shadow-sm">
                    <img src="/img/portfolios/portfolio-12.jpg" class="img-fluid" alt="...">
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-4 mb-5">
            <button class="btn btn-primary btn-sm button-1 mt-4 text-center mx-auto" id="loadMore">Load More</button>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="assets/js/portfolio.js"></script>
    </x-slot>

</x-main-layout>
