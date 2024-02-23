Sidebar = document.getElementById('sidebar-wrapper');
toggleButton = document.getElementById('menu-toggle');

toggleButton.addEventListener('click', function() {
    if (Sidebar.classList.contains('d-lg-block')) {
        Sidebar.classList.remove('d-lg-block');
        toggleButton.innerHTML = '<i class="bi bi-chevron-compact-right"></i>';
    } else {
        Sidebar.classList.add('d-lg-block');
        toggleButton.innerHTML = '<i class="bi bi-chevron-compact-left"></i>';
            }
    });

// Tooltip
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));


// Modal
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})