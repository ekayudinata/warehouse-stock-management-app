<!-- Authentication Section -->
<section id="authentication" class="documentation-section mb-12">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-6">Authentication</h2>
    <div class="bg-white rounded-lg shadow p-4 sm:p-6">
        <p class="text-gray-700 mb-4">
            The API uses Laravel Sanctum for authentication. To authenticate your requests, include the API token in the <code>Authorization</code> header.
        </p>

        <h3 class="text-xl font-semibold text-gray-800 mb-3">Obtaining an API Token</h3>
        <p class="text-gray-700 mb-4">
            Include your email and password to obtain an API token:
        </p>

        <div class="bg-gray-800 text-gray-100 p-3 sm:p-4 rounded-lg mb-4 overflow-x-auto">
            <pre><code>curl -X POST http://localhost:8000/api/auth/login \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{"email": "testUser@example.com", "password": "password"}'</code></pre>
        </div>
        <p class="text-sm text-gray-600 mt-2">
            <span class="font-medium">Test User Credentials:</span><br>
            Email: testUser@example.com<br>
            Password: password
        </p>

        <h3 class="text-xl font-semibold text-gray-800 mt-6 mb-3">Using the API Token</h3>
        <p class="text-gray-700 mb-2">
            Include the token in the <code>Authorization</code> header for authenticated requests:
        </p>
        <div class="bg-gray-800 text-gray-100 p-3 sm:p-4 rounded-lg">
            <pre><code>curl -X GET http://localhost:8000/api/user \
  -H "Accept: application/json" \
  -H "Authorization: Bearer YOUR_API_TOKEN"</code></pre>
        </div>
    </div>
</section>
