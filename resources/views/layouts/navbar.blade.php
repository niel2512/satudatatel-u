<!-- Navbar -->
<nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100" x-data="{ mobileOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Layout: 3-kolom flex: logo | menu-tengah | aksi-kanan --}}
        <div class="flex items-center h-16">

            {{-- ======= LOGO (kiri, flex-none) ======= --}}
            <div class="flex-none">
                <a href="/" class="flex items-center gap-2 group">
                    <img
                        src="/images/sd-logo.png"
                        alt="SD Logo"
                        class="h-10 w-auto object-contain transition-opacity duration-200 group-hover:opacity-85"
                    >
                </a>
            </div>

            {{-- ======= DESKTOP NAV (flex-1, justify-center) ======= --}}
            <div class="hidden lg:flex flex-1 items-center justify-center gap-0.5">

                {{-- Home --}}
                <a href="/"
                   class="px-3.5 py-2 text-sm font-medium text-gray-600 hover:text-[#C0392B] rounded-lg transition-colors duration-150 whitespace-nowrap
                          {{ request()->is('/') ? 'text-[#C0392B] font-semibold' : '' }}">
                    Home
                </a>

                {{-- Tentang (dengan dropdown) --}}
                <div class="relative group">
                    <button class="flex items-center gap-1 px-3.5 py-2 text-sm font-medium text-gray-600 hover:text-[#C0392B] rounded-lg transition-colors duration-150 whitespace-nowrap">
                        Tentang
                        <svg class="w-3.5 h-3.5 text-gray-400 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    {{-- Dropdown --}}
                    <div class="absolute top-full left-0 mt-1 w-44 bg-white rounded-xl shadow-xl border border-gray-100 py-1.5
                                opacity-0 invisible translate-y-1 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                                transition-all duration-200 z-50">
                        <a href="/tentang" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-red-50 hover:text-[#C0392B] transition-colors">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C0392B] opacity-60"></span>
                            Tentang Satu Data
                        </a>
                        <a href="/profil" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-red-50 hover:text-[#C0392B] transition-colors">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C0392B] opacity-60"></span>
                            Profil PuTI
                        </a>
                    </div>
                </div>

                {{-- Data Owner --}}
                <a href="/data-owner"
                   class="px-3.5 py-2 text-sm font-medium text-gray-600 hover:text-[#C0392B] rounded-lg transition-colors duration-150 whitespace-nowrap">
                    Data Owner
                </a>

                {{-- Data Governance --}}
                <a href="/data-governance"
                   class="px-3.5 py-2 text-sm font-medium text-gray-600 hover:text-[#C0392B] rounded-lg transition-colors duration-150 whitespace-nowrap">
                    Data Governance
                </a>

                {{-- Dataset --}}
                <a href="/katalog-dataset"
                   class="px-3.5 py-2 text-sm font-medium text-gray-600 hover:text-[#C0392B] rounded-lg transition-colors duration-150 whitespace-nowrap">
                    Dataset
                </a>

                {{-- Berita --}}
                <a href="/berita"
                   class="px-3.5 py-2 text-sm font-medium text-gray-600 hover:text-[#C0392B] rounded-lg transition-colors duration-150 whitespace-nowrap">
                    Berita
                </a>
            </div>

            {{-- ======= KANAN: Search + Login (flex-none) ======= --}}
            <div class="hidden lg:flex items-center gap-3 flex-none">
                {{-- Search Input --}}
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="navbar-search"
                        placeholder="Cari"
                        class="pl-9 pr-4 py-2 text-sm bg-gray-100 border border-transparent rounded-lg text-gray-700 placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-[#C0392B]/30 focus:border-[#C0392B] focus:bg-white
                               transition-all duration-200 w-52 focus:w-52"
                    >
                </div>

                {{-- Login Button --}}
                <a href="/admin"
                   id="navbar-login-btn"
                   class="px-5 py-2 bg-[#C0392B] text-white text-sm font-semibold rounded-lg
                          hover:bg-[#a93226] active:bg-[#8B0000]
                          transition-all duration-150 shadow-sm hover:shadow-md whitespace-nowrap">
                    Login
                </a>
            </div>

            {{-- ======= MOBILE MENU BUTTON ======= --}}
            <button
                id="mobile-menu-btn"
                class="lg:hidden ml-auto p-2 rounded-lg text-gray-500 hover:bg-gray-100 transition-colors"
                onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- ======= MOBILE MENU ======= --}}
    <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-100 bg-white">
        {{-- Search mobile --}}
        <div class="px-4 pt-3">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text" placeholder="Cari..." class="w-full pl-9 pr-4 py-2 text-sm bg-gray-100 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#C0392B]/30">
            </div>
        </div>

        <div class="px-4 py-3 space-y-0.5">
            <a href="/" class="block px-3 py-2 text-sm font-semibold text-[#C0392B] bg-red-50 rounded-lg">Home</a>
            <a href="/tentang" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:bg-red-50 hover:text-[#C0392B] rounded-lg">Tentang Satu Data</a>
            <a href="/profil" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:bg-red-50 hover:text-[#C0392B] rounded-lg">Profil PuTI</a>
            <a href="/data-owner" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:bg-red-50 hover:text-[#C0392B] rounded-lg">Data Owner</a>
            <a href="/data-governance" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:bg-red-50 hover:text-[#C0392B] rounded-lg">Data Governance</a>
            <a href="/katalog-dataset" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:bg-red-50 hover:text-[#C0392B] rounded-lg">Dataset</a>
            <a href="/berita" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:bg-red-50 hover:text-[#C0392B] rounded-lg">Berita</a>
            <div class="pt-2">
                <a href="/admin" class="block px-3 py-2.5 text-sm font-semibold text-white bg-[#C0392B] hover:bg-[#a93226] rounded-lg text-center transition-colors">Login</a>
            </div>
        </div>
    </div>
</nav>

