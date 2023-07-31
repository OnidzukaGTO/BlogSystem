<form action="{{route('test.store')}}" method="POST">
    @csrf
    <input type="text" name="first_name" placeholder="first_name">
    <input type="text" name="last_name" placeholder="last_name">
    <input type="number" name="age" placeholder="age">
    <select name="gender">
        <option value="man">man</option>
        <option value="woman">woman</option>
    </select>
    <button type="submit">Submit</button>
</form>