// ----------------- Confirmation Modal ----------------- //
const projectType = document.getElementById("project-type");
const discussedContainer = document.getElementById("discussed-container");
const paymentContainer = document.getElementById("payment-container");
const paymentLabel = document.getElementById("payment-label");
const submitButton = document.getElementById("submit-button");

            const projectQuotes = {
                brand: 120
                , print: 120
                , product_label: 180
                , web: 450
            , };

projectType.addEventListener("change", function() {
    if (this.value) {
        discussedContainer.style.display = "block";
        const selectedProjectType = this.value;
        const selectedProjectQuote = projectQuotes[selectedProjectType];
        const paymentInput = paymentContainer.querySelector('input[name="payment"]');
        paymentInput.min = selectedProjectQuote;
        paymentInput.placeholder = selectedProjectQuote;
    } else {
        discussedContainer.style.display = "none";
        paymentContainer.style.display = "none";
        submitButton.style.display = "none";
    }
});

discussedContainer.addEventListener("change", function() {
    if (
        document.querySelector('input[name="discussed"]:checked')
        .value === "yes"
    ) {
        paymentLabel.textContent = "Enter the discussed payment:";
    } else {
        paymentLabel.innerHTML =
            "Please consult your project with us first before creating the project.<br>Suggested payment:";
    }

    paymentContainer.querySelector('input[name="payment"]').min =
        projectQuotes[projectType.value];
    paymentContainer.querySelector(
        'input[name="payment"]'
    ).placeholder = projectQuotes[projectType.value];
    paymentContainer.style.display = "block";
    submitButton.style.display = "block";
});

document
.getElementById("project-form")
.addEventListener("submit", function(e) {
    e.preventDefault();

    const data = {
        project_type: projectType.value
        , discussed: document.querySelector(
            'input[name="discussed"]:checked'
        ).value
        , payment: paymentContainer.querySelector(
            'input[name="payment"]'
        ).value
    , };

    sessionStorage.setItem("projectData", JSON.stringify(data));

    $("#createProjectModal").modal("show");


    let project_type_value = projectType.value;

    if (project_type_value === "brand") {
        document.getElementById("serviceType").value = "Brand Design";
    } else if (project_type_value === "print") {
        document.getElementById("serviceType").value = "Print Design";
    } else if (project_type_value === "product_label") {
        document.getElementById("serviceType").value = "Product Label Design";
    } else if (project_type_value === "web") {
        document.getElementById("serviceType").value = "Web Design and Development";
    }
});



// ----------------- Create Project ----------------- //
// Color Preference
document
.getElementById("addColorPreference")
.addEventListener("click", function() {
    var colorPreferenceContainer = document.getElementById(
        "colorPreferenceContainer"
    );
    var newColorPreference = document.createElement("input");
    newColorPreference.type = "color";
    newColorPreference.name = "color_preference[]";
    newColorPreference.className = "form-control mb-2";
    colorPreferenceContainer.insertBefore(
        newColorPreference
        , this
    );
});

// Attachments
document
.getElementById("addAttachment")
.addEventListener("click", function() {
    var attachmentsContainer = document.getElementById(
        "attachmentsContainer"
    );
    var newAttachment = document.createElement("input");

    newAttachment.type = "file";
    newAttachment.name = "attachments[]";
    newAttachment.className = "form-control mb-2";

    attachmentsContainer.insertBefore(newAttachment, this);
});


