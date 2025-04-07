<?php
require_once '../config.php';

if(!isset($_SESSION['user'])) {
    header('Location: ../auth/login.php');
    exit;
}

$error = '';
$success = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $content = trim($_POST['content']);
    
    if(empty($title) || empty($description) || empty($content)) {
        $error = 'Todos los campos son requeridos';
    } else {
        $courses = read_json_data(COURSES_FILE);
        
        $new_course = [
            'id' => uniqid(),
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'user_id' => $_SESSION['user']['id'],
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $courses[] = $new_course;
        save_json_data(COURSES_FILE, $courses);
        
        $success = 'Curso creado exitosamente! Serás redirigido...';
        header("Refresh: 2; url=../index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include '../header.php'; ?>
    <title>Crear Curso - El Rincón del Arte</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#courseContent',
            plugins: 'link lists code',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist | link code',
            menubar: false,
            height: 300
        });
    </script>
</head>
<body class="bg-gradient-to-br from-purple-50 to-blue-50">
    <?php include '../header.php'; ?>
    <div class="flex min-h-screen">
        <?php include '../sidebar.php'; ?>
        <main class="flex-1 p-8">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-purple-700 mb-6">Crear Nuevo Curso</h2>
                
                <?php if($error): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <?php if($success): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" class="bg-white rounded-xl shadow-lg p-6">
                    <div class="mb-6">
                        <label for="title" class="block text-gray-700 font-medium mb-2">Título del Curso</label>
                        <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="description" class="block text-gray-700 font-medium mb-2">Descripción</label>
                        <textarea id="description" name="description" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required></textarea>
                    </div>
                    
                    <div class="mb-6">
                        <label for="courseContent" class="block text-gray-700 font-medium mb-2">Contenido del Curso</label>
                        <textarea id="courseContent" name="content" class="w-full"></textarea>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-2 rounded-lg font-bold hover:shadow-lg transition-all">
                            Publicar Curso
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <?php include '../footer.php'; ?>
    <script src="../scripts.js"></script>
</body>
</html>