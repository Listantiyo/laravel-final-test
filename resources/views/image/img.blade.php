@foreach ($img as $item)
<img src="{{ Storage::url($item->path) }}" alt="img" class="img-thumbnail mb-2">
@endforeach



{{-- @php
     echo dd($item);
@endphp --}}
