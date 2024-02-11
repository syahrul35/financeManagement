<template>
    <div class="overflow-x-auto rounded-lg shadow-xl">
      <table class="table-auto min-w-full divide-y divide-gray-200">
        <thead class="bg-indigo-400 text-white">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Telepon</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                <td class="px-6 py-4 whitespace-nowrap">john@example.com</td>
                <td class="px-6 py-4 whitespace-nowrap">123-456-7890</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
                <td class="px-6 py-4 whitespace-nowrap">jane@example.com</td>
                <td class="px-6 py-4 whitespace-nowrap">987-654-3210</td>
            </tr>
            <!-- Tambahkan baris tambahan sesuai kebutuhan -->
        </tbody>
      </table>
    </div>
</template>