<header class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 text-white shadow-lg">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <button id="sidebarToggle" class="text-white focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
            <h1 class="text-2xl font-bold">El Rincón del Arte</h1>
        </div>
        
        <div class="flex items-center space-x-6">
            <a href="?page=create-course" class="bg-white text-purple-600 px-4 py-2 rounded-full font-semibold hover:bg-purple-100 transition">
                <i class="fas fa-plus mr-2"></i>Crear Curso
            </a>
            
            <?php if(isset($_SESSION['user_id'])): ?>
                <div class="relative group">
                    <button class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-purple-600 font-bold">
                            <?php 
                            $username = $_SESSION['username'];
                            echo strtoupper(substr($username, 0, 1)); 
                            ?>
                        </div>
                        <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Mi Perfil</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Mis Cursos</a>
                        <a href="auth/logout.php" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Cerrar Sesión</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="auth/login.php" class="bg-white text-purple-600 px-4 py-2 rounded-full font-semibold hover:bg-purple-100 transition">
                    <i class="fas fa-user mr-2"></i>Iniciar Sesión
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>