let loginVisible = true;
        
function toggleSections() {
    const loginSection = document.getElementById('loginSection');
    const registerSection = document.getElementById('registerSection');

    if (loginVisible) {
        
        loginSection.style.display = 'block';
        registerSection.style.display = 'none';
        loginVisible = true;
    } else {
        loginSection.style.display = 'none';
        registerSection.style.display = 'block';
        loginVisible = false;
    }
}

function toggleSection(sectionId) {
    var section = document.getElementById(sectionId);
    section.classList.toggle('hidden');
}