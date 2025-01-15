<?php require_once "../views/partials/headerStudent.php" ?>
<!-- Page Header -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-8">
    <h1 class="text-4xl font-bold text-gray-900 text-center">
        My Learning Journey
        <span class="block text-lg font-normal text-gray-500 mt-2">Your enrolled courses</span>
    </h1>
</div>

<!-- Books/Courses Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <?php if (empty($courses)): ?>
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <!-- Heroicon name: solid/exclamation -->
                    <svg class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-base text-yellow-700">
                        You haven't enrolled in any courses yet.
                        <a href="/courses" class="font-medium underline hover:text-yellow-800">Explore our courses</a>
                    </p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($courses as $course): ?>
                <div class="group bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <!-- Image Container -->
                    <div class="relative">
                        <img src="https://placehold.co/400x300"
                            class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300"
                            alt="<?= htmlspecialchars($course['title']) ?> cover">
                        <div class="absolute top-0 right-0 m-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                <?= htmlspecialchars($course['category']) ?>
                            </span>
                        </div>
                    </div>

                    <!-- Content Container -->
                    <div class="p-6">
                        <a href="/book/details?id=<?= $course['id'] ?>"
                            class="block group-hover:text-blue-600 transition-colors duration-300">
                            <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                                <?= htmlspecialchars($course['title']) ?>
                            </h2>
                        </a>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            <?= htmlspecialchars($course['description']) ?>
                        </p>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Enrolled <?= date('M j, Y', strtotime($course['created_at'])) ?></span>
                            </div>

                            <a href="/book/details?id=<?= $course['id'] ?>"
                                class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800">
                                Continue
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php require_once "../views/partials/footerStudent.php" ?>