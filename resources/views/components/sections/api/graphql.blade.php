<section id="graphql-api" class="mb-12">
    <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-3 sm:mb-4">GraphQL API</h3>
    <p class="text-gray-700 mb-6">Interact with the inventory system using GraphQL. All GraphQL requests should be sent as POST requests to <code class="bg-gray-100 px-2 py-1 rounded">/graphql</code> endpoint.</p>

    <div class="space-y-8">
        <!-- GraphQL Query Example -->
        <div class="bg-white rounded-lg shadow p-4 sm:p-6">
            <div class="flex items-center mb-4">
                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded">QUERY</span>
                <code class="ml-2 text-sm">Get All Products</code>
            </div>

            <h4 class="font-medium text-gray-800 mb-1 sm:mb-2">GraphQL Query</h4>
            <pre><code class="language-graphql">query {
  products {
    id
    sku
    name
    description
    unit_price
    created_at
    updated_at
  }
}</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Request</h4>
            <pre><code>curl -X POST http://localhost:8000/graphql \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"query":"{products{id sku name description unit_price created_at updated_at}}"}'</code></pre>

            <h4 class="font-medium text-gray-800 mt-4 mb-2">Example Response</h4>
            <pre><code class="language-json">{
  "data": {
    "products": [
      {
        "id": "1",
        "sku": "PROD-00123",
        "name": "Premium Wireless Headphones",
        "description": "High-quality wireless headphones with noise cancellation",
        "unit_price": 199.99,
        "created_at": "2025-10-29T15:30:00.000000Z",
        "updated_at": "2025-10-29T15:30:00.000000Z"
      },
      {
        "id": "2",
        "sku": "KB-00456",
        "name": "Mechanical Keyboard",
        "description": "RGB mechanical keyboard with blue switches",
        "unit_price": 129.99,
        "created_at": "2025-10-28T10:15:30.000000Z",
        "updated_at": "2025-10-28T10:15:30.000000Z"
      }
    ]
  }
}</code></pre>
        </div>

        <!-- GraphQL Types -->
        <div class="bg-white rounded-lg shadow p-4 sm:p-6">
            <h4 class="font-medium text-gray-800 mb-3">Available Types</h4>
            <div class="bg-gray-50 p-3 rounded">
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 text-sm">
                    <div class="font-medium">Type</div>
                    <div class="font-medium">Fields</div>
                    <div class="font-medium">Type</div>
                    <div class="font-medium">Description</div>

                    <div class="font-mono">Product</div>
                    <div>id</div>
                    <div>ID!</div>
                    <div>Unique identifier</div>

                    <div></div>
                    <div>sku</div>
                    <div>String!</div>
                    <div>Stock Keeping Unit</div>

                    <div></div>
                    <div>name</div>
                    <div>String!</div>
                    <div>Product name</div>

                    <div></div>
                    <div>description</div>
                    <div>String</div>
                    <div>Product description</div>

                    <div></div>
                    <div>unit_price</div>
                    <div>Float!</div>
                    <div>Price per unit</div>
                </div>
            </div>
        </div>
    </div>
</section>
