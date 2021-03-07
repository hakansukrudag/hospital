<strong>
    Bu bir deneme
    <ol>
        @foreach($getRecord as $item)
           {{ $item->id }}. {{ $item->name }} - {{ $item->created_at->format('d-m-Y') }} <br/>
        @endforeach
    </ol>
</strong>
