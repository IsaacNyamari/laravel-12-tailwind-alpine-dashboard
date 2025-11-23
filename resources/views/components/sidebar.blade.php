 <!-- Mobile backdrop -->
            <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/50 z-40 md:hidden"
                x-transition.opacity></div>

            <!-- Sidebar - Fixed positioning for mobile, relative for desktop -->
            <aside :class="sidebarOpen ? 'translate-x-0 w-64' : '-translate-x-full w-16 md:translate-x-0 md:w-16'"
                class="sidebar-gradient fixed md:relative inset-y-0 left-0 z-50 transform transition-all duration-200 overflow-hidden text-white p-4">
                <nav>
                    <ul class="space-y-3">
                        <li>
                            <a href="#"
                                class="sidebar-item flex items-center gap-3 p-2 rounded hover:bg-slate-800 hover:text-white">
                                <i class="inline-block w-6 text-center fas fa-dashboard"></i>
                                <span x-show="sidebarOpen" class="whitespace-nowrap transition-opacity duration-200"
                                    :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="sidebar-item flex items-center gap-3 p-2 rounded hover:bg-slate-800 hover:text-white">
                                <i class="inline-block w-6 text-center fas fa-users"></i>
                                <span x-show="sidebarOpen" class="whitespace-nowrap transition-opacity duration-200"
                                    :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="sidebar-item flex items-center gap-3 p-2 rounded hover:bg-slate-800 hover:text-white">
                                <i class="inline-block w-6 text-center fas fa-cog"></i>
                                <span x-show="sidebarOpen" class="whitespace-nowrap transition-opacity duration-200"
                                    :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="sidebar-item flex items-center gap-3 p-2 rounded hover:bg-slate-800 hover:text-white">
                                <i class="inline-block w-6 text-center fas fa-chart-bar"></i>
                                <span x-show="sidebarOpen" class="whitespace-nowrap transition-opacity duration-200"
                                    :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">Analytics</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="sidebar-item flex items-center gap-3 p-2 rounded hover:bg-slate-800 hover:text-white">
                                <i class="inline-block w-6 text-center fas fa-envelope"></i>
                                <span x-show="sidebarOpen" class="whitespace-nowrap transition-opacity duration-200"
                                    :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">Messages</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>