## Figma MCP

Ketika mengimplementasikan UI dari Figma:
1. Selalu gunakan `get_design_context` untuk mendapatkan struktur lengkap frame
2. Gunakan Laravel Blade untuk semua halaman publik — JANGAN Vue/React
3. Gunakan Tailwind CSS untuk styling — ikuti spacing dan warna dari desain
4. Import komponen yang sudah ada di resources/views/components/ jika tersedia
5. Refer ke prd.md untuk nama route, model, dan struktur folder
6. Jangan hardcode warna — gunakan class Tailwind sesuai design token Figma