
Built by https://www.blackbox.ai

---

# El Rincón del Arte

## Project Overview
El Rincón del Arte is a web application designed to provide a platform for users to explore, create, and share artistic content. It allows users to create courses covering various artistic disciplines, including piano, DIY crafts, painting, and drawing. The app incorporates a dynamic sidebar navigation, user authentication, and a responsive design using Tailwind CSS.

## Installation

### Prerequisites
To run this project, ensure you have the following installed:
- PHP (version 7.4 or higher)
- MySQL (version 5.7 or higher)
- A web server such as Apache or Nginx

### Steps
1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```bash
   cd <project-directory>
   ```
3. Create a MySQL database:
   ```sql
   CREATE DATABASE rincon_arte;
   ```
4. Configure your database settings by modifying the `config.php` file with your database credentials:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_database_user');
   define('DB_PASS', 'your_database_password');
   define('DB_NAME', 'rincon_arte');
   ```
5. Open your web server and navigate to your project directory through your web browser.

## Usage
- Access the homepage of the application.
- Log in or sign up to create and manage your courses.
- Use the sidebar to navigate through different artistic courses or to create new content.

## Features
- User registration and login functionality.
- Dynamic content loading based on user interactions.
- Responsive design that adapts to different screen sizes.
- Course creation interface for users.
- Intuitive navigation with collapsible sidebar.
- Rainbow animation effects on buttons and text.

## Dependencies
This project uses the following dependencies:
- **Tailwind CSS**: For utility-first CSS framework.
- **Font Awesome**: For scalable icons.

External stylesheets and CDN links used in the project:
```html
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
```

## Project Structure
The project is organized as follows:
```
/el-rincon-del-arte
│
├── index.php              # Main entry point
├── config.php             # Database configuration and setup
├── header.php             # Header section with navigation
├── sidebar.php            # Sidebar for navigation
├── footer.php             # Footer section
├── styles.css             # Custom styles for the application
├── scripts.js             # JavaScript for interactivity
└── /pages                 # Directory containing various page templates
    ├── home.php
    ├── arte-piano.php
    ├── manualidades-diy.php
    ├── arte-pintura.php
    ├── arte-dibujo.php
    └── create-course.php
```

## License
This project is licensed under the MIT License - see the LICENSE file for details.

## Contributing
Feel free to contribute to this project by submitting a pull request or opening an issue for suggestions. Your feedback is welcome!