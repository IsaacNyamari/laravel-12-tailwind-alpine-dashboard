<div x-show="supportModalOpen" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 support-modal">
    <div class="bg-slate-800 rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden flex flex-col">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-6 text-white flex justify-between items-center">
            <div class="flex items-center gap-3">
                <i class="fas fa-headset text-2xl"></i>
                <h2 class="text-2xl font-bold">Support Center</h2>
            </div>
            <button @click="supportModalOpen = false" class="text-white hover:text-slate-200 text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Tabs Navigation -->
        <div class="bg-slate-700 px-6 py-3 flex gap-1">
            <button @click="activeSupportTab = 'faq'"
                :class="activeSupportTab === 'faq' ? 'support-tab active' : 'support-tab'"
                class="px-4 py-2 rounded-lg font-medium transition-all">
                <i class="fas fa-question-circle mr-2"></i>FAQ
            </button>
            <button @click="activeSupportTab = 'chat'"
                :class="activeSupportTab === 'chat' ? 'support-tab active' : 'support-tab'"
                class="px-4 py-2 rounded-lg font-medium transition-all">
                <i class="fas fa-comments mr-2"></i>Live Chat
            </button>
            <button @click="activeSupportTab = 'tickets'"
                :class="activeSupportTab === 'tickets' ? 'support-tab active' : 'support-tab'"
                class="px-4 py-2 rounded-lg font-medium transition-all">
                <i class="fas fa-ticket-alt mr-2"></i>My Tickets
            </button>
            <button @click="activeSupportTab = 'contact'"
                :class="activeSupportTab === 'contact' ? 'support-tab active' : 'support-tab'"
                class="px-4 py-2 rounded-lg font-medium transition-all">
                <i class="fas fa-envelope mr-2"></i>Contact
            </button>
        </div>

        <!-- Tab Content -->
        <div class="flex-1 overflow-auto p-6">
            <!-- FAQ Tab -->
            <div x-show="activeSupportTab === 'faq'" class="space-y-4">
                <h3 class="text-xl font-semibold mb-4">Frequently Asked Questions</h3>

                <div class="faq-item bg-slate-700 p-4 rounded-lg cursor-pointer" @click="toggleFAQ(0)">
                    <div class="flex justify-between items-center">
                        <h4 class="font-medium">How do I reset my password?</h4>
                        <i :class="openFAQ === 0 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                    </div>
                    <div x-show="openFAQ === 0" class="mt-3 text-slate-300">
                        <p>To reset your password, go to Settings > Account Security > Reset Password. You'll
                            receive an email with a reset link.</p>
                    </div>
                </div>

                <div class="faq-item bg-slate-700 p-4 rounded-lg cursor-pointer" @click="toggleFAQ(1)">
                    <div class="flex justify-between items-center">
                        <h4 class="font-medium">How can I export my data?</h4>
                        <i :class="openFAQ === 1 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                    </div>
                    <div x-show="openFAQ === 1" class="mt-3 text-slate-300">
                        <p>Navigate to the Export section in your dashboard. Select the data types you want to
                            export and choose your preferred format (CSV, JSON, or Excel).</p>
                    </div>
                </div>

                <div class="faq-item bg-slate-700 p-4 rounded-lg cursor-pointer" @click="toggleFAQ(2)">
                    <div class="flex justify-between items-center">
                        <h4 class="font-medium">Where can I find billing information?</h4>
                        <i :class="openFAQ === 2 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                    </div>
                    <div x-show="openFAQ === 2" class="mt-3 text-slate-300">
                        <p>Billing information is available in the Billing section of your account. You can view
                            invoices, update payment methods, and change your subscription plan there.</p>
                    </div>
                </div>

                <div class="faq-item bg-slate-700 p-4 rounded-lg cursor-pointer" @click="toggleFAQ(3)">
                    <div class="flex justify-between items-center">
                        <h4 class="font-medium">How do I add new team members?</h4>
                        <i :class="openFAQ === 3 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                    </div>
                    <div x-show="openFAQ === 3" class="mt-3 text-slate-300">
                        <p>Team members can be added from the Users section. Click "Add User" and fill in their
                            details. They will receive an invitation email to join your team.</p>
                    </div>
                </div>
            </div>

            <!-- Live Chat Tab -->
            <div x-show="activeSupportTab === 'chat'" class="h-full flex flex-col">
                <h3 class="text-xl font-semibold mb-4">Live Chat Support</h3>

                <div class="flex-1 bg-slate-700 rounded-lg p-4 mb-4 overflow-y-auto max-h-64">
                    <div class="space-y-4">
                        <div class="chat-message flex justify-start">
                            <div class="bg-slate-600 rounded-lg p-3 max-w-xs">
                                <p class="text-sm">Hello! How can I help you today?</p>
                                <span class="text-xs text-slate-400 block mt-1">Support Agent • 10:30 AM</span>
                            </div>
                        </div>

                        <div class="chat-message flex justify-end">
                            <div class="bg-purple-600 rounded-lg p-3 max-w-xs">
                                <p class="text-sm">I'm having trouble accessing the reports section.</p>
                                <span class="text-xs text-purple-300 block mt-1">You • 10:31 AM</span>
                            </div>
                        </div>

                        <div class="chat-message flex justify-start">
                            <div class="bg-slate-600 rounded-lg p-3 max-w-xs">
                                <p class="text-sm">Let me check that for you. Are you getting any error
                                    messages?</p>
                                <span class="text-xs text-slate-400 block mt-1">Support Agent • 10:32 AM</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex gap-2">
                    <input type="text" x-model="chatMessage" placeholder="Type your message..."
                        class="flex-1 bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <button @click="sendChatMessage()"
                        class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>

            <!-- My Tickets Tab -->
            <div x-show="activeSupportTab === 'tickets'">
                <h3 class="text-xl font-semibold mb-4">My Support Tickets</h3>

                <div class="space-y-4">
                    <div class="support-request bg-slate-700 p-4 rounded-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium">Login issues after update</h4>
                                <p class="text-slate-400 text-sm mt-1">Created: 2 days ago</p>
                            </div>
                            <span class="status-badge status-pending">In Progress</span>
                        </div>
                        <p class="text-slate-300 mt-2">I can't log in to my account after the latest update.
                            Getting error code 502.</p>
                    </div>

                    <div class="support-request bg-slate-700 p-4 rounded-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium">Payment gateway error</h4>
                                <p class="text-slate-400 text-sm mt-1">Created: 1 week ago</p>
                            </div>
                            <span class="status-badge status-active">Resolved</span>
                        </div>
                        <p class="text-slate-300 mt-2">Payment processing is failing for some customers with
                            error "Invalid card".</p>
                    </div>

                    <div class="support-request bg-slate-700 p-4 rounded-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium">Feature request: Dark mode</h4>
                                <p class="text-slate-400 text-sm mt-1">Created: 2 weeks ago</p>
                            </div>
                            <span class="status-badge status-inactive">Under Review</span>
                        </div>
                        <p class="text-slate-300 mt-2">Please add a dark mode option to reduce eye strain
                            during
                            night usage.</p>
                    </div>
                </div>

                <button
                    class="w-full mt-6 bg-slate-700 hover:bg-slate-600 text-white py-3 rounded-lg transition-colors font-medium">
                    <i class="fas fa-plus mr-2"></i>Create New Ticket
                </button>
            </div>

            <!-- Contact Tab -->
            <div x-show="activeSupportTab === 'contact'">
                <h3 class="text-xl font-semibold mb-4">Contact Support</h3>

                <form class="space-y-4">
                    <div>
                        <label class="block text-slate-300 mb-2">Subject</label>
                        <input type="text"
                            class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>

                    <div>
                        <label class="block text-slate-300 mb-2">Category</label>
                        <select
                            class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option>Technical Issue</option>
                            <option>Billing Question</option>
                            <option>Feature Request</option>
                            <option>Account Problem</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-slate-300 mb-2">Description</label>
                        <textarea rows="4"
                            class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                            placeholder="Please describe your issue in detail..."></textarea>
                    </div>

                    <div>
                        <label class="block text-slate-300 mb-2">Attachment (Optional)</label>
                        <div class="border-2 border-dashed border-slate-600 rounded-lg p-4 text-center">
                            <i class="fas fa-cloud-upload-alt text-2xl text-slate-500 mb-2"></i>
                            <p class="text-slate-400">Drag and drop files here or click to browse</p>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg transition-colors font-medium">
                        <i class="fas fa-paper-plane mr-2"></i>Submit Request
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
