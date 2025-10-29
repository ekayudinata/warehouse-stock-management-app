<!-- API Documentation Section -->
<section id="api-documentation" class="documentation-section">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-6">API Documentation</h2>

    <!-- Products Section -->
    <div id="products" class="mb-12">
        <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-3 sm:mb-4">Products</h3>
        <div class="space-y-4 sm:space-y-6">
            <!-- List Products -->
            <div class="bg-white rounded-lg shadow p-4 sm:p-6">
                <div class="flex items-center mb-4">
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">GET</span>
                    <code class="ml-2 text-sm">/api/products</code>
                </div>
                <p class="text-gray-700 mb-4">Retrieve a list of all products with pagination.</p>

                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">Example Request</h4>
                <pre><code>curl -X GET http://localhost:8000/api/products \
  -H "Accept: application/json"</code></pre>

                <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Response</h4>
                <pre><code class="language-json">{
  "data": [
    {
      "id": 1,
      "sku": "PROD001",
      "name": "Product 1",
      "description": "Sample product description",
      "category": "Electronics",
      "price": 99.99,
      "created_at": "2023-10-29T05:30:00.000000Z",
      "updated_at": "2023-10-29T05:30:00.000000Z"
    }
  ],
  "links": {
    "first": "http://localhost:8000/api/products?page=1",
    "last": "http://localhost:8000/api/products?page=1",
    "prev": null,
    "next": null
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 1,
    "path": "http://localhost:8000/api/products",
    "per_page": 15,
    "to": 1,
    "total": 1
  }
}</code></pre>
            </div>

            <!-- Create Product -->
            <div class="bg-white rounded-lg shadow p-4 sm:p-6 mt-6">
                <div class="flex items-center mb-4">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">POST</span>
                    <code class="ml-2 text-sm">/api/products</code>
                </div>
                <p class="text-gray-700 mb-4">Create a new product.</p>

                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">Request Body</h4>
                <pre><code class="language-json">{
  "sku": "PROD002",
  "name": "New Product",
  "description": "New product description",
  "category": "Electronics",
  "price": 149.99,
  "quantity": 100
}</code></pre>

                <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Request</h4>
                <pre><code>curl -X POST http://localhost:8000/api/products \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"sku":"PROD002","name":"New Product","description":"New product description","category":"Electronics","price":149.99,"quantity":100}'</code></pre>
            </div>
        </div>
    </div>

    <!-- Inventory Section -->
    <div id="inventory" class="mb-12">
        <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-3 sm:mb-4">Inventory</h3>
        <div class="space-y-4 sm:space-y-6">
            <!-- Get Inventory -->
            <div class="bg-white rounded-lg shadow p-4 sm:p-6">
                <div class="flex items-center mb-4">
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">GET</span>
                    <code class="ml-2 text-sm">/api/inventory</code>
                </div>
                <p class="text-gray-700 mb-4">Retrieve current inventory levels for all products.</p>

                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">Example Request</h4>
                <pre><code>curl -X GET http://localhost:8000/api/inventory \
  -H "Accept: application/json"</code></pre>

                <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Response</h4>
                <pre><code class="language-json">{
  "data": [
    {
      "id": 1,
      "product_id": 1,
      "warehouse_id": 1,
      "quantity_available": 50,
      "quantity_reserved": 10,
      "last_restocked_at": "2023-10-28T15:23:45.000000Z",
      "created_at": "2023-10-28T15:23:45.000000Z",
      "updated_at": "2023-10-29T08:15:22.000000Z",
      "product": {
        "id": 1,
        "sku": "PROD001",
        "name": "Product 1",
        "price": 99.99
      },
      "warehouse": {
        "id": 1,
        "name": "Main Warehouse",
        "location": "Building A"
      }
    }
  ]
}</code></pre>
            </div>
        </div>
    </div>

    <!-- Transactions Section -->
    <div id="transactions" class="mb-12">
        <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-3 sm:mb-4">Transactions</h3>
        <div class="space-y-4 sm:space-y-6">
            <!-- Record Transaction -->
            <div class="bg-white rounded-lg shadow p-4 sm:p-6">
                <div class="flex items-center mb-4">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">POST</span>
                    <code class="ml-2 text-sm">/api/transactions</code>
                </div>
                <p class="text-gray-700 mb-4">Record a new inventory transaction (receipt, issue, adjustment).</p>

                <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">Request Body</h4>
                <pre><code class="language-json">{
  "type": "receipt",
  "product_id": 1,
  "warehouse_id": 1,
  "quantity": 25,
  "reference": "PO-12345",
  "notes": "Received new stock"
}</code></pre>

                <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Request</h4>
                <pre><code>curl -X POST http://localhost:8000/api/transactions \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"type":"receipt","product_id":1,"warehouse_id":1,"quantity":25,"reference":"PO-12345","notes":"Received new stock"}'</code></pre>

                <h4 class="font-medium text-gray-800 mt-4 mb-2">Transaction Types</h4>
                <ul class="list-disc pl-5 space-y-1 text-gray-700">
                    <li><code>receipt</code> - Adding stock to inventory</li>
                    <li><code>issue</code> - Removing stock from inventory</li>
                    <li><code>adjustment</code> - Adjusting inventory levels (positive or negative)</li>
                    <li><code>transfer</code> - Transferring stock between locations</li>
                </ul>
            </div>
        </div>
    </div>
</section>
