{{-- html head --}}
<x-top-head />
<!-- Header -->
<x-header />

<div class="flex flex-1">
    {{-- sidebar --}}
    <x-sidebar />
    <!-- Main Content - Properly adjusts with sidebar width -->
    <main class="main-gradient flex-1 p-6 text-white transition-all duration-200 min-w-0"
        :class="sidebarOpen ? 'md:ml-0' : 'md:ml-0'">
        @yield('content')
    </main>
</div>
<!-- Support System Modal -->
<x-support-modal />

<!-- Theme Switcher -->
<x-theme-switcher />
{{-- bottom html --}}
<x-bottom />
