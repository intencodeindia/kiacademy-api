<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script>
        $(document).ready(function() {
            const $form = $('form');
            const $messageContainer = $('#message');
            const $loginForm = $('#login-form');
            const $logoutButton = $('#logout-button');
            const $userInfo = $('#user-info');

            // Function to check if the user is logged in
            const checkLoginStatus = () => {
                const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
                if (isLoggedIn) {
                    $loginForm.hide();
                    $logoutButton.show();
                    const userId = localStorage.getItem('user_id');
                    const email = localStorage.getItem('email');
                    $userInfo.text(`Logged in as ${email} (User ID: ${userId})`);
                } else {
                    $loginForm.show();
                    $logoutButton.hide();
                    $userInfo.text('');
                }
            };

            // Check login status on page load
            checkLoginStatus();

            $form.on('submit', function(event) {
                event.preventDefault();

                const formData = $form.serialize(); // Serialize form data

                $.ajax({
                    url: '<?= base_url() ?>api/auth/login', // Replace with your endpoint
                    method: 'POST',
                    data: formData,
                    success: function(result) {
                        if (result.status === 200) {
                            // Save user data to localStorage
                            localStorage.setItem('isLoggedIn', 'true');
                            localStorage.setItem('user_id', result.data.user_id);
                            localStorage.setItem('email', result.data.email);

                            // Update UI
                            $loginForm.hide();
                            $logoutButton.show();
                            $userInfo.text(`Logged in as ${result.data.email} (User ID: ${result.data.user_id})`);

                            $messageContainer.html(`<p class="text-green-500">${result.message}</p>`);
                        } else {
                            // Error response
                            $messageContainer.html(`<p class="text-red-500">${result.message || 'Login failed'}</p>`);
                        }
                    },
                    error: function(xhr) {
                        // Handle AJAX errors
                        $messageContainer.html(`<p class="text-red-500">An error occurred: ${xhr.statusText}</p>`);
                    }
                });
            });

            $logoutButton.on('click', function() {
                $.ajax({
                    url: '<?= base_url() ?>api/auth/logout', // Replace with your endpoint
                    method: 'GET',
                    success: function(result) {
                        if (result.status === 200) {
                            // Clear localStorage
                            localStorage.removeItem('isLoggedIn');
                            localStorage.removeItem('user_id');
                            localStorage.removeItem('email');

                            // Update UI
                            $loginForm.show();
                            $logoutButton.hide();
                            $userInfo.text('');

                            $messageContainer.html(`<p class="text-green-500">${result.message}</p>`);
                        } else {
                            // Error response
                            $messageContainer.html(`<p class="text-red-500">${result.message || 'Logout failed'}</p>`);
                        }
                    },
                    error: function(xhr) {
                        // Handle AJAX errors
                        $messageContainer.html(`<p class="text-red-500">An error occurred: ${xhr.statusText}</p>`);
                    }
                });
            });
        });
    </script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Login</h1>

        <div id="login-form">
            <form>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit"
                    class="w-full py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Log In
                </button>
            </form>
        </div>

        <button id="logout-button" class="w-full py-3 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500" style="display: none;">
            Log Out
        </button>

        <div id="user-info" class="mt-4"></div>
        <div id="message" class="mt-4"></div>
    </div>

</body>

</html>
