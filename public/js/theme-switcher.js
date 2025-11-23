function themeSwitcher() {
    return {
        isDark: true,
        sidebarOpen: true,
        init() {
            // Check for saved theme preference or default to dark
            const savedTheme = localStorage.getItem('theme');
            this.isDark = savedTheme ? savedTheme === 'dark' : true;
            
            // Check for saved sidebar state or default to open
            const savedSidebarState = localStorage.getItem('sidebarOpen');
            this.sidebarOpen = savedSidebarState ? savedSidebarState === 'true' : true;
            
            applyTheme(this.isDark);
            applySidebarState(this.sidebarOpen);
        },
        toggle() {
            this.isDark = !this.isDark;
            localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
            applyTheme(this.isDark);
        },
        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen;
            localStorage.setItem('sidebarOpen', this.sidebarOpen.toString());
            applySidebarState(this.sidebarOpen);
        }
    };
}

function applyTheme(isDark) {
    const body = document.body;
    
    // Set body theme classes
    if (isDark) {
        body.classList.remove('bg-white', 'text-black');
        body.classList.add('bg-slate-950', 'text-white');
    } else {
        body.classList.remove('bg-slate-950', 'text-white');
        body.classList.add('bg-white', 'text-black');
    }

    // Apply theme to all elements
    applyThemeToAllElements(isDark);
}

function applySidebarState(isOpen) {
    const sidebar = document.querySelector('aside');
    const main = document.querySelector('main');
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    
    if (sidebar) {
        if (isOpen) {
            sidebar.classList.remove('-translate-x-full', 'w-16');
            sidebar.classList.add('translate-x-0', 'w-64');
        } else {
            sidebar.classList.remove('translate-x-0', 'w-64');
            sidebar.classList.add('-translate-x-full', 'w-16');
        }
    }
    
    if (main) {
        if (isOpen) {
            main.classList.remove('md:ml-0');
            main.classList.add('md:ml-0');
        } else {
            main.classList.remove('md:ml-0');
            main.classList.add('md:ml-0');
        }
    }
    
    // Update sidebar item text visibility
    document.querySelectorAll('.sidebar-item span').forEach(span => {
        if (isOpen) {
            span.classList.remove('opacity-0');
            span.classList.add('opacity-100');
        } else {
            span.classList.remove('opacity-100');
            span.classList.add('opacity-0');
        }
    });
    
    // Update mobile backdrop
    const backdrop = document.querySelector('.fixed.inset-0.bg-black\\/50');
    if (backdrop) {
        if (isOpen && window.innerWidth < 768) {
            backdrop.classList.remove('hidden');
        } else {
            backdrop.classList.add('hidden');
        }
    }
}

function applyThemeToAllElements(isDark) {
    // Apply theme to all elements with a more systematic approach
    document.querySelectorAll('*').forEach(el => {
        if (!el.classList) return;
        
        const classes = Array.from(el.classList);
        
        if (isDark) {
            // Switch to dark mode
            classes.forEach(className => {
                switch(className) {
                    case 'bg-white':
                        el.classList.replace('bg-white', 'bg-slate-800');
                        break;
                    case 'bg-gray-50':
                        el.classList.replace('bg-gray-50', 'bg-slate-700');
                        break;
                    case 'bg-gray-100':
                        el.classList.replace('bg-gray-100', 'bg-slate-900');
                        break;
                    case 'text-black':
                        el.classList.replace('text-black', 'text-white');
                        break;
                    case 'text-gray-700':
                        el.classList.replace('text-gray-700', 'text-slate-300');
                        break;
                    case 'text-gray-600':
                        el.classList.replace('text-gray-600', 'text-slate-400');
                        break;
                    case 'bg-gray-200':
                        el.classList.replace('bg-gray-200', 'bg-slate-600');
                        break;
                    case 'border-gray-300':
                        el.classList.replace('border-gray-300', 'border-slate-600');
                        break;
                    case 'hover:bg-gray-100':
                        el.classList.replace('hover:bg-gray-100', 'hover:bg-slate-600');
                        break;
                    case 'hover:bg-gray-200':
                        el.classList.replace('hover:bg-gray-200', 'hover:bg-slate-700');
                        break;
                }
            });
            
            // Special handling for status badges in dark mode
            if (el.classList.contains('status-active')) {
                el.classList.remove('bg-green-100', 'text-green-800');
                el.classList.add('bg-green-900/30', 'text-green-300');
            }
            if (el.classList.contains('status-inactive')) {
                el.classList.remove('bg-red-100', 'text-red-800');
                el.classList.add('bg-red-900/30', 'text-red-300');
            }
            if (el.classList.contains('status-pending')) {
                el.classList.remove('bg-yellow-100', 'text-yellow-800');
                el.classList.add('bg-yellow-900/30', 'text-yellow-300');
            }
            
        } else {
            // Switch to light mode
            classes.forEach(className => {
                switch(className) {
                    case 'bg-slate-800':
                        el.classList.replace('bg-slate-800', 'bg-white');
                        break;
                    case 'bg-slate-700':
                        el.classList.replace('bg-slate-700', 'bg-gray-50');
                        break;
                    case 'bg-slate-900':
                        el.classList.replace('bg-slate-900', 'bg-gray-100');
                        break;
                    case 'bg-slate-600':
                        el.classList.replace('bg-slate-600', 'bg-gray-200');
                        break;
                    case 'text-white':
                        el.classList.replace('text-white', 'text-black');
                        break;
                    case 'text-slate-300':
                        el.classList.replace('text-slate-300', 'text-gray-700');
                        break;
                    case 'text-slate-400':
                        el.classList.replace('text-slate-400', 'text-gray-600');
                        break;
                    case 'border-slate-600':
                        el.classList.replace('border-slate-600', 'border-gray-300');
                        break;
                    case 'hover:bg-slate-600':
                        el.classList.replace('hover:bg-slate-600', 'hover:bg-gray-100');
                        break;
                    case 'hover:bg-slate-700':
                        el.classList.replace('hover:bg-slate-700', 'hover:bg-gray-200');
                        break;
                }
            });
            
            // Special handling for status badges in light mode
            if (el.classList.contains('status-active')) {
                el.classList.remove('bg-green-900/30', 'text-green-300');
                el.classList.add('bg-green-100', 'text-green-800');
            }
            if (el.classList.contains('status-inactive')) {
                el.classList.remove('bg-red-900/30', 'text-red-300');
                el.classList.add('bg-red-100', 'text-red-800');
            }
            if (el.classList.contains('status-pending')) {
                el.classList.remove('bg-yellow-900/30', 'text-yellow-300');
                el.classList.add('bg-yellow-100', 'text-yellow-800');
            }
        }
    });

    // Special handling for main layout elements
    applyThemeToLayout(isDark);
}

