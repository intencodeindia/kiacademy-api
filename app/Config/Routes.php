<?php

use CodeIgniter\Router\RouteCollection;

// --------------------------------
// Public Routes
// --------------------------------
$routes->get('/', 'Home::index');
$routes->get('/docs', 'Home::documentation');
$routes->get('/terms-and-conditions', 'Home::termsAndConditions');
$routes->get('/privacy-policy', 'Home::privacyPolicy');

// Error handling routes
$routes->set404Override(function () {
    return view('errors/html/error_404');
});
$routes->get('/error/500', function () {
    return view('errors/html/error_500');
});
$routes->get('/error/exception', function () {
    $exception = new \Exception("Simulated Exception");
    return view('errors/html/exception', ['exception' => $exception]);
});

// Testing routes (ensure these are for development only)
$routes->get('/test', 'Home::test');
$routes->get('/testa', 'Home::testa');
$routes->get('/texa', 'Home::texa');

// --------------------------------
// API Routes
// --------------------------------
$routes->group('api', ['filter' => ['cors', 'auth']], function ($routes) {
    // Authentication routes
    $routes->group('auth', function ($routes) {
        $routes->post('login', 'Auth::login');
        $routes->get('logout', 'Auth::logout');
        $routes->get('login/google', 'GoogleLoginController::login');
        $routes->get('callback/google', 'GoogleLoginController::callback');
        $routes->get('login/facebook', 'FacebookLoginController::login');
        $routes->get('callback/facebook', 'FacebookLoginController::callback');
    });

    // Payment routes
    $routes->group('payment', function ($routes) {
        $routes->post('coupon/apply', 'CouponController::apply');
        $routes->post('checkout', 'PaymentController::checkout');
        $routes->get('success', 'PaymentController::success');
        $routes->get('cancel', 'PaymentController::cancel');
        $routes->get('history/(:num)', 'PaymentController::getPaymentHistory/$1');
        $routes->get('courses/(:num)', 'PaymentController::getCourseByPaymentId/$1');
        $routes->post('process', 'PaymentController::processPayment');
        $routes->get('get-currency', 'PaymentController::getCurrency');
        $routes->get('get-priceMatrix/(:segment)', 'PaymentController::priceMatrix/$1');
    });


    // Payment Routes
    
    $routes->get('payments', 'PaymentController::getAllPaymentHistory');
    
   

    // Course-related routes
    $routes->group('courses', function ($routes) {
        $routes->get('/', 'CourseController::index');
        $routes->get('latest', 'CourseController::index');
        $routes->get('popular', 'CourseController::index');
        $routes->get('search-course/(:segment)', 'CourseController::searchCourses/$1');
        $routes->get('recomended/(:num)', 'CourseController::recomended/$1');
        $routes->get('(:num)', 'CourseController::index/$1');
        $routes->post('create', 'CourseController::create');
        $routes->post('update/(:num)', 'CourseController::update/$1');
        $routes->delete('delete/(:num)', 'CourseController::delete/$1');
        $routes->get('by-instructor/(:num)', 'CourseController::getCoursesByInstructor/$1');
        $routes->get('tutor/requested', 'CourseController::getCoursesForReview');


        // Additional course information
        $routes->group('(:num)/additional', function ($routes) {
            $routes->get('/', 'CourseAdditionalController::index/$1');
            $routes->post('create', 'CourseAdditionalController::create/$1');
            $routes->post('update/(:num)', 'CourseAdditionalController::update/$1/$2');
            $routes->delete('delete/(:num)', 'CourseAdditionalController::delete/$1/$2');
        });
        $routes->group('course-reviews', function ($routes) {
            $routes->get('(:num)', 'CourseReviewController::getAllReviews/$1');
            $routes->post('create', 'CourseReviewController::create');
            $routes->post('update/(:num)', 'CourseReviewController::update/$1');
            $routes->delete('delete/(:num)', 'CourseReviewController::delete/$1');
        });
    });
//  Institution Routes
    $routes->group('institutions', function($routes) {
        $routes->get('/', 'InstituteController::index');         // Get all institutes
        $routes->get('(:num)', 'InstituteController::index/$1'); // Get institute by ID
        $routes->get('getInstitutesByUser/(:num)', 'InstituteController::getInstituteByUser/$1'); // Get institute by ID
        $routes->post('create', 'InstituteController::create');        // Create institute
        $routes->put('update/(:num)', 'InstituteController::update/$1');// Update institute
        $routes->delete('delete/(:num)', 'InstituteController::delete/$1'); // Delete institute
    });
//   Quiz Result Routes
    $routes->group('quiz-results', function($routes) {
        $routes->get('/', 'QuizResultController::index');                // To retrieve all quiz results
        $routes->get('(:num)/(:num)', 'QuizResultController::index/$1/$2');        // To retrieve quiz results by quiz_result_id
        $routes->post('create', 'QuizResultController::create');              // To create a new quiz result
        $routes->post('update/(:num)', 'QuizResultController::update/$1');       // To update a quiz result by quiz_result_id
    });
    
    
    // Users routes
    $routes->group('users', function ($routes) {
        $routes->get('/', 'UserController::index');
        $routes->get('(:num)', 'UserController::index/$1');
        $routes->post('create', 'UserController::create');
        $routes->delete('delete/(:num)', 'UserController::delete/$1');
        $routes->post('changePassword', 'UserController::changePassword');
        $routes->post('update/(:num)', 'UserController::updateProfile/$1');
        $routes->post('updateKyc/(:num)', 'UserController::updateKyc/$1');
        $routes->post('request-password-reset', 'UserController::requestPasswordReset');
        $routes->post('reset-password/(:num)', 'UserController::resetPassword/$1');
        $routes->post('update-status/(:num)', 'UserController::updateStatus/$1');
    });

    $routes->group('students', function ($routes) {
        $routes->get('/', 'StudentController::index');
        $routes->get('(:num)', 'StudentController::index/$1');
        $routes->post('create', 'StudentController::create');
        $routes->post('update/(:num)', 'StudentController::update/$1');
        $routes->delete('delete/(:num)', 'StudentController::delete/$1');
    });


    $routes->group('quizzes', function($routes) {
        $routes->get('/', 'CourseQuizController::index'); // Get all quizzes
        $routes->get('(:num)', 'CourseQuizController::quiz/$1'); // Get specific quiz by ID
        $routes->post('create', 'CourseQuizController::create'); // Create a new quiz
        $routes->post('update/(:num)', 'CourseQuizController::update/$1'); // Update quiz by ID
        $routes->delete('delete/(:num)', 'CourseQuizController::delete/$1'); // Delete quiz by ID
    });
    
    $routes->group('questions', function($routes) {
        $routes->get('(:num)', 'QuestionAnswerController::index/$1'); // View questions by quiz ID
        $routes->post('create', 'QuestionAnswerController::create'); // Create a question with answers
        $routes->post('update/(:num)', 'QuestionAnswerController::update/$1'); // Update a question by ID
        $routes->delete('delete/(:num)', 'QuestionAnswerController::delete/$1'); // Delete a question by ID
    });
    
    $routes->group('contact_us', function($routes) {
        $routes->get('/', 'ContactUs::index');        // Access with /contact_us
        $routes->post('create', 'ContactUs::create');  // Access with /contact_us/create
        // $routes->post('store', 'ContactUs::store');   // Access with /contact_us/store
    });
    

    // Tutors routes
    $routes->get('tutor', 'UserController::getAllTutorsWithUsers');
    $routes->get('tutor/(:segment)', 'UserController::getAllTutorsWithUsers/$1');
    $routes->get('course-tutor/(:segment)', 'UserController::getTutorWithCourseCreator/$1');
    $routes->get('dashboard', 'Dashboard::index');

    // Course categories routes
    $routes->group('course-categories', function ($routes) {
        $routes->get('/', 'CourseCategoryController::index');
        $routes->get('(:segment)', 'CourseCategoryController::index/$1');
        $routes->post('create', 'CourseCategoryController::create');
        $routes->post('update/(:segment)', 'CourseCategoryController::update/$1');
        $routes->delete('delete/(:segment)', 'CourseCategoryController::delete/$1');
        $routes->get('category-by-course/(:num)?', 'CourseCategoryController::categoriesCourse/$1');
    });

    // Lectures routes
    $routes->group('course-sections', function ($routes) {
        $routes->get('/', 'CourseSectionController::index');
        $routes->get('(:num)', 'CourseSectionController::index/$1');
        $routes->get('by-course/(:num)', 'CourseSectionController::getSectionsByCourseId/$1');
        $routes->post('create', 'CourseSectionController::create');
        $routes->post('update/(:num)', 'CourseSectionController::update/$1');
        $routes->delete('delete/(:num)', 'CourseSectionController::delete/$1');
    });


     // Enrollment Routes
     $routes->post('enrollment/enroll', 'EnrollmentController::enroll');
     $routes->get('enrollments/', 'EnrollmentController::getEnrollments');
     $routes->get('enrollments/student/(:num)', 'EnrollmentController::getEnrollmentsByStudentId/$1');
     $routes->get('enrollments/instructor/(:num)', 'EnrollmentController::getEnrollmentsByInstructorId/$1');
     $routes->get('enrollments/course/(:num)', 'EnrollmentController::getEnrollmentsByCourseId/$1');

// Course Reviews routes
$routes->group('course-reviews', function ($routes) {
    $routes->get('/', 'CourseReviewController::index'); // Retrieve all reviews
    $routes->get('(:num)', 'CourseReviewController::getAllReviews/$1'); // Retrieve reviews for a specific course by course ID
    $routes->post('create', 'CourseReviewController::create'); // Create a new review
    $routes->post('update/(:num)', 'CourseReviewController::update/$1'); // Update an existing review by review ID
    $routes->delete('delete/(:num)', 'CourseReviewController::delete/$1'); // Remove a review by review ID
});


    // Lectures routes
    $routes->group('lectures', function ($routes) {
        // $routes->get('/', 'LectureController::index');
        $routes->get('(:num)', 'LectureController::index/$1');
        $routes->get('by-section/(:num)', 'LectureController::BySection/$1');
        $routes->post('create', 'LectureController::create');
        $routes->post('update/(:num)', 'LectureController::update/$1');
        $routes->delete('delete/(:num)', 'LectureController::delete/$1');
    });
    // Notifications Routes
    $routes->group('notifications', function($routes) {
        $routes->get('/', 'NotificationController::index');              // Get all notifications
        $routes->get('(:num)', 'NotificationController::index/$1');       // Get a notification by ID
        $routes->post('create', 'NotificationController::create');  
        $routes->get('sent_notification/(:num)', 'NotificationController::getNotificationBySender/$1');
        $routes->get('received_notification/(:num)', 'NotificationController::getNotificationByReceiver/$1');      // Create a new notification
        $routes->post('update/(:num)', 'NotificationController::update/$1'); // Update a notification
        $routes->delete('delete/(:num)', 'NotificationController::delete/$1'); // Delete a notification
    });
    
    // Cart Routes
    $routes->post('cart/add', 'CartController::addToCart');
    $routes->get('cart/view/(:num)', 'CartController::viewCart/$1');
    $routes->delete('cart/remove/(:num)/(:num)', 'CartController::removeFromCart/$1/$2');
    $routes->delete('cart/clear/(:num)', 'CartController::clearCart/$1');
    
    // Wishlist Routes
    $routes->post('wishlist/add', 'WishlistController::addToWishlist');
    $routes->get('wishlist/view/(:num)', 'WishlistController::viewWishlist/$1');
    $routes->delete('wishlist/remove/(:num)/(:num)', 'WishlistController::removeFromCWishlist/$1/$2');
    $routes->delete('wishlist/clear/(:num)', 'WishlistController::clearWishlist/$1');
    
    
    // Online classs
    $routes->group('onlineclass', function ($routes) {
        $routes->get('/', 'OnlineClassController::index');
        $routes->get('(:num)', 'OnlineClassController::index/$1');
        $routes->post('create', 'OnlineClassController::create');
        $routes->post('update/(:num)', 'OnlineClassController::update/$1');
        $routes->delete('delete/(:num)', 'OnlineClassController::delete/$1');
        $routes->post('joinClass', 'OnlineClassController::joinOnlineClass');
        $routes->get('getRecordings/(:segment)', 'OnlineClassController::getOnlineClassRecordings/$1');
    });

    $routes->group('analytics', function($routes) {
        $routes->get('total-counts', 'AnalyticsController::getTotalCounts');
        $routes->get('total-counts-by-institution/(:num)', 'AnalyticsController::getTotalCountsByInstitution/$1');
        $routes->get('students-enrolled-in-instructor-courses/(:num)', 'AnalyticsController::getStudentsEnrolledInInstructorCourses/$1');
        $routes->get('total-revenue/(:any)', 'AnalyticsController::getTotalRevenue/$1'); // Currency parameter, e.g., USD
        $routes->get('average-course-ratings', 'AnalyticsController::getAverageCourseRatings');
        $routes->get('monthly-enrollment-trends', 'AnalyticsController::getMonthlyEnrollmentTrends');
        $routes->get('course-enrollment-status', 'AnalyticsController::getCourseEnrollmentStatus');
    });
   
   
});

// --------------------------------
// Miscellaneous routes
// --------------------------------

$routes->get('verify-email/(:segment)', 'UserController::EmailVerify/$1');
$routes->post('send-verification-email', 'EmailController::sendVerificationEmail');
$routes->post('send-kyc-verification-email', 'EmailController::sendKYCVerificationEmail');
$routes->post('send-promotional-email', 'EmailController::sendPromotionalEmail');
$routes->post('send-course-update-email', 'EmailController::sendCourseUpdateEmail');
$routes->post('send-new-device-login-email', 'EmailController::sendNewDeviceLoginEmail');
$routes->get('location', 'LocationController::fetchLocation');
$routes->get('check', 'Home::check');
