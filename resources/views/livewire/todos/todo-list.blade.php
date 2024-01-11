<ul>
    @foreach ($todoList as $item)
        <li wire:key="{{$item['id']}}">
            <input type="checkbox">
            <span>{{$item['name']}}</span>
            <button>&times;</button>
        </li>
    @endforeach
</ul>