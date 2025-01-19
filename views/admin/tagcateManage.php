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
            <a href="/admin/manageusers" class="flex items-center px-6 py-3 hover:bg-blue-700">
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
            <a href="/admin/managetags" class="flex items-center px-6 py-3 bg-blue-700">
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

        <main class="flex-1 overflow-y-auto p-6">
            <!-- Categories Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Categories</h3>
                    <button id="showCategoryFormButton"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                        Add Category
                    </button>
                </div>

                <!-- Add Category Form -->
                <div id="categoryForm" class="hidden bg-gray-50 p-6 rounded-lg shadow">
                    <h4 class="text-lg font-medium mb-4">Add a New Category</h4>
                    <form action="/admin/managetags/addcategory" method="POST">
                        <div class="mb-4">
                            <label for="categoryName" class="block text-sm font-medium text-gray-700">Category Name</label>
                            <input type="text" id="categoryName" name="categoryName" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" id="cancelCategoryFormButton"
                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-200">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                                Add Category
                            </button>
                        </div>
                    </form>
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
                                    Courses
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td class="px-6 py-4"><?= $category["name"]; ?></td>
                                    <td class="px-6 py-4"><?= $category["course_count"]; ?></td>
                                    <td class="px-6 py-4">
                                        <a
                                            href="/admin/managetags/deletecat?id=<?= $category["id"]; ?>"
                                            class="text-red-600 hover:text-red-800">
                                            <svg
                                                class="w-5 h-5"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tags Section -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Tags</h3>
                    <div class="flex space-x-4">
                        <button
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200">
                            Bulk Add Tags
                        </button>
                        <button
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                            Add Tag
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div
                        class="flex items-center justify-between bg-gray-50 rounded-lg p-4">
                        <span class="font-medium">Beginner</span>
                        <button class="text-red-600 hover:text-red-800">
                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="flex items-center justify-between bg-gray-50 rounded-lg p-4">
                        <span class="font-medium">Intermediate</span>
                        <button class="text-red-600 hover:text-red-800">
                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="flex items-center justify-between bg-gray-50 rounded-lg p-4">
                        <span class="font-medium">Advanced</span>
                        <button class="text-red-600 hover:text-red-800">
                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="flex items-center justify-between bg-gray-50 rounded-lg p-4">
                        <span class="font-medium">Project-based</span>
                        <button class="text-red-600 hover:text-red-800">
                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


<script>
    const showFormButton = document.getElementById('showCategoryFormButton');
    const cancelFormButton = document.getElementById('cancelCategoryFormButton');
    const categoryForm = document.getElementById('categoryForm');

    showFormButton.addEventListener('click', () => {
        categoryForm.classList.remove('hidden');
    });

    cancelFormButton.addEventListener('click', () => {
        categoryForm.classList.add('hidden');
    });
</script>

<?php require_once "../views/partials/adminFooter.php" ?>