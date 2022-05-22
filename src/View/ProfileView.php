<?php
include "../components/head.php";
require_once "../Controller/LoginController.php";
include "../components/circular_menu.php";
include "../components/navigate_to_error_view.php";
?>
<script src="/wp2/ekke_wp2/src/js/Profile.js"></script>
<body>
    <div id="changePasswordPlaceholder"></div>
    <div id="profilePlaceholder"></div>
</body>

<?php
include "../components/footer.php";
?>

<script>
    $(document).ready(function () {

        $.ajax({
            url: "./../Controller/localController.php",
            type: 'POST',
            data: {"whichFunction": "getUserById", "id": "<?php echo $_SESSION["id"]?>"},
            dataType: "JSON",
            async: false,
            success: function (response) {
                let html = ``;
                html += `

                <section class="text-gray-600 body-font pb-20">
                    <div class="container place-content-center mx-auto">
                    <div class="card w-96 bg-base-100 shadow-xl place-content-center mx-auto">
                      <figure><img src="${response.img_path}" alt="ProfilePicture"/></figure>
                      <div class="card-body">
                        <h2 class="card-title">Profile</h2>
                        <input type="text" placeholder="First name" class="input input-bordered w-full max-w-xs" value="${response.first_name}"/>
                        <input type="text" placeholder="Last name" class="input input-bordered w-full max-w-xs" value="${response.last_name}"/>
                        <input type="text" placeholder="Username" class="input input-bordered w-full max-w-xs" value="${response.username}"/>
                        <div class="card-actions justify-end">
                          <button id="openChangePasswordDiv" class="btn btn-primary">Change password</button>
                          <button class="btn btn-primary">Change profile picture</button>
                          <button class="btn btn-primary">Download Cv</button>
                        </div>
                      </div>
                    </div>
                    </div>
                </section>`

                $("#profilePlaceholder").html(html);
            }
        });
    });

    $(document).ready(function () {
        $("#openChangePasswordDiv").click(function() {
            let html = ``;
            html += `
            <section class="text-gray-600 body-font pb-20">
                <div class="container place-content-left mx-auto">
                <div class="card w-96 bg-base-100 shadow-xl place-content-center mx-auto">
                  <div class="card-body">
                    <h2 class="card-title">Change password</h2>
                    <input type="password" placeholder="Password" class="input input-bordered w-full max-w-xs" value=""/>
                    <input type="password" placeholder="New password" class="input input-bordered w-full max-w-xs" value=""/>
                    <input type="password" placeholder="New password again" class="input input-bordered w-full max-w-xs" value=""/>
                    <div class="card-actions justify-end">
                      <button id="changePasswordBtn" class="btn btn-primary">Change password</button>
                    </div>
                  </div>
                </div>
                </div>
            </section>`;

            $("#changePasswordPlaceholder").html(html);
            
            });
    });

    $(document).on("click", "#changePasswordBtn", function(){
        alert("kex");
    })
</script>