<?php
session_start();
require_once '../config.php';
?>
<div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-purple-700 mb-6">Manualidades DIY</h2>
    
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Libera tu creatividad</h3>
        <p class="text-gray-700 mb-4">
            Descubre proyectos creativos que puedes hacer con tus propias manos. Desde decoración del hogar hasta regalos personalizados,
            nuestras guías paso a paso te ayudarán a crear obras únicas.
        </p>
        <div class="aspect-w-16 aspect-h-9 mb-6">
            <div class="bg-gradient-to-r from-green-400 to-blue-500 rounded-lg h-64 flex items-center justify-center">
                <i class="fas fa-puzzle-piece text-white text-8xl"></i>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-green-50 rounded-lg p-4">
                <h4 class="font-bold text-lg text-green-700 mb-2">Proyectos para Principiantes</h4>
                <p class="text-gray-700">Ideas sencillas para empezar en el mundo de las manualidades.</p>
            </div>
            <div class="bg-blue-50 rounded-lg p-4">
                <h4 class="font-bold text-lg text-blue-700 mb-2">Técnicas Avanzadas</h4>
                <p class="text-gray-700">Proyectos más complejos para quienes buscan un desafío.</p>
            </div>
        </div>
    </div>
    
    <?php if(isset($_SESSION['user_id'])): ?>
        <div class="text-center mt-8">
            <a href="../courses/create-course.php?category=diy" class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-full font-bold hover:shadow-lg transition-all">
                <i class="fas fa-plus mr-2"></i>Crear Curso de Manualidades
            </a>
        </div>
    <?php endif; ?>
</div>