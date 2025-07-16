<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Sozlamalar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-gray-100 font-sans text-gray-800 min-h-screen"
      style="width: 100%; max-width: 400px; margin: 0 auto; padding-bottom: 5rem;">

<div class="p-4">
    <h1 class="text-xl font-bold text-blue-700 mb-4">⚙️ Sozlamalar</h1>

    <form method="POST" action="#" class="space-y-6">
        <div class="bg-white rounded-xl shadow p-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">🌐 Tilni tanlang:</label>
            <select name="language" class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="uz" selected>O‘zbekcha</option>
                <option value="ru">Русский</option>
                <option value="en">English</option>
            </select>
        </div>

        <div class="bg-white rounded-xl shadow p-4 flex items-center justify-between">
            <label for="dark_mode" class="text-sm font-medium text-gray-700">🌙 Qorong‘i rejim</label>
            <input type="checkbox" id="dark_mode" name="dark_mode" class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        </div>

        <div class="bg-white rounded-xl shadow p-4 flex items-center justify-between">
            <label for="notifications" class="text-sm font-medium text-gray-700">🔔 Eslatmalar yoqilsinmi?</label>
            <input type="checkbox" id="notifications" name="notifications" class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-full font-bold hover:bg-blue-700 transition">
            ✅ Saqlash
        </button>
    </form>
</div>

<div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 flex justify-around py-2 shadow-md z-50">
    <a href="/webapp" class="flex flex-col items-center text-blue-600 hover:text-blue-800 transition duration-150">
        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-1">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path d="M3 12l9-9 9 9M4 10v10h16V10"></path>
            </svg>
        </div>
        <span class="text-xs font-medium">Asosiy</span>
    </a>
    <a href="/groups" class="flex flex-col items-center text-blue-600 hover:text-blue-800 transition duration-150">
        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87m6-4a3 3 0 11-6 0
                          3 3 0 016 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zM7 7a2 2 0 114 0 2 2 0 01-4 0z"/>
            </svg>
        </div>
        <span class="text-xs font-medium">Guruhlar</span>
    </a>
    <a href="/settings" class="flex flex-col items-center text-blue-800 font-bold transition duration-150">
        <div class="w-10 h-10 bg-blue-200 rounded-full flex items-center justify-center mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm8.94
                          4c0-.66-.06-1.3-.17-1.93l2.03-1.58a1 1 0 00.23-1.38l-1.91-3.3a1 1 0
                          00-1.23-.44l-2.39.96a7.99 7.99 0 00-1.62-.94l-.36-2.54A1 1 0
                          0014.5 2h-5a1 1 0 00-.99.84l-.36 2.54a7.99 7.99 0
                          00-1.62.94l-2.39-.96a1 1 0 00-1.23.44l-1.91 3.3a1 1 0
                          00.23 1.38l2.03 1.58c-.11.63-.17 1.27-.17 1.93s.06 1.3.17
                          1.93l-2.03 1.58a1 1 0 00-.23 1.38l1.91 3.3a1 1 0
                          001.23.44l2.39-.96c.5.37 1.04.7 1.62.94l.36 2.54a1 1 0
                          00.99.84h5a1 1 0 00.99-.84l.36-2.54c.58-.24 1.12-.57
                          1.62-.94l2.39.96a1 1 0 001.23-.44l1.91-3.3a1 1 0
                          00-.23-1.38l-2.03-1.58c.11-.63.17-1.27.17-1.93z"/>
            </svg>
        </div>
        <span class="text-xs font-medium">Sozlamalar</span>
    </a>
</div>

</body>
</html>
