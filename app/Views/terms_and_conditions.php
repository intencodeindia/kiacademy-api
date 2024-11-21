<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions - KI Academy</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <div class="flex-grow">
        <div class="bg-white p-8 rounded-lg w-full max-w-7xl mx-auto mt-10 mb-3">
            <h1 class="text-gray-800 text-3xl font-bold mb-6">Terms and Conditions</h1>
            <p class="text-gray-600 mb-4">
                Welcome to KI Academy. These terms and conditions outline the rules and regulations for the use of KI Academy's website and services. By accessing or using our website, you agree to comply with and be bound by these terms. If you do not agree with these terms, you should not use our website.
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">1. Introduction</h2>
            <p class="text-gray-600 mb-4">
                These Terms and Conditions govern your use of our website and services. We may update these terms from time to time, and your continued use of our services will signify your acceptance of any changes. We encourage you to review these terms periodically to stay informed of any updates.
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">2. Use of the Site</h2>
            <p class="text-gray-600 mb-4">
                You must be at least 18 years old to use our website. You agree to use the site for lawful purposes only and in a way that does not infringe upon the rights of others or restrict their use and enjoyment of the site. Prohibited activities include, but are not limited to, transmitting harmful or illegal content, violating privacy rights, and engaging in fraudulent behavior.
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">3. Intellectual Property</h2>
            <p class="text-gray-600 mb-4">
                All content on our website, including but not limited to text, graphics, logos, and software, is the property of KI Academy or its content suppliers and is protected by intellectual property laws. You may not reproduce, distribute, or otherwise use any content from our site without obtaining prior written permission from us.
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">4. Limitation of Liability</h2>
            <p class="text-gray-600 mb-4">
                KI Academy will not be liable for any direct, indirect, incidental, or consequential damages arising from your use of the site or inability to use the site. This includes damages for loss of profits, goodwill, data, or other intangible losses, even if we have been advised of the possibility of such damages.
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">5. Account Security</h2>
            <p class="text-gray-600 mb-4">
                You are responsible for maintaining the confidentiality of your account and password and for all activities that occur under your account. You agree to notify us immediately of any unauthorized use of your account or any other breach of security. We will not be liable for any loss or damage arising from your failure to protect your account information.
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">6. Termination</h2>
            <p class="text-gray-600 mb-4">
                We reserve the right to terminate or suspend your access to our website at any time, with or without cause or notice, if we believe you have violated these terms or engaged in behavior that could harm us or other users. Upon termination, your right to use the site will cease immediately.
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">7. Governing Law</h2>
            <p class="text-gray-600 mb-4">
                These Terms and Conditions are governed by and construed in accordance with the laws of the jurisdiction in which KI Academy operates. Any disputes arising from these terms or your use of the site will be subject to the exclusive jurisdiction of the courts in that jurisdiction.
            </p>
            <h2 class="text-gray-800 text-2xl font-semibold mt-4 mb-2">8. Contact Us</h2>
            <p class="text-gray-600 mb-4">
                If you have any questions about these Terms and Conditions, please <a href="<?= base_url('contact') ?>" class="text-blue-500 hover:text-blue-700">contact us</a>. We are here to assist you with any inquiries or concerns you may have.
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
