<footer>
    <!-- Display the current year dynamically and copyright notice -->
    <p>&copy; {{ date('Y') }} Cool Tech. All rights reserved.</p>
    
    <!-- Links to additional pages -->
    <a href="{{ url('/search') }}">Search</a> | 
    <a href="{{ url('/legal') }}">Legal</a>
</footer>