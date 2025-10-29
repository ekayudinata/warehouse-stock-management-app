<!-- Setup Section -->
<section id="setup" class="documentation-section mb-12">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-6">Setup & Installation</h2>
    <div class="bg-white rounded-lg shadow p-4 sm:p-6">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Prerequisites</h3>
        <ul class="list-disc pl-5 space-y-2 mb-6 text-gray-700">
            <li>PHP 8.0 or higher</li>
            <li>Composer</li>
            <li>MySQL 5.7+ or MariaDB 10.3+</li>
            <li>Node.js & NPM</li>
        </ul>

        <h3 class="text-xl font-semibold mb-4 text-gray-800">Installation Steps</h3>
        <div class="space-y-4 sm:space-y-6">
            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">1. Clone the repository</h4>
                <pre><code>git clone https://github.com/yourusername/warehouse-stock-management-app.git
cd warehouse-stock-management-app</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">2. Install PHP dependencies</h4>
                <pre><code>composer install</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">3. Install NPM dependencies</h4>
                <pre><code>npm install
npm run dev</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">4. Configure Environment</h4>
                <p class="text-sm text-gray-600 mb-2">Copy the example env file and set your database credentials:</p>
                <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">5. Run Migrations</h4>
                <pre><code>php artisan migrate --seed</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">6. Start the development server</h4>
                <pre><code>php artisan serve</code></pre>
            </div>
        </div>
    </div>
</section>
