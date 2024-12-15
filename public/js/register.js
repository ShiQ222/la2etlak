// register.js

// Toggle password visibility
function togglePassword(fieldId, iconId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(iconId);
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

// Password strength meter
document.getElementById('password').addEventListener('input', function () {
    const password = this.value;
    const strengthElement = document.getElementById('password-strength');
    const weakRegex = /[a-z]/;
    const strongRegex = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\W])/;

    if (password.length < 6) {
        strengthElement.textContent = 'Weak';
        strengthElement.className = 'text-red-500';
    } else if (weakRegex.test(password)) {
        strengthElement.textContent = 'Moderate';
        strengthElement.className = 'text-yellow-500';
    } else if (strongRegex.test(password)) {
        strengthElement.textContent = 'Strong';
        strengthElement.className = 'text-green-500';
    } else {
        strengthElement.textContent = '';
    }
});

// Restrict phone input to digits only
document.getElementById('phone').addEventListener('input', function (e) {
    e.target.value = e.target.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
});

// Client-side validation for Date of Birth
document.querySelector('form').addEventListener('submit', function (e) {
    const day = parseInt(document.getElementById('dob_day').value);
    const month = parseInt(document.getElementById('dob_month').value);
    const year = parseInt(document.getElementById('dob_year').value);

    if (!isValidDate(year, month, day)) {
        e.preventDefault(); // Prevent form submission
        alert('Please enter a valid date of birth.');
    }
});

function isValidDate(year, month, day) {
    // JavaScript months are 0-based (January is 0)
    const date = new Date(year, month - 1, day);
    return (
        date &&
        date.getFullYear() === year &&
        date.getMonth() === month - 1 &&
        date.getDate() === day
    );
}

// Code for loading terms and conditions modal
async function loadTerms(modalId) {
    const modalContent = document.getElementById('termsContent');
    modalContent.innerHTML = '<p>Loading...</p>'; // Show a loading message while fetching
    try {
        const response = await fetch('/terms');
        if (response.ok) {
            const content = await response.text();
            modalContent.innerHTML = content; // Insert the Terms content
            openModal(modalId); // Show the modal
        } else {
            modalContent.innerHTML = '<p>Failed to load Terms and Conditions. Please try again later.</p>';
        }
    } catch (error) {
        modalContent.innerHTML = '<p>Failed to load Terms and Conditions. Please try again later.</p>';
        console.error('Error loading terms:', error);
    }
}

function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}
