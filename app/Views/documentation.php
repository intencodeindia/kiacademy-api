<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KI Academy API </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font awesome JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/a561ea164b.js" crossorigin="anonymous" type="3a8c463cdb33b03a6d825794-text/javascript"></script>

    <link rel="stylesheet" href="<?php echo base_url('public/css/documentation.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/themes/prism.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/prism.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/components/prism-json.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!-- Header with Logo and Search -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo site_url('docs') ?>">
                <!-- <img src="https://via.placeholder.com/150x40?text=Logo" alt="Logo"> -->

                <h2 class="fw-bold">Documentation</h2>
            </a>
            <form class="search-bar" role="search" onsubmit="return false;" style="width: 80%;">
                <input id="search-input" class="form-control" type="search" placeholder="Type to search across the platform..." aria-label="Search" oninput="performSearch()" style="width: 100%;box-sizing: border-box;border-block-end-color: inherit;border-block-end-width: initial;border-color: cornflowerblue;">
            </form>

        </div>
    </nav>
    <div class="container">
        <!-- Sidebar Navigation -->
        <div class="col-md-3 sidebar bg-white shadow">
            <!-- Sidebar will be populated here by JavaScript -->
        </div>
        <!-- Main Content Area -->


        <div class="main-content">
            <!-- This div will have my-5 only on screens smaller than 576px -->
            <div class="d-block d-sm-none my-5">
                <!-- This div has a vertical margin of 3rem only on mobile screens. -->
            </div>

            <h1 class="display-4 mb-4 text-center fw-bold my-2 section-title">KI Academy API</h1>
            <p class="lead my-3">Welcome to the KI Academy API! 🌟 Our API offers a robust set of endpoints to interact with various features of our platform. Explore the modules below to see what we have to offer:</p>

            <div class="row">
                <!-- Student Account Module -->
                <div class="col-md-6 mb-4">
                    <div class="card border border-0">
                        <div class="card-header border border-0 fw-bold bg-white">
                            📚 Student Account Module
                        </div>
                        <div class="card-body">
                            <p><strong>Registration and Login:</strong> 🚀 Manage student sign-ups via email, social media, or SSO. Includes email verification, login options, and password recovery.</p>
                            <p><strong>Profile Management:</strong> 📝 Update personal details, manage passwords, and upload profile pictures.</p>
                            <p><strong>Dashboard:</strong> 📈 Track enrolled courses, monitor progress, view certificates, and manage wallet balance.</p>
                            <p><strong>Course Management:</strong> 🔍 Search, browse, and interact with course content, including videos and quizzes.</p>
                            <p><strong>Payment Management:</strong> 💳 Handle wallet deposits, direct course purchases, and review transaction history.</p>
                        </div>
                    </div>
                </div>

                <!-- Instructor Account Module -->
                <div class="col-md-6 mb-4">
                    <div class="card border border-0">
                        <div class="card-header border border-0 fw-bold bg-white">
                            🧑‍🏫 Instructor Account Module
                        </div>
                        <div class="card-body">
                            <p><strong>Registration and Onboarding:</strong> 📝 Register as an instructor, complete verifications, and manage profile details.</p>
                            <p><strong>Profile Management:</strong> 🛠️ Update bio, qualifications, and payment setup.</p>
                            <p><strong>Dashboard:</strong> 📊 Create and manage courses, upload content, and track earnings.</p>
                            <p><strong>Course Management:</strong> 📚 Edit course details, track enrollment, and engage with students.</p>
                        </div>
                    </div>
                </div>

                <!-- Admin Account Module -->
                <div class="col-md-6 mb-4">
                    <div class="card border border-0">
                        <div class="card-header border border-0 fw-bold bg-white">
                            🛠️ Admin Account Module
                        </div>
                        <div class="card-body">
                            <p><strong>User Management:</strong> 👥 Manage users, assign roles, and oversee platform activities.</p>
                            <p><strong>Instructor and Institution Management:</strong> ✔️ Approve applications, perform KYC verifications, and oversee content.</p>
                            <p><strong>Payment Management:</strong> 💰 Monitor transactions, handle disputes, and manage finances.</p>
                            <p><strong>Reporting and Analytics:</strong> 📈 Generate reports on user activity, course enrollments, and financial performance.</p>
                        </div>
                    </div>
                </div>

                <!-- Institution Account Module -->
                <div class="col-md-6 mb-4">
                    <div class="card border border-0">
                        <div class="card-header border border-0 fw-bold bg-white">
                            🏫 Institution Account Module
                        </div>
                        <div class="card-body">
                            <p><strong>Registration and Verification:</strong> 📝 Register an institution, submit documentation, and undergo verification.</p>
                            <p><strong>Profile Management:</strong> 🛠️ Update institutional details, contact information, and payment settings.</p>
                            <p><strong>Dashboard:</strong> 📊 Manage institution-specific courses, staff, and access performance metrics.</p>
                            <p><strong>Course Creation and Management:</strong> 📚 Add and manage courses, track performance, and monitor engagement.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <section id="token-authentication" class="mb-5">
                    <h1 class="fw-bold mb-4">Token-Based Authentication</h1>

                    <div class="alert alert-info">
                        <strong>Heads up!</strong> To access the API endpoints, you need to include a valid token in the request headers. Below are the details on how to use this token.
                    </div>

                    <!-- Authentication Header Section -->
                    <section id="authentication-header">
                        <h5 class="mb-3">Authentication Header</h5>
                        <p>Include the following header in your requests:</p>
                        <pre><code class="language-http">Authorization: Bearer YOUR_SECURE_TOKEN</code></pre>
                        <div class="alert alert-warning">
                            Replace <code>YOUR_SECURE_TOKEN</code> with your actual token.
                        </div>
                    </section>

                    <!-- Request Key Button -->
                    <div class="mb-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestKeyModal">
                            View API Key
                        </button>
                    </div>

                    <!-- Request API Key Modal -->
                    <div class="modal fade" id="requestKeyModal" tabindex="-1" aria-labelledby="requestKeyModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="requestKeyModalLabel">Your API Key</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <pre><code class="language-json">ba91b88e0759d162684054d90ca17503e8090629285ecbc75f309379799df12d</code></pre>
                                        <button class="btn btn-outline-secondary copy-btn" onclick="copyToClipboard('.language-json')"><i class="fa-solid fa-copy"></i> Copy</button>
                                    </div>
                                    <div id="formMessage" class="mt-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Example Request Section -->
            <section id="example-request">
                <h5 class="mb-3">Example Request</h5>
                <p>Here's how you can use the token with cURL:</p>
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header bg-white border-0">cURL Example</div>
                    <div class="card-body">
                        <pre><code class="language-shell">curl -X GET "<?= base_url() ?>api/coupons" -H "Authorization: Bearer YOUR_SECURE_TOKEN"</code></pre>
                        <button class="btn btn-outline-secondary copy-btn" onclick="copyToClipboard('.language-shell')"><i class="fa-solid fa-copy"></i> Copy</button>
                    </div>
                </div>
            </section>

            <!-- Example Response Section -->
            <section id="example-response">
                <h5 class="mb-3">Example Response</h5>
                <p>The response for a successful request with a valid token will be:</p>
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header bg-white border-0">Successful Response</div>
                    <div class="card-body">
                        <pre><code class="language-json">{
    "status": 200,
    "data": [
        {
            "coupon_id": "1",
            "coupon_code": "DISCOUNT2024",
            "discount_amount": "20%",
            "expiry_date": "2024-12-31"
        },
        {
            "coupon_id": "2",
            "coupon_code": "SAVE10",
            "discount_amount": "10%",
            "expiry_date": "2024-11-30"
        }
    ]
}</code></pre>
                        <button class="btn btn-outline-secondary copy-btn" onclick="copyToClipboard('.language-json')"><i class="fa-solid fa-copy"></i> Copy</button>
                    </div>
                </div>
            </section>

            <!-- Error Response Section -->
            <section id="error-response">
                <h5 class="mb-3">Error Response</h5>
                <p>If the token is invalid or not provided, you will receive an error response:</p>
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header bg-white border-0">Error Response</div>
                    <div class="card-body">
                        <pre><code class="language-json">{
    "status": 401,
    "message": "Unauthorized"
}</code></pre>
                        <button class="btn btn-outline-secondary copy-btn" onclick="copyToClipboard('.language-json')"><i class="fa-solid fa-copy"></i> Copy</button>
                    </div>
                </div>
            </section>
            </section>


            <!-- Courses Endpoints -->
            <section id="courses" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Course API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Course API offers several endpoints to interact with course data. Below are the available operations:
                    <ul>
                        <li><strong>GET /courses</strong>: Retrieve a list of all courses.</li>
                        <li><strong>GET /courses/{course_id}</strong>: Retrieve details of a specific course by ID.</li>
                        <li><strong>POST /courses</strong>: Create a new course.</li>
                        <li><strong>PUT /courses/{course_id}</strong>: Update details of an existing course by ID.</li>
                        <li><strong>DELETE /courses/{course_id}</strong>: Remove a course by ID.</li>
                        <li><strong>GET /courses/by-instructor/(:num)</strong>: Retrieve a list of courses by instructor ID.</li>

                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /courses -->
                <section id="courses-get-all">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /courses</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header  bg-white border border-0">Retrieve All Courses</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all records from the `courses` table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/courses</code></p>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-all" class="language-json">{
    "status": 200,
    "data": [
        {
            "course_id": "1",
            "course_title": "Introduction to Python",
            "course_description": "Learn Python from scratch with this beginner-friendly course.",
            "instructor_id": "1",
            "course_category_id": "4",
            "course_language": "English",
            "currency": "USD",
            "course_price": "2",
            "course_level": "beginner",
            "course_thumbnail": "python_thumbnail.jpg",
            "course_intro_video": "python_intro.mp4",
            "course_status": "0",
            "created_at": "2024-08-13 09:08:37",
            "updated_at": "2024-09-11 11:11:59",
            "deleted_at": null
        },
        {
            "course_id": "4",
            "course_title": "Introduction to Excel",
            "course_description": "Learn how to use Excel for data analysis, from basics to advanced features.",
            "instructor_id": "3",
            "course_category_id": "4",
            "course_language": "English",
            "currency": "USD",
            "course_price": null,
            "course_level": "beginner",
            "course_thumbnail": "excel_thumbnail.jpg",
            "course_intro_video": "excel_intro.mp4",
            "course_status": "0",
            "created_at": "2024-08-13 09:08:37",
            "updated_at": "2024-09-11 11:10:12",
            "deleted_at": null
        },
        {
            "course_id": "36",
            "course_title": "Git & GitHub Crash Course: Create a Repository From Scratch!",
            "course_description": "Description",
            "instructor_id": "3",
            "course_category_id": "4",
            "course_language": "English",
            "currency": "USD",
            "course_price": null,
            "course_level": "beginner",
            "course_thumbnail": "1724056161_b5fe36a360e927ddd8f0.jpeg",
            "course_intro_video": "1724056161_4895b4747cadf19fbc91.mp4",
            "course_status": "0",
            "created_at": "2024-08-19 08:29:21",
            "updated_at": "2024-09-11 11:10:12",
            "deleted_at": null
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-all" onclick="copyToClipboard('#response-get-all')"><i class="fa-solid fa-copy fa-xl"></i> </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /courses/{id} -->
                <section id="courses-get-by-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /courses/{course_id}</small>
                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header  bg-white border border-0">Retrieve Single Course</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a single course record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/courses/{course_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>id</strong>: The ID of the course to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-id" class="language-json">{
    "status": 200,
    "data": {
            "course_id": "36",
            "course_title": "Git & GitHub Crash Course: Create a Repository From Scratch!",
            "course_description": "Description",
            "instructor_id": "3",
            "course_category_id": "4",
            "course_language": "English",
            "currency": "USD",
            "course_price": null,
            "course_level": "beginner",
            "course_thumbnail": "1724056161_b5fe36a360e927ddd8f0.jpeg",
            "course_intro_video": "1724056161_4895b4747cadf19fbc91.mp4",
            "course_status": "0",
            "created_at": "2024-08-19 08:29:21",
            "updated_at": "2024-09-11 11:10:12",
            "deleted_at": null
        }
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-id" onclick="copyToClipboard('#response-get-by-id')"><i class="fa-solid fa-copy fa-xl"></i> </button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- GET /by-instructor/(:num) -->
                <section id="courses-get-by-instructor">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /courses/by-instructor/(:num)</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header  bg-white border border-0">Retrieve Courses by Instructor</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a list of courses associated with a specific instructor ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/courses/by-instructor/{instructor_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>instructor_id</strong>: The ID of the instructor for whom courses are to be retrieved.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-instructor" class="language-json">{
    "status": 200,
    "data": [
        {
            "course_id": "1",
            "course_title": "Introduction to Python",
            "course_description": "Learn Python from scratch with this beginner-friendly course.",
            "instructor_id": "1",
            "course_category_id": "4",
            "course_language": "English",
            "currency": "USD",
            "course_price": "2",
            "course_level": "beginner",
            "course_thumbnail": "python_thumbnail.jpg",
            "course_intro_video": "python_intro.mp4",
            "course_status": "0",
            "created_at": "2024-08-13 09:08:37",
            "updated_at": "2024-09-11 11:11:59",
            "deleted_at": null
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-instructor" onclick="copyToClipboard('#response-get-by-instructor')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>

            <!-- POST /courses -->
            <section id="courses-create">
                <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /courses</small>

                <div class="card mb-3 border border-0 shadow-sm">
                    <div class="card-header  bg-white border border-0">Create New Course</div>
                    <div class="card-body">
                        <h5 class="card-title">Description</h5>
                        <p class="card-text">Inserts a new record into the `courses` table. This includes uploading images and videos, and setting various course details.</p>
                        <h6>Route:</h6>
                        <p><code><?= base_url(); ?>api/courses/create</code></p>
                        <h6>Request Body:</h6>
                        <div class="position-relative">
                            <pre class="response-example bg-light-subtle"><code id="request-body-create" class="language-json">   {
            "course_id": "4",
            "course_title": "Introduction to Excel",
            "course_description": "Learn how to use Excel for data analysis, from basics to advanced features.",
            "instructor_id": "3",
            "course_category_id": "4",
            "course_language": "English",
            "currency": "USD",
            "course_price": null,
            "course_level": "beginner",
            "course_thumbnail": "excel_thumbnail.jpg",
            "course_intro_video": "excel_intro.mp4",
            "course_status": "0",
            "created_at": "2024-08-13 09:08:37",
            "updated_at": "2024-09-11 11:10:12",
            "deleted_at": null
        },</code></pre>
                            <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-create" onclick="copyToClipboard('#request-body-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                        </div>
                        <h6>Response:</h6>
                        <div class="position-relative">
                            <pre class="response-example bg-light-subtle"><code id="response-create" class="language-json">{
    "status": 201,
    "message": "Course Created Successfully"
}</code></pre>
                            <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-create" onclick="copyToClipboard('#response-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                        </div>
                        <h6>File Storage:</h6>
                        <p><strong>Image Storage Path:</strong> The course thumbnail image is stored in the `uploads/courses/image/` directory on the server. The filename is stored in the database.</p>
                        <p><strong>Video Storage Path:</strong> The course introductory video is stored in the `uploads/courses/introvideo/` directory on the server. The filename is stored in the database.</p>
                        <h6>Fetching Files:</h6>
                        <p>To access the uploaded files, you can construct URLs based on the stored file paths. For example:</p>
                        <ul>
                            <li><strong>Course Thumbnail:</strong> <code><?= base_url() ?>/uploads/courses/image/{course_thumbnail}</code></li>
                            <li><strong>Course Intro Video:</strong> <code><?= base_url() ?>/uploads/courses/introvideo/{course_intro_video}</code></li>
                        </ul>
                    </div>
                </div>
            </section>


            <!-- Course Additional Endpoints -->
            <section id="course-additional" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Course Additional Information API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Course Additional Information API provides endpoints to manage additional information for courses. Below are the available operations:
                    <ul>
                        <li><strong>GET /courses/{course_id}/additional</strong>: Retrieve additional information for a specific course.</li>
                        <li><strong>POST /courses/{course_id}/additional</strong>: Create additional information for a specific course.</li>
                        <li><strong>PUT /courses/{course_id}/additional/update/{additional_id}</strong>: Update additional information for a specific course.</li>
                        <li><strong>DELETE /courses/{course_id}/additional/delete/{additional_id}</strong>: Delete additional information for a specific course.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /courses/{course_id}/additional -->
                <section id="course-additional-get">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /courses/{course_id}/additional</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header  bg-white border border-0">Retrieve Additional Information</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches additional information for a specific course by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/courses/{course_id}/additional</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>course_id</strong>: The ID of the course for which additional information is to be retrieved.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-additional" class="language-json">{
    "status": 200,
    "data": [
        {
            "course_additional_id": "1",
            "course_id": "1",
            "who_is_for": "Ideal for beginners who are new to programming and want to start with Python.",
            "what_you_will_learn": "Learn the basics of Python programming, including data types, control structures, and functions.",
            "requirements": "No prior programming experience required. Basic computer skills are needed.",
            "created_at": "2024-08-13 09:09:18",
            "updated_at": "2024-08-13 09:09:18"
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-additional" onclick="copyToClipboard('#response-get-additional')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /courses/{course_id}/additional -->
                <section id="course-additional-create">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /courses/{course_id}/additional</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header  bg-white border border-0">Create Additional Information</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Inserts a new record into the `courses_additional` table for a specific course.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/courses/{course_id}/additional</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-create-additional" class="language-json">{
    "who_is_for": "Ideal for beginners who want to start with Python.",
    "what_you_will_learn": "Basics of Python programming.",
    "requirements": "No prior programming experience required."
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-create-additional" onclick="copyToClipboard('#request-body-create-additional')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-create-additional" class="language-json">{
    "status": 201,
    "message": "Additional information created successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-create-additional" onclick="copyToClipboard('#response-create-additional')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- PUT /courses/{course_id}/additional/{additional_id} -->
                <section id="course-additional-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">PUT /courses/{course_id}/additional/{additional_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header  bg-white border border-0">Update Additional Information</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates existing additional information for a specific course by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/courses/{course_id}/additional/{additional_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>course_id</strong>: The ID of the course.</li>
                                <li><strong>additional_id</strong>: The ID of the additional information to update.</li>
                            </ul>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-update-additional" class="language-json">{
    "who_is_for": "Updated description for beginners.",
    "what_you_will_learn": "Updated learning objectives.",
    "requirements": "Updated requirements."
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update-additional" onclick="copyToClipboard('#request-body-update-additional')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-update-additional" class="language-json">{
    "status": 200,
    "message": "Additional information updated successfully",
    "data": {
        "who_is_for": "Updated description for beginners.",
        "what_you_will_learn": "Updated learning objectives.",
        "requirements": "Updated requirements.",
        "updated_at": "2024-08-13 09:09:18"
    }
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update-additional" onclick="copyToClipboard('#response-update-additional')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- DELETE /courses/{course_id}/additional/{additional_id} -->
                <section id="course-additional-delete">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /courses/{course_id}/additional/{additional_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header  bg-white border border-0">Delete Additional Information</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Deletes additional information for a specific course by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/courses/{course_id}/additional/{additional_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>course_id</strong>: The ID of the course.</li>
                                <li><strong>additional_id</strong>: The ID of the additional information to delete.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-delete-additional" class="language-json">{
    "status": 200,
    "message": "Additional information successfully deleted.",
    "data": {
        "course_id": "1",
        "course_additional_id": "1"
    }
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-delete-additional" onclick="copyToClipboard('#response-delete-additional')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>


            <!-- PUT /courses/{course_id} -->
            <section id="courses-update">
                <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">PUT /courses/{course_id}</small>
                <div class="card mb-3 border border-0 shadow-sm">
                    <div class="card-header  bg-white border border-0">Update Existing Course</div>
                    <div class="card-body">
                        <h5 class="card-title">Description</h5>
                        <p class="card-text">Updates an existing course record identified by its ID. The request supports updating text fields, and optionally uploading new files (thumbnail image and intro video).</p>
                        <h6>Route:</h6>
                        <p><code><?= base_url(); ?>api/courses/{course_id}</code></p>
                        <h6>Parameters:</h6>
                        <ul>
                            <li><strong>course_id</strong>: The ID of the course to update.</li>
                        </ul>
                        <h6>Request Body:</h6>
                        <p>The request body can include fields to update and optionally new files for thumbnail and intro video. If a file is not provided, the existing file reference will remain unchanged.</p>
                        <div class="position-relative">
                            <pre class="response-example bg-light-subtle"><code id="request-body-update" class="language-json">{
    "course_title": "Updated Course",
    "course_description": "Updated Description",
    "instructor_id": "2",
    "course_category_id": "2",
    "course_language": "Spanish",
    "course_price": "89.99",
    "course_level": "intermediate",
    "course_thumbnail": "updated_course_thumbnail.jpg", // Optional: new thumbnail image filename
    "course_intro_video": "updated_intro_video.mp4", // Optional: new intro video filename
    "course_status": 1
}</code></pre>
                            <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update" onclick="copyToClipboard('#request-body-update')"><i class="fa-solid fa-copy fa-xl"></i> </button>
                        </div>
                        <h6>Response:</h6>
                        <p>Upon successful update, the response includes the updated course data. If an error occurs, a corresponding error message will be provided.</p>
                        <div class="position-relative">
                            <pre class="response-example bg-light-subtle"><code id="response-update" class="language-json">{
    "status": 200,
    "message": "Course Updated Successfully",
    "data": {
        "course_title": "Updated Course",
        "course_description": "Updated Description",
        "instructor_id": "2",
        "course_category_id": "2",
        "course_language": "Spanish",
        "course_price": "89.99",
        "course_level": "intermediate",
        "course_thumbnail": "updated_course_thumbnail.jpg", // Updated thumbnail image filename
        "course_intro_video": "updated_intro_video.mp4", // Updated intro video filename
        "course_status": 1
    }
}</code></pre>
                            <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update" onclick="copyToClipboard('#response-update')"><i class="fa-solid fa-copy fa-xl"></i> </button>
                        </div>
                    </div>
                </div>
            </section>


            <!-- DELETE /courses/{course_id} -->
            <section id="courses-delete">
                <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /courses/{course_id}</small>

                <div class="card mb-3 border border-0 shadow-sm">
                    <div class="card-header  bg-white border border-0">Delete Course</div>
                    <div class="card-body">
                        <h5 class="card-title">Description</h5>
                        <p class="card-text">Deletes a course record by its ID.</p>
                        <h6>Route:</h6>
                        <p><code><?= base_url(); ?>api/courses/delete/{course_id}</code></p>
                        <h6>Parameters:</h6>
                        <ul>
                            <li><strong>id</strong>: The ID of the course to delete.</li>
                        </ul>
                        <h6>Response:</h6>
                        <div class="position-relative">
                            <pre class="response-example bg-light-subtle"><code id="response-delete" class="language-json">{
    "course_id": 1
}</code></pre>
                            <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-delete" onclick="copyToClipboard('#response-delete')"><i class="fa-solid fa-copy fa-xl"></i> </button>
                        </div>
                    </div>
                </div>
            </section>
            </section>


            <section id="course-categories" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Course Categories API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Course Categories API offers several endpoints to interact with course category data. Below are the available operations:
                    <ul>
                        <li><strong>GET /course-categories</strong>: Retrieve a list of all categories.</li>
                        <li><strong>GET /course-categories/{category_id}</strong>: Retrieve details of a specific category by ID.</li>
                        <li><strong>POST /course-categories/create</strong>: Create a new category.</li>
                        <li><strong>POST /course-categories/update/{category_id}</strong>: Update details of an existing category by ID.</li>
                        <li><strong>DELETE /course-categories/delete/{category_id}</strong>: Remove a category by ID.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /course-categories -->
                <section id="course-categories-get-all">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /course-categories</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve All Categories</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all records from the course categories table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-categories</code></p>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-all-categories" class="language-json">{
    "status": 200,
    "data": [
        {
            "category_id": "1",
            "category_name": "Programming",
            "category_description": "Courses focused on teaching various programming languages and techniques.",
            "created_at": "2024-08-01 10:00:00",
            "updated_at": "2024-08-01 10:00:00",
            "deleted_at": null
        },
        {
            "category_id": "2",
            "category_name": "Data Science",
            "category_description": "Courses related to data analysis, machine learning, and data visualization.",
            "created_at": "2024-08-02 11:15:00",
            "updated_at": "2024-08-02 11:15:00",
            "deleted_at": null
        },
        {
            "category_id": "3",
            "category_name": "Design",
            "category_description": "Courses covering graphic design, UX/UI, and visual communication.",
            "created_at": "2024-08-03 12:30:00",
            "updated_at": "2024-08-03 12:30:00",
            "deleted_at": null
        },
        {
            "category_id": "4",
            "category_name": "Business",
            "category_description": "Courses on business management, entrepreneurship, and strategy.",
            "created_at": "2024-08-04 13:45:00",
            "updated_at": "2024-08-04 13:45:00",
            "deleted_at": null
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-all-categories" onclick="copyToClipboard('#response-get-all-categories')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- GET /category-by-course/{category_id} -->
                <section id="category-by-course">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-success-emphasis bg-success-subtle border border-success-subtle rounded-2">GET /category-by-course/{category_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Courses by Category</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all courses belonging to the specified category.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/category-by-course/{category_id}</code></p>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-courses-by-category" class="language-json">{
    "status": 200,
    "data": [
        {
            "course_id": "1",
            "course_title": "Introduction to Python",
            "course_description": "Learn Python from scratch with this beginner-friendly course.",
            "instructor_id": "1",
            "course_category_id": "4",
            "course_language": "English",
            "currency": "USD",
            "course_price": "2",
            "course_level": "beginner",
            "course_thumbnail": "python_thumbnail.jpg",
            "course_intro_video": "python_intro.mp4",
            "course_status": "0",
            "created_at": "2024-08-13 09:08:37",
            "updated_at": "2024-09-11 11:11:59",
            "deleted_at": null
        },
        {
            "course_id": "4",
            "course_title": "Introduction to Excel",
            "course_description": "Learn how to use Excel for data analysis, from basics to advanced features.",
            "instructor_id": "3",
            "course_category_id": "4",
            "course_language": "English",
            "currency": "USD",
            "course_price": null,
            "course_level": "beginner",
            "course_thumbnail": "excel_thumbnail.jpg",
            "course_intro_video": "excel_intro.mp4",
            "course_status": "0",
            "created_at": "2024-08-13 09:08:37",
            "updated_at": "2024-09-11 11:10:12",
            "deleted_at": null
        },
        {
            "course_id": "36",
            "course_title": "Git & GitHub Crash Course: Create a Repository From Scratch!",
            "course_description": "Description",
            "instructor_id": "3",
            "course_category_id": "4",
            "course_language": "English",
            "currency": "USD",
            "course_price": null,
            "course_level": "beginner",
            "course_thumbnail": "1724056161_b5fe36a360e927ddd8f0.jpeg",
            "course_intro_video": "1724056161_4895b4747cadf19fbc91.mp4",
            "course_status": "0",
            "created_at": "2024-08-19 08:29:21",
            "updated_at": "2024-09-11 11:10:12",
            "deleted_at": null
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-courses-by-category" onclick="copyToClipboard('#response-get-courses-by-category')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /course-categories/{id} -->
                <section id="course-categories-get-by-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /course-categories/{category_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Single Category</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a single category record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-categories/{category_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>category_id</strong>: The ID of the category to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-id-category" class="language-json">{
    "status": 200,
    "data": {
        "category_id": "1",
        "category_name": "Programming",
        "category_description": "Courses focused on teaching various programming languages and techniques.",
        "created_at": "2024-08-01 10:00:00",
        "updated_at": "2024-08-01 10:00:00",
        "deleted_at": null
    }
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-id-category" onclick="copyToClipboard('#response-get-by-id-category')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /course-categories/create -->
                <section id="course-categories-create">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /course-categories/create</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Create New Category</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Inserts a new record into the course categories table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-categories/create</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-create-category" class="language-json">{
    "category_name": "New Category",
    "category_description": "Description of the new category"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-create-category" onclick="copyToClipboard('#request-body-create-category')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-create-category" class="language-json">{
    "status": 201,
    "message": "Category Created Successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-create-category" onclick="copyToClipboard('#response-create-category')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /course-categories/update/{id} -->
                <section id="course-categories-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /course-categories/update/{category_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update Category</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates an existing category record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-categories/update/{category_id}</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-update-category" class="language-json">{
    "category_name": "Updated Category Name",
    "category_description": "Updated Category Description"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update-category" onclick="copyToClipboard('#request-body-update-category')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-update-category" class="language-json">{
    "status": 200,
    "message": "Category Updated Successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update-category" onclick="copyToClipboard('#response-update-category')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- DELETE /course-categories/delete/{id} -->
                <section id="course-categories-delete">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /course-categories/delete/{category_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Delete Category</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Deletes a category record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-categories/delete/{category_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>category_id</strong>: The ID of the category to delete.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-delete-category" class="language-json">{
    "status": 200,
    "message": "Category Deleted Successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-delete-category" onclick="copyToClipboard('#response-delete-category')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>




            <section id="course-sections" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Course Sections API</h1>
                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Course Sections API provides endpoints to manage course sections. Here are the available operations:
                    <ul>
                        <li><strong>GET /course-sections/{section_id}</strong>: Retrieve details of a specific course section by its ID.</li>
                        <li><strong>GET /course-sections/by-course/{course_id}</strong>: Retrieve all sections associated with a specific course ID.</li>
                        <li><strong>POST /course-sections/create</strong>: Create a new course section.</li>
                        <li><strong>POST /course-sections/update/{section_id}</strong>: Update details of an existing course section by ID.</li>
                        <li><strong>DELETE /course-sections/delete/{section_id}</strong>: Remove a course section by ID.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /course-sections/{id} -->
                <section id="course-sections-get-by-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /course-sections/{section_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Single Section</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a single course section record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-sections/{section_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>section_id</strong>: The ID of the course section to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-id-section" class="language-json">{
"status": 200,
"data": {
    "section_id": "1",
    "course_id": "101",
    "title": "Introduction to Programming",
    "created_at": "2024-08-01 10:00:00",
    "updated_at": "2024-08-01 10:00:00"
}
}</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-id-section" onclick="copyToClipboard('#response-get-by-id-section')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- GET /course-sections/by-course/{course_id} -->
                <section id="course-sections-get-by-course-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /course-sections/by-course/{course_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Sections by Course ID</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all sections associated with a specific course ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-sections/by-course/{course_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>course_id</strong>: The ID of the course to retrieve sections for.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-course-id-sections" class="language-json">{
"status": 200,
"data": [
    {
        "section_id": "1",
        "course_id": "101",
        "title": "Introduction to Programming",
        "created_at": "2024-08-01 10:00:00",
        "updated_at": "2024-08-01 10:00:00"
    },
    {
        "section_id": "2",
        "course_id": "101",
        "title": "Advanced Programming Concepts",
        "created_at": "2024-08-02 11:15:00",
        "updated_at": "2024-08-02 11:15:00"
    }
]
}</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-course-id-sections" onclick="copyToClipboard('#response-get-by-course-id-sections')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- POST /course-sections/create -->
                <section id="course-sections-create">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /course-sections/create</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Create New Section</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Inserts a new record into the course sections table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-sections/create</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-create-section" class="language-json">{
"course_id": "101",
"title": "New Section Title"
}</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-create-section" onclick="copyToClipboard('#request-body-create-section')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-create-section" class="language-json">{ "status": 201, "message": "New section created successfully." }</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-create-section" onclick="copyToClipboard('#response-create-section')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- POST /course-sections/update/{id} -->
                <section id="course-sections-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /course-sections/update/{section_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update Section</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates an existing course section record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-sections/update/{section_id}</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-update-section" class="language-json">{
"course_id": "101",
"title": "Updated Section Title"
}</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update-section" onclick="copyToClipboard('#request-body-update-section')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-update-section" class="language-json">{ "status": 200, "message": "Section updated successfully.", "data": { "course_id": "101", "title": "Updated Section Title", "updated_at": "2024-08-01 11:00:00" } }</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update-section" onclick="copyToClipboard('#response-update-section')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- DELETE /course-sections/delete/{id} -->
                <section id="course-sections-delete">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /course-sections/delete/{section_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Delete Section</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Removes a course section record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-sections/delete/{section_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>section_id</strong>: The ID of the course section to delete.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-delete-section" class="language-json">{
"status": 200,
"message": "Section deleted successfully."
}</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-delete-section" onclick="copyToClipboard('#response-delete-section')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

            </section>

            <section id="lectures" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Lectures API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Lectures API offers several endpoints to interact with lecture data. Below are the available operations:
                    <ul>
                        <li><strong>GET /lectures</strong>: Retrieve a list of all lectures or a specific lecture by ID.</li>
                        <li><strong>POST /lectures/create</strong>: Create a new lecture.</li>
                        <li><strong>POST /lectures/update/{lecture_id}</strong>: Update details of an existing lecture by ID.</li>
                        <li><strong>DELETE /lectures/delete/{lecture_id}</strong>: Remove a lecture by ID.</li>
                        <li><strong>GET /lectures/by-section/{section_id}</strong>: Retrieve lectures by section ID.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /lectures -->
                <section id="lectures-get-all">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /lectures</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve All Lectures</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all records from the lectures table. If an ID is provided, fetches a specific lecture by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/lectures</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>id</strong> (optional): The ID of the lecture to retrieve. If not provided, retrieves all lectures.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-all-lectures" class="language-json">{
    "status": 200,
    "data": [
        {
            "lecture_id": "1",
            "section_id": "10",
            "lecture_title": "Introduction to Programming",
            "lecture_video_url": "intro_programming.mp4",
            "created_at": "2024-08-01 10:00:00",
            "updated_at": "2024-08-01 10:00:00"
        },
        {
            "lecture_id": "2",
            "section_id": "10",
            "lecture_title": "Variables and Data Types",
            "lecture_video_url": "variables_data_types.mp4",
            "created_at": "2024-08-02 11:15:00",
            "updated_at": "2024-08-02 11:15:00"
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-all-lectures" onclick="copyToClipboard('#response-get-all-lectures')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /lectures/{id} -->
                <section id="lectures-get-by-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /lectures/{lecture_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Single Lecture</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a single lecture record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/lectures/{lecture_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>lecture_id</strong>: The ID of the lecture to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-id-lecture" class="language-json">{
    "status": 200,
    "data": {
        "lecture_id": "1",
        "section_id": "10",
        "lecture_title": "Introduction to Programming",
        "lecture_video_url": "intro_programming.mp4",
        "created_at": "2024-08-01 10:00:00",
        "updated_at": "2024-08-01 10:00:00"
    }
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-id-lecture" onclick="copyToClipboard('#response-get-by-id-lecture')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /lectures/create -->
                <section id="lectures-create">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /lectures/create</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Create New Lecture</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Inserts a new record into the lectures table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/lectures/create</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-create-lecture" class="language-json">{
    "section_id": "10",
    "lecture_title": "New Lecture Title",
    "lecture_video": "file"  // Form-data for file upload
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-create-lecture" onclick="copyToClipboard('#request-body-create-lecture')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-create-lecture" class="language-json">{
    "status": 201,
    "message": "Lecture Created Successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-create-lecture" onclick="copyToClipboard('#response-create-lecture')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /lectures/update/{id} -->
                <section id="lectures-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /lectures/update/{lecture_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update Lecture</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates an existing lecture record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/lectures/update/{lecture_id}</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-update-lecture" class="language-json">{
    "section_id": "10",
    "lecture_title": "Updated Lecture Title",
    "lecture_video": "file"  // Form-data for file upload (optional)
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update-lecture" onclick="copyToClipboard('#request-body-update-lecture')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-update-lecture" class="language-json">{
    "status": 200,
    "message": "Lecture Updated Successfully",
    "data": {
        "section_id": "10",
        "lecture_title": "Updated Lecture Title",
        "lecture_video_url": "updated_lecture_video.mp4", // If updated
        "updated_at": "2024-08-25 14:30:00"
    }
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update-lecture" onclick="copyToClipboard('#response-update-lecture')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- DELETE /lectures/delete/{id} -->
                <section id="lectures-delete">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /lectures/delete/{lecture_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Delete Lecture</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Deletes a lecture record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/lectures/delete/{lecture_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>lecture_id</strong>: The ID of the lecture to delete.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-delete-lecture" class="language-json">{
    "status": 200,
    "message": "Lecture Deleted Successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-delete-lecture" onclick="copyToClipboard('#response-delete-lecture')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- GET /lectures/by-section/{section_id} -->
                <section id="lectures-get-by-section">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /lectures/by-section/{section_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Lectures by Section</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all lectures associated with a specific section ID. If the section ID is not provided or no lectures are found for the given section ID, appropriate error responses will be returned.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/lectures/by-section/{section_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>section_id</strong>: The ID of the section to retrieve lectures for. This is a required parameter.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-section" class="language-json">{
    "status": 200,
    "message": "Lectures retrieved successfully.",
    "data": [
        {
            "lecture_id": "1",
            "section_id": "10",
            "lecture_title": "Introduction to Programming",
            "lecture_video_url": "intro_programming.mp4",
            "created_at": "2024-08-01 10:00:00",
            "updated_at": "2024-08-01 10:00:00"
        },
        {
            "lecture_id": "2",
            "section_id": "10",
            "lecture_title": "Variables and Data Types",
            "lecture_video_url": "variables_data_types.mp4",
            "created_at": "2024-08-02 11:15:00",
            "updated_at": "2024-08-02 11:15:00"
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-section" onclick="copyToClipboard('#response-get-by-section')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-not-found-by-section" class="language-json">{
    "status": 404,
    "message": "No lectures found for the provided section ID."
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-not-found-by-section" onclick="copyToClipboard('#response-not-found-by-section')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>

            <!-- Quizzes Endpoints -->
            <section id="quizzes" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Quiz API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Quiz API offers several endpoints to interact with quiz data. Below are the available operations:
                    <ul>
                        <li><strong>GET /quizzes</strong>: Retrieve a list of all quizzes or quizzes by section ID.</li>
                        <li><strong>GET /quizzes/quiz/{quiz_id}</strong>: Retrieve details of a specific quiz by ID.</li>
                        <li><strong>POST /quizzes/create</strong>: Create a new quiz.</li>
                        <li><strong>POST /quizzes/update/{quiz_id}</strong>: Update details of an existing quiz by ID.</li>
                        <li><strong>DELETE /quizzes/delete/{quiz_id}</strong>: Remove a quiz by ID.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /quizzes -->
                <section id="quizzes-get-all">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /quizzes/(:segment)</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve All Quizzes or Quizzes by Section ID</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all quizzes or quizzes for a specific section if an ID is provided.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/quizzes/(:segment)</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>section_id</strong> (optional): The ID of the section to filter quizzes.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-all" class="language-json">{
    "status": 200,
    "data": [
        {
            "quiz_id": "1",
            "quiz_title": "Sample Quiz 1",
            "section_id": "1",
            "created_at": "2024-08-13 09:08:37",
            "updated_at": "2024-08-13 09:08:37"
        },
        {
            "quiz_id": "2",
            "quiz_title": "Sample Quiz 2",
            "section_id": "2",
            "created_at": "2024-08-13 09:08:37",
            "updated_at": "2024-08-13 09:08:37"
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-all" onclick="copyToClipboard('#response-get-all')"><i class="fa-solid fa-copy fa-xl"></i> </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /quizzes/quiz/{id} -->
                <section id="quizzes-get-by-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /quizzes/quiz/{quiz_id}</small>
                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Single Quiz</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a single quiz record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/quizzes/quiz/{quiz_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>quiz_id</strong>: The ID of the quiz to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-id" class="language-json">{
    "status": 200,
    "data": {
        "quiz_id": "1",
        "quiz_title": "Sample Quiz 1",
        "section_id": "1",
        "created_at": "2024-08-13 09:08:37",
        "updated_at": "2024-08-13 09:08:37"
    }
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-id" onclick="copyToClipboard('#response-get-by-id')"><i class="fa-solid fa-copy fa-xl"></i> </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /quizzes/create -->
                <section id="quizzes-create">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /quizzes/create</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Create New Quiz</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Inserts a new record into the `quizzes` table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/quizzes/create</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-create" class="language-json">{
    "quiz_title": "New Quiz",
    "section_id": "1"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-create" onclick="copyToClipboard('#request-body-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-create" class="language-json">{
    "status": 201,
    "message": "Quiz created successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-create" onclick="copyToClipboard('#response-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /quizzes/update/{id} -->
                <section id="quizzes-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /quizzes/update/(:segment)</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update Quiz</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates an existing quiz record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/quizzes/update/{quiz_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>quiz_id</strong>: The ID of the quiz to update.</li>
                            </ul>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-update" class="language-json">{
    "quiz_title": "Updated Quiz Title",
    "section_id": "1"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update" onclick="copyToClipboard('#request-body-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-update" class="language-json">{
    "status": 200,
    "message": "Quiz updated successfully",
    "data": {
        "quiz_id": "1",
        "quiz_title": "Updated Quiz Title",
        "section_id": "1",
        "updated_at": "2024-08-13 09:08:37"
    }
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update" onclick="copyToClipboard('#response-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- DELETE /quizzes/delete/{id} -->
                <section id="quizzes-delete">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /quizzes/delete/{quiz_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Delete Quiz</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Removes a quiz record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/quizzes/delete/{quiz_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>quiz_id</strong>: The ID of the quiz to delete.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-delete" class="language-json">{
    "status": 200,
    "message": "Quiz deleted successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-delete" onclick="copyToClipboard('#response-delete')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>

            <!-- Question and Answer Endpoints -->
            <section id="question-answer" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Question and Answer API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Question and Answer API offers endpoints for managing questions and answers within quizzes. Below are the available operations:
                    <ul>
                        <li><strong>GET /questions/(:segment)</strong>: Retrieve questions and their answers for a specific quiz.</li>
                        <li><strong>POST /questions/create</strong>: Create a new question with optional answers.</li>
                        <li><strong>POST /questions/update/{id}</strong>: Update an existing question and its answers.</li>
                        <li><strong>DELETE /questions/delete/{id}</strong>: Delete a question and its associated answers.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /questions/(:segment) -->
                <section id="questions-get">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /questions/(:segment)</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Questions and Answers for a Quiz</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all questions and their associated answers for a specific quiz. A quiz ID is required.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/questions/(:segment)</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>quiz_id</strong>: The ID of the quiz to fetch questions for.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get" class="language-json">{
    "status": 200,
    "data": [
        {
            "question_id": "1",
            "question_text": "What is the capital of France?",
            "answers": [
                {
                    "answer_id": "1",
                    "answer_text": "Paris",
                    "is_correct": true
                },
                {
                    "answer_id": "2",
                    "answer_text": "Berlin",
                    "is_correct": false
                }
            ]
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get" onclick="copyToClipboard('#response-get')"><i class="fa-solid fa-copy fa-xl"></i> </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /questions/create -->
                <section id="questions-create">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /questions/create</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Create New Question and Answers</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Creates a new question and optionally associated answers.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/questions/create</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-create" class="language-json">{
    "question_text": "What is the largest planet in our solar system?",
    "quiz_id": "1",
    "answers": [
        {
            "answer_text": "Jupiter",
            "is_correct": true
        },
        {
            "answer_text": "Saturn",
            "is_correct": false
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-create" onclick="copyToClipboard('#request-body-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-create" class="language-json">{
    "status": 201,
    "message": "Question and answers created successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-create" onclick="copyToClipboard('#response-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /questions/update/{id} -->
                <section id="questions-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /questions/update/(:segment)</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update Existing Question and Answers</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates an existing question and its associated answers.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/questions/update/{question_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>question_id</strong>: The ID of the question to update.</li>
                            </ul>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-update" class="language-json">{
    "question_text": "Updated question text?",
    "answers": [
        {
            "answer_id": "1",
            "answer_text": "Updated answer text",
            "is_correct": true
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update" onclick="copyToClipboard('#request-body-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-update" class="language-json">{
    "status": 200,
    "message": "Question and answers updated successfully",
    "data": {
        "question_id": "1",
        "question_text": "Updated question text?"
    }
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update" onclick="copyToClipboard('#response-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- DELETE /questions/delete/{id} -->
                <section id="questions-delete">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /questions/delete/{question_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Delete Question and Answers</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Deletes a question and all associated answers based on the question ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/questions/delete/{question_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>question_id</strong>: The ID of the question to delete.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-delete" class="language-json">{
    "status": 200,
    "message": "Question and associated answers deleted successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-delete" onclick="copyToClipboard('#response-delete')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>





            <section id="course-reviews" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Course Reviews API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Course Reviews API offers several endpoints to interact with course review data. Below are the available operations:
                    <ul>
                        <li><strong>GET /course-reviews</strong>: Retrieve a list of all reviews.</li>
                        <li><strong>GET /course-reviews/{course_id}</strong>: Retrieve reviews for a specific course by course ID.</li>
                        <li><strong>POST /course-reviews/create</strong>: Create a new review.</li>
                        <li><strong>POST /course-reviews/update/{review_id}</strong>: Update details of an existing review by review ID.</li>
                        <li><strong>DELETE /course-reviews/delete/{review_id}</strong>: Remove a review by review ID.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /course-reviews -->
                <section id="course-reviews-get-all">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /course-reviews</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve All Reviews</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all records from the course reviews table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-reviews</code></p>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-all-reviews" class="language-json">{
    "status": 200,
    "data": [
        {
            "review_id": "1",
            "course_id": "101",
            "student_id": "202",
            "rating": 5,
            "comment": "Excellent course with in-depth content.",
            "created_at": "2024-08-01 10:00:00",
            "updated_at": "2024-08-01 10:00:00"
        },
        {
            "review_id": "2",
            "course_id": "101",
            "student_id": "203",
            "rating": 4,
            "comment": "Great course, but could use more examples.",
            "created_at": "2024-08-02 11:15:00",
            "updated_at": "2024-08-02 11:15:00"
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-all-reviews" onclick="copyToClipboard('#response-get-all-reviews')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /course-reviews/{course_id} -->
                <section id="course-reviews-get-by-course-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /course-reviews/{course_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Reviews by Course ID</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all reviews associated with a specific course ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-reviews/{course_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>course_id</strong>: The ID of the course to retrieve reviews for.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-course-id" class="language-json">{
    "status": 200,
    "data": [
        {
            "review_id": "1",
            "course_id": "101",
            "student_id": "202",
            "rating": 5,
            "comment": "Excellent course with in-depth content.",
            "created_at": "2024-08-01 10:00:00",
            "updated_at": "2024-08-01 10:00:00"
        },
        {
            "review_id": "2",
            "course_id": "101",
            "student_id": "203",
            "rating": 4,
            "comment": "Great course, but could use more examples.",
            "created_at": "2024-08-02 11:15:00",
            "updated_at": "2024-08-02 11:15:00"
        }
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-course-id" onclick="copyToClipboard('#response-get-by-course-id')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /course-reviews/create -->
                <section id="course-reviews-create">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /course-reviews/create</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Create New Review</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Inserts a new record into the course reviews table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-reviews/create</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-create-review" class="language-json">{
    "course_id": "101",
    "student_id": "204",
    "rating": 5,
    "comment": "Fantastic course with practical insights."
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-create-review" onclick="copyToClipboard('#request-body-create-review')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-create-review" class="language-json">{
    "status": 201,
    "message": "Review Created Successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-create-review" onclick="copyToClipboard('#response-create-review')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /course-reviews/update/{id} -->
                <section id="course-reviews-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /course-reviews/update/{review_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update Review</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates an existing review record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-reviews/update/{review_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>review_id</strong>: The ID of the review to update.</li>
                            </ul>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-update-review" class="language-json">{
    "rating": 4,
    "comment": "Updated review comment with more details."
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update-review" onclick="copyToClipboard('#request-body-update-review')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-update-review" class="language-json">{
    "status": 200,
    "message": "Review Updated Successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update-review" onclick="copyToClipboard('#response-update-review')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- DELETE /course-reviews/delete/{id} -->
                <section id="course-reviews-delete">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /course-reviews/delete/{review_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Delete Review</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Deletes a review record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-reviews/delete/{review_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>review_id</strong>: The ID of the review to delete.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-delete-review" class="language-json">{
    "status": 200,
    "message": "Review Deleted Successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-delete-review" onclick="copyToClipboard('#response-delete-review')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>


            <!-- Coupons Endpoints -->

            <section id="coupons" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Coupons API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Coupons API offers several endpoints to interact with coupon data. Below are the available operations:
                    <ul>
                        <li><strong>GET /coupons</strong>: Retrieve a list of all coupons.</li>
                        <li><strong>GET /coupons/{coupon_id}</strong>: Retrieve details of a specific coupon by ID.</li>
                        <li><strong>POST /coupons/create</strong>: Create a new coupon.</li>
                        <li><strong>POST /coupons/update/{coupon_id}</strong>: Update details of an existing coupon by ID.</li>
                        <li><strong>DELETE /coupons/delete/{coupon_id}</strong>: Remove a coupon by ID.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /coupons -->
                <section id="coupons-get-all">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /coupons</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve All Coupons</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all records from the coupons table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/coupons</code></p>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-all-coupons" class="language-json">{
    "status": 200,
    "data": [
        {
            "coupon_id": "1",
            "coupon_code": "SUMMER2024",
            "coupon_discount": "15.00",
            "coupon_discount_type": "percentage",
            "coupon_valid_from": "2024-06-01 00:00:00",
            "coupon_valid_to": "2024-06-30 23:59:59",
            "coupon_usage_limit": "100",
            "coupon_used_count": "20",
            "coupon_applicable_courses": "['1', '2', '3']",
            "created_at": "2024-05-15 08:00:00",
            "updated_at": "2024-05-15 08:00:00",
            "deleted_at": null
        },
        {
            "coupon_id": "2",
            "coupon_code": "WELCOME10",
            "coupon_discount": "10.00",
            "coupon_discount_type": "fixed",
            "coupon_valid_from": "2024-01-01 00:00:00",
            "coupon_valid_to": "2024-12-31 23:59:59",
            "coupon_usage_limit": "50",
            "coupon_used_count": "5",
            "coupon_applicable_courses": "['4', '5']",
            "created_at": "2023-12-01 09:00:00",
            "updated_at": "2023-12-01 09:00:00",
            "deleted_at": null
        }
        // Additional coupon records...
    ]
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-all-coupons" onclick="copyToClipboard('#response-get-all-coupons')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /coupons/{id} -->
                <section id="coupons-get-by-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /coupons/{coupon_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Single Coupon</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a single coupon record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/coupons/{coupon_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>coupon_id</strong>: The ID of the coupon to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-id-coupon" class="language-json">{
    "status": 200,
    "data": {
        "coupon_id": "1",
        "coupon_code": "SUMMER2024",
        "coupon_discount": "15.00",
        "coupon_discount_type": "percentage",
        "coupon_valid_from": "2024-06-01 00:00:00",
        "coupon_valid_to": "2024-06-30 23:59:59",
        "coupon_usage_limit": "100",
        "coupon_used_count": "20",
        "coupon_applicable_courses": "['1', '2', '3']",
        "created_at": "2024-05-15 08:00:00",
        "updated_at": "2024-05-15 08:00:00",
        "deleted_at": null
    }
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-id-coupon" onclick="copyToClipboard('#response-get-by-id-coupon')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /coupons/create -->
                <section id="coupons-create">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /coupons/create</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Create New Coupon</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Inserts a new record into the coupons table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/coupons/create</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-create-coupon" class="language-json">{
    "coupon_code": "WINTER2024",
    "coupon_discount": "20.00",
    "coupon_discount_type": "fixed",
    "coupon_valid_from": "2024-12-01 00:00:00",
    "coupon_valid_to": "2024-12-31 23:59:59",
    "coupon_usage_limit": "200",
    "coupon_used_count": "0",
    "coupon_applicable_courses": "['6', '7']"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-create-coupon" onclick="copyToClipboard('#request-body-create-coupon')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-create-coupon" class="language-json">{
    "status": 201,
    "message": "Coupon Created Successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-create-coupon" onclick="copyToClipboard('#response-create-coupon')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /coupons/update/{id} -->
                <section id="coupons-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /coupons/update/{coupon_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update Coupon</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates an existing coupon record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/coupons/update/{coupon_id}</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-update-coupon" class="language-json">{
    "coupon_code": "WINTER2025",
    "coupon_discount": "25.00",
    "coupon_discount_type": "fixed",
    "coupon_valid_from": "2024-12-01 00:00:00",
    "coupon_valid_to": "2024-12-31 23:59:59",
    "coupon_usage_limit": "300",
    "coupon_used_count": "0",
    "coupon_applicable_courses": "['8', '9']"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update-coupon" onclick="copyToClipboard('#request-body-update-coupon')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-update-coupon" class="language-json">{
    "status": 200,
    "message": "Coupon Updated Successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update-coupon" onclick="copyToClipboard('#response-update-coupon')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- DELETE /coupons/delete/{id} -->
                <section id="coupons-delete">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /coupons/delete/{coupon_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Delete Coupon</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Deletes a coupon record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/coupons/delete/{coupon_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>coupon_id</strong>: The ID of the coupon to delete.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-delete-coupon" class="language-json">{
    "status": 200,
    "message": "Coupon Deleted Successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-delete-coupon" onclick="copyToClipboard('#response-delete-coupon')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>




            <!-- Users Endpoints -->
            <section id="users" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">User API</h1>
                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The User API offers several endpoints to interact with user data. Below are the available operations:
                    <ul>
                        <li><strong>GET /users</strong>: Retrieve a list of all users.</li>
                        <li><strong>GET /users/{id}</strong>: Retrieve details of a specific user by ID.</li>
                        <li><strong>POST /users/create</strong>: Create a new user.</li>
                        <li><strong>POST /users/update/{id}</strong>: Update details of an existing user by ID.</li>
                        <li><strong>POST /users/updateKyc/{userId}</strong>: Update KYC details of a user by ID.</li>
                        <li><strong>GET /users/verify/{verificationCode}</strong>: Verify a user’s email with a verification code.</li>
                        <li><strong>GET /verify-email/{verificationCode}</strong>: Alternative route to verify email using a verification code.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /users -->
                <section id="users-get-all">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /users</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve All Users</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all records from the `users` table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/users</code></p>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-all" class="language-json">{
"status": 200,
"data": [    {        "user_id": "1",        "email": "user1@example.com",        "first_name": "John",        "last_name": "Doe",        "role_id": "2",        "user_status": "pending",        "verification_code": "abcd1234",        "expires_at": "2024-09-04 00:00:00",        "profile_picture": "profile1.jpg",        "created_at": "2024-09-01 12:00:00",        "updated_at": "2024-09-01 12:00:00"    },    {        "user_id": "2",        "email": "user2@example.com",        "first_name": "Jane",        "last_name": "Smith",        "role_id": "3",        "user_status": "active",        "verification_code": null,        "expires_at": null,        "profile_picture": "profile2.jpg",        "created_at": "2024-09-02 14:00:00",        "updated_at": "2024-09-02 14:00:00"    }]

}</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-all" onclick="copyToClipboard('#response-get-all')"><i class="fa-solid fa-copy fa-xl"></i> </button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- GET /users/{id} -->
                <section id="users-get-by-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /users/{id}</small>
                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Single User</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a single user record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/users/{id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>id</strong>: The ID of the user to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-id" class="language-json">{
"status": 200,
"data": {
    "user_id": "1",
    "email": "user1@example.com",
    "first_name": "John",
    "last_name": "Doe",
    "role_id": "2",
    "user_status": "pending",
    "verification_code": "abcd1234",
    "expires_at": "2024-09-04 00:00:00",
    "profile_picture": "profile1.jpg",
    "created_at": "2024-09-01 12:00:00",
    "updated_at": "2024-09-01 12:00:00"
}

}</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-id" onclick="copyToClipboard('#response-get-by-id')"><i class="fa-solid fa-copy fa-xl"></i> </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /users/create -->
                <section id="users-create">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /users/create</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Create New User</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Inserts a new record into the `users` table. This includes handling file uploads for profile pictures and setting various user details. Sends a verification email if the user role requires it.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/users/create</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-create" class="language-json">{
"email": "newuser@example.com",
"password": "password123",
"first_name": "New",
"last_name": "User",
"role_id": "2",
"profile_picture": "profile_picture.jpg",
"id_document_type": "passport",
"id_document_number": "A1234567",
"document_image": "document_image.jpg",
"proof_of_address": "proof_of_address.jpg",
"bio": "A short bio",
"status": "pending",
"verified_at": null
}</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-create" onclick="copyToClipboard('#request-body-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-create" class="language-json">{ "status": 201, "message": "User Created Successfully" }</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-create" onclick="copyToClipboard('#response-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>File Storage:</h6>
                            <p><strong>Profile Picture Storage Path:</strong> The user profile picture is stored in the uploads/profile_pictures/ directory on the server. The filename is stored in the database.</p>
                            <h6>Verification Email:</h6>
                            <p>For users with a role ID of 3, a verification email will be sent with a link to verify their email address. The link contains a unique verification code.</p>
                        </div>
                    </div>
                </section>

                <!-- POST /users/update/{id} -->
                <section id="users-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /users/update/{id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update User</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates an existing user’s record by ID. This includes handling file uploads for profile pictures and ensuring old files are removed.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/users/update/{id}</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-update" class="language-json">{
"email": "updateduser@example.com",
"first_name": "Updated",
"last_name": "User",
"profile_picture": "updated_profile_picture.jpg",
"bio": "Updated bio"
}</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update" onclick="copyToClipboard('#request-body-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-update" class="language-json">{ "status": 200, "message": "User Updated Successfully" }</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update" onclick="copyToClipboard('#response-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>File Storage:</h6>
                            <p><strong>Profile Picture Storage Path:</strong> The updated profile picture is stored in the uploads/profile_pictures/ directory on the server. The previous picture is deleted if a new one is uploaded.</p>
                        </div>
                    </div>
                </section>

                <!-- POST /users/updateKyc/{userId} -->
                <section id="users-update-kyc">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /users/updateKyc/{userId}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update KYC</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates the KYC details of a user by their ID. This includes handling file uploads for KYC documents.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/users/updateKyc/{userId}</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-update-kyc" class="language-json">{
                                "id_document_type": "passport",
                                "id_document_number": "A1234567",
                                "document_image": "updated_document_image.jpg",
                                "proof_of_address": "updated_proof_of_address.jpg"

                                }</code>
</pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update-kyc" onclick="copyToClipboard('#request-body-update-kyc')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-update-kyc" class="language-json">{ "status": 200, "message": "KYC Updated Successfully" }</code></pre> <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update-kyc" onclick="copyToClipboard('#response-update-kyc')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>File Storage:</h6>
                            <p><strong>Document Storage Path:</strong> KYC documents are stored in the uploads/kyc/ directory on the server. The previous documents are deleted if new ones are uploaded.</p>
                        </div>
                    </div>
                </section>

                <!-- GET /users/verify/{verificationCode} -->
                <section id="users-verify">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /users/verify/{verificationCode}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Email Verification</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Verifies a user's email address using a verification code sent via email.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/users/verify/{verificationCode}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>verificationCode</strong>: The code used to verify the user's email address.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-verify" class="language-json">{
"status": 200,
"message": "Email Verified Successfully"

}</code>
</pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-verify" onclick="copyToClipboard('#response-verify')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /verify-email/{verificationCode} -->
                <section id="users-verify-email">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /verify-email/{verificationCode}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Email Verification (Alternative Route)</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Verifies a user's email address using a verification code. This is an alternative route for email verification.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/verify-email/{verificationCode}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>verificationCode</strong>: The code used to verify the user's email address.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-verify-email" class="language-json">{
                            "status": 200,
                            "message": "Email Verified Successfully"
                            }</code>
                            </pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-verify-email" onclick="copyToClipboard('#response-verify-email')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /users/change-password -->
                <section id="users-change-password"> <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">POST /users/change-password</small>
                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Change Password</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Changes the password for a user. Requires the current password and the new password.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/users/change-password</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>user_id</strong>: The ID of the user whose password is to be changed.</li>
                                <li><strong>old_password</strong>: The user's current password.</li>
                                <li><strong>new_password</strong>: The new password.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-change-password" class="language-json">{
                "status": 200,
                "message": "Password updated successfully."
            }</code>
            </pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-change-password" onclick="copyToClipboard('#response-change-password')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section> <!-- POST /users/request-password-reset -->
                <section id="users-request-password-reset"> <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-2">POST /users/request-password-reset</small>
                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Request Password Reset</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Requests a password reset for the user by sending a reset email to the provided email address.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/users/request-password-reset</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>email</strong>: The email address of the user requesting a password reset.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-request-password-reset" class="language-json">{
                "status": 200,
                "message": "Password reset email sent successfully."
            }</code>
            </pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-request-password-reset" onclick="copyToClipboard('#response-request-password-reset')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section> <!-- POST /users/reset-password/{token} -->
                <section id="users-reset-password"> <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-secondary-emphasis bg-secondary-subtle border border-secondary-subtle rounded-2">POST /users/reset-password/{token}</small>
                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Reset Password</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Resets a user's password using a reset token received via email.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/users/reset-password/{token}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>token</strong>: The reset token sent to the user’s email.</li>
                                <li><strong>new_password</strong>: The new password for the user.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-reset-password" class="language-json">{
                "status": 200,
                "message": "Password reset successfully. A confirmation email has been sent."
            }</code>
            </pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-reset-password" onclick="copyToClipboard('#response-reset-password')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section> <!-- GET /users/tutors/{id} -->
                <section id="users-tutors"> <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-success-emphasis bg-success-subtle border border-success-subtle rounded-2">GET /users/tutors/{id}</small>
                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Get Tutors</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches details of tutors associated with the user. If no ID is provided, fetches a list of all tutors.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/users/tutors/{id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>id</strong>: (Optional) The ID of the tutor to fetch. If not provided, returns all tutors.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-tutors" class="language-json">{
                "status": 200,
                "data": [
                    {
                        "user_id": 1,
                        "email": "tutor@example.com",
                        "first_name": "Jane",
                        "last_name": "Smith",
                        "role_id": 2
                    }
                ]
            }</code>
            </pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-tutors" onclick="copyToClipboard('#response-get-tutors')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>


                </section>
            </section>
            <!-- </section> -->






            <section id="auth-api" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Authentication API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Authentication API offers endpoints for user login and logout. Below are the available operations:
                    <ul>
                        <li><strong>POST /auth/login</strong>: Authenticate a user and start a session.</li>
                        <li><strong>POST /auth/logout</strong>: End the user session and log out.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- POST /auth/login -->
                <section id="auth-login">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /auth/login</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">User Login</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Authenticates a user by email and password. If successful, starts a session and stores login details.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/auth/login</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-login" class="language-json">{
    "email": "user@example.com",
    "password": "password123"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-login" onclick="copyToClipboard('#request-body-login')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-login-success" class="language-json">{
    "status": 200,
    "message": "Login successful",
    "data": {
        "user_id": "1",
        "email": "user@example.com"
    }
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-login-success" onclick="copyToClipboard('#response-login-success')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <div class="position-relative mt-3">
                                <pre class="response-example bg-light-subtle"><code id="response-login-error" class="language-json">{
    "status": 400,
    "message": "Email and password are required"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-login-error" onclick="copyToClipboard('#response-login-error')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <div class="position-relative mt-3">
                                <pre class="response-example bg-light-subtle"><code id="response-login-invalid-password" class="language-json">{
    "status": 401,
    "message": "Invalid password"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-login-invalid-password" onclick="copyToClipboard('#response-login-invalid-password')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /auth/logout -->
                <section id="auth-logout">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /auth/logout</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">User Logout</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Ends the current user session and logs out the user.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/auth/logout</code></p>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-logout-success" class="language-json">{
    "status": 200,
    "message": "Logged out successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-logout-success" onclick="copyToClipboard('#response-logout-success')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>


            <section id="students">
                <h1 class="bd-title fw-bold mb-0">Students API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Students API provides endpoints to manage student data. Below are the available operations:
                    <ul>
                        <li><strong>GET /students</strong>: Retrieve a list of all students.</li>
                        <li><strong>GET /students/{student_id}</strong>: Retrieve details of a specific student by ID.</li>
                        <li><strong>POST /students/create</strong>: Create a new student record.</li>
                        <li><strong>POST /students/update/{student_id}</strong>: Update details of an existing student by ID.</li>
                        <li><strong>DELETE /students/delete/{student_id}</strong>: Remove a student record by ID.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /students -->
                <section id="students-get-all">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /students</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve All Students</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all student records.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/students</code></p>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-all-students" class="language-json">{
                        "status": 200,
                        "message": "List of students retrieved successfully.",
                        "data": [
                            {
                                "student_id": "1",
                                "user_id": "3",
                                "date_of_birth": "2024-08-05",
                                "bio": "I am New Student",
                                "student_mobile_number": "8546231079",
                                "student_parent_mobile": "5231064987",
                                "student_parent_email": "testing@gmail.com",
                                "address": "Hyderabad",
                                "enrollment_date": "2024-08-20 14:18:51",           
                                "email": "mary.jane@example.com",
                                "first_name": "Mary",
                                "last_name": "Jane"
                            }
                        ]
                    }</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-all-students" onclick="copyToClipboard('#response-get-all-students')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /students/{id} -->
                <section id="students-get-by-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /students/{student_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Single Student</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a single student record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/students/{student_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>student_id</strong>: The ID of the student to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-id-student" class="language-json">{
                        "status": 200,
                        "message": "Student retrieved successfully.",
                        "data": {
                            "student_id": "1",
                            "user_id": "3",
                            "date_of_birth": "2024-08-05",
                            "bio": "I am New Student",
                            "student_mobile_number": "8546231079",
                            "student_parent_mobile": "5231064987",
                            "student_parent_email": "testing@gmail.com",
                            "address": "Hyderabad",
                            "enrollment_date": "2024-08-20 14:18:51",
                            "email": "mary.jane@example.com",
                            "first_name": "Mary",
                            "last_name": "Jane"
                        }
                    }</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-id-student" onclick="copyToClipboard('#response-get-by-id-student')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /students/create -->
                <section id="students-create">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /students/create</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Create New Student</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Inserts a new student record.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/students/create</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-create-student" class="language-json">{
                        "user_id": "4",
                        "date_of_birth": "2000-01-01",
                        "bio": "A new student.",
                        "student_mobile_number": "1234567890",
                        "student_parent_mobile": "0987654321",
                        "student_parent_email": "parent@example.com",
                        "address": "New City",
                        "enrollment_date": "2024-08-21 09:00:00"
                    }</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-create-student" onclick="copyToClipboard('#request-body-create-student')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-create-student" class="language-json">{
                        "status": 201,
                        "message": "Student record created successfully.",
                        "data": {
                            "student_id": "2"
                        }
                    }</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-create-student" onclick="copyToClipboard('#response-create-student')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /students/update/{id} -->
                <section id="students-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /students/update/{student_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update Student</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates an existing student record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/students/update/{student_id}</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-body-update-student" class="language-json">{
                        "user_id": "4",
                        "date_of_birth": "2000-01-01",
                        "bio": "Updated bio.",
                        "student_mobile_number": "1234567890",
                        "student_parent_mobile": "0987654321",
                        "student_parent_email": "parent@example.com",
                        "address": "Updated Address",
                        "enrollment_date": "2024-08-21 09:00:00"
                    }</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-body-update-student" onclick="copyToClipboard('#request-body-update-student')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-update-student" class="language-json">{
                        "status": 200,
                        "message": "Student record updated successfully.",
                        "data": {
                            "student_id": "1",
                            "user_id": "4",
                            "date_of_birth": "2000-01-01",
                            "bio": "Updated bio.",
                            "student_mobile_number": "1234567890",
                            "student_parent_mobile": "0987654321",
                            "student_parent_email": "parent@example.com",
                            "address": "Updated Address",
                            "enrollment_date": "2024-08-21 09:00:00"
                        }
                    }</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-update-student" onclick="copyToClipboard('#response-update-student')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- DELETE /students/delete/{id} -->
                <section id="students-delete">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /students/delete/{student_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Delete Student</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Deletes a student record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/students/delete/{student_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>student_id</strong>: The ID of the student to delete.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-delete-student" class="language-json">{
                        "status": 200,
                        "message": "Student record deleted successfully."
                    }</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-delete-student" onclick="copyToClipboard('#response-delete-student')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>


            <!-- Tutor Endpoints -->

            <section id="tutors">
                <h1 class="bd-title fw-bold mb-0">Tutors API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Tutors API provides endpoints to manage tutor data. Below are the available operations:
                    <ul>
                        <li><strong>GET /tutor</strong>: Retrieve a list of all tutors.</li>
                        <li><strong>GET /tutor/{tutor_id}</strong>: Retrieve details of a specific tutor by ID.</li>
                        <li><strong>GET /course-tutor/{tutor_id}</strong>: Retrieve a specific tutor along with their course creator details.</li>
                    </ul>
                    For more details, refer to the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /tutor -->
                <section id="tutors-get-all">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /tutor</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve All Tutors</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all tutor records.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/tutor</code></p>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-all-tutors" class="language-json">{
                        "status": 200,
                        "message": "List of tutors retrieved successfully.",
                        "data": [
                            {
                                "user_id": "13",
                                "email": "ahmedamiral134iy@gmail.com",
                                "first_name": "Amir Ali",
                                "last_name": "Ahmed",
                                ...
                            }
                        ]
                    }</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-all-tutors" onclick="copyToClipboard('#response-get-all-tutors')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /tutor/{id} -->
                <section id="tutors-get-by-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /tutor/{tutor_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Single Tutor</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a single tutor record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/tutor/{tutor_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>tutor_id</strong>: The ID of the tutor to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-by-id-tutor" class="language-json">{
                        "status": 200,
                        "message": "Tutor retrieved successfully.",
                        "data": {
                            "user_id": null,
                            "email": "john.doe@example.com",
                            "first_name": "John",
                            "last_name": "Doe",
                            ...
                        }
                    }</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-by-id-tutor" onclick="copyToClipboard('#response-get-by-id-tutor')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /course-tutor/{id} -->
                <section id="tutors-get-course-creator">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /course-tutor/{tutor_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Tutor with Course Creator</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a tutor along with their course creator details by tutor ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/course-tutor/{tutor_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>tutor_id</strong>: The ID of the tutor to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-get-course-creator" class="language-json">{
                        "status": 200,
                        "message": "Tutor retrieved successfully.",
                        "data": {
                            "first_name": "John",
                            "last_name": "Doe",
                            "profile_picture": "john_profile.jpg",
                            ...
                        }
                    }</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-get-course-creator" onclick="copyToClipboard('#response-get-course-creator')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
            <!-- Enrollments Endpoints -->
            <section id="enrollments" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Enrollments API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Enrollments API allows you to manage enrollment data with the following operations:
                    <ul>
                        <li><strong>GET /enrollments</strong>: Retrieve a list of all enrollments.</li>
                        <li><strong>GET /enrollments/{id}</strong>: Retrieve details of a specific enrollment by ID.</li>
                        <li><strong>GET /enrollments/student/{student_id}</strong>: Retrieve enrollments for a specific student.</li>
                        <li><strong>GET /enrollments/instructor/{instructor_id}</strong>: Retrieve enrollments for a specific instructor.</li>
                        <li><strong>GET /enrollments/course/{course_id}</strong>: Retrieve enrollments for a specific course.</li>
                        <li><strong>POST /enrollment/enroll</strong>: Create a new enrollment.</li>
                        <!-- <li><strong>PUT /enrollments/{id}</strong>: Update details of an existing enrollment by ID.</li> -->
                        <!-- <li><strong>DELETE /enrollments/{id}</strong>: Remove an enrollment by ID.</li> -->
                    </ul>
                    For further details, consult the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /enrollments -->
                <section id="enrollments-get-all">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /enrollments</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve All Enrollments</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all records from the `enrollments` table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/enrollments</code></p>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-enrollments-get-all" class="language-json">[
    {
        "id": 1,
        "user_id": 1,
        "course_id": 1
    }
]</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-enrollments-get-all" onclick="copyToClipboard('#response-enrollments-get-all')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /enrollments/{id} -->
                <section id="enrollments-get-by-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /enrollments/{id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Single Enrollment</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches a single enrollment record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/enrollments/{id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>id</strong>: The ID of the enrollment to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-enrollments-get-by-id" class="language-json">{
    "id": 1,
    "user_id": 1,
    "course_id": 1
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-enrollments-get-by-id" onclick="copyToClipboard('#response-enrollments-get-by-id')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /enrollments/student/{student_id} -->
                <section id="enrollments-get-by-student-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /enrollments/student/{student_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Enrollments by Student ID</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all enrollment records for a specific student by their ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/enrollments/student/{student_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>student_id</strong>: The ID of the student to retrieve enrollments for.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-enrollments-get-by-student-id" class="language-json">[
    {
        "id": 1,
        "user_id": 1,
        "course_id": 1
    }
]</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-enrollments-get-by-student-id" onclick="copyToClipboard('#response-enrollments-get-by-student-id')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /enrollments/instructor/{instructor_id} -->
                <section id="enrollments-get-by-instructor-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /enrollments/instructor/{instructor_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Enrollments by Instructor ID</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all enrollment records for a specific instructor by their ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/enrollments/instructor/{instructor_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>instructor_id</strong>: The ID of the instructor to retrieve enrollments for.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-enrollments-get-by-instructor-id" class="language-json">[
    {
        "id": 1,
        "user_id": 1,
        "course_id": 1
    }
]</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-enrollments-get-by-instructor-id" onclick="copyToClipboard('#response-enrollments-get-by-instructor-id')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /enrollments/course/{course_id} -->
                <section id="enrollments-get-by-course-id">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /enrollments/course/{course_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Enrollments by Course ID</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all enrollment records for a specific course by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/enrollments/course/{course_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>course_id</strong>: The ID of the course to retrieve enrollments for.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-enrollments-get-by-course-id" class="language-json">[
    {
        "id": 1,
        "user_id": 1,
        "course_id": 1
    }
]</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-enrollments-get-by-course-id" onclick="copyToClipboard('#response-enrollments-get-by-course-id')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /enrollments -->
                <section id="enrollments-create">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /enrollments</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Create New Enrollment</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Inserts a new record into the `enrollments` table.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/enrollment/enroll</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-enrollments-create" class="language-json">{
    "user_id": 1,
    "course_id": 1,
    "payment_id": 2
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-enrollments-create" onclick="copyToClipboard('#request-enrollments-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-enrollments-create" class="language-json">{
    "user_id": 1,
    "course_id": 1,
   
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-enrollments-create" onclick="copyToClipboard('#response-enrollments-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- PUT /enrollments/{id} -->
                <!-- <section id="enrollments-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">PUT /enrollments/{id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update Existing Enrollment</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates an enrollment record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/enrollments/{id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>id</strong>: The ID of the enrollment to update.</li>
                            </ul>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-enrollments-update" class="language-json">{
    "user_id": 2,
    "course_id": 2
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-enrollments-update" onclick="copyToClipboard('#request-enrollments-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-enrollments-update" class="language-json">{
    "user_id": 2,
    "course_id": 2
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-enrollments-update" onclick="copyToClipboard('#response-enrollments-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section> -->

                <!-- DELETE /enrollments/{id} -->
                <!-- <section id="enrollments-delete">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /enrollments/{id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Delete Enrollment</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Deletes an enrollment record by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/enrollments/{id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>id</strong>: The ID of the enrollment to delete.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-enrollments-delete" class="language-json">{
    "id": 1
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-enrollments-delete" onclick="copyToClipboard('#response-enrollments-delete')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section> -->

            <!-- Payment Endpoints -->
            <section id="payment" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Payment API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Payment API allows you to manage payment data with the following operations:
                    <ul>
                        <li><strong>POST /payment</strong>: Initiate a payment.</li>
                        <li><strong>GET /payment/{id}</strong>: Get the status of a specific payment.</li>
                        <li><strong>POST /payment/refund</strong>: Request a refund for a payment.</li>
                    </ul>
                    For further details, consult the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- POST /payment -->
                <section id="payment-initiate">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /payment</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Initiate Payment</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Initiates a payment transaction.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/payment</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-payment-initiate" class="language-json">{
    "amount": 100,
    "currency": "USD",
    "description": "Payment for course"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-payment-initiate" onclick="copyToClipboard('#request-payment-initiate')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-payment-initiate" class="language-json">{
    "payment_id": "abc123",
    "status": "pending"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-payment-initiate" onclick="copyToClipboard('#response-payment-initiate')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- GET /payment/{id} -->
                <section id="payment-status">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /payment/{id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Get Payment Status</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches the status of a payment by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/payment/{id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>id</strong>: The ID of the payment to retrieve.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-payment-status" class="language-json">{
    "payment_id": "abc123",
    "status": "completed"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-payment-status" onclick="copyToClipboard('#response-payment-status')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /payment/refund -->
                <section id="payment-refund">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /payment/refund</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Request Refund</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Requests a refund for a specified payment.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/payment/refund</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-payment-refund" class="language-json">{
    "payment_id": "abc123",
    "amount": 100
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-payment-refund" onclick="copyToClipboard('#request-payment-refund')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-payment-refund" class="language-json">{
    "status": "refunded",
    "amount": 100
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-payment-refund" onclick="copyToClipboard('#response-payment-refund')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>

            <!-- Cart Endpoints -->
            <section id="cart" class="mt-md-5 heading">
                <h1 class="bd-title fw-bold mb-0">Cart API</h1>

                <div class="bd-callout bd-callout-info">
                    <strong>Heads up!</strong> The Cart API allows you to manage cart data with the following operations:
                    <ul>
                        <li><strong>GET /cart/view/{user_id}</strong>: Retrieve the current user's cart.</li>
                        <li><strong>POST /cart/add</strong>: Add an item to the cart.</li>
                        <!-- <li><strong>PUT /cart/{id}</strong>: Update an item in the cart.</li> -->
                        <li><strong>DELETE /cart/remove/{user_id}/{corse_id}</strong>: Remove an item from the cart.</li>
                    </ul>
                    For further details, consult the <a href="#api-docs">API documentation</a>.
                </div>

                <!-- GET /cart -->
                <section id="cart-view">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">GET /cart</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Retrieve Cart</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Fetches all items in the current user's cart.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/cart/view/{user_id}</code></p>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-cart-view" class="language-json">[
    {
        "cart_id": "1",
        "course_id": "2",
        "course_title": "Advanced Web Development",
        "currency": "INR",
        "date_added": "2024-10-07 11:10:16",
        "display_price": "1899.00"
    }
]</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-cart-view" onclick="copyToClipboard('#response-cart-view')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- POST /cart -->
                <section id="cart-add">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">POST /cart</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Add Item to Cart</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Adds a new item to the current user's cart.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/cart/add</code></p>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-cart-add" class="language-json">{
    "course_id": 1,
    "user_id": 2
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-cart-add" onclick="copyToClipboard('#request-cart-add')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-cart-add" class="language-json">{
"status": 201,
"message": "Item added to cart successfully."
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-cart-add" onclick="copyToClipboard('#response-cart-add')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- PUT /cart/{id} -->
                <!-- <section id="cart-update">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">PUT /cart/{id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Update Cart Item</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Updates the quantity of a specific item in the cart.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/cart/{id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>id</strong>: The ID of the cart item to update.</li>
                            </ul>
                            <h6>Request Body:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="request-cart-update" class="language-json">{
    "quantity": 3
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-cart-update" onclick="copyToClipboard('#request-cart-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-cart-update" class="language-json">{
    "id": 1,
    "course_id": 1,
    "quantity": 3
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-cart-update" onclick="copyToClipboard('#response-cart-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section> -->

                <!-- DELETE /cart/{id} -->
                <section id="cart-delete">
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">DELETE /cart/{cart_id}</small>

                    <div class="card mb-3 border border-0 shadow-sm">
                        <div class="card-header bg-white border border-0">Remove Item from Cart</div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Removes an item from the cart by its ID.</p>
                            <h6>Route:</h6>
                            <p><code><?= base_url(); ?>api/cart/remove/{user_id}/{course_id}</code></p>
                            <h6>Parameters:</h6>
                            <ul>
                                <li><strong>cart_id</strong>: The ID of the cart item to remove.</li>
                            </ul>
                            <h6>Response:</h6>
                            <div class="position-relative">
                                <pre class="response-example bg-light-subtle"><code id="response-cart-delete" class="language-json">{
    "status": "200",
    "message": "Item deleted successfully"
}</code></pre>
                                <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-cart-delete" onclick="copyToClipboard('#response-cart-delete')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>

            <!-- Wishlist Endpoints -->
<section id="wishlist" class="mt-md-5 heading">
    <h1 class="bd-title fw-bold mb-0">Wishlist API</h1>

    <div class="bd-callout bd-callout-info">
        <strong>Heads up!</strong> The Wishlist API allows you to manage wishlist data with the following operations:
        <ul>
            <li><strong>GET /wishlist/view/{user_id}</strong>: Retrieve the current user's wishlist.</li>
            <li><strong>POST /wishlist/add</strong>: Add an item to the wishlist.</li>
            <li><strong>PUT /wishlist/{id}</strong>: Update an item in the wishlist.</li>
            <li><strong>DELETE /wishlist/{id}</strong>: Remove an item from the wishlist.</li>
        </ul>
        For further details, consult the <a href="#api-docs">API documentation</a>.
    </div>

    <!-- GET /wishlist -->
    <section id="wishlist-view">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">GET /wishlist</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Retrieve Wishlist</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Fetches all items in the current user's wishlist.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/wishlist/view/{user_id}</code></p>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-wishlist-view" class="language-json">[
    {
        "wishlist_id": "1",
        "course_id": "5",
        "course_title": "Beginner Python Programming",
        "currency": "USD",
        "date_added": "2024-10-07 11:20:12",
        "display_price": "49.99"
    }
]</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-wishlist-view" onclick="copyToClipboard('#response-wishlist-view')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>

    <!-- POST /wishlist -->
    <section id="wishlist-add">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">POST /wishlist</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Add Item to Wishlist</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Adds a new item to the current user's wishlist.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/wishlist/add</code></p>
                <h6>Request Body:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="request-wishlist-add" class="language-json">{
    "course_id": 5,
    "user_id": 2
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-wishlist-add" onclick="copyToClipboard('#request-wishlist-add')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-wishlist-add" class="language-json">{
"status": 201,
"message": "Item added to wishlist successfully."
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-wishlist-add" onclick="copyToClipboard('#response-wishlist-add')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>

    <!-- PUT /wishlist/{id} -->
    <section id="wishlist-update">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">PUT /wishlist/{id}</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Update Wishlist Item</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Updates the details of a specific item in the wishlist.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/wishlist/{id}</code></p>
                <h6>Parameters:</h6>
                <ul>
                    <li><strong>id</strong>: The ID of the wishlist item to update.</li>
                </ul>
                <h6>Request Body:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="request-wishlist-update" class="language-json">{
    "course_id": 5
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-wishlist-update" onclick="copyToClipboard('#request-wishlist-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-wishlist-update" class="language-json">{
    "id": 1,
    "course_id": 5,
    "updated": true
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-wishlist-update" onclick="copyToClipboard('#response-wishlist-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>

    <!-- DELETE /wishlist/{id} -->
    <section id="wishlist-delete">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">DELETE /wishlist/{wishlist_id}</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Remove Item from Wishlist</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Removes an item from the wishlist by its ID.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/wishlist/{wishlist_id}</code></p>
                <h6>Parameters:</h6>
                <ul>
                    <li><strong>wishlist_id</strong>: The ID of the wishlist item to remove.</li>
                </ul>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-wishlist-delete" class="language-json">{
    "status": "200",
    "message": "Wishlist item deleted successfully"
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-wishlist-delete" onclick="copyToClipboard('#response-wishlist-delete')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>
</section>



<!-- Notifications Endpoints -->
<section id="notifications" class="mt-md-5 heading">
    <h1 class="bd-title fw-bold mb-0">Notifications API</h1>

    <div class="bd-callout bd-callout-info">
        <strong>Heads up!</strong> The Notifications API allows you to manage notification data with the following operations:
        <ul>
            <li><strong>GET /notifications</strong>: Retrieve all notifications.</li>
            <li><strong>GET /notifications/{id}</strong>: Retrieve a specific notification by ID.</li>
            <li><strong>POST /notifications/create</strong>: Create a new notification.</li>
            <li><strong>POST /notifications/update/{id}</strong>: Update an existing notification.</li>
            <li><strong>DELETE /notifications/delete/{id}</strong>: Delete a notification.</li>
        </ul>
        For further details, consult the <a href="#api-docs">API documentation</a>.
    </div>

    <!-- GET /notifications -->
    <section id="notifications-get-all">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">GET /notifications</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Retrieve Notifications</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Fetches all notifications for the current user.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/notifications</code></p>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-notifications-view" class="language-json">[
    {
        "id": "1",
        "sender_id": "2",
        "receiver_id": "3",
        "role_id": "1",
        "message": "Your assignment has been graded.",
        "is_read": false,
        "created_at": "2024-10-14 10:00:00"
    }
]</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-notifications-view" onclick="copyToClipboard('#response-notifications-view')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>

    <!-- GET /notifications/{id} -->
    <section id="notifications-get-byId">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">GET /notifications/{id}</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Retrieve Notification by ID</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Fetches a specific notification by its ID.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/notifications/{id}</code></p>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-notifications-view-id" class="language-json">{
    "id": "1",
    "sender_id": "2",
    "receiver_id": "3",
    "role_id": "1",
    "message": "Your assignment has been graded.",
    "is_read": false,
    "created_at": "2024-10-14 10:00:00"
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-notifications-view-id" onclick="copyToClipboard('#response-notifications-view-id')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>

    <!-- POST /notifications/create -->
    <section id="notifications-create">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">POST /notifications/create</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Create Notification</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Creates a new notification for the user.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/notifications/create</code></p>
                <h6>Request Body:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="request-notifications-create" class="language-json">{
    "sender_id": 2,
    "receiver_id": 3,
    "role_id": 1,
    "message": "New course available.",
    "is_read": false
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-notifications-create" onclick="copyToClipboard('#request-notifications-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-notifications-create" class="language-json">{
    "status": 201,
    "message": "Notification created successfully."
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-notifications-create" onclick="copyToClipboard('#response-notifications-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>

    <!-- POST /notifications/update/{id} -->
    <section id="notifications-update">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">POST /notifications/update/{id}</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Update Notification</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Updates the details of a specific notification.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/notifications/update/{id}</code></p>
                <h6>Parameters:</h6>
                <ul>
                    <li><strong>id</strong>: The ID of the notification to update.</li>
                </ul>
                <h6>Request Body:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="request-notifications-update" class="language-json">{
    "message": "Updated course notification.",
    "is_read": true
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-notifications-update" onclick="copyToClipboard('#request-notifications-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-notifications-update" class="language-json">{
    "status": 200,
    "message": "Notification updated successfully."
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-notifications-update" onclick="copyToClipboard('#response-notifications-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>

    <!-- DELETE /notifications/delete/{id} -->
    <section id="notifications-delete">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">DELETE /notifications/delete/{id}</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Delete Notification</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Deletes a notification by its ID.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/notifications/delete/{id}</code></p>
                <h6>Parameters:</h6>
                <ul>
                    <li><strong>id</strong>: The ID of the notification to delete.</li>
                </ul>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-notifications-delete" class="language-json">{
    "status": 200,
    "message": "Notification deleted successfully."
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-notifications-delete" onclick="copyToClipboard('#response-notifications-delete')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Institutions Endpoints -->
<section id="institutions" class="mt-md-5 heading">
    <h1 class="bd-title fw-bold mb-0">Institutions API</h1>

    <div class="bd-callout bd-callout-info">
        <strong>Heads up!</strong> The Institutions API allows you to manage institution data with the following operations:
        <ul>
            <li><strong>GET /institutions</strong>: Retrieve all institutions.</li>
            <li><strong>GET /institutions/{id}</strong>: Retrieve a specific institution by ID.</li>
            <li><strong>POST /institutions/create</strong>: Create a new institution.</li>
            <li><strong>POST /institutions/update/{id}</strong>: Update an existing institution.</li>
            <li><strong>DELETE /institutions/delete/{id}</strong>: Delete an institution.</li>
        </ul>
        For further details, consult the <a href="#api-docs">API documentation</a>.
    </div>

    <!-- GET /institutions -->
    <section id="institutions-get-all">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-info-emphasis bg-info-subtle border border-info-subtle rounded-2">GET /institutions</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Retrieve Institutions</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Fetches all institutions with their details.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/institutions</code></p>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-institutions-view" class="language-json">[
    {
        "id": "1",
        "name": "ABC University",
        "address": "123 Main St, City, Country",
        "contact_number": "+1234567890",
        "email": "contact@abcuniversity.com",
        "registration_number": "REG12345",
        "tin_number": "TIN987654",
        "supporting_document": "document.pdf",
        "profile_image": "profile.jpg",
        "course_count": 10,
        "student_count": 500,
        "faculty_count": 50,
        "feedback_score": 4.8,
        "created_at": "2024-10-15 09:00:00",
        "updated_at": "2024-10-15 09:30:00"
    }
]</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-institutions-view" onclick="copyToClipboard('#response-institutions-view')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>

    <!-- GET /institutions/{id} -->
    <section id="institutions-get-by-id">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-info-emphasis bg-info-subtle border border-info-subtle rounded-2">GET /institutions/{id}</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Retrieve Institution by ID</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Fetches a specific institution by its ID.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/institutions/{id}</code></p>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-institutions-view-id" class="language-json">{
    "id": "1",
    "name": "ABC University",
    "address": "123 Main St, City, Country",
    "contact_number": "+1234567890",
    "email": "contact@abcuniversity.com",
    "registration_number": "REG12345",
    "tin_number": "TIN987654",
    "supporting_document": "document.pdf",
    "profile_image": "profile.jpg",
    "course_count": 10,
    "student_count": 500,
    "faculty_count": 50,
    "feedback_score": 4.8,
    "created_at": "2024-10-15 09:00:00",
    "updated_at": "2024-10-15 09:30:00"
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-institutions-view-id" onclick="copyToClipboard('#response-institutions-view-id')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>

    <!-- POST /institutions/create -->
    <section id="institutions-create">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-info-emphasis bg-info-subtle border border-info-subtle rounded-2">POST /institutions/create</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Create Institution</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Creates a new institution with the provided details.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/institutions/create</code></p>
                <h6>Request Body:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="request-institutions-create" class="language-json">{
    "name": "ABC University",
    "address": "123 Main St, City, Country",
    "contact_number": "+1234567890",
    "email": "contact@abcuniversity.com",
    "registration_number": "REG12345",
    "tin_number": "TIN987654",
    "supporting_document": "document.pdf",
    "profile_image": "profile.jpg"
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-institutions-create" onclick="copyToClipboard('#request-institutions-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-institutions-create" class="language-json">{
    "status": 201,
    "message": "Institution created successfully."
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-institutions-create" onclick="copyToClipboard('#response-institutions-create')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>

    <!-- POST /institutions/update/{id} -->
    <section id="institutions-update">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-info-emphasis bg-info-subtle border border-info-subtle rounded-2">POST /institutions/update/{id}</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Update Institution</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Updates the details of a specific institution.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/institutions/update/{id}</code></p>
                <h6>Parameters:</h6>
                <ul>
                    <li><strong>id</strong>: The ID of the institution to update.</li>
                </ul>
                <h6>Request Body:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="request-institutions-update" class="language-json">{
    "name": "Updated University Name",
    "address": "Updated Address",
    "contact_number": "+9876543210",
    "email": "updated@university.com"
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#request-institutions-update" onclick="copyToClipboard('#request-institutions-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-institutions-update" class="language-json">{
    "status": 200,
    "message": "Institution updated successfully."
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-institutions-update" onclick="copyToClipboard('#response-institutions-update')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>

    <!-- DELETE /institutions/delete/{id} -->
    <section id="institutions-delete">
        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-info-emphasis bg-info-subtle border border-info-subtle rounded-2">DELETE /institutions/delete/{id}</small>

        <div class="card mb-3 border border-0 shadow-sm">
            <div class="card-header bg-white border border-0">Delete Institution</div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">Deletes a specific institution by its ID.</p>
                <h6>Route:</h6>
                <p><code><?= base_url(); ?>api/institutions/delete/{id}</code></p>
                <h6>Response:</h6>
                <div class="position-relative">
                    <pre class="response-example bg-light-subtle"><code id="response-institutions-delete" class="language-json">{
    "status": 200,
    "message": "Institution deleted successfully."
}</code></pre>
                    <button class="btn btn-outline-secondary copy-btn" data-clipboard-target="#response-institutions-delete" onclick="copyToClipboard('#response-institutions-delete')"><i class="fa-solid fa-copy fa-xl"></i> Copy</button>
                </div>
            </div>
        </div>
    </section>
</section>

            <!-- Add more API sections as needed -->


        </div>
    </div>
    <!-- Footer -->
    <footer class="footer mt-auto">
        <div class="container text-center">
            <p class="mb-0">© <span id="current-year"></span> <b>KI Academy</b></p>
        </div>
    </footer>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>

    </script>
    <script src="<?php echo base_url('public/js/documentation.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/sidebar.js'); ?>"></script>

</body>

</html>