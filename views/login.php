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
            <button
                class="px-6 bg-blue-600 text-white py-2 rounded-lg transition duration-200">
                Se connecter
            </button>
            <a href="/register"
                class="px-6 py-2 bg-slate-200 rounded-lg transition duration-200">
                S'inscrire
            </a>
        </div>

        <!-- Login Form -->
        <div x-show="isLogin" class="space-y-6">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Connexion</h2>
                <p class="mt-2 text-gray-600">Accédez à votre compte Youdemy</p>
            </div>
            <form class="mt-8 space-y-6" action="/login/signin" method="post">
                <div class="space-y-4">
                    <div>
                        <label
                            for="login-email"
                            class="block text-sm font-medium text-gray-700">Email</label>
                        <input
                            id="login-email"
                            name="email"
                            type="email"
                            required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div>
                        <label
                            for="login-password"
                            class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <input
                            id="login-password"
                            name="password"
                            type="password"
                            required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            id="remember-me"
                            name="remember-me"
                            type="checkbox"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                        <label
                            for="remember-me"
                            class="ml-2 block text-sm text-gray-900">
                            Se souvenir de moi
                        </label>
                    </div>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-500">
                        Mot de passe oublié?
                    </a>
                </div>

                <button
                    type="submit"
                    name="valid"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Se connecter
                </button>
            </form>
        </div>


        <?php require_once "../views/partials/footer.php" ?>