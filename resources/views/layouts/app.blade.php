<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Page title, dynamic based on the content of individual pages -->
    <title>Cool Tech - @yield('title')</title>
    <!-- Include other meta tags and stylesheets here -->
</head>
<body>
    <header>
        <!-- Navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Brand name and link to the home page -->
            <a class="navbar-brand" href="{{ route('home') }}">Cool Tech</a>
            <!-- Navigation links, collapsible on smaller screens -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Link to the About Us page -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <!-- Link to the Articles index page -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.index') }}">Articles</a>
                    </li>
                    <!-- Link to the Search page -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search.index') }}">Search</a>
                    </li>
                    <!-- Link to the Categories index page -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                    </li>
                    <!-- Link to the Tags index page -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tags.index') }}">Tags</a>
                    </li>
                    <!-- Link to the Legal information page -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('legal') }}">Legal</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main content area where page-specific content is injected -->
    <main class="container mt-4">
        @yield('content')

        <!-- Display Latest 5 Articles only if on the homepage -->
        @if(isset($latestArticles))
            <section class="latest-articles mt-5">
                <h2>Latest Articles</h2>
                @if($latestArticles->isEmpty())
                    <p>No recent articles available.</p>
                @else
                    <ul class="list-group">
                        @foreach ($latestArticles as $article)
                            <li class="list-group-item">
                                <h5>
                                    <a href="{{ route('articles.show', $article->id) }}" class="text-decoration-none">
                                        {{ $article->title }}
                                    </a>
                                </h5>
                                <p>{{ Str::limit(strip_tags($article->content), 150) }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </section>
        @endif
    </main>

    <!-- Footer with copyright information -->
    <footer class="footer bg-light text-center py-3 mt-4">
        <p>&copy; 2024 Cool Tech. All rights reserved.</p>
    </footer>

    <!-- Cookie notice component -->
    <x-cookie-notice />
    
    <!-- Bootstrap JavaScript bundle for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>