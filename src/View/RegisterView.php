<?php
include "../components/head.php";
require_once "../Controller/RegisterController.php";
include "../components/circular_menu.php";

$registerController = new RegisterController();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        // $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        

        $tmp = explode('.', $file_name);
        $file_extension = end($tmp);
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_extension,$extensions) === false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        // if($file_size > 2097152) {
        //    $errors[]='File size must be excately 2 MB';
        // }
        
        if(empty($errors)==true) {
           move_uploaded_file($file_tmp,"images/".$file_name);
        //    echo "Success";
        }else{
           print_r($errors);
        }
     }

    $postData = [
        'username' => $_POST['username'],
        'token' => $_POST['token'],
        'email' => $_POST['email'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        're-token' => $_POST['re-token'],
        'role' => $_POST['role'],
        'img_path' => "images/".$_FILES['image']['name']
    ];

    $error = false;

    if( empty($postData['username']) || empty($postData['token']) ||
        empty($postData['first_name']) || empty($postData['last_name']) ||
        empty($postData['re-token']) || empty($postData['role']) ||
        empty($postData['email']) ){
        
        echo "<script>alert('Missing details!');</script>";
        $error = true;
    } 
    else if ($postData['token'] != $postData['re-token']) {
        echo "<script>alert('A jelszavak nem egyeznek!');</script>";
        $error = true;
    } 
    else if (strlen($postData['token']) < 5) {
        echo "<script>alert('A jelszó minimum 5 karakter hosszú kell, hogy legyen');</script>";
        $error = true;
    }
    else if($registerController->checkIfUserExists($postData['username'])){
        echo "<script>alert('Ilyen username-mel már regisztráltak');</script>";
        $error = true;
    }
    if(!$error){
        $registerController->insertUser($postData['username'],
                                        $postData['token'],
                                        $postData['email'],
                                        $postData['first_name'],
                                        $postData['last_name'],
                                        $postData['role'],
                                        $postData['img_path']
        );
    }
}

?>
<div id="frm">
    <main class="main-block">
        <section class="text-gray-600 body-font pb-20">
            <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
                <div class="lg:w-max md:w-max bg-gray-100 rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>
                    <form method="post" class="register" name="registerForm" enctype="multipart/form-data">
                        <div class="relative mb-4">
                            <label for="first_name" class="leading-7 text-sm text-gray-600">First name</label>
                            <input type="text" id="first_name" name="first_name" placeholder="First name"required class="w-full bg-white rounded border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="last_name" class="leading-7 text-sm text-gray-600">Last name</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Last name" required class="w-full bg-white rounded border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">Email address</label>
                            <input type="text" id="email" name="email" placeholder="Email address" required class="w-full bg-white rounded border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="username" class="leading-7 text-sm text-gray-600">Username</label>
                            <input type="text" id="username" name="username" placeholder="Username" required class="w-full bg-white rounded border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="token" class="leading-7 text-sm text-gray-600">Password</label>
                            <input type="password" id="token" name="token" placeholder="Password" required class="w-full bg-white rounded border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="re-token" class="leading-7 text-sm text-gray-600">Password again</label>
                            <input type="password" id="re-token" name="re-token" placeholder="Password again" required class="w-full bg-white rounded border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="role" class="leading-7 text-sm text-gray-600">Role</label>
                            <select name="role" id="role">
                                <option value="default">Please select your position</option>
                                <option value="shift_leader">Shift leader</option>
                                <option value="mechanic">Mechanic</option>
                            </select>
                            <div class="relative mb-4">
                                <img src="../images/default-profile.png" class="profile-picture" alt="Profile picture">
                                <label for="image" class="leading-7 text-sm text-gray-600">Select profile picture:</label>
                                <input type="file" name="image" />
                            </div>
                        </div>
                        <button type="submit" name="register" class="text-white bg-purple-500 border-0 py-2 my-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg">Register</button>
                        <button class="text-white bg-purple-500 border-0 py-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg"><a href="./LoginView">Registered already? Sign in!</a></button>
                        <p class="text-xs text-gray-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>                
                    </form>               
                </div>
            </div>
        </section>
    </main>
</div>

<?php
include "../components/footer.php";
?>