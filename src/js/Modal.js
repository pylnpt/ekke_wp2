$(document).ready(function(){ });

$(document).on('click','#colapseErrorBtn',function(){
    removeExtensionFromErrorBtnForm();
});

$(document).on('click','#addErrorBtn',function(){
    extendErrorBtnToForm();
});

$(document).on('click','#colapseSolutionBtn',function(){
    removeExtensionFromSolutionBtnForm();
});

$(document).on('click','#addSolutionBtn',function(){
    extendSolutionBtnToForm();
});

function extendErrorBtnToForm(){
    var html = "";
    html += `
    <div class="form-group">
        <input type="text" class="form-control" id="error_name" name="error_name"  placeholder="Error name">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="error_level" name="error_level" placeholder="Error level">
    </div>
    <div class="form-group">
        <select id="error_type" class="select select-error w-full ">
            <option disabled selected>Error type</option>
            <option value="technical">Technical</option>
            <option value="Logistical">Logistical</option>
            <option value="Man made">Man made</option>
        </select>
    </div>
    <div class="form-group">
    <select id="error_type" class="select select-error w-full">
        <option disabled selected>Has solution?</option>
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
    </div>
    <button id="insertErrorBtn" class="btn btn-error btn-block modal-button">Add error</button>
    <button id="colapseErrorBtn" class="btn btn-error btn-block modal-button">Colapse</button>`;
    
    $("#errorDiv").html(html);
}

function extendSolutionBtnToForm(){
    var html = `
    <button id="colapseSolutionBtn" class="btn btn-success btn-block modal-button">Colapse</button>
    <button id="insertSolutionBtn" class="btn btn-success btn-block modal-button">Add solution</button>
    <div class="form-group">
        <input type="text" class="form-control" id="solution_name" name="solution_name"  placeholder="Solution name">
    </div>
    <div class="form-group">
        <select id="solution_type" class="select select-success w-full ">
            <option disabled selected>Solution type</option>
            <option value="technical">Technical</option>
            <option value="Logistical">Logistical</option>
            <option value="Man made">Man made</option>
        </select>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="solution_name" name="solution_name"  placeholder="Solution name">
    </div>  
    `;
    
    $("#solutionDiv").html(html);
}

function removeExtensionFromErrorBtnForm(){
    var html = `<button id="addErrorBtn" class="btn btn-error btn-block modal-button">Error</button>`;
    $("#errorDiv").html(html);

}

function removeExtensionFromSolutionBtnForm(){
    var html = `<button id="addSolutionBtn" class="btn btn-success btn-block modal-button">Solution</button>`;
    $("#solutionDiv").html(html);

}