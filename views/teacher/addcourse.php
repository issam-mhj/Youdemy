<?php require_once "../views/partials/headerAdmin.php" ?>


<div class="flex h-screen">
    <!-- Sidebar -->
    <aside
        class="w-64 bg-gradient-to-b from-blue-600 via-gray-700 to-gray-900 text-white hidden md:block">
        <div class="p-6">
            <h1 class="text-2xl font-bold">Youdemy</h1>
            <span class="px-2 py-1 text-sm rounded-full">Teacher</span>
        </div>
        <nav class="mt-6">
            <a href="/teacher" class="flex items-center px-6 py-3 hover:bg-blue-700">
                <svg
                    class="w-5 h-5 mr-3"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                Dashboard
            </a>
            <a href="/profCourses" class="flex items-center px-6 py-3 bg-blue-700">
                <svg
                    class="w-5 h-5 mr-3"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                My Courses
            </a>
            <a href="/managestudents" class="flex items-center px-6 py-3 hover:bg-blue-700">
                <svg
                    class="w-5 h-5 mr-3"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Students
            </a>
            <a href="#" class="flex items-center px-6 py-3 hover:bg-blue-700">
                <svg
                    class="w-5 h-5 mr-3"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Statistics
            </a>
        </nav>
    </aside>
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
                    <h2 class="text-xl font-semibold">Create New Course</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <button
                        class="flex items-center space-x-3 px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 focus:ring-2 focus:ring-blue-500 transition duration-200">
                        <div
                            class="flex items-center justify-center w-10 h-10 rounded-full bg-red-600 text-white font-bold">
                            T
                        </div>
                        <span class="hidden md:inline text-sm font-medium text-gray-800">Teacher Name</span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
            <form
                id="courseForm"
                action="/mycourses/addNewCourse"
                method="post"
                class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6">
                <div class="space-y-6">
                    <!-- Course Title -->
                    <div>
                        <label
                            for="title"
                            class="block text-sm font-medium text-gray-700">Course Title</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            required
                            class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    </div>

                    <!-- Course Description -->
                    <div>
                        <label
                            for="description"
                            class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            required
                            class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    </div>

                    <!-- Course Content -->
                    <div>
                        <label
                            for="content"
                            class="block text-sm font-medium text-gray-700">Content URL (Video or Document)</label>
                        <input
                            type="url"
                            id="content"
                            name="content"
                            required
                            class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label
                            for="duration"
                            class="block text-sm font-medium text-gray-700">duration of the course in hours</label>
                        <input
                            type="number"
                            id="duration"
                            name="duration"
                            required
                            class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    </div>

                    <!-- Course Category -->
                    <div>
                        <label
                            for="category"
                            class="block text-sm font-medium text-gray-700">Category</label>
                        <select
                            id="category"
                            name="category"
                            required
                            class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Select a category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category["name"] ?>"><?= $category["name"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <!-- Course Tags -->
                    <div>
                        <label
                            for="tags"
                            class="block text-sm font-medium text-gray-700">Tags</label>
                        <div class="mt-1 flex flex-wrap gap-2" id="selectedTags"></div>
                        <input
                            type="text"
                            id="tags"
                            name="tags"
                            class="mt-2 block w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Type a tag and press Enter" />
                    </div>
                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                            Create Course
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>

<script>
    const tagsInput = document.getElementById("tags");
    const selectedTagsContainer = document.getElementById("selectedTags");
    const tags = new Set();

    tagsInput.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
            e.preventDefault();
            const tag = tagsInput.value.trim();
            if (tag && !tags.has(tag)) {
                tags.add(tag);
                renderTag(tag);
                tagsInput.value = "";
            }
        }
    });

    function renderTag(tag) {
        const tagElement = document.createElement("span");
        tagElement.className =
            "inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800";
        tagElement.innerHTML = `
                ${tag}
                <button type="button" class="ml-2 focus:outline-none" onclick="removeTag('${tag}')">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;
        selectedTagsContainer.appendChild(tagElement);
    }

    function removeTag(tag) {
        tags.delete(tag);
        renderTags();
    }

    function renderTags() {
        selectedTagsContainer.innerHTML = "";
        tags.forEach(renderTag);
    }
</script>

<?php require_once "../views/partials/headerAdmin.php" ?>