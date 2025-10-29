<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Stock Management - Documentation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/docs.css') }}">
</head>
<body class="bg-gray-50">
    @include('components.layout.mobile-menu-button')

    <div class="min-h-screen flex flex-col md:flex-row">
        @include('components.layout.sidebar')

        @include('components.layout.mobile-overlay')

        <!-- Main Content -->
        <main class="flex-1 p-4 sm:p-6 md:p-8 overflow-y-auto mt-12 md:mt-0">
            @yield('content')

            <footer class="mt-12 pt-8 border-t border-gray-200">
                <div class="flex flex-col items-center justify-between md:flex-row">
                    <p class="text-sm text-gray-500">
                        &copy; 2023 Warehouse Stock Management. All rights reserved.
                    </p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">GitHub</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.268 2.75 1.025A9.564 9.564 0 0112 6.844c.85.004 1.705.114 2.504.336 1.909-1.293 2.747-1.025 2.747-1.025.546 1.377.202 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48A10.02 10.02 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </div>
                </div>
            </footer>
        </main>
    </div>

    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu functionality
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebar = document.getElementById('sidebar');
            const mobileOverlay = document.getElementById('mobile-overlay');
            const navLinks = document.querySelectorAll('.nav-link');
            // Target all elements with IDs that match the navigation links
            const sections = document.querySelectorAll('section[id]');
            let isMenuOpen = false;

            // Debug: Log elements to console
            console.log('Mobile Menu Button:', mobileMenuButton);
            console.log('Sidebar:', sidebar);
            console.log('Mobile Overlay:', mobileOverlay);

            // Toggle mobile menu
            function toggleMenu() {
                isMenuOpen = !isMenuOpen;
                console.log('Toggle menu called. New state:', isMenuOpen);

                if (isMenuOpen) {
                    sidebar.classList.remove('-translate-x-full');
                    mobileOverlay.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                } else {
                    sidebar.classList.add('-translate-x-full');
                    mobileOverlay.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            }

            // Close menu when clicking on a nav link
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (window.innerWidth < 768) { // Only for mobile
                        toggleMenu();
                    }
                    // Smooth scrolling
                    const targetId = this.getAttribute('href');
                    if (targetId.startsWith('#')) {
                        e.preventDefault();
                        const targetElement = document.querySelector(targetId);
                        if (targetElement) {
                            targetElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    }
                });
            });

            // Close menu when clicking outside
            if (mobileOverlay) {
                mobileOverlay.addEventListener('click', function(e) {
                    if (isMenuOpen) {
                        toggleMenu();
                    }
                });
            }

            // Toggle menu on button click
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    toggleMenu();
                });
            }

            // Close menu on window resize to desktop
            function handleResize() {
                if (window.innerWidth >= 768) { // Desktop
                    sidebar.classList.remove('-translate-x-full');
                    mobileOverlay.classList.add('hidden');
                    document.body.style.overflow = '';
                    isMenuOpen = false;
                } else if (!isMenuOpen) {
                    sidebar.classList.add('-translate-x-full');
                }
            }

            // Handle initial state
            function init() {
                // Set initial state for mobile
                if (window.innerWidth < 768) {
                    sidebar.classList.add('-translate-x-full');
                }

                // Add resize event listener
                window.addEventListener('resize', handleResize);

                // Highlight active link
                highlightActiveLink();
            }

            // Highlight active navigation link
            function highlightActiveLink() {
                let current = '';
                const scrollPosition = window.scrollY + 100;

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;

                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + current) {
                        link.classList.add('active');
                    }
                });
            }

            // Initialize everything
            init();

            // Add scroll event listener for active link highlighting
            window.addEventListener('scroll', highlightActiveLink);
        });
    </script>
</body>
</html>
