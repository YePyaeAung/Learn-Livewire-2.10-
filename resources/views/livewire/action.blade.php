<div>
    <button type="button" wire:click="addTwoNumbers(2, 3)">Sum</button>
    <br><br>
    <textarea name="" id="" cols="30" rows="5" wire:keydown.enter="displayMessage($event.target.value)"></textarea><br><br>
    <form action="" wire:submit.prevent="getSum()">
        Num 1 : <input type="text" name="num1" wire:model="num1">
        Num 2 : <input type="text" name="num2" wire:model="num2">
        <input type="submit" value="Sum">
    </form>
    Sum : {{ $sum }} <br><br>
    Message : {{ $message }}
</div>
