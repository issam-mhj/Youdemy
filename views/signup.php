<?php require_once "../views/partials/header.php" ?>

<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-blue-600">Youdemy</a>
            </div>
        </div>
    </div>
</nav>

<!-- Auth Container -->
<div
    class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
        <!-- Toggle Buttons -->
        <div class="flex justify-center space-x-4 mb-8">
            <a href="/login"
                class=" bg-slate-200 px-6 py-2 rounded-lg transition duration-200">
                Se connecter
            </a>
            <button
                class="bg-blue-600 px-6 py-2 text-white rounded-lg transition duration-200">
                S'inscrire
            </button>
        </div>

        <!-- Register Form -->
        <div x-show="!isLogin" class="space-y-6">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Créer un compte</h2>
                <p class="mt-2 text-gray-600">Rejoignez la communauté Youdemy</p>
            </div>
            <form class="mt-8 space-y-6" action="/register/signup" method="POST">
                <div class="space-y-4">
                    <div>
                        <label
                            for="register-name"
                            class="block text-sm font-medium text-gray-700">Nom complet</label>
                        <input
                            id="register-name"
                            name="name"
                            type="text"
                            required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div>
                        <label
                            for="register-email"
                            class="block text-sm font-medium text-gray-700">Email</label>
                        <input
                            id="register-email"
                            name="email"
                            type="email"
                            required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div>
                        <label
                            for="register-password"
                            class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <input
                            id="register-password"
                            name="password"
                            type="password"
                            required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div>
                        <label
                            for="role"
                            class="block text-sm font-medium text-gray-700">Rôle</label>
                        <select
                            id="role"
                            name="role"
                            required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="Student">Étudiant</option>
                            <option value="Teacher">Enseignant</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center">
                    <input
                        id="terms"
                        name="terms"
                        type="checkbox"
                        required
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                    <label for="terms" class="ml-2 block text-sm text-gray-900">
                        J'accepte les
                        <a href="#" class="text-blue-600 hover:text-blue-500">conditions d'utilisation</a>
                    </label>
                </div>

                <button
                    type="submit"
                    name="registerbtn"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Créer mon compte
                </button>
            </form>
        </div>
    </div>
</div>


<?php require_once "../views/partials/footer.php" ?>