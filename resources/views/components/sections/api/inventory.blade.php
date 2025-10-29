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
