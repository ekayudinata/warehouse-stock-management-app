<!-- Rate Limiting Section -->
<section id="rate-limiting" class="documentation-section mb-12">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-6">Rate Limiting</h2>
    <div class="bg-white rounded-lg shadow p-4 sm:p-6">
        <p class="text-gray-700 mb-4">
            To ensure fair usage, the API is rate limited. By default, the API allows 60 requests per minute per authenticated user or IP address.
        </p>
        <p class="text-gray-700 mb-4">
            When the rate limit is exceeded, the API will respond with a <code>429 Too Many Requests</code> status code and include the following headers:
        </p>

        <ul class="list-disc pl-5 space-y-2 text-gray-700 mb-4">
            <li><code>X-RateLimit-Limit</code>: The maximum number of requests allowed in the time window</li>
            <li><code>X-RateLimit-Remaining</code>: The number of requests remaining in the current window</li>
            <li><code>Retry-After</code>: The number of seconds to wait before making another request</li>
        </ul>

        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        For production use, consider implementing request queuing and retry logic with exponential backoff to handle rate limiting gracefully.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
