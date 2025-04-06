<?php
session_start();
require_once '../config.php';
?>
<div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-purple-700 mb-6">Arte en Dibujo</h2>
    
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Domina el arte del trazo</h3>
        <p class="text-gray-700 mb-4">
            Desde bocetos básicos hasta ilustraciones avanzadas, aprende las técnicas fundamentales del dibujo
            y desarrolla tu estilo personal.
        </p>
        <div class="aspect-w-16 aspect-h-9 mb-6">
            <div class="bg-gradient-to-r from-pink-400 to-purple-500 rounded-lg h-64 flex items-center justify-center">
                <i class="fas fa-pencil-alt text-white text-8xl"></i>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-pink-50 rounded-lg p-4">
                <h4 class="font-bold text-lg text-pink-700 mb-2">Fundamentos del Dibujo</h4>
                <p class="text-gray-700">Perspectiva, proporciones y sombreado básico.</p>
            </div>
            <div class="bg-purple-50 rounded-lg p-4">
                <h4 class="font-bold text-lg text-purple-700 mb-2">Técnicas Especializadas</h4>
                <p class="text-gray-700">Retrato, figura humana, manga y más.</p>
            </div>
        </div>
    </div>
    
    <?php if(isset($_SESSION['user_id'])): ?>
        <div class="text-center mt-8">
            <a href="../courses/create-course.php?category=dibujo" class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-full font-bold hover:shadow-lg transition-all">
                <i class="fas fa-plus mr-2"></i>Crear Curso de Dibujo
            </a>
        </div>
    <?php endif; ?>
</div>