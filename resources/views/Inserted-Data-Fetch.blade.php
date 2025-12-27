<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserted Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Inserted Data</h1>
        <a href="{{ route('insert.form') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">Add Data</a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('insert.search') }}" method="get" class="mb-6 flex gap-2">
        <input type="search" name="search" placeholder="Search" value="{{ @$search }}"
               class="flex-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Search</button>
    </form>

    <!-- Data Table -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-center text-sm font-medium uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-center text-sm font-medium uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-center text-sm font-medium uppercase tracking-wider">Phone</th>
                    <th class="px-6 py-3 text-center text-sm font-medium uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($data as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-gray-800 text-center">{{ $item->name }}</td>
                    <td class="px-6 py-4 text-gray-800 text-center">{{ $item->email }}</td>
                    <td class="px-6 py-4 text-gray-800 text-center">{{ $item->phone }}</td>
                    <td class="px-6 py-4 flex gap-2 justify-center ">
                        <a href="{{ 'delete/'.$item->id }}" 
                           class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Delete</a>
                        <a href="{{ 'edit/'.$item->id }}" 
                           class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500">No Data Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4">
        {{ $data->links() }}
    </div>
</div>

</body>
</html>
