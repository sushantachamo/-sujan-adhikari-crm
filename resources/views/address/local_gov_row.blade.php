@if ($local_gov->count() > 0)
    <option value="local_gov">-- छान्नुहोस् -- </option>
    @foreach($local_gov as $government)
        <option value="{{ $government->id }}">{{ $government->name_np }}</option>
    @endforeach
@endif