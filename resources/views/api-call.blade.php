<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserted Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="max-w-7xl mx-auto px-4 py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">API Users</h1>
        <span class="text-gray-500 text-sm">Total: {{ count($data) }}</span>
    </div>

    <div class="overflow-x-auto rounded-lg shadow-lg bg-white border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Username</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Phone</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Website</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Company</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Street</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($data as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $item['name'] }}</td>
                    <td class="px-6 py-4">{{ $item['username'] }}</td>
                    <td class="px-6 py-4 text-blue-600">{{ $item['email'] }}</td>
                    <td class="px-6 py-4">{{ $item['phone'] }}</td>
                    <td class="px-6 py-4 text-indigo-600">{{ $item['website'] }}</td>
                    <td class="px-6 py-4">{{ $item['company']['name'] }}</td>
                    <td class="px-6 py-4">{{ $item['address']['street'] }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-6 text-gray-500">No Data Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
