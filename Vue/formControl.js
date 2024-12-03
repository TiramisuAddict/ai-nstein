document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formAuthentication');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const age = document.getElementById('age');
    const experience = document.getElementById('experience');
    const gender = document.getElementsByName('gender');
    const proof = document.getElementById('proof');
    const terms = document.getElementById('terms-conditions');
  
    form.addEventListener('submit', (event) => {
      // Clear any previous errors
      let valid = true;
      const errors = [];
  
      // Validate username
      if (!username.value.trim()) {
        valid = false;
        errors.push('Username is required.');
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
      if (age.value < 18) {
        valid = false;
        errors.push('You must be at least 18 years old.');
      }
  
      // Validate experience
      if (experience.value === '0') {
        valid = false;
        errors.push('Please select your experience level.');
      }
  
      // Validate gender
      if (![...gender].some((radio) => radio.checked)) {
        valid = false;
        errors.push('Please select your gender.');
      }
  
      // Validate proof document
      if (!proof.value) {
        valid = false;
        errors.push('Please upload a proof document.');
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
  