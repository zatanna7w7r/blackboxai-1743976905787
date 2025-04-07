<?php
$current_page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<aside id="sidebar" class="bg-gradient-to-b from-purple-600 to-blue-600 text-white w-64 min-h-screen transition-all duration-300 ease-in-out shadow-lg">
    <div class="p-4">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-xl font-bold whitespace-nowrap">Menú Principal</h2>
            <button id="collapseButton" class="text-white focus:outline-none">
                <i class="fas fa-chevron-left"></i>
            </button>
        </div>

        <nav>
            <ul class="space-y-2">
                <li>
                    <a href="?page=home" class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition <?php echo $current_page === 'home' ? 'bg-purple-800' : ''; ?>">
                        <i class="fas fa-home mr-3 text-lg"></i>
                        <span class="sidebar-text">Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="?page=arte-piano" class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition <?php echo $current_page === 'arte-piano' ? 'bg-purple-800' : ''; ?>">
                        <i class="fas fa-music mr-3 text-lg"></i>
                        <span class="sidebar-text">Arte en Piano</span>
                    </a>
                </li>
                <li>
                    <a href="?page=manualidades-diy" class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition <?php echo $current_page === 'manualidades-diy' ? 'bg-purple-800' : ''; ?>">
                        <i class="fas fa-puzzle-piece mr-3 text-lg"></i>
                        <span class="sidebar-text">Manualidades DIY</span>
                    </a>
                </li>
                <li>
                    <a href="?page=arte-pintura" class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition <?php echo $current_page === 'arte-pintura' ? 'bg-purple-800' : ''; ?>">
                        <i class="fas fa-paint-brush mr-3 text-lg"></i>
                        <span class="sidebar-text">Arte de Pintura</span>
                    </a>
                </li>
                <li>
                    <a href="?page=arte-dibujo" class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition <?php echo $current_page === 'arte-dibujo' ? 'bg-purple-800' : ''; ?>">
                        <i class="fas fa-pencil-alt mr-3 text-lg"></i>
                        <span class="sidebar-text">Arte en Dibujo</span>
                    </a>
                </li>

                <!-- Dynamic Courses Section -->
                <?php if(isset($_SESSION['user'])): ?>
                    <li class="mt-8 pt-4 border-t border-purple-500">
                        <h3 class="px-3 py-2 text-sm font-semibold uppercase tracking-wider sidebar-text">Mis Cursos</h3>
                        <?php
                        $courses = read_json_data(COURSES_FILE);
                        $user_courses = array_filter($courses, function($course) {
                            return $course['user_id'] === $_SESSION['user']['id'];
                        });
                        
                        foreach($user_courses as $course): ?>
                            <a href="?page=course&id=<?php echo $course['id']; ?>" class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition">
                                <i class="fas fa-book mr-3 text-lg"></i>
                                <span class="sidebar-text"><?php echo htmlspecialchars($course['title']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>