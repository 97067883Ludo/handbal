<body>

@foreach($matchtable as $match)
    @foreach($match as $matchdata)
        {{$matchdata}}
    @endforeach
@endforeach
</body>
