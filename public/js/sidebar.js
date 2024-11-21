document.addEventListener("DOMContentLoaded", function () {
  const sidebarData = [
    {
      title: "Courses",
      id: "courses",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "List All Courses", href: "#courses-get-all", method: "GET" },
        {
          text: "Get Course Details",
          href: "#courses-get-by-id",
          method: "GET",
        },
        { text: "Create New Course", href: "#courses-create", method: "POST" },
        { text: "Update Course", href: "#courses-update", method: "PUT" },
        { text: "Delete Course", href: "#courses-delete", method: "DELETE" },
        {
          text: "Courses By Instructor",
          href: "#courses-get-by-instructor",
          method: "GET",
        },
      ],
    },
    {
      title: "Course Additional Information",
      id: "course-additional",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-right",
      links: [
        {
          text: "Get Additional Information",
          href: "#course-additional-get",
          method: "GET",
        },
        {
          text: "Add Additional Information",
          href: "#course-additional-create",
          method: "POST",
        },
        {
          text: "Update Additional Information",
          href: "#course-additional-update",
          method: "PUT",
        },
        {
          text: "Delete Additional Information",
          href: "#course-additional-delete",
          method: "DELETE",
        },
      ],
    },
    {
      title: "Course Categories",
      id: "course-categories",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        {
          text: "List All Course Categories",
          href: "#course-categories-get-all",
          method: "GET",
        },
        {
          text: "Get Course Category Details",
          href: "#course-categories-get-by-id",
          method: "GET",
        },
        {
          text: "Create New Course Category",
          href: "#course-categories-create",
          method: "POST",
        },
        {
          text: "Update Course Category",
          href: "#course-categories-update",
          method: "PUT",
        },
        {
          text: "Delete Course Category",
          href: "#course-categories-delete",
          method: "DELETE",
        },
      ],
    },
    {
      title: "Course Sections",
      id: "course-sections",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        {
          text: "Retrieve Single Section",
          href: "#course-sections-get-by-id",
          method: "GET",
        },
        {
          text: "Retrieve Sections by Course ID",
          href: "#course-sections-get-by-course-id",
          method: "GET",
        },
        {
          text: "Create New Section",
          href: "#course-sections-create",
          method: "POST",
        },
        {
          text: "Update Section",
          href: "#course-sections-update",
          method: "PUT",
        },
        {
          text: "Delete Section",
          href: "#course-sections-delete",
          method: "DELETE",
        },
      ],
    },
    {
      title: "Lectures",
      id: "lectures",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "List All Lectures", href: "#lectures-get-all", method: "GET" },
        {
          text: "Get Lecture Details",
          href: "#lectures-get-by-id",
          method: "GET",
        },
        {
          text: "Create New Lecture",
          href: "#lectures-create",
          method: "POST",
        },
        { text: "Update Lecture", href: "#lectures-update", method: "PUT" },
        { text: "Delete Lecture", href: "#lectures-delete", method: "DELETE" },
        {
          text: "Lecture By Section Id",
          href: "#lectures-get-by-section",
          method: "GET",
        },
      ],
    },
    {
      title: "Quiz Management",
      id: "quiz-api",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "Get All Quizzes", href: "#quizzes", method: "GET" },
        { text: "Create Quiz", href: "#quizzes-create", method: "POST" },
        { text: "Update Quiz", href: "#quizzes-update", method: "PUT" },
        { text: "Delete Quiz", href: "#quizzes-delete", method: "DELETE" },
      ],
    },
    {
      title: "Question and Answer Management",
      id: "question-answer-api",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        {
          text: "Get Questions and Answers",
          href: "#questions-get",
          method: "GET",
        },
        {
          text: "Create Question and Answers",
          href: "#questions-create",
          method: "POST",
        },
        {
          text: "Update Question and Answers",
          href: "#questions-update",
          method: "PUT",
        },
        {
          text: "Delete Question and Answers",
          href: "#questions-delete",
          method: "DELETE",
        },
      ],
    },
    {
      title: "Course Reviews",
      id: "course-reviews",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        {
          text: "List All Reviews",
          href: "#course-reviews-get-all",
          method: "GET",
        },
        {
          text: "Get Reviews by Course ID",
          href: "#course-reviews-get-by-course-id",
          method: "GET",
        },
        {
          text: "Create New Review",
          href: "#course-reviews-create",
          method: "POST",
        },
        {
          text: "Update Review",
          href: "#course-reviews-update",
          method: "PUT",
        },
        {
          text: "Delete Review",
          href: "#course-reviews-delete",
          method: "DELETE",
        },
      ],
    },
    {
      title: "Coupons",
      id: "coupons",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "List All Coupons", href: "#coupons-get-all", method: "GET" },
        {
          text: "Get Coupon Details",
          href: "#coupons-get-by-id",
          method: "GET",
        },
        { text: "Create New Coupon", href: "#coupons-create", method: "POST" },
        { text: "Update Coupon", href: "#coupons-update", method: "PUT" },
        { text: "Delete Coupon", href: "#coupons-delete", method: "DELETE" },
      ],
    },
    {
      title: "Users",
      id: "users",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "List All Users", href: "#users-get-all", method: "GET" },
        { text: "Get User Details", href: "#users-get-by-id", method: "GET" },
        { text: "Create New User", href: "#users-create", method: "POST" },
        { text: "Update User", href: "#users-update", method: "PUT" },
        {
          text: "Update KYC Details",
          href: "#users-update-kyc",
          method: "PUT",
        },
        {
          text: "Verify User Email",
          href: "#users-verify-email",
          method: "GET",
        },
      ],
    },
    {
      title: "Authentication",
      id: "auth-api",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "User Login", href: "#auth-login", method: "POST" },
        { text: "User Logout", href: "#auth-logout", method: "POST" },
      ],
    },
    {
      title: "Students",
      id: "students",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "List All Students", href: "#students-get-all", method: "GET" },
        {
          text: "Get Student Details",
          href: "#students-get-by-id",
          method: "GET",
        },
        {
          text: "Create New Student",
          href: "#students-create",
          method: "POST",
        },
        { text: "Update Student", href: "#students-update", method: "PUT" },
        { text: "Delete Student", href: "#students-delete", method: "DELETE" },
      ],
    },
    {
      title: "Tutors",
      id: "tutors",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "List All Tutors", href: "#tutors-get-all", method: "GET" },
        { text: "Get Tutor Details", href: "#tutors-get-by-id", method: "GET" },
        {
          text: "Get Tutor with Course Creator",
          href: "#tutors-get-course-creator",
          method: "GET",
        },
      ],
    },
    {
      title: "Enrollments",
      id: "enrollments",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        {
          text: "List All Enrollments",
          href: "#enrollments-get-all",
          method: "GET",
        },
        {
          text: "Get Enrollment Details",
          href: "#enrollments-get-by-id",
          method: "GET",
        },
        {
          text: "Create New Enrollment",
          href: "#enrollments-create",
          method: "POST",
        },
        {
          text: "Update Enrollment",
          href: "#enrollments-update",
          method: "PUT",
        },
        {
          text: "Delete Enrollment",
          href: "#enrollments-delete",
          method: "DELETE",
        },
        {
          text: "Get Enrollments by StudentID",
          href: "#enrollments/student/:id",
          method: "GET",
        },
        {
          text: "Get Enrollments by InstructorID",
          href: "#enrollments/instructor/:id",
          method: "GET",
        },
        {
          text: "Get Enrollments by CourseID",
          href: "#enrollments/course/:id",
          method: "GET",
        },
      ],
    },
    {
      title: "Payment",
      id: "payment",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "List All Payments", href: "#payments-get-all", method: "GET" },
        {
          text: "Get Payment Details",
          href: "#payments-get-by-id",
          method: "GET",
        },
        {
          text: "Create New Payment",
          href: "#payments-create",
          method: "POST",
        },
        { text: "Update Payment", href: "#payments-update", method: "PUT" },
        { text: "Delete Payment", href: "#payments-delete", method: "DELETE" },
      ],
    },
    {
      title: "Cart",
      id: "cart",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "View Cart", href: "#cart-view", method: "GET" },
        { text: "Add Item to Cart", href: "#cart-add", method: "POST" },
        {
          text: "Remove Item from Cart",
          href: "#cart-remove",
          method: "DELETE",
        },
        { text: "Clear Cart", href: "#cart-clear", method: "DELETE" },
      ],
    },
    {
      title: "Wishlist",  // New Wishlist section
      id: "wishlist",
      icon: "fa-regular fa-heart",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "View Wishlist", href: "#wishlist-view", method: "GET" },
        { text: "Add Item to Wishlist", href: "#wishlist-add", method: "POST" },
        { text: "Remove Item from Wishlist", href: "#wishlist-remove", method: "DELETE" },
        { text: "Clear Wishlist", href: "#wishlist-clear", method: "DELETE" },
      ],
    },
    {
      title: "Notifications",
      id: "notifications",
      icon: "fa-regular fa-folder-closed",
      iconDown: "fa-regular fa-angle-down",
      links: [
        { text: "List All Notifications", href: "#notifications-get-all", method: "GET" },
        { text: "Get Notifications by ID", href: "#notifications-get-byId", method: "GET" },
        { text: "Send Notification", href: "#notifications-send", method: "POST" },
        { text: "Mark Notification as Read", href: "#notifications-mark-read", method: "PUT" },
        { text: "Delete Notification", href: "#notifications-delete", method: "DELETE" },
      ],
    },
    {
  title: "Institutions",
  id: "institutions",
  icon: "fa-regular fa-building",
  iconDown: "fa-regular fa-angle-down",
  links: [
    {
      text: "List All Institutions",
      href: "#institutions-get-all",
      method: "GET",
    },
    {
      text: "Get Institution Details",
      href: "#institutions-get-by-id",
      method: "GET",
    },
    {
      text: "Create New Institution",
      href: "#institutions-create",
      method: "POST",
    },
    {
      text: "Update Institution",
      href: "#institutions-update",
      method: "PUT",
    },
    {
      text: "Delete Institution",
      href: "#institutions-delete",
      method: "DELETE",
    },
  ],
},

  ];

  function createSidebar() {
    const sidebar = document.querySelector(".sidebar");
    const ul = document.createElement("ul");
    ul.className = "nav flex-column";

    sidebarData.forEach((section) => {
      const li = document.createElement("li");
      li.className = "nav-item";

      const a = document.createElement("a");
      a.className = "nav-link";
      a.href = `#${section.id}`;
      a.setAttribute("role", "button");
      a.setAttribute("aria-expanded", "false");
      a.setAttribute("aria-controls", section.id);
      a.addEventListener("click", function (event) {
        event.preventDefault();
        const isExpanded = a.getAttribute("aria-expanded") === "true";

        // Collapse all other sections
        document.querySelectorAll(".collapse").forEach((collapseDiv) => {
          if (collapseDiv.id !== section.id) {
            collapseDiv.classList.remove("show");
            collapseDiv.previousElementSibling.setAttribute(
              "aria-expanded",
              "false"
            );
          }
        });

        // Toggle the clicked section
        const collapseDiv = document.getElementById(section.id);
        if (isExpanded) {
          collapseDiv.classList.remove("show");
          a.setAttribute("aria-expanded", "false");
        } else {
          collapseDiv.classList.add("show");
          a.setAttribute("aria-expanded", "true");
        }
      });

      // Create and append the icon element
      const icon = document.createElement("i");
      icon.className = `fas ${section.icon} me-2 fw-bold`;
      a.appendChild(icon);

      // Append the text
      a.appendChild(document.createTextNode(section.title));

      // Create and append the icon element for collapse
      const iconDown = document.createElement("i");
      iconDown.className = `fas ${section.iconDown} ms-2 fw-bold`;
      a.appendChild(iconDown);

      const div = document.createElement("div");
      div.className = "collapse";
      div.id = section.id;

      const innerUl = document.createElement("ul");
      innerUl.className = "nav flex-column ms-3";

      section.links.forEach((link) => {
        const innerLi = document.createElement("li");
        innerLi.className = "nav-item";

        const innerA = document.createElement("a");
        innerA.className = "nav-link";
        innerA.href = link.href;

        // Split the text into method and description
        const methodText = link.text.split(" ")[0];
        const descriptionText = link.text.substring(methodText.length);

        // Create spans for method and description
        const methodSpan = document.createElement("small");
        methodSpan.className = `colors-text method-${link.method.toLowerCase()}`;
        methodSpan.textContent = methodText;

        const descriptionSpan = document.createElement("small");
        descriptionSpan.textContent = descriptionText;

        // Append spans to the link
        innerA.appendChild(methodSpan);
        innerA.appendChild(descriptionSpan);

        innerLi.appendChild(innerA);
        innerUl.appendChild(innerLi);
      });

      div.appendChild(innerUl);
      li.appendChild(a);
      li.appendChild(div);
      ul.appendChild(li);
    });

    sidebar.appendChild(ul);
  }

  createSidebar();
});

