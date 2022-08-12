<div>
    Title : <input type="text" wire:model="title"> <br><br>

    Name : <input type="text" wire:model="name"> <br><br>

    <a href="https://laravel-livewire.com/docs/2.x/lifecycle-hooks">Livewire Lifecycle Hooks Docs</a>
    <hr>

    <h3>Title :: {{ $title }}</h3><br>
    <h3>Name :: {{ $name }}</h3><br>
    <h3>Lifecycle Hooks Methods :: </h3>
    <ol>
        @foreach ($infos as $info)
            <li>{{ $info }}</li>
        @endforeach
    </ol>
</div>
