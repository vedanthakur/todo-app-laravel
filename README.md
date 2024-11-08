# Todo App in Laravel

## Setup this project

1. **Clone the repository:**
    ```bash
    git clone https://github.com/vedanthakur/todo-app-laravel.git
    ```

2. **Install Dependencies:**
    ```bash
    cd todo-app-laravel
    composer install
    npm install
    ```

3. **Database Setup:**
    - Copy the `.env.example` file to `.env` and configure your database settings.
    - Run database migrations:
        ```bash
        php artisan migrate
        ```

4. **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

5. **Serve the Application:**
    ```bash
    composer run dev
    ```

6. **Open in web browser**
    ```
    http://127.0.0.1:8000/ 
    ```

Note: Vite and Tailwind CSS are auto configured with every Laravel projects. No need to manually configure them.

## Starter files

- Find the webpages as blade files in ` resources >> views `
    
    - Homepage page: ` welcome.blade.php `
    - Sign up page: ` signup.blade.php `
    - Log in page: ` login.blade.php `
    - Tasks page: ` tasks.blade.php `
    - Add tasks page: ` add-task.blade.php `

