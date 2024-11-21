<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - KI Academy</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <div class="flex-grow">
        <div class="bg-white p-8 rounded-lg w-full max-w-7xl mx-auto mt-10 mb-3">
            <h1 class="text-gray-800 text-3xl font-bold mb-6">Privacy Policy</h1>
            <p class="text-gray-600 mb-4">
                Welcome to KI Academy. We are committed to protecting your privacy and ensuring a safe online experience. This Privacy Policy outlines how we collect, use, and safeguard your information when you visit our website or use our services.
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">1. Information We Collect</h2>
            <p class="text-gray-600 mb-4">
                We may collect and process the following types of information:
            <ul class="list-disc list-inside ml-6 text-gray-600 mb-4">
                <li><strong>Personal Information:</strong> Information such as your name, email address, phone number, and any other details you provide when registering or contacting us.</li>
                <li><strong>Usage Data:</strong> Information about how you use our website, including your IP address, browser type, referring pages, and time spent on pages.</li>
                <li><strong>Cookies:</strong> Small data files that are placed on your device to enhance your experience on our site. Cookies help us understand how you use our site and remember your preferences.</li>
            </ul>
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">2. How We Use Your Information</h2>
            <p class="text-gray-600 mb-4">
                We use the information we collect for the following purposes:
            <ul class="list-disc list-inside ml-6 text-gray-600 mb-4">
                <li><strong>To Provide and Improve Services:</strong> To deliver the services you request and improve our website's functionality.</li>
                <li><strong>To Communicate:</strong> To send you updates, newsletters, and other information related to our services.</li>
                <li><strong>To Analyze Usage:</strong> To understand how users interact with our site and to make data-driven improvements.</li>
                <li><strong>To Ensure Security:</strong> To detect, prevent, and address technical issues and security threats.</li>
            </ul>
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">3. How We Share Your Information</h2>
            <p class="text-gray-600 mb-4">
                We do not sell or rent your personal information to third parties. We may share your information in the following circumstances:
            <ul class="list-disc list-inside ml-6 text-gray-600 mb-4">
                <li><strong>With Service Providers:</strong> We may share your information with third-party service providers who assist us in operating our site and providing services, under strict confidentiality agreements.</li>
                <li><strong>For Legal Reasons:</strong> We may disclose your information if required to do so by law or in response to legal processes or governmental requests.</li>
                <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, or sale of assets, your information may be transferred to the new entity.</li>
            </ul>
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">4. Your Rights and Choices</h2>
            <p class="text-gray-600 mb-4">
                You have the following rights regarding your information:
            <ul class="list-disc list-inside ml-6 text-gray-600 mb-4">
                <li><strong>Access and Correction:</strong> You can access and update your personal information by contacting us.</li>
                <li><strong>Opt-Out:</strong> You can opt-out of receiving marketing communications from us by following the unsubscribe instructions in those communications.</li>
                <li><strong>Cookie Management:</strong> You can manage cookie preferences through your browser settings. Note that disabling cookies may affect your ability to use certain features of our site.</li>
            </ul>
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">5. Data Security</h2>
            <p class="text-gray-600 mb-4">
                We take reasonable measures to protect your information from unauthorized access, alteration, disclosure, or destruction. However, no data transmission over the internet or electronic storage method is 100% secure. We cannot guarantee absolute security but strive to maintain a secure environment.
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">6. Changes to This Privacy Policy</h2>
            <p class="text-gray-600 mb-4">
                We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated effective date. Your continued use of our site following any changes constitutes your acceptance of the new terms.
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">7. Contact Us</h2>
            <p class="text-gray-600 mb-4">
                If you have any questions or concerns about this Privacy Policy or our data practices, please <a href="<?= base_url('contact') ?>" class="text-blue-500 hover:text-blue-700">contact us</a>. We are committed to addressing your inquiries and resolving any issues.
            </p>
        </div>
    </div>
    <footer class="bg-gray-800 text-white py-4">
        <div class="text-center">
            <p class="text-sm">&copy; <?= date('Y') ?> KI Academy. All rights reserved.</p>
            <p class="text-sm mt-2">
                <a href="<?= base_url('terms-and-conditions') ?>" class="text-blue-400 hover:text-blue-300" target="_blank">Terms and Conditions</a> |
                <a href="<?= base_url('privacy-policy') ?>" class="text-blue-400 hover:text-blue-300" target="_blank">Privacy Policy</a> |
                <a href="<?= base_url('docs') ?>" class="text-blue-400 hover:text-blue-300" target="_blank">Docs</a>
            </p>
        </div>
    </footer>
</body>

</html>
