@php
    $columns = $columns ?? [];
    $items = $items ?? [];
@endphp
<table class="table">
    <thead>
        <tr>
            @foreach($columns as $columnName => $columnAttribute)
                <th scope="col">{{ $columnName }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
               @foreach($item->toArray as $attribute)
                   <td>{{ $attribute }}</td>
               @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
