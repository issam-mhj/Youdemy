    <?php require_once "../views/partials/headerStudent.php" ?>

    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="space-y-8">
            <!-- Hero Section -->
            <div class="bg-white rounded-2xl shadow-sm p-8 space-y-6">
                <!-- Course Header -->
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div class="space-y-4">
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight">
                            <?= $course[0]["title"] ?>
                        </h1>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-teal-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-lg"><?= $course[0]["name"][0] ?></span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-gray-600 text-sm">Instructor</span>
                                    <a href="#" class="text-blue-600 hover:text-blue-700 font-medium"><?= $course[0]["name"] ?></a>
                                </div>
                            </div>
                            <div class="h-8 w-px bg-gray-200"></div>
                            <div class="flex flex-col">
                                <span class="text-gray-600 text-sm">Students</span>
                                <span class="font-semibold text-gray-900">9,842 enrolled</span>
                            </div>
                        </div>
                    </div>

                    <!-- Enrollment Status -->
                    <div class="mt-6 lg:mt-0 flex flex-col items-start space-y-4">
                        <div class="bg-blue-50 text-blue-700 px-6 py-3 rounded-lg">
                            <div class="text-sm">Started</div>
                            <div class="font-semibold"><?= date('M j, Y', strtotime($course[0]['created_at'])) ?></div>
                        </div>
                        <div class="flex items-center space-x-2 text-sm">
                            <span>Included with</span>
                            <span class="font-bold text-blue-600">Youdemy</span>
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-medium">PLUS</span>
                        </div>
                    </div>
                </div>

                <!-- Course Stats -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 pt-6 border-t border-gray-100">
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-gray-900">12 Modules</span>
                        <span class="text-sm text-gray-600">Comprehensive curriculum</span>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex items-center space-x-2">
                            <span class="text-lg font-bold text-gray-900">4.8</span>
                            <div class="flex">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                        </div>
                        <span class="text-sm text-gray-600">Student rating</span>
                    </div>

                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-gray-900">All Levels</span>
                        <span class="text-sm text-gray-600">Beginner friendly</span>
                    </div>

                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-gray-900">18 Hours</span>
                        <span class="text-sm text-gray-600">Self-paced learning</span>
                    </div>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="bg-white rounded-lg shadow-sm">
                <nav class="flex space-x-8 px-6">
                    <button class="px-4 py-5 text-blue-600 border-b-2 border-blue-600 font-medium">
                        Overview
                    </button>
                    <button class="px-4 py-5 text-gray-500 hover:text-gray-700 font-medium">
                        Modules
                    </button>
                    <button class="px-4 py-5 text-gray-500 hover:text-gray-700 font-medium">
                        Reviews
                    </button>
                    <button class="px-4 py-5 text-gray-500 hover:text-gray-700 font-medium">
                        Resources
                    </button>
                </nav>
            </div>

            <!-- Content Section -->
            <div class="bg-white rounded-xl shadow-sm p-8">
                <p class="text-gray-700">Course overview content goes here.</p>
            </div>
        </div>
    </div>


    <?php require_once "../views/partials/footerStudent.php" ?>