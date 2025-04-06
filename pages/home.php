<div class="container mx-auto">
    <h2 class="text-3xl font-bold mb-8 text-purple-700">Bienvenido a El Rincón del Arte</h2>
    <p class="text-lg mb-12 text-gray-700">Explora nuestras diferentes categorías artísticas y descubre tu creatividad.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Arte en Piano Card -->
        <a href="?page=arte-piano" class="group">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                <div class="h-48 bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center">
                    <i class="fas fa-music text-white text-6xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Arte en Piano</h3>
                    <p class="text-gray-600">Descubre el arte de la música y el piano.</p>
                </div>
            </div>
        </a>

        <!-- Manualidades DIY Card -->
        <a href="?page=manualidades-diy" class="group">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                <div class="h-48 bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center">
                    <i class="fas fa-puzzle-piece text-white text-6xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Manualidades DIY</h3>
                    <p class="text-gray-600">Proyectos creativos para hacer con tus manos.</p>
                </div>
            </div>
        </a>

        <!-- Arte de Pintura Card -->
        <a href="?page=arte-pintura" class="group">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                <div class="h-48 bg-gradient-to-r from-yellow-400 to-red-500 flex items-center justify-center">
                    <i class="fas fa-paint-brush text-white text-6xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Arte de Pintura</h3>
                    <p class="text-gray-600">Explora técnicas y estilos de pintura.</p>
                </div>
            </div>
        </a>

        <!-- Arte en Dibujo Card -->
        <a href="?page=arte-dibujo" class="group">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                <div class="h-48 bg-gradient-to-r from-pink-400 to-purple-500 flex items-center justify-center">
                    <i class="fas fa-pencil-alt text-white text-6xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Arte en Dibujo</h3>
                    <p class="text-gray-600">Aprende y mejora tus habilidades de dibujo.</p>
                </div>
            </div>
        </a>
    </div>

    <?php if(!isset($_SESSION['user_id'])): ?>
        <div class="mt-16 text-center">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">¿Quieres crear tus propios cursos?</h3>
            <a href="auth/register.php" class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 text-white px-8 py-3 rounded-full font-bold hover:shadow-lg transition-all">
                Regístrate ahora
            </a>
        </div>
    <?php endif; ?>
</div>