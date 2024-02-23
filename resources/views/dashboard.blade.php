<x-app-layout>
    <x-slot name="header">
        <h6 class="text-muted text-opacity-25 small">{{ __('Dashboard') }}</h6>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-12 p-0 m-0 ">
            <section class="container-fluid container-md p-0">
                <p class="cs-font h4 fw-bolder ">Welcome {{ Auth::user()->name }},</p>
                <p class="cs-font">
                    You can view your projects and manage your account here.
                </p>
                <div class="row justify-content-center">
                    <!-- Project List and Create new Porject -->
                    <div class="mb-3 col-12 ">
                        <div class="card border-0 shadow-sm cs-border-1">
                            <div class="card-header bg-white border-0">
                                <div class="d-block text-sm-start text-center d-sm-flex justify-content-center align-items-center">
                                    <p class="m-0 p-0">
                                        <span class="h5 cs-font">Projects</span>:
                                        <span class="text-success h5">{{ $projects->count() }}</span>
                                    </p>
                                    <span class="ms-auto">
                                        <a href="#confirmModal" class="btn button-4 mt-2" data-bs-toggle="modal">Create New Project</a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover cs-font">
                                        <thead>
                                            <tr>
                                                <th class="col cs-font">Project Title</th>
                                                <th class="col cs-font">Type</th>
                                                <th class="col cs-font">Status</th>
                                                <th class="col cs-font">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($projects as $project)
                                            <tr>
                                                <td>{{ $project->title }}</td>
                                                <td>{{ $project->service_type }}</td>
                                                <td>{{ $project->status }}</td>
                                                <td>
                                                    <a href="{{ route('project.details', $project->id) }}" class="btn btn-sm btn-info text-white small">View</a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No Projects to Show.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                @if($projects->count())
                                <div class="text-center mt-4">
                                    <a href="{{ route('admin.projects.all') }}" class="btn button-4">View All</a>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>

                    <!-- Some info -->
                    <div class="mb-5 col-12 mt-3">
                        <div class="cs-font small">
                            Tips to Create your Project Successfully
                            <hr />
                        </div>
                        <div class="card border-0 shadow-sm cs-border-2">
                            <div class="card-body border-0">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card border-0">
                                            <div class="card-body border-0">
                                                <p class="cs-font h6">Tip 1</p>
                                                <div class="card-img tip-img mb-4">
                                                    <img src="{{ asset('img/creative-writing.png') }}" alt="Create brief" class="img-fluid" />
                                                </div>
                                                <p class="cs-font">
                                                    Create a clear and concise
                                                    project brief.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card border-0">
                                            <div class="card-body border-0">
                                                <p class="cs-font h6">Tip 2</p>
                                                <div class="card-img tip-img mb-4">
                                                    <img src="{{ asset('img/miscellaneous.png') }}" alt="Create brief" class="img-fluid" />
                                                </div>
                                                <p class="cs-font">
                                                    Provide clear and detailed
                                                    instructions.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 ">
                                        <div class="card border-0">
                                            <div class="card-body border-0">
                                                <p class="cs-font h6">Tip 3</p>
                                                <div class="card-img tip-img mb-4">
                                                    <img src="{{ asset('img/upload.png') }}" alt="Create brief" class="img-fluid" />
                                                </div>
                                                <p class="cs-font">
                                                    Upload all necessary files
                                                    and documents.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Confirm Modal -->
    <div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="h4 modal-title">
                        Confirm and Select your Project
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body with form fields -->
                <div class="modal-body px-3 px-md-5">
                    <div class="row justify-content-center g-3">
                        <form class="needs-validation" id="project-form" enctype="multipart/form-data">
                            <select class="form-select mb-2" id="project-type" name="project_type">
                                <option value="">Select Service Type</option>
                                <option value="brand">Brand Design</option>
                                <option value="print">Print Design</option>
                                <option value="product_label">
                                    Product Label Design
                                </option>
                                <option value="web">
                                    Web Design and Development
                                </option>
                            </select>

                            <div id="discussed-container" class="mb-2" style="display: none">
                                <label class="form-label small">Have you discussed your project with
                                    us?</label>
                                <br />
                                <input class="form-check-input" type="radio" name="discussed" value="yes" />
                                Yes
                                <br />
                                <input class="form-check-input" type="radio" name="discussed" value="no" />
                                No
                            </div>

                            <div id="payment-container" class="mb-2" style="display: none">
                                <label class="form-label small" id="payment-label"></label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">$</span>
                                    <input class="form-control" type="number" name="payment" min="" placeholder="" required />
                                </div>
                            </div>

                            <button class="btn button-4 rounded-5" type="submit" style="display: none" id="submit-button">
                                Continue
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Project Modal -->
    <div class="modal fade" id="createProjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form class="needs-validation" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="h4 modal-title">Create New Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal body with form fields -->
                    <div class="modal-body px-2 px-xl-5 px-md-3">
                        <div class="row justify-content-center g-3">
                            <h2 class="h5 mt-2 cs-font">Project Details</h2>
                            <p class="small mt-1 text-muted">
                                Please fill in the details of your project.
                            </p>

                            <div class="row g-3">
                                <div class="col-12 col-lg-6 col-xl-4">
                                    <label for="serviceType" class="form-label small">Service Type<span class="small text-danger">*</span></label>
                                    <input type="text" class="form-control" id="serviceType" name="service_type" value="{{ old('service_type', '') }}" required readonly />
                                </div>

                                <div class="col-12 col-lg-6 col-xl-4">
                                    <label for="title" class="form-label small">Title<span class="small text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required />
                                </div>

                                <div class="col-12 col-xl-4">
                                    <label for="industry" class="form-label small">Industry<span class="small text-danger">*</span></label>
                                    <input type="text" class="form-control" list="industry-list" id="industry" name="industry" required />
                                    <datalist id="industry-list">
                                        <option value="Accounting & Financial">
                                        <option value="Agriculture">
                                        <option value="Animal & Pet">
                                        <option value="Architectural">
                                        <option value="Automotive">
                                        <option value="Bar & Nightclub">
                                        <option value="Consulting">
                                        <option value="Cleaning & Maintenance">
                                        <option value="Communication">
                                        <option value="Computer">
                                        <option value="Construction">
                                        <option value="Cosmetic & Beauty">
                                        <option value="Dating">
                                        <option value="Education">
                                        <option value="Entertainment">
                                        <option value="Fashion">
                                        <option value="Food & Drink">
                                        <option value="Games">
                                        <option value="Home Furnishing">
                                        <option value="Industrial">
                                        <option value="Internet">
                                        <option value="Landscaping">
                                        <option value="Medical">
                                        <option value="Music">
                                        <option value="Non-Profit">
                                        <option value="Online Service">
                                        <option value="Photography">
                                        <option value="Physical Fitness">
                                        <option value="Political">
                                        <option value="Real Estate">
                                        <option value="Religious">
                                        <option value="Restaurant">
                                        <option value="Retail">
                                        <option value="Security">
                                        <option value="Spa">
                                        <option value="Sports">
                                        <option value="Technology">
                                        <option value="Travel & Hotel">
                                        <option value="Wedding Service">
                                        <option value="Others">
                                    </datalist>

                                </div>

                                <div class="col-12">
                                    <label for="description" class="form-label small">Project Description<span class="small text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" required></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="targetAudience" class="form-label small">Target Audience<span class="small text-danger">*</span></label>
                                    <textarea class="form-control" id="targetAudience" name="target_audience" required></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="designPreference" class="form-label small">Design Preference<span class="small text-danger">*</span></label>
                                    <textarea class="form-control" id="designPreference" name="design_preference" required></textarea>
                                </div>

                                <div class="col-12 col-lg-4" id="attachmentsContainer">
                                    <label for="attachment1" class="form-label small">Attachments</label>

                                    <input type="file" class="form-control mb-2" id="attachment1" name="attachments[]" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Image, PDF, or Word Document Only" />


                                    <button type="button" class="btn button-1" id="addAttachment">
                                        Add another file
                                    </button>
                                </div>

                                <div class="col-12 col-lg-4" id="colorPreferenceContainer">
                                    <label for="colorPreference1" class="form-label small">Color Preference</label>
                                    <input type="color" class="form-control mb-2" id="colorPreference1" name="color_preference[]" value="#000000" />

                                    <button type="button" class="btn button-1" id="addColorPreference">
                                        Add another color
                                    </button>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <label for="notes" class="form-label small">Additional Notes</label>
                                    <textarea class="form-control" id="notes" name="notes"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer with the submit button -->
                    <div class="modal-footer">
                        <input type="hidden" name="amount" id="paymentAmount" value="">
                        <button type="submit" class="btn button-4">
                            Save Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('assets/js/create-project.js') }}">
        </script>

        <script>
            document.getElementById('title').addEventListener('input', function() {
                const projectData = JSON.parse(sessionStorage.getItem('projectData'));
                const payment = projectData.payment;
                document.getElementById('paymentAmount').value = payment;

                console.log(paymentAmount.value);
            });

        </script>
    </x-slot>
</x-app-layout>
