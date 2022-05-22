<!DOCTYPE html>
<html lang="hu">
<?php
include "../components/head.php";
include "../components/circular_menu.php";
include "../components/navigate_to_error_view.php";

require_once "../Controller/ErrorsAndSolutionController.php";
require_once "../Controller/LoginController.php";
$loginController=LoginController::getInstance();

$errorsAndSolutionController = new ErrorsAndSolutionController();
$errors = $errorsAndSolutionController->getErrors();



?>
<script src="/wp2/ekke_wp2/src/js/Modal.js"></script>
<script src="/wp2/ekke_wp2/src/js/ErrorsAndSolution.js"></script>

<input type="checkbox" id="selectWhatToAdd" class="modal-toggle" />
<label for="selectWhatToAdd" class="modal cursor-pointer">
    <label class="modal-box relative" for="">
        <div id="errorDiv" class="px-4 py-2"><button id="addErrorBtn" class="btn btn-error btn-block modal-button">Error</button></div>
        <div id="solutionDiv" class="px-4 py-2"><button id="addSolutionBtn" class="btn btn-success btn-block modal-button">Solution</button></div>
    </label>
</label>


<input type="checkbox" id="modifyModal" class="modal-toggle" />
<label for="modifyModal" class="modal cursor-pointer">
<label class="modal-box relative" for="">
    <div id="errorDiv" class="px-4 py-2">
        <input type="hidden" id="errorIdLbl" placeholder="errorID" class="input input-bordered w-full max-w-xs" />
        <input type="text" id="errorNameLbl" placeholder="Error name" class="input input-bordered w-full max-w-xs" />
        <input type="text" id="errorLevelLbl" placeholder="Error Level" class="input input-bordered w-full max-w-xs" />
        <input type="text" id="errorTypeLbl" placeholder="Error Type" class="input input-bordered w-full max-w-xs" />
        <input type="text" id="hasSolutionLbl" placeholder="Has solution" class="input input-bordered w-full max-w-xs" />
        <button id="modifyItem" class="btn btn-success btn-block modal-button">Modify</button>
    </div>
</label>
</label>
<body>

<section class="text-gray-600 body-font pb-20">
    <div class="container px-5 py-24 mx-auto">
        

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="errorTable">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Error ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Error name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Error level
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Error Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Has solution?
                    </th>
                    <?php if($loginController->GeUserRole($_SESSION["id"]) === "shift_leader"): ?>
                        <th scope="col"><a href="./../components/excelExport.php" id="excelExport" for="selectWhatToAdd" class="btn btn-success">Excel export</a></th>
                        <th scope="col" class="px-6 py-3">
                            <label for="selectWhatToAdd" class="btn modal-button">+</label>
                        </th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($errors as $error):  ?>
                <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                    <td class="px-6 py-4"><?php echo implode('</td><td>', $error); ?></td>
                    <?php if($loginController->GeUserRole($_SESSION["id"]) === "shift_leader"): ?>
                        <td><label for="modifyModal" class="btn btn-success modal-button modifyBtn">Modify</label></td>
                        <td><button for="deleteBtn" class="btn btn-error deleteBtn">Delete</button></td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="flex flex-col items-center">

  <!-- Pagination -->
  <div class="inline-flex mt-2 xs:mt-0">
      <button class="py-2 px-4 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          Prev
      </button>
      <button class="py-2 px-4 text-sm font-medium text-white bg-gray-800 rounded-r border-0 border-l border-gray-700 hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          Next
      </button>
  </div>
</div>
    </div>
</section>
</body>

<?php
include "../components/footer.php";
?>
</html>