<section id="transactions" class="mb-12">
    <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-3 sm:mb-4">Transactions</h3>
    <div class="space-y-4 sm:space-y-6">
        <!-- Record Transaction -->
        <div class="bg-white rounded-lg shadow p-4 sm:p-6">
            <div class="flex items-center mb-4">
                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">POST</span>
                <code class="ml-2 text-sm">/api/v1/transactions</code>
            </div>
            <p class="text-gray-700 mb-4">Record a new inventory transaction (stock in/out).</p>

            <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">Request Body</h4>
            <pre><code class="language-json">{
  "product_id": 1,
  "quantity": 10,
  "type": "in",
  "note": "Received new stock"
}</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Request</h4>
            <pre><code>curl -X POST http://localhost:8000/api/v1/transactions \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -H "Authorization: Bearer YOUR_API_TOKEN" \
  -d '{"product_id":1,"quantity":10,"type":"in","note":"Received new stock"}'</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Response (201 Created)</h4>
            <pre><code class="language-json">{
  "status": "success",
  "message": "Transaction created successfully",
  "data": {
    "id": 1,
    "product_id": 1,
    "quantity": 10,
    "type": "in",
    "note": "Received new stock",
    "user_id": 1,
    "created_at": "2025-10-29T15:45:00.000000Z",
    "updated_at": "2025-10-29T15:45:00.000000Z",
    "product": {
      "id": 1,
      "sku": "PROD-00123",
      "name": "Premium Wireless Headphones",
      "description": "High-quality wireless headphones with noise cancellation",
      "unit_price": "199.99",
      "created_at": "2025-10-29T15:30:00.000000Z",
      "updated_at": "2025-10-29T15:30:00.000000Z"
    }
  },
  "inventory": {
    "product_id": 1,
    "new_quantity": 10
  }
}</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Error Response (422 Unprocessable Entity)</h4>
            <pre><code class="language-json">{
  "status": "error",
  "message": "Validation error",
  "errors": {
    "product_id": [
      "The product id field is required."
    ],
    "quantity": [
      "The quantity field is required."
    ],
    "type": [
      "The selected type is invalid."
    ]
  }
}</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Error Response (500 Internal Server Error)</h4>
            <pre><code class="language-json">{
  "status": "error",
  "message": "Insufficient stock for this transaction"
}</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Request Fields</h4>
            <div class="bg-gray-50 p-3 rounded mb-4">
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 text-sm">
                    <div class="font-medium">Field</div>
                    <div class="font-medium">Type</div>
                    <div class="font-medium">Required</div>
                    <div class="font-medium">Description</div>

                    <div class="font-mono">product_id</div>
                    <div>integer</div>
                    <div>Yes</div>
                    <div>ID of the product for the transaction</div>

                    <div class="font-mono">quantity</div>
                    <div>integer</div>
                    <div>Yes</div>
                    <div>Number of items (must be greater than 0)</div>

                    <div class="font-mono">type</div>
                    <div>string</div>
                    <div>Yes</div>
                    <div>Transaction type: 'in' for stock in, 'out' for stock out</div>

                    <div class="font-mono">note</div>
                    <div>string</div>
                    <div>No</div>
                    <div>Optional note about the transaction (max 500 chars)</div>
                </div>
            </div>
        </div>
    </div>
</section>
