<?php require_once "../views/partials/headerStudent.php" ?>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Apprenez à votre rythme</h1>
            <p class="text-xl mb-8">
                Des milliers de cours en ligne pour développer vos compétences
            </p>
        </div>
    </div>
</div>

<!-- Courses Section -->
<div class="max-w-7xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold mb-8">Our Courses </h2>
    <br>
    <form method="GET" class="mb-8">
        <div class="max-w-xl mx-auto flex gap-4">
            <input
                type="text"
                name="search"
                placeholder="Search courses..."
                class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button
                type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Search
            </button>
        </div>
    </form>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Course Card Template -->
        <?php foreach ($courses as $course) : ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img
                    src="/api/placeholder/400/200"
                    alt="Course thumbnail"
                    class="w-full h-48 object-cover" />
                <div class="p-6">
                    <span class="text-sm text-blue-600 font-semibold"><?= $course["category"] ?></span>
                    <h3 class="text-xl font-bold mt-2"><?= $course["title"] ?></h3>
                    <p class="text-gray-600 mt-2">
                        <?= $course["description"] ?>
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-gray-700">Par <?php
                                                        foreach ($teachers as $teacher) {
                                                            if ($teacher["id"] == $course["teacher_id"]) {
                                                                echo $teacher["name"];
                                                            }
                                                        }
                                                        ?></span>
                        <?php if (!isset($_SESSION['user'])): ?>
                            <a href="/login"
                                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                                sign in to enroll
                            </a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user'])): ?>
                            <?php
                            $isEnrolled = 0;
                            foreach ($myCourses as $mycourse) {
                                if ($mycourse["course_id"] == $course["id"] && $mycourse["is_approved"] === 1) {
                                    $isEnrolled = 1;
                                    break;
                                } elseif ($mycourse["course_id"] == $course["id"] && $mycourse["is_approved"] == 0) {
                                    $isEnrolled = 2;
                                    break;
                                }
                            }

                            if ($isEnrolled == 1) {
                                echo '<div class="px-4 py-2 bg-green-600 text-white font-bold rounded-lg transition">Enrolled</div>';
                            } elseif ($isEnrolled == 0) {
                                echo '<a href="/enrolled?id=' . $course["id"] . '" class="px-4 py-2 bg-blue-600 text-white font-bold rounded-lg transition">Enroll</a>';
                            } else {
                                echo '<a class="px-4 py-2 bg-yellow-600 text-white font-bold rounded-lg transition">pending</a>';
                            }
                            ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-12 space-x-2">
        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">
            Précédent
        </button>
        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">1</button>
        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">2</button>
        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">3</button>
        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">
            Suivant
        </button>
    </div>
</div>

<?php require_once "../views/partials/footerStudent.php" ?>