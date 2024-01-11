<div class="mt-3 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div>
        @if (session()->has('message'))
            <div class="text-center p-3 bg-green-300 text-green-800 shadown rounded shadow-sm">
                {{ session('message') }}
            </div>
        @elseif(session()->has('message_deleted'))
            <div class="text-center p-3 bg-red-300 text-white-800 shadown rounded shadow-sm">
                {{ session('message_deleted') }}
            </div>
        @endif
    </div>
    <section>
        <input type="file" id="image" wire:model="image">
    </section>
    <form wire:submit.prevent="addComment" class="flex items-center justify-center">
        <input wire:model.lazy="newComment" type="text" class="border shadown p-2 mr-2 my-2">
        <button type="submit" class="p-2 w-20 rounded shadown bg-red-600 text-white">Add</button>
    </form>
    @error('newComment') <span class="error text-red-500 text-xs text-center block">{{ $message }}</span> @enderror
    @foreach ($comments as $comment)
        <div class="rounded border shadow px-4 py-3 my-2 mt-3">
            <div class="flex items-center justify-start my-2">
                <p class="font-bold text-lg mr-3">{{$comment->creator->name}}</p>
                <p class="mx-3 py-1 text-xs font-semibold">{{$comment->created_at->diffForHumans()}}</p>
                <i wire:click="remove({{$comment->id}})" class="fas fa-time text-red-200 hover:text-red-600 ml-auto cursor-pointer">X</i>
            </div>
            <p class="text-gray-800">{{$comment->body}}</p>
        </div> 
    @endforeach
    {{ $comments->links() }}
</div>
