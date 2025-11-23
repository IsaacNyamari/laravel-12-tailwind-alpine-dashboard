  <header class="bg-slate-800 text-white p-4 flex items-center justify-between shadow-lg">
      <div class="flex items-center gap-4">
          <button @click="sidebarOpen = !sidebarOpen" :aria-expanded="sidebarOpen.toString()" aria-label="Toggle sidebar"
              class="sidebar-toggle p-2 rounded-lg hover:bg-slate-700 focus:outline-none">
              <!-- show hamburger when closed, X when open -->
              <i x-show="!sidebarOpen" class="fas fa-bars text-lg"></i>
              <i x-show="sidebarOpen" class="fas fa-times text-lg"></i>
          </button>

          <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
              <i class="fas fa-tachometer-alt mr-2"></i>Admin Dashboard
          </h1>
      </div>

      <div class="flex items-center gap-4">
          <!-- Support Button -->
          <button @click="openSupportModal()"
              class="flex items-center gap-2 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white px-4 py-2 rounded-lg transition-all duration-300 shadow-lg">
              <i class="fas fa-headset"></i>
              <span>Support</span>
          </button>

          <div x-data="{ accDropdownOpen: false }" class="relative" @click.away="accDropdownOpen = false">
              <button @click="accDropdownOpen = !accDropdownOpen" :aria-expanded="accDropdownOpen.toString()"
                  class="flex items-center gap-2 bg-slate-700 hover:bg-slate-600 px-4 py-2 rounded-lg transition-colors">
                  <i class="fas fa-user-circle"></i>
                  <span>My Account</span>
                  <i class="fas fa-chevron-down text-xs"></i>
              </button>

              <ul x-show="accDropdownOpen" x-transition
                  class="account-dropdown absolute right-0 mt-2 w-48 bg-white text-black z-50">
                  <li>
                      <a href="#"
                          class="flex items-center gap-2 px-4 py-3 hover:text-white hover:bg-purple-500 transition-colors">
                          <i class="fas fa-user"></i>
                          <div class="flex flex-col">
                              <span>Profile</span>
                              @auth
                                  <span class="text-xs text-gray-300">{{ Auth::user()->email }}</span>
                              @endauth
                          </div>
                      </a>
                  </li>
                  <li><a href="#"
                          class="flex items-center gap-2 px-4 py-3 hover:text-white hover:bg-purple-500 transition-colors"><i
                              class="fas fa-cog"></i>Settings</a></li>
                  <li>
                      <form action="{{ route('logout') }}" method="post" class="w-full">
                          @csrf
                          <button type="submit"
                              class="flex items-center gap-2 px-4 py-3 hover:text-white hover:bg-purple-500 cursor-pointer transition-colors w-full"><i
                                  class="fas fa-sign-out-alt"></i>Logout</button>
                      </form>
                  </li>
              </ul>
          </div>
      </div>
  </header>
