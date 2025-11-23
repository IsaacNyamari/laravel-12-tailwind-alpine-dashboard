<div class="py-6 grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Notifications Panel -->
    <div class="bg-slate-800 p-6 rounded-xl shadow-lg">
        <h2 class="text-xl font-semibold mb-4 flex items-center">
            <i class="fas fa-bell mr-2 text-yellow-400"></i>Notifications
        </h2>
        <ul class="space-y-3">
            <li class="notification-item bg-slate-700 p-4 rounded-lg flex items-start gap-3">
                <span class="text-yellow-400 text-lg mt-1"><i class="fas fa-bell"></i></span>
                <div>
                    <p>New user registered: <strong>Michael</strong></p>
                    <p class="text-sm text-slate-400 mt-1">5 minutes ago</p>
                </div>
            </li>
            <li class="notification-item bg-slate-700 p-4 rounded-lg flex items-start gap-3">
                <span class="text-green-400 text-lg mt-1"><i class="fas fa-cog"></i></span>
                <div>
                    <p>System update completed successfully.</p>
                    <p class="text-sm text-slate-400 mt-1">2 hours ago</p>
                </div>
            </li>
            <li class="notification-item bg-slate-700 p-4 rounded-lg flex items-start gap-3">
                <span class="text-blue-400 text-lg mt-1"><i class="fas fa-shopping-cart"></i></span>
                <div>
                    <p>New order placed by <strong>Anna</strong>.</p>
                    <p class="text-sm text-slate-400 mt-1">Yesterday</p>
                </div>
            </li>
        </ul>
    </div>

    <!-- Messages Panel -->
    <div class="bg-slate-800 p-6 rounded-xl shadow-lg">
        <h2 class="text-xl font-semibold mb-4 flex items-center">
            <i class="fas fa-envelope mr-2 text-blue-400"></i>Messages
        </h2>
        <ul class="space-y-3">
            <li class="message-item bg-slate-700 p-4 rounded-lg">
                <div class="flex items-center mb-2">
                    <div class="w-8 h-8 rounded-full bg-purple-500 flex items-center justify-center text-white mr-3">
                        <i class="fas fa-user text-sm"></i>
                    </div>
                    <p class="font-semibold">John Doe</p>
                </div>
                <p class="text-sm text-slate-300">Hey, can you check the new report?</p>
                <p class="text-xs text-slate-500 mt-2">10:30 AM</p>
            </li>

            <li class="message-item bg-slate-700 p-4 rounded-lg">
                <div class="flex items-center mb-2">
                    <div class="w-8 h-8 rounded-full bg-pink-500 flex items-center justify-center text-white mr-3">
                        <i class="fas fa-user text-sm"></i>
                    </div>
                    <p class="font-semibold">Sarah W.</p>
                </div>
                <p class="text-sm text-slate-300">Please update my account role.</p>
                <p class="text-xs text-slate-500 mt-2">Yesterday</p>
            </li>

            <li class="message-item bg-slate-700 p-4 rounded-lg">
                <div class="flex items-center mb-2">
                    <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white mr-3">
                        <i class="fas fa-robot text-sm"></i>
                    </div>
                    <p class="font-semibold">Admin Bot</p>
                </div>
                <p class="text-sm text-slate-300">Your backup is ready for download.</p>
                <p class="text-xs text-slate-500 mt-2">2 days ago</p>
            </li>
        </ul>
    </div>

</div>
