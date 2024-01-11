<form wire:submit.prevent="handleAdd">
    <input type="text" placeholder="Tên công việc..." wire:model="name" value="{{$name}}"/>
    <button type="submit" class="p-2 w-20 rounded shadown bg-red-600 text-white">Thêm</button>
    @if (session('msg'))
        <p>{{session('msg')}}</p>
    @endif
</form>