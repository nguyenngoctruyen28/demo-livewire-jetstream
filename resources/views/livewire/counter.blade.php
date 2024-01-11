<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="flex items-center">
        <button class="w-10 py-2 bg-gray-500 text-white" wire:click="increment">+</button>
        <h1 class="py-2 px-6 bg-white">{{$count}}</h1>
        <button class="w-10 py-2 bg-gray-500 text-white" wire:click="decrement">-</button>
    </div>
    <livewire:comments :initialComments="$comments"/>
</div>
