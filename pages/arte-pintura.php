<?php
session_start();
require_once '../config.php';
?>
<div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-purple-700 mb-6">Arte de Pintura</h2>
    
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Explora el mundo del color</h3>
        <p class="text-gray-700 mb-4">
            Sumérgete en el fascinante mundo de la pintura. Aprende diferentes técnicas, estilos y materiales
            para expresar tu creatividad a través de los colores.
        </p>
        <div class="aspect-w-16 aspect-h-9 mb-6">
            <div class="bg-gradient-to-r from-yellow-400 to-red-500 rounded-lg h-64 flex items-center justify-center">
                <i class="fas fa-paint-brush text-white text-8xl"></i>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-yellow-50 rounded-lg p-4">
                <h4 class="font-bold text-lg text-yellow-700 mb-2">Técnicas Básicas</h4>
                <p class="text-gray-700">Fundamentos de composición, mezcla de colores y pinceladas.</p>
            </div>
            <div class="bg-red-50 rounded-lg p-4">
                <h4 class="font-bold text-lg text-red-700 mb-2">Estilos Avanzados</h4>
                <p class="text-gray-700">Explora acuarela, óleo, acrílico y técnicas mixtas.</p>
            </div>
        </div>
    </div>
    
    <?php if(isset($_SESSION['user_id'])): ?>
        <div class="text-center mt-8">
            <a href="../courses/create-course.php?category=pintura" class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-full font-bold hover:shadow-lg transition-all">
                <i class="fas fa-plus mr-2"></i>Crear Curso de Pintura
            </a>
        </div>
    <?php endif; ?>
</div>