document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formAuthentication');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const age = document.getElementById('age');
    const educationLevel = document.getElementById('education_level');
    const gender = document.getElementsByName('gender');
    const itBackground = document.getElementById('it_background');
    const terms = document.getElementById('terms-conditions');
  
    form.addEventListener('submit', (event) => {
      let valid = true;
      const errors = [];
  
      // Validate username
      if (!username.value.trim()) {
        valid = false;
        errors.push('Username is required.');
      } else if (username.value.length < 3 || username.value.length > 20) {
        valid = false;
        errors.push('Username must be between 3 and 20 characters.');
      }
  
      // Validate email
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!email.value.trim() || !emailPattern.test(email.value)) {
        valid = false;
        errors.push('Enter a valid email address.');
      }
  
      // Validate password
      if (password.value.trim().length < 6) {
        valid = false;
        errors.push('Password must be at least 6 characters long.');
      }
  
      // Validate age
      if (age.value < 12) {
        valid = false;
        errors.push('You must be at least 12 years old.');
      }
  
      // Validate education level
      if (educationLevel.value === '0') {
        valid = false;
        errors.push('Please select your education level.');
      }
  
      // Validate gender
      if (![...gender].some((radio) => radio.checked)) {
        valid = false;
        errors.push('Please select your gender.');
      }
  
      // Validate IT background
      if (itBackground.value === '0') {
        valid = false;
        errors.push('Please select your IT background.');
      }
  
      // Validate terms and conditions
      if (!terms.checked) {
        valid = false;
        errors.push('You must agree to the terms and conditions.');
      }
  
      // If form is not valid, prevent submission and show errors
      if (!valid) {
        event.preventDefault();
        alert(errors.join('\n'));
      }
    });
  });
  