# Cool Tech Project

Cool Tech is a content management system built with Laravel that allows users to create, edit, and manage articles categorized by various topics. Users can also explore articles based on tags and categories. The project showcases key aspects of web development, including CRUD operations, search functionality, and dynamic content management.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Styling](#styling)
- [License](#license)

## Features

- **CRUD Operations:** Create, read, update, and delete articles, categories, and tags.
- **Search Functionality:** Search articles by ID, category, or tag.
- **User-Friendly Interface:** Clean and responsive UI using Bootstrap.
- **SEO-Friendly URLs:** Uses slugs for categories and tags in URLs.
- **Cookie Notice:** Displays a cookie consent banner across all pages.
- **Latest Articles:** Shows the latest 5 articles on the homepage with titles and excerpts.
- **Legal Pages:** Includes Terms of Use and Privacy Policy.

## Installation

Follow these steps to set up the project on your local machine:

1. **Clone the repository:**

   ```bash
   git clone <repository-url>
   cd cool-tech
   ```

2. **Install dependencies:**

   ```bash
   composer install
   npm install
   ```

3. **Copy .env.example to .env and update your environment variables:**

   ```bash
   cp .env.example .env
   ```

4. **Generate the application key:**

   ```bash
   php artisan key:generate
   ```

5. **Set up the database:**

   - Create a MySQL database and update your .env file with the database credentials.

6. **Run migrations and seed the database:**

   ```bash
   php artisan migrate --seed
   ```

7. **Compile assets:**

   ```bash
   npm run dev
   ```

8. **Start the development server:**

   ```bash
   php artisan serve
   ```

## Usage

- Access the homepage to view the latest articles.
- Navigate to Categories and Tags pages to explore articles by category or tag.
- Use the search functionality to find articles by ID, category name, or tag name.
- Create, edit, or delete articles, categories, and tags through the respective pages.

## Project Structure

- **Controllers:** Handle the logic for managing articles, categories, and tags.
- **Models:** Define the relationships and data structures for articles, categories, and tags.
- **Views:** Blade templates for displaying content with Bootstrap styling.
- **Routes:** Define URL paths for the application, including routes for articles, categories, tags, and search.

## Styling

- The project uses Bootstrap for styling the frontend, ensuring a responsive and modern design.

## License

This project is licensed under the MIT License
