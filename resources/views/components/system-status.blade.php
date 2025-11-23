  <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-slate-800 p-6 rounded-xl shadow-lg">
          <h2 class="text-xl font-semibold mb-4 flex items-center">
              <i class="fas fa-server mr-2 text-blue-400"></i>System Status
          </h2>
          <div class="space-y-4">
              <div class="flex items-center justify-between">
                  <span>CPU Usage</span>
                  <span class="font-medium text-green-400">42%</span>
              </div>
              <div class="flex items-center justify-between">
                  <span>Memory Usage</span>
                  <span class="font-medium text-yellow-400">68%</span>
              </div>
              <div class="flex items-center justify-between">
                  <span>Disk Space</span>
                  <span class="font-medium text-green-400">35%</span>
              </div>
              <div class="flex items-center justify-between">
                  <span>Network Uptime</span>
                  <span class="font-medium text-green-400">99.9%</span>
              </div>
          </div>
      </div>

      <div class="bg-slate-800 p-6 rounded-xl shadow-lg">
          <h2 class="text-xl font-semibold mb-4 flex items-center">
              <i class="fas fa-download mr-2 text-purple-400"></i>Quick Actions
          </h2>
          <div class="grid grid-cols-2 gap-4">
              <button
                  class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg transition-colors flex flex-col items-center justify-center">
                  <i class="fas fa-plus text-xl mb-2"></i>
                  <span>Add User</span>
              </button>
              <button
                  class="bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg transition-colors flex flex-col items-center justify-center">
                  <i class="fas fa-file-export text-xl mb-2"></i>
                  <span>Export Data</span>
              </button>
              <button
                  class="bg-purple-600 hover:bg-purple-700 text-white py-3 px-4 rounded-lg transition-colors flex flex-col items-center justify-center">
                  <i class="fas fa-cog text-xl mb-2"></i>
                  <span>Settings</span>
              </button>
              <button
                  class="bg-red-600 hover:bg-red-700 text-white py-3 px-4 rounded-lg transition-colors flex flex-col items-center justify-center">
                  <i class="fas fa-trash text-xl mb-2"></i>
                  <span>Clean Up</span>
              </button>
          </div>
      </div>
  </div>
