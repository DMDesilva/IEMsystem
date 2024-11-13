        
        function validateEmail() {
            const email = document.querySelector('input[name="email"]').value;
            const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const emailHint = document.getElementById('emailHint');
        
            if (!pattern.test(email)) {
                emailHint.style.display = 'block';
            } else {
                emailHint.style.display = 'none';
            }
        }
        
        
        
        // Validate password strength
        function validatePassword() {
            const password = document.querySelector('input[name="password"]').value;
            const pattern = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W]).{8,}$/;
            const passwordHint = document.getElementById('passwordHint');

            if (!pattern.test(password)) {
                passwordHint.style.display = 'block';
            } else {
                passwordHint.style.display = 'none';
            }
        }

        // Validate password confirmation
        function validatePasswordMatch() {
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="confirm_password"]').value;
            const confirmPasswordHint = document.getElementById('confirmPasswordHint');

            if (password !== confirmPassword) {
                confirmPasswordHint.style.display = 'block';
            } else {
                confirmPasswordHint.style.display = 'none';
            }
        }



        // Validate username length
        function validateUsername() {
            const username = document.querySelector('input[name="username"]').value;
            const usernameHint = document.getElementById('usernameHint');
            const isValidLength = username.length >= 5 && username.length <= 15;


            if (!isValidLength) {
                usernameHint.style.display = 'block';
            } else {
                usernameHint.style.display = 'none';
            }
        }

