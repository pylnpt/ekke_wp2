$( document ).ready(function() {
    $(".toggler").on("click", function() {
        $('.circular-menu').toggleClass('active');
    })
    setPath();

 
});

function setPath(){
    var pathname = window.location.pathname;
    var pathNameArray = pathname.split("/");
    console.log(pathNameArray);

    switch(pathNameArray[5]){
        case("RegisterView"):
            $("#homeBtn").on("click", function(){
                location.replace("./index.php");
            });
            $("#loginBtn").on("click", function(){
                location.replace("./LoginView");
            });
            $("#profileBtn").on("click", function(){
                location.replace("./ProfileView");
            });
            $("#errorAndSolutionBtn").on("click", function(){
                location.replace("./ErrorsAndSolutionView");
            });
            break;
        case("LoginView"):
            $("#homeBtn").on("click", function(){
                location.replace("./index.php");
            });
            $("#registerBtn").on("click", function(){
                location.replace("./RegisterView");
            });
            $("#profileBtn").on("click", function(){
                location.replace("./ProfileView");
            });
            $("#errorAndSolutionBtn").on("click", function(){
                location.replace("./ErrorsAndSolutionView");
            });
            $("#loginBtn").on("click", function(){
                location.replace("./LoginView");
            });
            break;
        case("ErrorView"):
            $("#homeBtn").on("click", function(){
                location.replace("./index.php");
            });
            $("#registerBtn").on("click", function(){
                location.replace("./RegisterView");
            });
            $("#loginBtn").on("click", function(){
                location.replace("./LoginView");
            });
            $("#profileBtn").on("click", function(){
                location.replace("./ProfileView");
            });
            $("#errorAndSolutionBtn").on("click", function(){
                location.replace("./ErrorsAndSolutionView");
            });
            break;
        case("ErrorsAndSolutionView"):
            $("#homeBtn").on("click", function(){
                location.replace("./index.php");
            });
            $("#registerBtn").on("click", function(){
                location.replace("./RegisterView");
            });
            $("#loginBtn").on("click", function(){
                location.replace("./LoginView");
            });
            $("#errorAndSolutionBtn").on("click", function(){
                location.replace("./ErrorsAndSolutionView");
            });
            $("#profileBtn").on("click", function(){
                location.replace("./ProfileView");
            });
            break;
        case("ProfileView"):
            $("#homeBtn").on("click", function(){
                location.replace("./index.php");
            });
            $("#registerBtn").on("click", function(){
                location.replace("./RegisterView");
            });
            $("#loginBtn").on("click", function(){
                location.replace("./LoginView");
            });
            $("#errorAndSolutionBtn").on("click", function(){
                location.replace("./ErrorsAndSolutionView");
            });
            break;
        case("index.php"):
            $("#loginBtn").on("click", function(){
                location.replace("./LoginView");
            });
            $("#registerBtn").on("click", function(){
                location.replace("./RegisterView");
            });
            $("#profileBtn").on("click", function(){
                location.replace("./ProfileView");
            });
            $("#errorAndSolutionBtn").on("click", function(){
                location.replace("./ErrorsAndSolutionView");
            });
            break;
    }
}