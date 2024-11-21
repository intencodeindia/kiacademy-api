<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // Validation rules for course categories
    public array $courseCategoryRules = [
        'category_name' => 'required|min_length[3]|max_length[255]',
        'category_description' => 'permit_empty|max_length[500]',
    ];

    // Error messages for course categories
    public array $courseCategoryErrors = [
        'category_name' => [
            'required' => 'Category name is required.',
            'min_length' => 'Category name must be at least 3 characters long.',
            'max_length' => 'Category name cannot exceed 255 characters.',
        ],
        'category_description' => [
            'max_length' => 'Category description cannot exceed 500 characters.',
        ],
    ];

    // Validation rules for course reviews
    public array $courseReviewRules = [
        'course_id' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Course ID is required.',
                'integer' => 'Course ID must be an integer.',
            ]
        ],
        'student_id' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Student ID is required.',
                'integer' => 'Student ID must be an integer.',
            ]
        ],
        'rating' => [
            'rules' => 'required|integer|greater_than[0]|less_than_equal_to[5]',
            'errors' => [
                'required' => 'Rating is required.',
                'integer' => 'Rating must be an integer.',
                'greater_than' => 'Rating must be greater than 0.',
                'less_than_equal_to' => 'Rating must be 5 or less.',
            ]
        ],
        'comment' => [
            'rules' => 'permit_empty|string|max_length[255]',
            'errors' => [
                'string' => 'Comment must be a string.',
                'max_length' => 'Comment cannot exceed 255 characters.',
            ]
        ]
    ];

    // Error messages for course reviews
    public array $courseReviewErrors = [
        'course_id' => [
            'required' => 'Course ID is required.',
            'integer' => 'Course ID must be an integer.',
        ],
        'student_id' => [
            'required' => 'Student ID is required.',
            'integer' => 'Student ID must be an integer.',
        ],
        'rating' => [
            'required' => 'Rating is required.',
            'integer' => 'Rating must be an integer.',
            'greater_than' => 'Rating must be greater than 0.',
            'less_than_equal_to' => 'Rating must be 5 or less.',
        ],
        'comment' => [
            'string' => 'Comment must be a string.',
            'max_length' => 'Comment cannot exceed 255 characters.',
        ]
    ];

    public $quizRules = [
        'section_id' => 'required|integer',
        'title' => 'required|max_length[255]',
        'description' => 'permit_empty|string',
    ];

    public $quizErrors = [
        'section_id' => [
            'required' => 'Section ID is required',
            'integer' => 'Section ID must be an integer',
        ],
        'title' => [
            'required' => 'Title is required',
            'max_length' => 'Title cannot exceed 255 characters',
        ],
        'description' => [
            'string' => 'Description must be a string',
        ],
    ];


    public $questionRules = [
        'quiz_id' => 'required|integer',
        'question_text' => 'required|string',
    ];

    public $questionErrors = [
        'quiz_id' => [
            'required' => 'Quiz ID is required.',
            'integer' => 'Quiz ID must be an integer.',
        ],
        'question_text' => [
            'required' => 'Question text is required.',
            'string' => 'Question text must be a string.',
        ],
    ];

    public $answerRules = [
        'answer_text' => 'required|string',
        'is_correct' => 'required',
    ];

    public $answerErrors = [
        'answer_text' => [
            'required' => 'Answer text is required.',
            'string' => 'Answer text must be a string.',
        ],
        'is_correct' => [
            'required' => 'Is Correct field is required.',
            'in_list' => 'Is Correct field must be 0 or 1.',
        ],
    ];


    // Validation rules for coupons
    public array $couponRules = [
        'coupon_code' => 'required|max_length[50]|is_unique[coupons.coupon_code]',
        'coupon_discount' => 'required|decimal|greater_than_equal_to[0]',
        'coupon_discount_type' => 'required|in_list[fixed,percentage]',
        'coupon_valid_from' => 'required|valid_date',
        'coupon_valid_to' => 'required|valid_date',
        'coupon_usage_limit' => 'required|integer|greater_than_equal_to[1]',
        'coupon_used_count' => 'permit_empty|integer|greater_than_equal_to[0]',
        'coupon_applicable_courses' => 'permit_empty|string',
    ];

    // Error messages for coupons
    public array $couponErrors = [
        'coupon_code' => [
            'required' => 'Coupon code is required.',
            'max_length' => 'Coupon code cannot exceed 50 characters.',
            'is_unique' => 'Coupon code must be unique.',
        ],
        'coupon_discount' => [
            'required' => 'Coupon discount is required.',
            'decimal' => 'Coupon discount must be a decimal number.',
            'greater_than_equal_to' => 'Coupon discount must be greater than or equal to 0.',
        ],
        'coupon_discount_type' => [
            'required' => 'Coupon discount type is required.',
            'in_list' => 'Coupon discount type must be either "fixed" or "percentage".',
        ],
        'coupon_valid_from' => [
            'required' => 'Coupon valid from date is required.',
            'valid_date' => 'Coupon valid from date must be in a valid datetime format (YYYY-MM-DD HH:MM:SS).',
        ],
        'coupon_valid_to' => [
            'required' => 'Coupon valid to date is required.',
            'valid_date' => 'Coupon valid to date must be in a valid datetime format (YYYY-MM-DD HH:MM:SS).',
        ],
        'coupon_usage_limit' => [
            'required' => 'Coupon usage limit is required.',
            'integer' => 'Coupon usage limit must be an integer.',
            'greater_than_equal_to' => 'Coupon usage limit must be greater than or equal to 1.',
        ],
        'coupon_used_count' => [
            'integer' => 'Coupon used count must be an integer.',
            'greater_than_equal_to' => 'Coupon used count must be greater than or equal to 0.',
        ],
        'coupon_applicable_courses' => [
            'string' => 'Coupon applicable courses must be a string.',
        ],
    ];

    // Define validation rules for user registration
    public $userRegistrationRules = [
        'email' => 'required|valid_email',
        'password' => 'required|min_length[8]',
        'first_name' => 'required|alpha_space',
        'last_name' => 'required|alpha_space',
        'role_id' => 'required|integer',
        'profile_picture' => 'uploaded[profile_picture]|max_size[profile_picture,2048]|is_image[profile_picture]',
        // Add other fields and rules as needed
    ];

    // Define error messages for validation rules
    public $userRegistrationErrors = [
        'email' => [
            'required' => 'The email field is required.',
            'valid_email' => 'Please provide a valid email address.',
        ],
        'password' => [
            'required' => 'The password field is required.',
            'min_length' => 'The password must be at least 6 characters long.',
        ],
        'first_name' => [
            'required' => 'The first name field is required.',
            'alpha_space' => 'The first name can only contain alphabetical characters and spaces.',
        ],
        'last_name' => [
            'required' => 'The last name field is required.',
            'alpha_space' => 'The last name can only contain alphabetical characters and spaces.',
        ],
        'role_id' => [
            'required' => 'The role ID field is required.',
            'integer' => 'The role ID must be an integer.',
        ],
        'profile_picture' => [
            'uploaded' => 'Please upload a profile picture.',
            'max_size' => 'The profile picture size must not exceed 2MB.',
            'is_image' => 'The uploaded file must be an image.',
        ],
        // Add other fields and error messages as needed
    ];

     // Define validation rules for course additional information
     public $courseAdditionalRules = [
        'who_is_for' => 'required|string',
        'what_you_will_learn' => 'required|string',
        'requirements' => 'required|string',
    ];

    // Define error messages for validation rules
    public $courseAdditionalErrors = [
        'who_is_for' => [
            'required' => 'The "Who is for" field is required.',
            'string' => 'The "Who is for" field must be a string.',
        ],
        'what_you_will_learn' => [
            'required' => 'The "What you will learn" field is required.',
            'string' => 'The "What you will learn" field must be a string.',
        ],
        'requirements' => [
            'required' => 'The "Requirements" field is required.',
            'string' => 'The "Requirements" field must be a string.',
        ],
    ];

    public $studentCreateRules = [
        'user_id' => 'required|integer',
        'date_of_birth' => 'required|valid_date',
        'bio' => 'permit_empty|string',
        'student_mobile_number' => 'required|numeric',
        'student_parent_mobile' => 'permit_empty|numeric',
        'student_parent_email' => 'permit_empty|valid_email',
        'address' => 'required|string',
    ];

    public $studentCreateErrors = [
        'user_id' => [
            'required' => 'User ID is required.',
            'integer' => 'User ID must be an integer.',
        ],
        'date_of_birth' => [
            'required' => 'Date of Birth is required.',
            'valid_date' => 'Date of Birth must be a valid date.',
        ],
        'bio' => [
            'string' => 'Bio must be a string.',
        ],
        'student_mobile_number' => [
            'required' => 'Student Mobile Number is required.',
            'numeric' => 'Student Mobile Number must be numeric.',
        ],
        'student_parent_mobile' => [
            'numeric' => 'Student Parent Mobile must be numeric.',
        ],
        'student_parent_email' => [
            'valid_email' => 'Student Parent Email must be a valid email address.',
        ],
        'address' => [
            'required' => 'Address is required.',
            'string' => 'Address must be a string.',
        ],
    ];

    public $studentUpdateRules = [
        'user_id' => 'permit_empty|integer',
        'date_of_birth' => 'permit_empty|valid_date',
        'bio' => 'permit_empty|string',
        'student_mobile_number' => 'permit_empty|numeric',
        'student_parent_mobile' => 'permit_empty|numeric',
        'student_parent_email' => 'permit_empty|valid_email',
        'address' => 'permit_empty|string',
    ];

    public $studentUpdateErrors = [
        'user_id' => [
            'integer' => 'User ID must be an integer.',
        ],
        'date_of_birth' => [
            'valid_date' => 'Date of Birth must be a valid date.',
        ],
        'bio' => [
            'string' => 'Bio must be a string.',
        ],
        'student_mobile_number' => [
            'numeric' => 'Student Mobile Number must be numeric.',
        ],
        'student_parent_mobile' => [
            'numeric' => 'Student Parent Mobile must be numeric.',
        ],
        'student_parent_email' => [
            'valid_email' => 'Student Parent Email must be a valid email address.',
        ],
        'address' => [
            'string' => 'Address must be a string.',
        ],
    ];

}

