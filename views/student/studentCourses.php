<?php require_once "../views/partials/headerStudent.php" ?>

<div class="mt-10 mb-7 text-3xl text-center">
    My books
</div>
<section class="books-container mx-10 container py-4">
    <?php if (empty($courses)): ?>
        <div class="bg-yellow-100 text-yellow-700 p-4 rounded">No courses found.</div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php foreach ($courses as $course): ?>
                <div class="flex flex-col bg-white rounded-lg shadow-sm">
                    <img src="https://placehold.co/400x300" class="w-full h-auto rounded-t-lg" alt="Book cover">
                    <div class="p-4 flex flex-col flex-grow">
                        <a href="/book/details?id=<?= $course['id'] ?>" class="text-gray-800 hover:underline">
                            <h5 class="text-lg font-bold"><?= $course['title'] ?></h5>
                        </a>
                        <p class="text-gray-500 text-sm mb-1"><?= $course['category'] ?></p>
                        <div class="flex justify-between items-center text-sm text-gray-500 mb-2">
                            <small>enrolled at : <?= $course['created_at'] ?></small>
                        </div>
                        <p class="text-gray-700"><?= $course['description'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>


<?php require_once "../views/partials/footerStudent.php" ?>