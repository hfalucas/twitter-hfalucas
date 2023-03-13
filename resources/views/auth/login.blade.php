<x-layout>
    <div class="h-full flex items-center justify-center">
        <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="shadow border border-sky-400 text-sky-600 rounded px-6 py-2 hover:bg-sky-400 hover:text-white">
            Login using Twitter
        </a>
    </div>
</x-layout>
