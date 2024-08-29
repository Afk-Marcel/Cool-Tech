<div>
    <!-- Cookie notice element, initially hidden -->
    <div id="cookie-notice" class="fixed-bottom bg-dark text-white p-3 text-center" style="display: none;">
        <p>
            We use cookies to ensure you get the best experience on our website. By continuing to use this site, you accept our use of cookies.
        </p>
        <!-- Button for users to accept cookies -->
        <button id="accept-cookies" class="btn btn-primary">Accept</button>
    </div>

    <script>
        // Wait for the DOM content to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Check if cookies have already been accepted
            if (!localStorage.getItem('cookiesAccepted')) {
                // Display the cookie notice if not accepted
                document.getElementById('cookie-notice').style.display = 'block';
            }

            // Add event listener to the accept cookies button
            document.getElementById('accept-cookies').addEventListener('click', function() {
                // Store the user's acceptance of cookies in localStorage
                localStorage.setItem('cookiesAccepted', 'true');
                // Hide the cookie notice
                document.getElementById('cookie-notice').style.display = 'none';
            });
        });
    </script>
</div>