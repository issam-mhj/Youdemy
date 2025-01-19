<?php require_once "../views/partials/headerAdmin.php" ?>


<div class="flex h-screen">
    <!-- Sidebar -->
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
            <a href="/managestudents" class="flex items-center px-6 py-3 bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Students
            </a>
            <a href="/statistics" class="flex items-center px-6 py-3 hover:bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Statistics
            </a>
        </nav>
    </aside>


    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        <header class="bg-white shadow">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="flex items-center">
                    <button class="md:hidden mr-4">
                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h2 class="text-xl font-semibold">Student Management</h2>
                </div>
                <div class="flex items-center">
                    <div class="relative">
                        <input
                            type="text"
                            id="searchStudent"
                            placeholder="Search students..."
                            class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <svg
                            class="w-5 h-5 absolute left-3 top-2.5 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-6">
            <!-- Enrollment Requests Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <h3 class="text-lg font-semibold mb-6">Enrollment Requests</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full" id="enrollmentTable">
                        <thead>
                            <tr class="bg-gray-50">
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Student
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Course
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Request Date
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <!-- Sample enrollment request -->
                            <?php foreach ($requests as $request): ?>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <span class="text-gray-500 font-medium"><?= $request["name"][0] ?><?= $request["name"][1] ?></span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <?= $request["name"] ?>
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    <?= $request["email"] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><?= $request["title"] ?></td>
                                    <td class="px-6 py-4"><?= $request["enrollment_date"] ?></td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-3">
                                            <a
                                                href="/managestudents/accepted?id=<?php echo $request["id"] ?>"
                                                class="text-green-600 cursor-pointer hover:text-green-900" title="accept">
                                                <svg
                                                    class="w-5 h-5"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </a>
                                            <a
                                                href="/managestudents/rejected?id=<?php echo $request["id"] ?>"
                                                class="text-red-600 cursor-pointer hover:text-red-900" title="reject">
                                                <svg
                                                    class="w-5 h-5"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    <?php endforeach ?>
                    </table>
                </div>
            </div>

            <!-- Enrolled Students Section -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Enrolled Students</h3>
                    <div class="flex items-center space-x-4">
                        <select
                            id="courseFilter"
                            class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="all">All Courses</option>
                            <option value="intro-programming">
                                Introduction to Programming
                            </option>
                            <option value="web-dev">Web Development 101</option>
                        </select>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full" id="studentsTable">
                        <thead>
                            <tr class="bg-gray-50">
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Student
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Email
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    course title
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Join Date
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <!-- Sample enrolled student -->
                            <?php foreach ($enrolled as $student) : ?>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-blue-200 flex items-center justify-center">
                                                    <span class="text-blue-600 font-medium"><?= $student["name"][0] ?><?= $student["name"][1] ?></span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <?= $student["name"] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><?= $student["email"] ?></td>
                                    <td class="px-6 py-4"><?= $student["title"] ?></td>
                                    <td class="px-6 py-4"><?= $student["enrollment_date"] ?></td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>





    <?php require_once "../views/partials/headerAdmin.php" ?>