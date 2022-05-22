<?php
include "../components/head.php";
require_once "../Controller/LoginController.php";
include "../components/circular_menu.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginSubmit'])) {
  $postData = [
    'username' => $_POST['username'],
    'password' => $_POST['password']
  ];

  $lgController = LoginController::getInstance();

  if (empty($postData['username']) || empty($postData['password'])) {
    echo "<script>alert('Missing details!');</script>";
  } else if (!$lgController->UserLogin($postData['username'], $postData['password'])) {
    echo "<script>alert('Wrong user details!');</script>";
  }
  

  $postData['password'] = "";
}
?>

<section class="text-gray-600 body-font pb-20">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
      <div class="lg:w-max md:w-max bg-gray-100 rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0">
          <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>
          <form method="post">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username"  placeholder="Username">
            </div>
            <div class="form-group">
              <label for="token">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" name="loginSubmit" class="text-white bg-purple-500 border-0 py-2 my-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg">Log in</button>
          </form>
      </div>
  </div>
</section>

<?php
include "../components/footer.php";
?>