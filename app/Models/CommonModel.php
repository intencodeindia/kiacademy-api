<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{
    public function insertRecord($table, $data)
    {
        $builder = $this->db->table($table);
        $builder->insert($data);
        return true;
    }

    public function insertQuestionRecord($table, $data)
    {
        $builder = $this->db->table($table);
        $builder->insert($data);

        // Return the last inserted ID
        return $this->db->insertID();
    }

    public function updateRecord($table, $where, $data)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->update($data);
        return true;
    }


    public function deleteRecord($table, $where)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->delete();
        return true;
    }
    public function selectRecord($table, $where = array())
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $result = $builder->get();

        return $result->getResult();
    }

    public function getInstituteByUserId($userId)
    {
        return $this->db->table('institutes')
            ->select('institutes.*, users.user_id')
            ->join('users', 'institutes.institute_id = users.institute_id')
            ->where('users.user_id', $userId)
            ->get()
            ->getResult(); // Return result as an array of objects
    }

    public function selectRecordArray($table, $where = array())
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $result = $builder->get();

        return $result->getResultArray();
    }
    public function rowRecord($table, $where = array())
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $result = $builder->get();

        return $result->getRow();
    }


    public function getUserByEmail($email)
    {
        // Define the table you want to query
        $table = 'users';

        // Define the condition for the query
        $where = array('email' => $email);

        // Use the rowRecord method to get the user by email
        return $this->rowRecord($table, $where);
    }

    // Method to get a student with user details

    public function getCourseWithDetails($courseId, $currencyColumn)
    {
        // Build the query
        $builder = $this->db->table('courses');
        $builder->select("
            courses.*,
            course_pricematrix.$currencyColumn AS course_display_price, '$currencyColumn' as display_currency,
            users.first_name AS instructor_first_name,
            users.last_name AS instructor_last_name
        ");
        $builder->join('course_pricematrix', 'courses.course_price = course_pricematrix.ID', 'left');
        $builder->join('users', 'courses.instructor_id = users.user_id', 'left');

        $builder->where('courses.course_id', $courseId);

        // Execute the query and return the result
        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }

    public function getCourseSearch($searchterm, $currencyColumn)
    {
        // Build the query
        $builder = $this->db->table('courses');
        $builder->select("
        courses.*, 
        course_pricematrix.$currencyColumn AS course_display_price, 
        '$currencyColumn' as display_currency, 
        users.first_name AS instructor_first_name, 
        users.last_name AS instructor_last_name
    ");
    
    $builder->join('course_pricematrix', 'courses.course_price = course_pricematrix.ID', 'left');
    $builder->join('users', 'courses.instructor_id = users.user_id', 'left');
    
    // Use orLike to search both title and description columns
    $builder->groupStart()  // Start a group for the OR condition
        ->like('courses.course_title', $searchterm)
        ->orLike('courses.course_description', $searchterm);
    $builder->groupEnd(); 

        // Execute the query and return the result
        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }

    public function getAllCoursesWithDetails($currencyColumn)
    {
        // Build the query
        $builder = $this->db->table('courses');
        $builder->select("
            courses.*, 
            course_pricematrix.$currencyColumn AS course_display_price, '$currencyColumn' as display_currency,
            users.first_name AS instructor_first_name,
            users.last_name AS instructor_last_name
        ");
        $builder->join('course_pricematrix', 'courses.course_price = course_pricematrix.ID', 'left');
        $builder->join('users', 'courses.instructor_id = users.user_id', 'left');

        // Execute the query and return the results
        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }

    public function getRecomendedCourse($user_id,$currencyColumn)
    {
        // Build the query
        $builder = $this->db->table('courses');
        $builder->select("
            courses.*, 
            course_pricematrix.$currencyColumn AS course_display_price, '$currencyColumn' as display_currency,
            users.first_name AS instructor_first_name,
            users.last_name AS instructor_last_name
        ");
        $builder->join('course_pricematrix', 'courses.course_price = course_pricematrix.ID', 'left');
        $builder->join('users', 'courses.instructor_id = users.user_id', 'left');

        // Execute the query and return the results
        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }
    public function getAllCoursesByCreator($creatorId, $currencyColumn)
    {
        // Build the query
        $builder = $this->db->table('courses');
        $builder->select("
        courses.*, 
        course_pricematrix.$currencyColumn AS course_display_price, '$currencyColumn' as display_currency,
        users.first_name AS instructor_first_name,
        users.last_name AS instructor_last_name
    ");
        $builder->join('course_pricematrix', 'courses.course_price = course_pricematrix.ID', 'left');
        $builder->join('users', 'courses.instructor_id = users.user_id', 'left');
        $builder->where('courses.instructor_id', $creatorId);

        // Execute the query and return the results
        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }
    public function getAllCoursesForReview($currencyColumn)
    {
        // Build the query
        $builder = $this->db->table('courses');
        $builder->select("
        courses.*, 
        course_pricematrix.$currencyColumn AS course_display_price, '$currencyColumn' as display_currency,
        users.first_name AS instructor_first_name,
        users.last_name AS instructor_last_name
    ");
        $builder->join('course_pricematrix', 'courses.course_price = course_pricematrix.ID', 'left');
        $builder->join('users', 'courses.instructor_id = users.user_id', 'left');
        $builder->where('courses.course_status', 'requested');

        // Execute the query and return the results
        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }



    // Method to get a student with user details
    public function getStudentWithUser($studentId)
    {
        $builder = $this->db->table('students');
        $builder->select('students.*, users.email, users.first_name, users.last_name, users.user_status,users.profile_picture');
        $builder->join('users', 'students.user_id = users.user_id', 'left');
        $builder->where('students.student_id', $studentId);
        $result = $builder->get();
        return $result->getRowArray(); // Return as array
    }

    // Method to get all students with user details
    public function getAllStudentsWithUsers()
    {
        $builder = $this->db->table('students');
        $builder->select('students.*, users.email, users.first_name, users.last_name,users.user_status');
        $builder->join('users', 'students.user_id = users.user_id', 'left');
        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }

    public function getTutorWithUser($tutorId)
    {
        $builder = $this->db->table('users');
        $builder->select('users.*, verification_instructor.*'); // Select all columns from both tables
        $builder->join('verification_instructor', 'users.user_id = verification_instructor.user_id', 'left');
        $builder->where('users.user_id', $tutorId);
        $builder->where('users.role_id', 2); // Ensure the user has role_id = 2
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getCartDetails($userId,$currency)
{
    $builder = $this->db->table('cart');
    $builder->select("cart.cart_id, courses.course_id, courses.course_title, '".$currency."' as currency, cart.date_added,$currency as display_price,courses.course_description, courses.course_thumbnail, courses.course_category_id, courses.course_language");
    $builder->join('courses', 'cart.course_id = courses.course_id', 'inner');
    $builder->join('course_pricematrix', 'courses.course_price = course_pricematrix.ID', 'left');
    $builder->where('cart.user_id', $userId);
    $result = $builder->get();
    return $result->getResultArray(); // Return all results as an array
}


public function getWishlistDetails($userId, $currency)
{
    $builder = $this->db->table('wishlist');
    $builder->select("wishlist.id as wishlist_id, courses.course_id, courses.course_title, '".$currency."' as currency, wishlist.created_at as date_added, $currency as display_price, courses.course_description, courses.course_thumbnail, courses.course_category_id, courses.course_language");
    $builder->join('courses', 'wishlist.course_id = courses.course_id', 'inner');
    $builder->join('course_pricematrix', 'courses.course_price = course_pricematrix.ID', 'left');
    $builder->where('wishlist.user_id', $userId);
    $result = $builder->get();
    return $result->getResultArray(); // Return all results as an array
}

    public function getTutorWithCourseCreator($tutorId)
    {
        $builder = $this->db->table('users');
        $builder->select('users.last_name, users.first_name, users.profile_picture, verification_instructor.bio, verification_instructor.job_title'); // Select specific columns
        $builder->join('verification_instructor', 'users.user_id = verification_instructor.user_id', 'left');
        $builder->where('users.user_id', $tutorId);
        $builder->where('users.role_id', 2); // Ensure the user has role_id = 2
        $result = $builder->get();
        return $result->getRowArray();
    }



    public function getAllTutorsWithUsers()
    {
        $builder = $this->db->table('users');
        $builder->select('users.*, verification_instructor.*'); // Select all columns from both tables
        $builder->join('verification_instructor', 'users.user_id = verification_instructor.user_id', 'left');
        $builder->where('users.role_id', 2); // Ensure the user has role_id = 2
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllReviewsWithUsers()
    {
        $builder = $this->db->table('course_review');
        $builder->select('course_review.*, users.first_name, users.last_name');
        $builder->join('users', 'course_review.student_id = users.user_id', 'left');
        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }

    public function getAllReviewsWithUsersByCourseId($where)
    {
        $builder = $this->db->table('course_review');
        $builder->select('course_review.*, users.first_name, users.last_name,users.profile_picture');
        $builder->join('users', 'course_review.student_id = users.user_id', 'left');
        $builder->where($where);
        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }

    // Fetch records with the correct usage of the where clause

    public function getEnrollmentDetails()
    {
        $builder = $this->db->table('enrollment');
        $builder->select('CONCAT(users.first_name, " ", users.last_name) AS student_full_name, courses.course_title,payment.transaction_id, CONCAT(instructor.first_name, " ", instructor.last_name) AS instructor_full_name,enrollment.enrollment_date');
        $builder->join('users', 'enrollment.user_id = users.user_id', 'left'); // Join with the users table to get student name
        $builder->join('courses', 'enrollment.course_id = courses.course_id', 'left'); // Join with the courses table to get course details
        $builder->join('users AS instructor', 'courses.instructor_id = instructor.user_id', 'left');
        $builder->join('payment', 'payment.payment_id = enrollment.payment_id', 'left');
        // Join with the users table again for the course creator (instructor)
        // $builder->where($where); // Apply the conditions (e.g., course_id)
        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }
    public function getAllPaymentHistory()
    {
        $builder = $this->db->table('payment');
        $builder->select('payment.payment_id, CONCAT(users.first_name, " ", users.last_name) AS student_name, payment.transaction_id, payment.amount, payment.payment_date,payment.currency');
        $builder->join('users', 'payment.user_id = users.user_id', 'left'); // Join with users table to get student name
        $result = $builder->get();
        return $result->getResultArray(); // Return the result as an array
    }
    public function getCourseByPaymentId($paymentId)
    {
        $builder = $this->db->table('enrollment');
        $builder->select('courses.course_title, courses.instructor_id, CONCAT(users.first_name, " ", users.last_name) AS instructor_name, enrollment.enrollment_date');
        $builder->join('courses', 'enrollment.course_id = courses.course_id', 'left'); // Join with courses table
        $builder->join('users', 'users.user_id = courses.instructor_id', 'left'); // Join with users table to get instructor details
        $builder->where('enrollment.payment_id', $paymentId); // Filter by payment_id
        $result = $builder->get();
        return $result->getResultArray(); // Return the single row as an array
    }

    public function getEnrollmentsByCourseId($courseId)
    {
        $builder = $this->db->table('enrollment');
        $builder->select('CONCAT(users.first_name, " ", users.last_name) AS student_full_name, courses.course_title, payment.transaction_id, CONCAT(instructor.first_name, " ", instructor.last_name) AS instructor_full_name, enrollment.enrollment_date');
        $builder->join('users', 'enrollment.user_id = users.user_id', 'left'); // Join with the users table to get student name
        $builder->join('courses', 'enrollment.course_id = courses.course_id', 'left'); // Join with the courses table to get course details
        $builder->join('users AS instructor', 'courses.instructor_id = instructor.user_id', 'left');
        $builder->join('payment', 'payment.payment_id = enrollment.payment_id', 'left');
        $builder->where('enrollment.course_id', $courseId); // Filter by course_id

        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }

    public function getEnrollmentsByStudentId($userId)
    {
        $builder = $this->db->table('enrollment');
        $builder->select('CONCAT(users.first_name, " ", users.last_name) AS student_full_name,courses.course_id, courses.course_title,courses.course_description,courses.course_thumbnail, payment.transaction_id, CONCAT(instructor.first_name, " ", instructor.last_name) AS instructor_full_name, enrollment.enrollment_date');
        $builder->join('users', 'enrollment.user_id = users.user_id', 'left'); // Join with the users table to get student name
        $builder->join('courses', 'enrollment.course_id = courses.course_id', 'left'); // Join with the courses table to get course details
        $builder->join('users AS instructor', 'courses.instructor_id = instructor.user_id', 'left');
        $builder->join('payment', 'payment.payment_id = enrollment.payment_id', 'left');
        $builder->where('enrollment.user_id', $userId); // Filter by user_id

        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }

    public function getEnrollmentsByInstructorId($userId)
    {
        $builder = $this->db->table('enrollment');
        $builder->select('CONCAT(users.first_name, " ", users.last_name) AS student_full_name, courses.course_title, payment.transaction_id, CONCAT(instructor.first_name, " ", instructor.last_name) AS instructor_full_name, enrollment.enrollment_date');
        $builder->join('users', 'enrollment.user_id = users.user_id', 'left'); // Join with the users table to get student name
        $builder->join('courses', 'enrollment.course_id = courses.course_id', 'left'); // Join with the courses table to get course details
        $builder->join('users AS instructor', 'courses.instructor_id = instructor.user_id', 'left');
        $builder->join('payment', 'payment.payment_id = enrollment.payment_id', 'left');
        $builder->where('courses.instructor_id', $userId); // Filter by user_id

        $result = $builder->get();
        return $result->getResultArray(); // Return as array
    }



    // You can add similar methods for other joins if needed   
    public function verificationRowRecord($code)
    {
        // Define the current time to compare with expiration
        $currentDateTime = date('Y-m-d H:i:s');


        // Query the model to find the record with the provided code
        $record = $this->db->table('users')
            ->where('verification_code', $code)
            ->where('expires_at >=', $currentDateTime);
        //    ->first();


        return $record;
    }

    public function getCount($table, array $conditions = [])
    {
        $builder = $this->db->table($table);

        // Apply conditions if any      
        if (!empty($conditions)) {
            $builder->where($conditions);
        }

        return $builder->countAllResults();
    }

    public function getTotalCounts()
{
    // Query to get total counts
    $totalUsers = $this->db->table('users')->countAllResults();
    $totalinstructors = $this->db->table('users')
    ->where('role_id', 2)
    ->countAllResults();
    $total_students = $this->db->table('users')
    ->where('role_id', 3)
    ->countAllResults();
    $total_institutes = $this->db->table('users')
    ->where('role_id', 4)
    ->countAllResults();
    $totalCourses = $this->db->table('courses')->countAllResults();
    $totalEnrollments = $this->db->table('enrollment')->countAllResults();

    return [
        'total_users' => $totalUsers,
        'total_courses' => $totalCourses,
        'total_enrollments' => $totalEnrollments,
        'total_institutes' => $total_institutes,
        'total_instructors' => $totalinstructors,
        'total_students' => $total_students
    ];
}

public function getTotalCountsByInstitution($institute_id)
{
    // Query to get total counts
    $totalUsers = $this->db->table('users')->where('institute_id', $institute_id)->countAllResults();
    $totalinstructors = $this->db->table('users')
    ->where('role_id', 2)
    ->where('institute_id', $institute_id)
    ->countAllResults();
    $total_students = $this->db->table('users')
    ->where('role_id', 3)
    ->where('institute_id', $institute_id)
    ->countAllResults();
    // $totalCourses = $this->db->table('courses')
    // ->where('institute_id', $institute_id)->countAllResults();
    // $totalEnrollments = $this->db->table('enrollment')->countAllResults();

    return [
        // 'total_courses' => $totalCourses,
        'total_users' => $totalUsers,
        'total_instructors' => $totalinstructors,
        'total_students' => $total_students
    ];
}

public function getTotalRevenue($currency = 'USD')
{
    $builder = $this->db->table('payment');
    $builder->selectSum('amount')->where('currency', $currency);
    $result = $builder->get()->getRow();

    return ['total_revenue' => $result->amount, 'currency' => $currency];
}
public function getAverageCourseRatings()
{
    $builder = $this->db->table('course_review');
    $builder->select('course_id, AVG(rating) as average_rating');
    $builder->groupBy('course_id');
    $result = $builder->get();

    return $result->getResultArray();
}
public function getMonthlyEnrollmentTrends()
{
    $builder = $this->db->table('enrollment');
    $builder->select("DATE_FORMAT(enrollment_date, '%Y-%m') as month, COUNT(*) as enrollments");
    $builder->groupBy("month");
    $builder->orderBy("month", 'ASC');
    $result = $builder->get();

    return $result->getResultArray();
}
public function getCourseEnrollmentStatus()
{
    $builder = $this->db->table('enrollment');
    $builder->select('course_id, 
                      SUM(CASE WHEN enrollment_status = "active" THEN 1 ELSE 0 END) as active_enrollments, 
                      SUM(CASE WHEN enrollment_status = "completed" THEN 1 ELSE 0 END) as completed_enrollments');
    $builder->groupBy('course_id');
    $result = $builder->get();

    return $result->getResultArray();
}

public function getStudentsEnrolledInInstructorCourses($instructorId)
{
    // Build the query
    $query = $this->db->table('courses c')
        ->select('c.course_id, c.course_title,u.user_id, u.first_name, u.last_name, u.role_id,u.email, u.profile_picture, e.enrollment_date')
        ->join('enrollment e', 'c.course_id = e.course_id')
        ->join('users u', 'e.user_id = u.user_id')
        ->where('c.instructor_id', $instructorId)
        ->get();
    // Return the result as an array
    return $query->getResultArray();
}

public function getNotificationsWithUserDetails()
{
    $builder = $this->db->table('notifications n');
    $builder->select('n.*, 
                      CONCAT(us.first_name, " ", us.last_name) AS sender_name, 
                      us.profile_picture AS sender_profile, 
                      CONCAT(ur.first_name, " ", ur.last_name) AS receiver_name, 
                      ur.profile_picture AS receiver_profile');
    $builder->join('users us', 'n.sender_id = us.user_id');
    $builder->join('users ur', 'n.receiver_id = ur.user_id');

    $query = $builder->get();
    return $query->getResultArray(); // or getResult() if you want objects
}

public function getNotificationsBySenderId($senderId)
{
    $builder = $this->db->table('notifications n');
    $builder->select('n.*, 
                      CONCAT(us.first_name, " ", us.last_name) AS sender_name, 
                      us.profile_picture AS sender_profile, 
                      CONCAT(ur.first_name, " ", ur.last_name) AS receiver_name, 
                      ur.profile_picture AS receiver_profile');
    $builder->join('users us', 'n.sender_id = us.user_id');
    $builder->join('users ur', 'n.receiver_id = ur.user_id');
    $builder->where('n.sender_id', $senderId);

    $query = $builder->get();
    return $query->getResultArray();
}

public function getNotificationsByReceiverId($receiverId)
{
    $builder = $this->db->table('notifications n');
    $builder->select('n.*, 
                      CONCAT(us.first_name, " ", us.last_name) AS sender_name, 
                      us.profile_picture AS sender_profile, 
                      CONCAT(ur.first_name, " ", ur.last_name) AS receiver_name, 
                      ur.profile_picture AS receiver_profile');
    $builder->join('users us', 'n.sender_id = us.user_id');
    $builder->join('users ur', 'n.receiver_id = ur.user_id');
    $builder->where('n.receiver_id', $receiverId);

    $query = $builder->get();
    return $query->getResultArray();
}


}
