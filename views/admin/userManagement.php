<?php require_once "../views/partials/adminHeader.php" ?>

<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-blue-600 via-gray-700 to-gray-900 text-white hidden md:block">
        <div class="p-6">
            <h1 class="text-2xl font-bold">Youdemy</h1>
            <span class="px-2 py-1 text-sm rounded-full">Administrator</span>
        </div>
        <nav class="mt-6">
            <a href="/admin" class="flex items-center px-6 py-3 hover:bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                Dashboard
            </a>
            <a href="/admin/manageusers" class="flex items-center px-6 py-3 bg-blue-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                User Management
            </a>
            <a href="/admin/managecourses" class="flex items-center px-6 py-3 hover:bg-blue-700">
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
        <header class="bg-white shadow">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="flex items-center">
                    <button class="md:hidden mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h2 class="text-xl font-semibold">User Management</h2>
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
            <!-- Pending Teacher Approvals -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Pending Teacher Approvals</h3>
                    <span
                        class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Requires Action</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Email
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Registration Date
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($pteachers as $teacher): ?>
                                <tr>
                                    <td class="px-6 py-4"><?= $teacher["name"]; ?></td>
                                    <td class="px-6 py-4"><?= $teacher["email"]; ?></td>
                                    <td class="px-6 py-4"><?= $teacher["created_at"]; ?></td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <a
                                                href='/admin/manageusers/approved?id=<?= $teacher["id"]; ?>'
                                                class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                                Approve
                                            </a>
                                            <a
                                                href='/admin/manageusers/rejected?id=<?= $teacher["id"]; ?>'
                                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                Reject
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- User Management Section -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">All Users</h3>
                    <div class="flex space-x-4">
                        <select class="px-4 py-2 border rounded-lg bg-gray-50">
                            <option>All Roles</option>
                            <option>Students</option>
                            <option>Teachers</option>
                            <option>Admins</option>
                        </select>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Email
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Role
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Status
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($allUsers as $user): ?>
                                <tr>
                                    <td class="px-6 py-4"><?= $user['name'] ?></td>
                                    <td class="px-6 py-4"><?= $user['email'] ?></td>
                                    <td class="px-6 py-4">
                                        <?php if ($user['role'] === "Student") { ?>
                                            <span
                                                class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Student
                                            </span>
                                        <?php } elseif ($user['role'] === "Teacher") { ?>
                                            <span
                                                class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full text-xs">Teacher
                                            </span>
                                        <?php } elseif ($user['role'] === "Admin") { ?>
                                            <span
                                                class="px-2 py-1 bg-yellow-400 text-black rounded-full text-xs">Admin
                                            </span>
                                        <?php } ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php if ($user['role'] === "Teacher" && $user['is_approved'] === 0) { ?>
                                            <span
                                                class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Not Active
                                            </span>
                                        <?php } else { ?>
                                            <span
                                                class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Active
                                            </span>
                                        <?php } ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php if ($user['role'] === "Teacher" && $user['is_approved'] === 0) { ?>
                                            <div class="flex space-x-2">
                                                <a
                                                    href='/admin/manageusers/approved?id=<?= $user["id"]; ?>'
                                                    class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                                    Approve
                                                </a>
                                                <a
                                                    href='/admin/manageusers/rejected?id=<?= $user["id"]; ?>'
                                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                    Remove
                                                </a>
                                            </div>
                                        <?php } elseif ($user['role'] === "Teacher" && $user['is_approved'] === 1) { ?>
                                            <div class="flex space-x-2">
                                                <a
                                                    href='/admin/manageusers/suspend?id=<?= $user["id"]; ?>'
                                                    class="px-3 py-1 bg-orange-500 text-white rounded hover:bg-orange-600">
                                                    suspend
                                                </a>
                                                <a
                                                    href='/admin/manageusers/rejected?id=<?= $user["id"]; ?>'
                                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                    Remove
                                                </a>
                                            </div>
                                        <?php } elseif ($user['role'] === "Student") { ?>
                                            <div class="ml-12 space-x-2">
                                                <a
                                                    href='/admin/manageusers/rejected?id=<?= $user["id"]; ?>'
                                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                    Remove
                                                </a>
                                            </div>
                                        <?php } ?>
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

<?php require_once "../views/partials/adminFooter.php" ?>