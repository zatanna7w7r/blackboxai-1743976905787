document.addEventListener('DOMContentLoaded', function() {
    // Sidebar toggle functionality
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const collapseButton = document.getElementById('collapseButton');
    const sidebarTexts = document.querySelectorAll('.sidebar-text');
    
    let isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    
    function toggleSidebar() {
        isCollapsed = !isCollapsed;
        localStorage.setItem('sidebarCollapsed', isCollapsed);
        
        if (isCollapsed) {
            sidebar.classList.add('w-20');
            sidebar.classList.remove('w-64');
            collapseButton.innerHTML = '<i class="fas fa-chevron-right"></i>';
            sidebarTexts.forEach(text => text.classList.add('hidden'));
        } else {
            sidebar.classList.remove('w-20');
            sidebar.classList.add('w-64');
            collapseButton.innerHTML = '<i class="fas fa-chevron-left"></i>';
            sidebarTexts.forEach(text => text.classList.remove('hidden'));
        }
    }
    
    // Initialize sidebar state
    if (isCollapsed) {
        sidebar.classList.add('w-20');
        sidebar.classList.remove('w-64');
        collapseButton.innerHTML = '<i class="fas fa-chevron-right"></i>';
        sidebarTexts.forEach(text => text.classList.add('hidden'));
    }
    
    // Event listeners
    sidebarToggle.addEventListener('click', toggleSidebar);
    collapseButton.addEventListener('click', toggleSidebar);

    // Form validation for login/register
    const forms = document.querySelectorAll('form.needs-validation');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    // Rainbow hover effect for buttons
    const rainbowButtons = document.querySelectorAll('.rainbow-hover');
    rainbowButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.background = 'linear-gradient(45deg, #ff0000, #ff7f00, #ffff00, #00ff00, #0000ff, #4b0082, #9400d3)';
            this.style.backgroundSize = '400% 400%';
            this.style.animation = 'rainbow 2s ease infinite';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.background = '';
            this.style.animation = '';
        });
    });
});

// Rainbow animation
const style = document.createElement('style');
style.textContent = `
    @keyframes rainbow {
        0% { background-position: 0% 50% }
        50% { background-position: 100% 50% }
        100% { background-position: 0% 50% }
    }
`;
document.head.appendChild(style);