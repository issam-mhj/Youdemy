<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/output.css">
    <title>YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-blue-600">Youdemy</a>
                </div>

                <div class="flex items-center space-x-4">
                    <?php if (!isset($_SESSION['user'])): ?>
                        <a href="/register"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Join for free
                        </a>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="/mycourses"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            MyCourses
                        </a>
                        <a href="/logout" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">
                            sign out
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </nav>