<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="flex items-center justify-center min-h-screen">
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <p class="text-base text-lg font-semibold text-indigo-600">404</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Page not found</h1>
            <p class="mt-6 text-base leading-7 text-gray-600"><code id="not-found-url" class="bg-gray-100 text-gray-700 px-2 py-1 rounded"></code></p>
            <p class="mt-6 text-base leading-7 text-gray-600">Sorry, we couldn’t find the page you’re looking for.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <!-- <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go back home</a> -->
                <a href="<?= base_url('docs') ?>" class="text-sm font-semibold text-gray-900">View API Docs <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </main>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentLocation = window.location.href; // Use href to get the full URL
            console.log('Current Location:', currentLocation); // Debugging line

            let urlElement = document.getElementById('not-found-url');
            if (urlElement) {
                urlElement.textContent = currentLocation;
            } else {
                console.error('Element with ID not-found-url not found.');
            }
        });
    </script>

</body>

</html>
