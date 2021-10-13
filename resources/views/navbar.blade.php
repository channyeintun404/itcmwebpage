<link href="{{ asset('css/menu_footer.css') }}" rel="stylesheet">

<div class="navdiv">
    @foreach ($navitem as $item)
        <a class="navitem" style="text-decoration: none" href="{{$item->link}}">{{$item->name}}</a><span class="vl"></span>
    @endforeach
</div>