$(document).ready(function(){
    $(".modifyBtn").on("click", function(){
        let row = $(this).parent().parent();  
        
        let errorId = $(row).find("td:eq(0)").text();
        let errorName = $(row).find("td:eq(1)").text();
        let errorLevel = $(row).find("td:eq(2)").text();
        let errorType = $(row).find("td:eq(3)").text();
        let hasSolution = $(row).find("td:eq(4)").text();
        
        
        $("#errorIdLbl").val(errorId);
        $("#errorNameLbl").val(errorName);
        $("#errorLevelLbl").val(errorLevel);
        $("#errorTypeLbl").val(errorType);
        $("#hasSolutionLbl").val(hasSolution);

    })

    $("#modifyItem").on("click", function(){
        let data = {
            "id" : $("#errorIdLbl").val(),
            "error_name" : $("#errorNameLbl").val(),
            "error_level" : $("#errorLevelLbl").val(),
            "error_type" : $("#errorTypeLbl").val(),
            "has_solution" : $("#hasSolutionLbl").val()
        };
        
        console.log(data);
        $.ajax({
            url: "./../Controller/ajaxController.php",
            type: 'POST',
            data: {
                "whichFunction": "updateError",
                "data": data
            },
            dataType: "JSON",
            async: false,
            success: function (response) {
                if (response) {
                    var row = $(this).parent().parent();
                    $(row).find("td:eq(0)").text($("#errorIdLbl").val());
                    $(row).find("td:eq(1)").text($("#errorNameLbl").val());
                    $(row).find("td:eq(2)").text($("#errorLevelLbl").val());
                    $(row).find("td:eq(3)").text($("#errorTypeLbl").val());
                    $(row).find("td:eq(4)").text($("#hasSolutionLbl").val());
                    alert("Error updated successfully!");
                } else {
                    alert("Upps... Something went wrong.");
                }
            }
        })
    });

    $(".deleteBtn").on("click", function(){
        let table = $(this).parent().parent(); 
        let errorId = $(table).find("td:eq(0)").text();
        let row = $(this).closest('tr');

        console.log(errorId);


        $.ajax({
            url: "./../Controller/ajaxController.php",
            type: 'POST',
            data: {
                "whichFunction": "deleteError",
                "data": errorId
            },
            dataType: "JSON",
            async: false,
            success: function (response) {
                if (response) {
                    row.remove();
                    alert("Error deleted successfully!");
                } else {
                    alert("Upps... Something went wrong.");
                }
            }
        })
    })

    $("#excelExport").on("click", function(){
        $.ajax({
            url: "./../Controller/ajaxController.php",
            type: 'POST',
            data: {
                "whichFunction": "excelExport",
            },
            // async: false,
            success: function (response) { 
                // alert(response)
             }
        })
    })
})
