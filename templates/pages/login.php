<?php
$template = './layout/center-content.php';

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirmation'])){


}
?>

<section class="flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <form action="/login" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>            
            <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                Login
            </button>
        </form>
        <p class="text-gray-600 text-center mt-4">No account yet? <a href="/register" class="text-blue-600 hover:underline">Signup here</a></p>
    </div>
</section>
<script>
    function registrationForm() {
        return {
            name: '',
            email: '',
            password: '',
            passwordConfirmation: '',
            submitForm() {
                fetch('/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: this.email,
                        password: this.password,
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