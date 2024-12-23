<?php
    require_once './init.php';
    /*
    define('APP_ROOT', __DIR__ );
    
    // Autoload classes
    spl_autoload_register(function ($class) {
        $prefix = 'App\\';
        $base_dir = APP_ROOT . '/app/';       
        
        // Does the class use the App namespace prefix?
        if (strncmp($prefix, $class, strlen($prefix)) === 0) {
            $relative_class = substr($class, strlen($prefix));
            $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
            echo $file;
            if (file_exists($file)) {
                require $file;
                return;
            }
        }     
    });
    */
    
    // echo APP_ROOT;

    $template = new App\Template('./layout/page.php', array('name' => 'John'));
    $template->render();

<?php
    //require_once '../../config.php';
    //require_once '../../database.php';
    //require_once '../../session.php';

    require_once './layout/header.php';
?>
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">User Registration</h2>
        <form action="/register" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                Register
            </button>
        </form>
        <p class="text-gray-600 text-center mt-4">Already have an account? <a href="/login" class="text-blue-600 hover:underline">Login here</a></p>
    </div>
    <script>
        function registrationForm() {
            return {
                name: '',
                email: '',
                password: '',
                passwordConfirmation: '',
                submitForm() {
                    fetch('/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            name: this.name,
                            email: this.email,
                            password: this.password,
                            password_confirmation: this.passwordConfirmation
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Registration successful!');
                        } else {
                            alert('Registration failed: ' + data.message);
                        }
                    })
                    .catch(error => {
                        alert('An error occurred: ' + error.message);
                    });
                }
            }
        }
    </script>
<?php
    require_once './layout/footer.php';