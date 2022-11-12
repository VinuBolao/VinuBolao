<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 divide-y">
    <div class="w-full sm:max-w-md mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-t-lg">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md p-6 bg-white shadow-md overflow-hidden sm:rounded-b-lg">
        {{ $slot }}
    </div>
</div>
