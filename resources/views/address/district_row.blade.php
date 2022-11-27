@if ($districts->count() > 0)

    <option value="select">-- छान्नुहोस् -- </option>
    @foreach($districts as $district)
        <option value="{{ $district->id }}">{{ $district->name_np }}</option>
    @endforeach

@endif