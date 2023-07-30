<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-slate-900 divide-y">
    <div class="w-full sm:max-w-md mt-6 p-6 bg-white dark:bg-slate-800 shadow-md overflow-hidden sm:rounded-t-lg">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md p-6 bg-white dark:bg-slate-800 dark:border-slate-500 shadow-md overflow-hidden sm:rounded-b-lg">
        {{ $slot }}
    </div>
</div>
