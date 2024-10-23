<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Learnify - Elearning - Website

Learnify is an eLearning website designed to revolutionize the way individuals access and engage with educational content. With a sleek and intuitive user interface, Learnify offers a diverse range of courses, covering everything from academic subjects to practical skills and professional development.

Key Features:

- Interactive Learning Modules: Dive into immersive learning experiences with interactive modules that cater to various learning styles.
- Personalized Learning Paths: Tailor your learning journey with personalized recommendations based on your interests, skills, and goals.
- Expert Instructors: Learn from industry experts and experienced educators who provide insightful instruction and guidance.
- Assessments and Certifications: Track your progress with quizzes, assignments, and assessments, and earn certifications upon course completion.
- Mobile Compatibility: Access Learnify anytime, anywhere, with seamless compatibility across desktop, tablet, and mobile devices.
  
## Our Technology

- **Laravel 11**
- **PostgreSQL**
- **LARAGON**
- **Tailwind CSS**
- **Vanila Javascript**

## How To Use

1. **Kloning Repositori**  
   ```bash
   git clone https://github.com/vincensiusadyatma/Learnify-Elearning-Website-App
   cd Learnify-Elearning-Website-App
2. **Instalasi Dependencies**  
   ```bash
   composer install
   npm install

3. **Konfigurasi Environment**  
   ```bash
   cp .env.example .env
   php artisan key:generate

3. **Menjalankan Aplikasi ( Terminal 1 )**  
   ```bash
   php artisan serve

4. **Menjalankan Aplikasi ( Terminal 2 )**  
   ```bash
   npm run dev


## Install and Configure PostgreSQL

- Visit the [PostgreSQL Downloads Page](https://www.postgresql.org/download/) and download the installer for your operating system.
- Follow the installation instructions provided by the installer.
- During the setup, you will be prompted to set a password for the `postgres` user. Make sure to remember this password, as you will need it for configuring your `.env` file.

## Install Laragon (for Windows Users)

### 5.1 Download and Install Laragon

- Visit the [Laragon Downloads Page](https://laragon.org/download/index.html) and download Laragon.
- Follow the installation instructions to set up Laragon on your machine.

### 5.2 Configure Laragon

- Open Laragon and start the services for Apache, MySQL (even if you're using PostgreSQL, this step ensures that PHP is running correctly), and Node.js.
- Add your project to Laragon by placing the project folder in `C:\laragon\www`.
- To access your project, open Laragon's menu, go to `www`, and select your project.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
