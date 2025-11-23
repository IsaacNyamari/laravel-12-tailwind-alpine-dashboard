<div x-data="themeSwitcher()" x-init="init()" class="fixed right-4 bottom-4 z-50">
    <button @click="toggle()" :aria-pressed="isDark.toString()" :title="isDark ? 'Switch to light' : 'Switch to dark'"
        class="theme-toggle p-3 rounded-full cursor-pointer shadow-lg border transition-colors">
        <span x-show="isDark">🌙</span>
        <span x-show="!isDark">☀️</span>
    </button>
</div>
