<div>
    Name:<br>
    <input type="text" wire:model.debounce.1500ms="name"><br>

    Message:<br>
    <textarea name="" id="" cols="30" rows="10" wire:model="message"></textarea><br>

    Marital Status:<br>
    Single <input type="radio" value="Single" wire:model="marital_status">
    Married <input type="radio" value="Married" wire:model="marital_status">
    <br>

    Favourite Colors:<br>
    Red <input type="checkbox" name="" id="" value="Red" wire:model="colors">
    Green <input type="checkbox" name="" id="" value="Green" wire:model="colors">
    Black <input type="checkbox" name="" id="" value="Black" wire:model="colors">
    <br>

    City:<br>
    <select name="" id=""  wire:model="city">
        <option value="">Select City</option>
        <option value="London">London</option>
        <option value="Myanmar">Myanmar</option>
        <option value="China">China</option>
    </select>

    <hr>
    Name : {{ $name }} <br>
    Message : {{ $message }} <br>
    Marital Status : {{ $marital_status }} <br>
    Colors : 
        <ul>
            @foreach ($colors as $color)
                <li>{{ $color }}</li>
            @endforeach
        </ul>
    <br>
    City : {{ $city }} <br>
</div>
