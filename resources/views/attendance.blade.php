<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Davomat va Baho</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-in {
            animation: fadeIn 0.4s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .custom-radio {
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid #d1d5db;
            border-radius: 9999px;
            appearance: none;
            cursor: pointer;
            position: relative;
            transition: all 0.2s;
        }
        .custom-radio:checked::after {
            content: '';
            width: 0.625rem;
            height: 0.625rem;
            background-color: #22c55e;
            border-radius: 9999px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .radio-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }
        .radio-container:hover {
            background-color: #f3f4f6;
        }
        .telegram-btn {
            background-color: #3b82f6;
            color: white;
            font-weight: bold;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            transition: background-color 0.2s;
        }
        .telegram-btn:hover {
            background-color: #2563eb;
        }
        .success-message {
            background-color: #dcfce7;
            color: #15803d;
            padding: 10px 15px;
            border-radius: 8px;
            margin: 15px 0;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(21, 128, 61, 0.2);
            text-align: center;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-gray-100 font-sans text-gray-800 min-h-screen"
      style="width: 100%; max-width: 400px; margin: 0 auto; padding: 0;">
<div class="w-full min-h-screen">

    <div class="bg-blue-600 text-white p-4 rounded-b-2xl shadow-md">
        <h1 class="text-xl font-bold flex items-center gap-2">
            <span class="text-yellow-300">📋</span>
            <span>Davomat va Baho</span>
        </h1>
        <p class="text-sm font-medium">Guruh: <strong class="text-blue-100">{{ $group->name }}</strong></p>
        <p class="text-xs text-blue-200 mt-1">📅 {{ now()->format('d.m.Y, h:i A') }}</p>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('attendance.store') }}" method="POST" class="p-4 space-y-5 pb-36">
        @csrf
        <input type="hidden" name="group_id" value="{{ $group->id }}">

        @foreach($students as $student)
            <div class="bg-white rounded-xl shadow-md p-4 space-y-3 fade-in hover:shadow-lg transition-all">
                <p class="font-semibold text-lg text-gray-900">{{ $student->name }} (ID: {{ $student->id }})</p>

                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-4">
                        <label class="radio-container">
                            <input type="radio" name="students[{{ $student->id }}][attendance]" value="kelgan" class="custom-radio" checked>
                            <span class="text-sm font-medium text-green-700">Kelgan ✔</span>
                        </label>
                        <label class="radio-container">
                            <input type="radio" name="students[{{ $student->id }}][attendance]" value="kelmagan" class="custom-radio">
                            <span class="text-sm font-medium text-red-700">Kelmagan ✘</span>
                        </label>
                    </div>
                    <input type="text" name="students[{{ $student->id }}][attendance_note]" placeholder="Davomat izohi..." class="border rounded-lg px-3 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-3">
                        <label class="text-sm text-gray-700 font-medium">Baho:</label>
                        <select name="students[{{ $student->id }}][grade]" class="border rounded-lg px-3 py-2 text-sm w-full max-w-xs focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="5">5 (A'lo)</option>
                            <option value="4">4 (Yaxshi)</option>
                            <option value="3">3 (Qoniqarli)</option>
                            <option value="2">2 (Past)</option>
                            <option value="1">1 (Yomon)</option>
                        </select>
                    </div>
                    <input type="text" name="students[{{ $student->id }}][grade_note]" placeholder="Baho izohi..." class="border rounded-lg px-3 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </div>
        @endforeach

        <button type="submit" class="telegram-btn w-full max-w-xs mx-auto block mt-6 relative font-bold">
            ✅ Saqlash
            @if(session('success'))
                <span class="text-green-500 absolute top-1 right-3 text-xl font-bold" title="Saqlangan!">✓</span>
            @endif
        </button>

        @if(session('success'))
            <div class="success-message mt-4 max-w-xs mx-auto text-center">
                {{ session('success') }}
            </div>
        @endif
    </form>

    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 flex justify-around py-2 shadow-md z-50">
        <a href="/webapp" class="flex flex-col items-center text-blue-600 hover:text-blue-800 transition duration-150">
            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 12l9-9 9 9M4 10v10h16V10"></path>
                </svg>
            </div>
            <span class="text-xs font-medium">Asosiy</span>
        </a>
        <a href="/groups" class="flex flex-col items-center text-blue-600 hover:text-blue-800 transition duration-150">
            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87m6-4a3 3 0 11-6 0
                          3 3 0 016 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zM7 7a2 2 0 114 0 2 2 0 01-4 0z"/>
                </svg>
            </div>
            <span class="text-xs font-medium">Guruhlar</span>
        </a>
        <a href="/settings" class="flex flex-col items-center text-blue-600 hover:text-blue-800 transition duration-150">
            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4
                          4-1.79 4-4-1.79-4-4-4zm8.94 4c0-.66-.06-1.3-.17-1.93l2.03-1.58a1 1 0 00.23-1.38l-1.91-3.3a1
                          1 0 00-1.23-.44l-2.39.96a7.99 7.99 0 00-1.62-.94l-.36-2.54A1 1 0 0014.5 2h-5a1 1 0 00-.99.84l-.36
                          2.54a7.99 7.99 0 00-1.62.94l-2.39-.96a1 1 0 00-1.23.44l-1.91 3.3a1 1 0 00.23 1.38l2.03
                          1.58c-.11.63-.17 1.27-.17 1.93s.06 1.3.17 1.93l-2.03 1.58a1 1 0 00-.23 1.38l1.91 3.3a1 1 0
                          001.23.44l2.39-.96c.5.37 1.04.7 1.62.94l.36 2.54a1 1 0 00.99.84h5a1 1 0 00.99-.84l.36-2.54c.58-.24
                          1.12-.57 1.62-.94l2.39.96a1 1 0 001.23-.44l1.91-3.3a1 1 0 00-.23-1.38l-2.03-1.58c.11-.63.17-1.27.17-1.93z"/>
                </svg>
            </div>
            <span class="text-xs font-medium">Sozlamalar</span>
        </a>
    </div>
</div>
</body>
</html>