function applyThemeToLayout(isDark) {
    // Header
    const header = document.querySelector('header');
    if (header) {
        if (isDark) {
            header.classList.remove('bg-gray-100', 'text-black');
            header.classList.add('bg-slate-800', 'text-white');
        } else {
            header.classList.remove('bg-slate-800', 'text-white');
            header.classList.add('bg-gray-100', 'text-black');
        }
    }

    // Sidebar - preserve gradient classes
    const sidebar = document.querySelector('aside');
    if (sidebar) {
        if (isDark) {
            sidebar.classList.remove('bg-gray-100', 'text-black');
            if (!sidebar.classList.contains('sidebar-gradient')) {
                sidebar.classList.add('sidebar-gradient', 'text-white');
            }
        } else {
            sidebar.classList.remove('sidebar-gradient', 'text-white');
            sidebar.classList.add('bg-gray-100', 'text-black');
        }
    }

    // Main content - preserve gradient classes
    const main = document.querySelector('main');
    if (main) {
        if (isDark) {
            main.classList.remove('bg-gray-50', 'text-black');
            if (!main.classList.contains('main-gradient')) {
                main.classList.add('main-gradient', 'text-white');
            }
        } else {
            main.classList.remove('main-gradient', 'text-white');
            main.classList.add('bg-gray-50', 'text-black');
        }
    }
}

// Initialize theme and sidebar state on page load
document.addEventListener('DOMContentLoaded', function() {
    const theme = localStorage.getItem('theme') || 'dark';
    const sidebarState = localStorage.getItem('sidebarOpen') || 'true';
    const isDark = theme === 'dark';
    const isSidebarOpen = sidebarState === 'true';
    
    // Set initial body classes
    const body = document.body;
    if (isDark) {
        body.classList.add('bg-slate-950', 'text-white');
    } else {
        body.classList.add('bg-white', 'text-black');
    }
    
    applyTheme(isDark);
    applySidebarState(isSidebarOpen);
});

// Update the dashboard Alpine.js data to use the theme switcher's sidebar state
document.addEventListener('alpine:init', () => {
    Alpine.data('dashboard', () => ({
        // This will be overridden by themeSwitcher's init
        sidebarOpen: true,
        supportModalOpen: false,
        activeSupportTab: 'chat',
        openFAQ: null,
        chatMessage: '',

        init() {
            // Sync with themeSwitcher's sidebar state
            const savedSidebarState = localStorage.getItem('sidebarOpen');
            this.sidebarOpen = savedSidebarState ? savedSidebarState === 'true' : true;
        },

        openSupportModal() {
            this.supportModalOpen = true;
        },

        toggleFAQ(index) {
            this.openFAQ = this.openFAQ === index ? null : index;
        },

        sendChatMessage() {
            if (this.chatMessage.trim() === '') return;
            console.log('Sending message:', this.chatMessage);
            this.chatMessage = '';
        },

        // Override the sidebar toggle to use themeSwitcher's method
        toggleSidebar() {
            // This will be handled by the themeSwitcher component
            const themeSwitcher = Alpine.$data(document.querySelector('[x-data="themeSwitcher()"]'));
            if (themeSwitcher) {
                themeSwitcher.toggleSidebar();
                this.sidebarOpen = themeSwitcher.sidebarOpen;
            }
        }
    }));
});