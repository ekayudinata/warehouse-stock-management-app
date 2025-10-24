# Warehouse Stock Management API Documentation

## Table of Contents
- [REST API](#rest-api)
  - [Base URL](#base-url)
  - [Authentication](#authentication)
  - [API Endpoints](#api-endpoints)
- [GraphQL API](#graphql-api)
  - [Base URL](#graphql-base-url)
  - [Schema](#schema)
  - [Queries](#queries)
- [Error Handling](#error-handling)
- [Status Codes](#status-codes)
- [Rate Limiting](#rate-limiting)

## REST API

## Base URL
All API endpoints are relative to the base URL: `http://your-domain.com/api/v1`

## Authentication
Most endpoints require authentication. Include the access token in the `Authorization` header:
```
Authorization: Bearer {access_token}
```

## API Endpoints

### 1. Health Check
Check if the API is running.

- **Endpoint:** `GET /health`
- **Authentication:** Not required
- **Response:**
  ```json
  {
    "status": "success",
    "version": "1.0",
    "message": "API is running",
    "timestamp": "2023-10-24 14:30:00"
  }
  ```

### 2. Authentication

#### Login
Authenticate a user and retrieve an access token.

- **Endpoint:** `POST /login`
- **Authentication:** Not required
- **Request Body:**
  ```json
  {
    "email": "user@example.com",
    "password": "yourpassword"
  }
  ```
- **Success Response (200 OK):**
  ```json
  {
    "success": true,
    "token": "access_token_here",
    "user": {
      "id": 1,
      "name": "User Name",
      "email": "user@example.com"
    }
  }
  ```
- **Error Response (401 Unauthorized):**
  ```json
  {
    "message": "The provided credentials are incorrect.",
    "errors": {
      "email": ["The provided credentials are incorrect."]
    }
  }
  ```

### 3. Products

#### List Products
Get a paginated list of products.

- **Endpoint:** `GET /products`
- **Authentication:** Not required
- **Query Parameters:**
  - `per_page` (optional, default: 15): Number of items per page
  - `page` (optional, default: 1): Page number
- **Success Response (200 OK):**
  ```json
  {
    "status": "success",
    "data": [
      {
        "id": 1,
        "name": "Product 1",
        "description": "Product description",
        "price": 99.99,
        "stock": 100,
        "created_at": "2023-10-24T06:30:00.000000Z",
        "updated_at": "2023-10-24T06:30:00.000000Z"
      }
    ],
    "pagination": {
      "total": 50,
      "per_page": 15,
      "current_page": 1,
      "last_page": 4,
      "from": 1,
      "to": 15
    }
  }
  ```

### 4. Transactions

#### Create Transaction
Create a new stock transaction (in/out).

- **Endpoint:** `POST /transactions`
- **Authentication:** Required
- **Request Body:**
  ```json
  {
    "product_id": 1,
    "quantity": 10,
    "type": "in",
    "note": "Stock received from supplier"
  }
  ```
- **Fields:**
  - `product_id` (required): ID of the product
  - `quantity` (required, integer, min: 1): Number of items
  - `type` (required, enum: in,out): Type of transaction
  - `note` (optional, max: 500 characters): Additional notes
- **Success Response (201 Created):**
  ```json
  {
    "status": "success",
    "data": {
      "id": 1,
      "product_id": 1,
      "quantity": 10,
      "type": "in",
      "note": "Stock received from supplier",
      "user_id": 1,
      "created_at": "2023-10-24T06:35:00.000000Z",
      "updated_at": "2023-10-24T06:35:00.000000Z"
    }
  }
  ```
- **Error Response (422 Unprocessable Entity):**
  ```json
  {
    "status": "error",
    "message": "Validation error",
    "errors": {
      "product_id": ["The selected product id is invalid."],
      "quantity": ["The quantity must be at least 1."]
    }
  }
  ```

## GraphQL API

### Base URL
All GraphQL queries and mutations are sent to: `http://your-domain.com/graphql`


### Schema

#### Types

##### Product
Represents a product in the inventory.

```graphql
type Product {
  # Unique identifier
  id: ID!
  
  # Stock Keeping Unit (unique identifier for the product)
  sku: String!
  
  # Name of the product
  name: String!
  
  # Detailed product description
  description: String
  
  # Price per unit
  unit_price: Float!
  
  # When the product was created
  created_at: DateTime!
  
  # When the product was last updated
  updated_at: DateTime!
}
```

### Queries

#### Get All Products
Retrieve a list of all products.

- **Query:**
  ```graphql
  query {
    products {
      id
      sku
      name
      description
      unit_price
      created_at
      updated_at
    }
  }
  ```

- **Response:**
  ```json
  {
    "data": {
      "products": [
        {
          "id": "1",
          "sku": "PROD001",
          "name": "Sample Product",
          "description": "Sample product description",
          "unit_price": 99.99,
          "created_at": "2023-10-24T06:30:00.000000Z",
          "updated_at": "2023-10-24T06:30:00.000000Z"
        }
      ]
    }
  }
  ```

## Error Handling
All error responses follow a consistent format:

```json
{
  "status": "error",
  "message": "Error message",
  "errors": {
    "field_name": ["Error message for this field"]
  }
}
```

## Status Codes
- 200 OK: Request successful
- 201 Created: Resource created successfully
- 401 Unauthorized: Authentication required or invalid token
- 403 Forbidden: Insufficient permissions
- 404 Not Found: Resource not found
- 422 Unprocessable Entity: Validation error
- 500 Internal Server Error: Server error

## Rate Limiting
API requests are rate limited to 60 requests per minute. Exceeding this limit will result in a 429 Too Many Requests response.
