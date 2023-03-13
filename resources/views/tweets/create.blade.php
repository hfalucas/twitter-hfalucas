<x-layout>
    <div class="w-full h-full flex items-center max-w-sm mx-auto">
        <form action="{{ route('tweets.store') }}" method="POST" class="w-full">
            @csrf

            <div class="w-full">
                <label for="body" class="block text-sm font-semibold">Tweet your mind:</label>
                <textarea id="body" name="body" rows="4" class="mt-1 border border-gray-400 w-full resize-none rounded p-2"></textarea>
                @error('body')
                    <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="mt-3 bg-sky-400 text-white px-6 py-1 rounded">
                    Tweet
                </button>
            </div>
        </form>
    </div>
</x-layout>

