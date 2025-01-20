<?php require_once "../views/partials/headerAdmin.php" ?>
<div class="flex h-screen">
    <!-- Sidebar (keeping your existing sidebar) -->
    <aside class="w-64 bg-gradient-to-b from-blue-600 via-gray-700 to-gray-900 text-white hidden md:block">
        <div class="p-6">
            <h1 class="text-2xl font-bold">Youdemy</h1>
            <span class="px-2 py-1 text-sm rounded-full">Teacher</span>
        </div>
        <nav class="mt-6">
            <a href="/teacher" class="flex items-center px-6 py-3 hover:bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                Dashboard
            </a>
            <a href="/profCourses" class="flex items-center px-6 py-3 hover:bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                My Courses
            </a>
            <a href="/managestudents" class="flex items-center px-6 py-3 hover:bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Students
            </a>
            <a href="/statistics" class="flex items-center px-6 py-3 bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Statistics
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="px-6 py-4">
                <h2 class="text-xl font-semibold">Course Statistics</h2>
            </div>
        </header>

        <!-- Statistics Content -->
        <main class="flex-1 overflow-y-auto p-6">
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Students Card -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-500 text-sm">Total Students</h3>
                        <span class="p-2 bg-blue-100 rounded-full">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                    </div>
                    <p class="text-3xl font-bold"><?php echo $num; ?></p>
                    <p class="text-sm text-gray-500 mt-2">Across all courses</p>
                </div>

                <!-- Average Students per Course -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-500 text-sm">Avg. Students per Course</h3>
                        <span class="p-2 bg-green-100 rounded-full">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </span>
                    </div>
                    <p class="text-3xl font-bold"><?php echo round($avg, 2); ?></p>
                    <p class="text-sm text-gray-500 mt-2">Students per course average</p>
                </div>

                <!-- Total Courses -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-500 text-sm">Total Courses</h3>
                        <span class="p-2 bg-purple-100 rounded-full">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </span>
                    </div>
                    <p class="text-3xl font-bold"><?php echo $courses; ?></p>
                    <p class="text-sm text-gray-500 mt-2">Active courses</p>
                </div>
            </div>

            <!-- Course Distribution -->
            <!-- Course Statistics Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <?php foreach ($mycourses as $mycourse): ?>
                    <!-- Individual Course Card -->
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-300">
                        <!-- Card Header -->
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">
                                <?php echo $mycourse['title']; ?>
                            </h3>
                            <span class="inline-flex items-center justify-center px-4 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-medium">
                                <?php echo $mycourse['studentsNumber']; ?> students
                            </span>
                        </div>

                        <!-- Progress Section -->
                        <div class="space-y-3">
                            <div class="flex items-center justify-between text-sm text-gray-600">
                                <span>Course Enrollment</span>
                                <span class="font-medium">
                                    <?php echo round(($mycourse['studentsNumber'] / $courses) * 100, 1); ?>%
                                </span>
                            </div>

                            <!-- Progress Bar -->
                            <div class="relative pt-1">
                                <div class="overflow-hidden h-3 bg-gray-200 rounded-full">
                                    <div
                                        class="bg-gradient-to-r from-blue-500 to-blue-600 h-full rounded-full transition-all duration-500 ease-out"
                                        style="width: <?php echo ($mycourse['studentsNumber'] / $courses) * 100 ?>%">
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Stats -->
                            <div class="flex justify-between items-center mt-4 pt-3 border-t border-gray-100">
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Total Capacity</p>
                                    <p class="text-sm font-semibold mt-1"><?php echo $courses; ?></p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Current Students</p>
                                    <p class="text-sm font-semibold mt-1"><?php echo $mycourse['studentsNumber']; ?></p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Available Spots</p>
                                    <p class="text-sm font-semibold mt-1"><?php echo $courses - $mycourse['studentsNumber']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-6">Recent Enrollments</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Course</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <!-- Enrollment Row -->
                            <?php foreach ($lastEnrolled as $enroll): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?php echo $enroll['name']; ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?php echo $enroll['title']; ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500"><?php echo $enroll['enrollment_date']; ?></div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>


<?php require_once "../views/partials/headerAdmin.php" ?>