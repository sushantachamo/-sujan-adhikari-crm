@if (count($all_suggestion) > 0)

    <option value="select">-- छान्नुहोस् -- </option>
    @foreach($all_suggestion as $key=>$name)
        <option value="{{ $key }}">{{ $name }}</option>
    @endforeach

@endif