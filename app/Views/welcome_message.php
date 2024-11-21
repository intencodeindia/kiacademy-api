<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API KI Academy</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <div class="flex-grow flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-90 text-center">
            <h1 class="text-gray-800 text-2xl font-bold mb-4">Welcome to KI Academy</h1>
            <p class="text-gray-600 mb-6">Explore our API offerings and get started with powerful integrations.</p>
            <a href="<?= base_url('docs') ?>" class="text-blue-500 hover:text-blue-700 font-semibold" target="_blank">View API Documentation</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="text-center">
            <p class="text-sm">&copy; <?= date('Y') ?> KI Academy. All rights reserved.</p>
            <p class="text-sm mt-2">
                <a href="<?= base_url('terms-and-conditions') ?>" class="text-blue-400 hover:text-blue-300" target="_blank">Terms and Conditions</a> |
                <a href="<?= base_url('privacy-policy') ?>" class="text-blue-400 hover:text-blue-300" target="_blank">Privacy Policy</a> |
                <a href="<?= base_url('docs') ?>" class="text-blue-400 hover:text-blue-300" target="_blank">Docs</a>
            </p>
            
            <?php if (isset($locationData['locationData'])): ?>
                <?php
                    $location = $locationData['locationData'];
                    $ip = htmlspecialchars($location['ip'] ?? 'N/A');
                    $city = htmlspecialchars($location['city'] ?? 'N/A');
                    $country = htmlspecialchars($location['country'] ?? 'N/A');
                    $postalCode = htmlspecialchars($location['zip'] ?? 'N/A');
                    ?>
                    <p class="text-sm mt-2">
                    <a  class="text-blue-400 hover:text-blue-300" target="_blank"><?php echo $country; ?></a>
                </p>
                    <p class="text-sm mt-2">
                    <a class="text-blue-400 hover:text-blue-300" target="_blank"><?php echo $ip; ?></a> |
                    <a  class="text-blue-400 hover:text-blue-300" target="_blank"><?php echo $city; ?></a>
                </p>
                <?php else: ?>
                    <span class="badge bg-secondary">No location data available.</span>
                <?php endif; ?>
          
        </div>
    </footer>
</body>

</html>
