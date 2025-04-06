<?php
session_start();
require_once '../config.php';

if(isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

$error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']);

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                if($remember) {
                    $token = bin2hex(random_bytes(32));
                    $expiry = time() + 86400 * 30; // 30 days
                    
                    $stmt = $conn->prepare("UPDATE users SET remember_token = :token WHERE id = :id");
                    $stmt->bindParam(':token', $token);
                    $stmt->bindParam(':id', $user['id']);
                    $stmt->execute();
                    
                    setcookie('remember', $token, $expiry, '/', '', true, true);
                }
                
                header('Location: ../index.php');
                exit;
            } else {
                $error = 'Credenciales incorrectas';
            }
        } else {
            $error = 'Credenciales incorrectas';
        }
    } catch(PDOException $e) {
        $error = 'Error al iniciar sesión';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include '../header.php'; ?>
    <title>Iniciar Sesión - El Rincón del Arte</title>
</head>
<body class="bg-gradient-to-br from-purple-50 to-blue-50">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-6 text-center">
                    <h2 class="text-2xl font-bold text-white">Iniciar Sesión</h2>
                </div>
                
                <div class="p-6">
                    <?php if($error): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Correo Electrónico</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                            <div class="invalid-feedback text-red-500 text-sm">
                                Por favor ingresa un correo electrónico válido
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 mb-2">Contraseña</label>
                            <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                            <div class="invalid-feedback text-red-500 text-sm">
                                Por favor ingresa tu contraseña
                            </div>
                        </div>
                        
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="remember" name="remember" class="mr-2">
                            <label for="remember" class="text-gray-700">Recordar mi sesión</label>
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-2 px-4 rounded-lg font-bold hover:shadow-lg transition-all">
                            Iniciar Sesión
                        </button>
                    </form>
                    
                    <div class="mt-4 text-center">
                        <a href="register.php" class="text-purple-600 hover:underline">¿No tienes cuenta? Regístrate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../scripts.js"></script>
</body>
</html>