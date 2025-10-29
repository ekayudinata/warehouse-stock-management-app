<!-- Error Handling Section -->
<section id="error-handling" class="documentation-section mb-12">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-6">Error Handling</h2>
    <div class="bg-white rounded-lg shadow p-4 sm:p-6">
        <p class="text-gray-700 mb-4">
            The API returns standard HTTP response codes to indicate the success or failure of an API request.
        </p>

        <div class="overflow-x-auto -mx-4 sm:mx-0">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">200</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">OK</td>
                        <td class="px-6 py-4 text-sm text-gray-500">The request was successful</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">201</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Created</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Resource created successfully</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">400</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Bad Request</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Invalid request parameters</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">401</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Unauthorized</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Authentication failed or not provided</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">403</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Forbidden</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Insufficient permissions</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">404</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Not Found</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Resource not found</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">422</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Unprocessable Entity</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Validation errors occurred</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">500</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Internal Server Error</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Server error occurred</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3 class="text-xl font-semibold text-gray-800 mt-8 mb-3">Error Response Format</h3>
        <p class="text-gray-700 mb-4">
            When an error occurs, the API returns a JSON object with error details:
        </p>
        
        <div class="bg-gray-800 text-gray-100 p-3 sm:p-4 rounded-lg mb-4 overflow-x-auto">
            <pre><code class="language-json">{
  "message": "The given data was invalid.",
  "errors": {
    "email": [
      "The email field is required."
    ],
    "password": [
      "The password field is required."
    ]
  }
}</code></pre>
        </div>
    </div>
</section>
