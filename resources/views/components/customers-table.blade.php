 <div class="mt-6 bg-slate-800 p-4 rounded-lg shadow">
     <h2 class="text-xl font-semibold mb-4 text-white">customers Table</h2>

     <!-- Desktop Table (visible on medium screens and up) -->
     <div class="hidden md:block overflow-x-auto">
         <table class="min-w-full bg-white text-black rounded-lg overflow-hidden">
             <thead>
                 <tr class="bg-slate-700 text-white">
                     <th class="py-3 px-4 border-b text-left">Name</th>
                     <th class="py-3 px-4 border-b text-left">Email</th>
                     <th class="py-3 px-4 border-b text-left">Status</th>
                     <th class="py-3 px-4 border-b text-left">Actions</th>
                 </tr>
             </thead>
             <tbody>
                 <tr class="hover:bg-gray-50 hover:text-slate-950 transition-colors">
                     <td class="py-3 px-4 border-b">John Doe</td>
                     <td class="py-3 px-4 border-b">john.doe@example.com</td>
                     <td class="py-3 px-4 border-b">
                         <span
                             class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                     </td>
                     <td class="py-3 px-4 border-b">
                         <div class="flex space-x-2">
                             <button
                                 class="bg-blue-500 text-white px-3 py-1 rounded cursor-pointer hover:bg-blue-600 transition-colors text-sm">Edit</button>
                             <button
                                 class="bg-red-500 text-white px-3 py-1 rounded cursor-pointer hover:bg-red-600 transition-colors text-sm">Delete</button>
                         </div>
                     </td>
                 </tr>
                 <tr class="hover:bg-gray-50 hover:text-slate-950 transition-colors">
                     <td class="py-3 px-4 border-b">Jane Smith</td>
                     <td class="py-3 px-4 border-b">jane.smith@example.com</td>
                     <td class="py-3 px-4 border-b">
                         <span
                             class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                     </td>
                     <td class="py-3 px-4 border-b">
                         <div class="flex space-x-2">
                             <button
                                 class="bg-blue-500 text-white px-3 py-1 rounded cursor-pointer hover:bg-blue-600 transition-colors text-sm">Edit</button>
                             <button
                                 class="bg-red-500 text-white px-3 py-1 rounded cursor-pointer hover:bg-red-600 transition-colors text-sm">Delete</button>
                         </div>
                     </td>
                 </tr>
                 <tr class="hover:bg-gray-50 hover:text-slate-950 transition-colors">
                     <td class="py-3 px-4 border-b">Bob Johnson</td>
                     <td class="py-3 px-4 border-b">bob.johnson@example.com</td>
                     <td class="py-3 px-4 border-b">
                         <span
                             class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Inactive</span>
                     </td>
                     <td class="py-3 px-4 border-b">
                         <div class="flex space-x-2">
                             <button
                                 class="bg-blue-500 text-white px-3 py-1 rounded cursor-pointer hover:bg-blue-600 transition-colors text-sm">Edit</button>
                             <button
                                 class="bg-red-500 text-white px-3 py-1 rounded cursor-pointer hover:bg-red-600 transition-colors text-sm">Delete</button>
                         </div>
                     </td>
                 </tr>
             </tbody>
         </table>
     </div>

     <!-- Mobile Cards (visible on small screens) -->
     <div class="md:hidden space-y-4">
         <!-- User Card 1 -->
         <div class="bg-white rounded-lg p-4 shadow">
             <div class="flex justify-between items-start mb-3">
                 <h3 class="font-semibold text-lg">John Doe</h3>
                 <span
                     class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
             </div>
             <div class="space-y-2 text-sm">
                 <div class="flex">
                     <span class="font-medium w-16">Email:</span>
                     <span class="text-gray-700">john.doe@example.com</span>
                 </div>
                 <div class="flex">
                     <span class="font-medium w-16">Role:</span>
                     <span class="text-gray-700">Administrator</span>
                 </div>
             </div>
             <div class="flex space-x-2 mt-4">
                 <button
                     class="flex-1 bg-blue-500 text-white py-2 rounded cursor-pointer hover:bg-blue-600 transition-colors text-sm">Edit</button>
                 <button
                     class="flex-1 bg-red-500 text-white py-2 rounded cursor-pointer hover:bg-red-600 transition-colors text-sm">Delete</button>
             </div>
         </div>

         <!-- User Card 2 -->
         <div class="bg-white rounded-lg p-4 shadow">
             <div class="flex justify-between items-start mb-3">
                 <h3 class="font-semibold text-lg">Jane Smith</h3>
                 <span
                     class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
             </div>
             <div class="space-y-2 text-sm">
                 <div class="flex">
                     <span class="font-medium w-16">Email:</span>
                     <span class="text-gray-700">jane.smith@example.com</span>
                 </div>
                 <div class="flex">
                     <span class="font-medium w-16">Role:</span>
                     <span class="text-gray-700">Editor</span>
                 </div>
             </div>
             <div class="flex space-x-2 mt-4">
                 <button
                     class="flex-1 bg-blue-500 text-white py-2 rounded cursor-pointer hover:bg-blue-600 transition-colors text-sm">Edit</button>
                 <button
                     class="flex-1 bg-red-500 text-white py-2 rounded cursor-pointer hover:bg-red-600 transition-colors text-sm">Delete</button>
             </div>
         </div>

         <!-- User Card 3 -->
         <div class="bg-white rounded-lg p-4 shadow">
             <div class="flex justify-between items-start mb-3">
                 <h3 class="font-semibold text-lg">Bob Johnson</h3>
                 <span
                     class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Inactive</span>
             </div>
             <div class="space-y-2 text-sm">
                 <div class="flex">
                     <span class="font-medium w-16">Email:</span>
                     <span class="text-gray-700">bob.johnson@example.com</span>
                 </div>
                 <div class="flex">
                     <span class="font-medium w-16">Role:</span>
                     <span class="text-gray-700">Subscriber</span>
                 </div>
             </div>
             <div class="flex space-x-2 mt-4">
                 <button
                     class="flex-1 bg-blue-500 text-white py-2 rounded cursor-pointer hover:bg-blue-600 transition-colors text-sm">Edit</button>
                 <button
                     class="flex-1 bg-red-500 text-white py-2 rounded cursor-pointer hover:bg-red-600 transition-colors text-sm">Delete</button>
             </div>
         </div>
     </div>
 </div>
