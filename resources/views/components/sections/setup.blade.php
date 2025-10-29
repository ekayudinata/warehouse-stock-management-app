<!-- Setup Section -->
<section id="setup" class="documentation-section mb-12">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6">Setup & Installation</h2>

    <div class="bg-white rounded-lg shadow p-4 sm:p-6 mb-8">
        <h3 class="text-xl font-semibold mb-4 text-gray-800 border-b pb-2">🚀 Quick Start with Docker</h3>

        <div class="space-y-4 sm:space-y-6">
            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">1. Clone the repository</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>git clone https://github.com/ekayudinata/warehouse-stock-management-app.git
cd warehouse-stock-management-app</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">2. Copy environment file</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>cp .env.example .env</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">3. Start Docker containers</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>docker-compose -f docker/warehouse-stock/docker-compose.yml up -d</code></pre>
            </div>

            <!-- access container -->
            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">3. Access container</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>docker exec -it --user=root warehouse_stock_php_fpm bash</code></pre>
            </div>

            <!-- install dependencies -->
            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">4. Install PHP dependencies</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>composer install</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">5. Generate application key</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>php artisan key:generate</code></pre>
            </div>

            <!-- access mysql bash -->
            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">6. Access mysql bash</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>docker exec -it --user=root warehouse_stock_mysql bash</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">6. Create database</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS warehouse_stock_management_app;"</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">7. Run migrations and seeders</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>php artisan migrate --seed</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">8. Set storage permissions</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>chown -R www-data:www-data storage bootstrap/cache</code></pre>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-4 sm:p-6">
        <h3 class="text-xl font-semibold mb-4 text-gray-800 border-b pb-2">🔧 Manual Setup</h3>

        <div class="mb-6">
            <h4 class="font-medium text-gray-800 mb-2">Prerequisites</h4>
            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                <li>PHP 8.1+</li>
                <li>Composer</li>
                <li>MySQL 5.7+</li>
            </ul>
        </div>

        <div class="space-y-4 sm:space-y-6">
            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">1. Clone the repository</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>git clone https://github.com/ekayudinata/warehouse-stock-management-app.git
cd warehouse-stock-management-app</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">2. Install PHP dependencies</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>composer install</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">3. Configure environment</h4>
                <p class="text-sm text-gray-600 mb-2">Copy the example env file and generate application key:</p>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>cp .env.example .env
php artisan key:generate</code></pre>
                <p class="text-sm text-gray-600 mt-2">Update the <code>.env</code> file with your database credentials and other settings.</p>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">5. Run migrations and seeders</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>php artisan migrate --seed</code></pre>
            </div>

            <div>
                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">6. Start the development server</h4>
                <pre class="bg-gray-800 text-gray-100 p-3 rounded-md overflow-x-auto"><code>php artisan serve</code></pre>
                <p class="text-sm text-gray-600 mt-2">Your application should now be running at <a href="http://localhost:8000" class="text-blue-600 hover:underline">http://localhost:8000</a></p>
            </div>
        </div>
    </div>
</section>
