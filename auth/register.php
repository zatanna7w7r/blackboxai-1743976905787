<?php
session_start();
require_once '../config.php';

if(isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

$error = '';
$success = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $role = 'user'; // Default role

    // Validate passwords match
    if($password !== $confirm_password) {
        $error = 'Las contraseñas no coinciden';
    } else {
        try {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            if($stmt->rowCount() > 0) {
                $error = 'Este correo electrónico ya está registrado';
            } else {
                // Check if username already exists
                $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username");
                $stmt->bindParam(':username', $username);
                $stmt->execute();
                
                if($stmt->rowCount() > 0) {
                    $error = 'Este nombre de usuario ya está en uso';
                } else {
                    // Hash password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    
                    // Insert new user
                    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)");
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':password', $hashed_password);
                    $stmt->bindParam(':role', $role);
                    $stmt->execute();
                    
                    $success = 'Registro exitoso. Redirigiendo...';
                    
                    // Auto-login after registration
                    $user_id = $conn->lastInsertId();
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = $role;
                    
                    // Redirect after 2 seconds
                    header("Refresh: 2; url=../index.php");
                }
            }
        } catch(PDOException $e) {
            $error = 'Error al registrar el usuario: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include '../header.php'; ?>
    <title>Registro - El Rincón del Arte</title>
</head>
<body class="bg-gradient-to-br from-purple-50 to-blue-50">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-6 text-center">
                    <h2 class="text-2xl font-bold text-white">Crear Cuenta</h2>
                </div>
                
                <div class="p-6">
                    <?php if($error): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if($success): ?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            <?php echo $success; ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="username" class="block text-gray-700 mb-2">Nombre de Usuario</label>
                            <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required minlength="3">
                            <div class="invalid-feedback text-red-500 text-sm">
                                Por favor ingresa un nombre de usuario válido (mínimo 3 caracteres)
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Correo Electrónico</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                            <div class="invalid-feedback text-red-500 text-sm">
                                Por favor ingresa un correo electrónico válido
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 mb-2">Contraseña</label>
                            <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required minlength="6">
                            <div class="invalid-feedback text-red-500 text-sm">
                                La contraseña debe tener al menos 6 caracteres
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="confirm_password" class="block text-gray-700 mb-2">Confirmar Contraseña</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                            <div class="invalid-feedback text-red-500 text-sm">
                                Por favor confirma tu contraseña
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-2 px-4 rounded-lg font-bold hover:shadow-lg transition-all">
                            Registrarse
                        </button>
                    </form>
                    
                    <div class="mt-4 text-center">
                        <a href="login.php" class="text-purple-600 hover:underline">¿Ya tienes cuenta? Inicia Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../scripts.js"></script>
</body>
</html>