<section id="products" class="mb-12">
    <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-3 sm:mb-4">Products</h3>
    <div class="space-y-4 sm:space-y-6">
        <!-- List Products -->
        <div class="bg-white rounded-lg shadow p-4 sm:p-6">
            <div class="flex items-center mb-4">
                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">GET</span>
                <code class="ml-2 text-sm">/api/v1/products</code>
            </div>
            <p class="text-gray-700 mb-4">Retrieve a list of all products with pagination.</p>

            <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">Example Request</h4>
            <pre><code>curl -X GET http://localhost:8000/api/v1/products \
  -H "Accept: application/json"</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Response</h4>
            <pre><code class="language-json">{
    "status": "success",
    "data": [
        {
            "id": 1,
            "sku": "test",
            "name": "data",
            "description": "Test",
            "unit_price": "800.00",
            "created_at": "2025-09-19T04:09:22.000000Z",
            "updated_at": "2025-10-29T11:53:07.000000Z"
        },
        {
            "id": 2,
            "sku": "NET-9623",
            "name": "LG Network Cable 3325",
            "description": "Non occaecati ducimus eligendi vel voluptas facere error aut illum iure ea iste sapiente accusantium est porro.",
            "unit_price": "276.28",
            "created_at": "2025-06-24T13:53:11.000000Z",
            "updated_at": "2025-02-01T21:17:14.000000Z"
        }
    ],
    "pagination": {
        "total": 25,
        "per_page": 15,
        "current_page": 1,
        "last_page": 2,
        "from": 1,
        "to": 15
    }
}</code></pre>
        </div>

        <!-- Create Product -->
        <div class="bg-white rounded-lg shadow p-4 sm:p-6 mt-6">
            <div class="flex items-center mb-4">
                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">POST</span>
                <code class="ml-2 text-sm">/api/v1/products</code>
            </div>
            <p class="text-gray-700 mb-4">Create a new product.</p>

            <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">Request Body</h4>
            <pre><code class="language-json">{
  "sku": "PROD-00123",
  "name": "Premium Wireless Headphones",
  "description": "High-quality wireless headphones with noise cancellation",
  "unit_price": 199.99
}</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Request</h4>
            <pre><code>curl -X POST http://localhost:8000/api/v1/products \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -H "Authorization: Bearer YOUR_API_TOKEN" \
  -d '{"sku":"PROD-00123","name":"Premium Wireless Headphones","description":"High-quality wireless headphones with noise cancellation","unit_price":199.99}'</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Response (201 Created)</h4>
            <pre><code class="language-json">{
  "status": "success",
  "message": "Product created successfully",
  "data": {
    "id": 101,
    "sku": "PROD-00123",
    "name": "Premium Wireless Headphones",
    "description": "High-quality wireless headphones with noise cancellation",
    "unit_price": "199.99",
    "created_at": "2025-10-29T15:30:00.000000Z",
    "updated_at": "2025-10-29T15:30:00.000000Z"
  }
}</code></pre>
        </div>

        <!-- Update Product -->
        <div class="bg-white rounded-lg shadow p-4 sm:p-6 mt-6">
            <div class="flex items-center mb-4">
                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">PUT</span>
                <code class="ml-2 text-sm">/api/v1/products/{product}</code>
            </div>
            <p class="text-gray-700 mb-4">Update an existing product. All fields are optional, but at least one field must be provided.</p>

            <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">URL Parameters</h4>
            <div class="bg-gray-50 p-3 rounded mb-4">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-sm">
                    <div class="font-medium">Parameter</div>
                    <div class="font-medium">Type</div>
                    <div class="font-medium">Description</div>

                    <div class="font-mono">product</div>
                    <div>integer</div>
                    <div>ID of the product to update</div>
                </div>
            </div>

            <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">Request Body</h4>
            <pre><code class="language-json">{
  "name": "Premium Wireless Headphones (Updated)",
  "description": "High-quality wireless headphones with active noise cancellation and 30-hour battery life",
  "unit_price": 219.99
}</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Request</h4>
            <pre><code>curl -X PUT http://localhost:8000/api/v1/products/101 \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -H "Authorization: Bearer YOUR_API_TOKEN" \
  -d '{"name":"Premium Wireless Headphones (Updated)","description":"High-quality wireless headphones with active noise cancellation and 30-hour battery life","unit_price":219.99}'</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Response (200 OK)</h4>
            <pre><code class="language-json">{
  "status": "success",
  "message": "Product updated successfully",
  "data": {
    "id": 101,
    "sku": "PROD-00123",
    "name": "Premium Wireless Headphones (Updated)",
    "description": "High-quality wireless headphones with active noise cancellation and 30-hour battery life",
    "unit_price": "219.99",
    "created_at": "2025-10-29T15:30:00.000000Z",
    "updated_at": "2025-10-29T16:45:22.000000Z"
  }
}</code></pre>
        </div>

        <!-- Delete Product -->
        <div class="bg-white rounded-lg shadow p-4 sm:p-6 mt-6">
            <div class="flex items-center mb-4">
                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">DELETE</span>
                <code class="ml-2 text-sm">/api/v1/products/{product}</code>
            </div>
            <p class="text-gray-700 mb-4">Delete a product from the system. This action cannot be undone.</p>

            <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">URL Parameters</h4>
            <div class="bg-gray-50 p-3 rounded mb-4">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-sm">
                    <div class="font-medium">Parameter</div>
                    <div class="font-medium">Type</div>
                    <div class="font-medium">Description</div>

                    <div class="font-mono">product</div>
                    <div>integer</div>
                    <div>ID of the product to delete</div>
                </div>
            </div>

            <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">Example Request</h4>
            <pre><code>curl -X DELETE http://localhost:8000/api/v1/products/101 \
  -H "Accept: application/json" \
  -H "Authorization: Bearer YOUR_API_TOKEN"</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Response (200 OK)</h4>
            <pre><code class="language-json">{
  "status": "success",
  "message": "Product deleted successfully"
}</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Error Response (404 Not Found)</h4>
            <pre><code class="language-json">{
  "status": "error",
  "message": "Product not found"
}</code></pre>
        </div>
    </div>
</section>
