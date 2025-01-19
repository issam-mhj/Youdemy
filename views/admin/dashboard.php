<?php require_once "../views/partials/adminHeader.php" ?>

<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-blue-600 via-gray-700 to-gray-900 text-white hidden md:block">
        <div class="p-6">
            <h1 class="text-2xl font-bold">Youdemy</h1>
            <span class="px-2 py-1 text-sm rounded-full">Administrator</span>
        </div>
        <nav class="mt-6">
            <a href="#" class="flex items-center px-6 py-3 bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-6 py-3 hover:bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                User Management
            </a>
            <a href="#" class="flex items-center px-6 py-3 hover:bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Course Management
            </a>
            <a href="#" class="flex items-center px-6 py-3 hover:bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                Tags & Categories
            </a>
            <a href="#" class="flex items-center px-6 py-3 hover:bg-blue-700">
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
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h2 class="text-xl font-semibold">Admin Dashboard</h2>
                </div>
                <div class="flex items-center">
                    <button class="flex items-center space-x-3 px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 focus:ring-2 focus:ring-blue-500 transition duration-200">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white font-bold">

                            <?= $admin[0]["name"][0]; ?>
                        </div>
                        <span class="hidden md:inline text-sm font-medium text-gray-800"><?= $admin[0]["name"]; ?></span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-6">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500 text-sm">Total Users</h3>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">All</span>
                    </div>
                    <p class="text-3xl font-bold mt-2"><?= $userNum ?></p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500 text-sm">Total Courses</h3>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Active</span>
                    </div>
                    <p class="text-3xl font-bold mt-2"><?= $courseNum ?></p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500 text-sm">Pending Teachers</h3>
                        <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Review</span>
                    </div>
                    <p class="text-3xl font-bold mt-2"><?= $pendingTeachers ?></p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500 text-sm">Categories</h3>
                        <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">Active</span>
                    </div>
                    <p class="text-3xl font-bold mt-2"><?= $categoryNum ?></p>
                </div>
            </div>

            <!-- Teachers Approval Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Pending Teacher Approvals</h3>
                    <a href="#" class="text-blue-600 hover:text-blue-800">View All</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($pteachers as $teacher): ?>
                                <tr>
                                    <td class="px-6 py-4"><?php echo $teacher['name']; ?></td>
                                    <td class="px-6 py-4"><?php echo $teacher['email']; ?></td>
                                    <td class="px-6 py-4"><?php echo $teacher['created_at']; ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Top Performing Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold mb-4">last 3 Teachers</h3>
                    <div class="space-y-4">
                        <?php foreach ($lastTeachers as $teacher): ?>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold mr-3"><?php echo $teacher['name'][0]; ?></div>
                                    <div>
                                        <p class="font-medium"><?php echo $teacher['name']; ?></p>
                                    </div>
                                </div>
                                <span class="text-sm font-medium"><?= $teacher['created_at']; ?></span>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold mb-4">last three Courses</h3>
                    <div class="space-y-4">
                        <?php foreach ($lastCourses as $course): ?>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold mr-3"><?= $course['title'][0]; ?></div>
                                    <div>
                                        <p class="font-medium"><?= $course['title']; ?></p>
                                        <p class="text-sm text-gray-500"><?= $course['category']; ?></p>
                                    </div>
                                </div>
                                <span class="text-sm font-medium"><?= $course['created_at']; ?></span>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php require_once "../views/partials/adminFooter.php" ?>