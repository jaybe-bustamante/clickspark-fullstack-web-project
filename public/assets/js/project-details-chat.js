// Show Description Collapse
document.querySelector('[data-bs-toggle="collapse"]').addEventListener('click', function(event) {
    const targetIcon = this.querySelector('i');
    if (targetIcon.classList.contains('bi-caret-down')) {
        targetIcon.classList.replace('bi-caret-down', 'bi-caret-up');
    } else {
        targetIcon.classList.replace('bi-caret-up', 'bi-caret-down');
    }
});

// Scroll to bottom of chat messages
window.onload = function() {
    var container = document.querySelector('.chat-messages');
    container.scrollTop = container.scrollHeight;
}

// attachFileBtn on click
document.getElementById('attchFileBtn').addEventListener('click', function() {
    document.getElementById('attachFile').click();
});

// show file name
document.getElementById('attachFile').addEventListener('change', function() {
    document.getElementById('attachFileName').innerHTML = this.files[0].name;
});

// textarea auto resize
var textarea = document.querySelector('textarea[name="message"]');
    textarea.addEventListener('input', function() {
        if (this.value.includes('\n') || this.scrollHeight > this.clientHeight) {
            this.rows = 3;
        }
    });

    
// view attached file modal
document.querySelectorAll('.view-attachment').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault();
        const fileType = item.getAttribute('data-type');
        const fileUrl = item.getAttribute('data-file');


        if (['jpg', 'jpeg', 'png', 'gif'].includes(fileType.toLowerCase())) {
            // display the image in a modal
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = fileUrl;
            const imagePreviewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            imagePreviewModal.show();
        } else {
            // if not image download the file
            window.location.href = fileUrl;
        }
    });
});