<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <h1>Todos App</h1>
    <livewire:todos.todo-list :todoList="$todoList" key="{{count($todoList)}}"/>
    <livewire:todos.todo-form />
    <livewire:comments :initialComments="$comments"/>
</div>
