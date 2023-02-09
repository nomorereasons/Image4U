@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="block2">
                    <div class="image img">
                        @foreach($images as $image)
                            <form method="post" action="{{route('image.delete', ['image' => $image->id])}}">
                                <img class="image"  src="{{asset('/storage/' . $image->img)}}" alt="">
                                @method('delete')
                                @csrf
                                <button type="submit" class="button">Видалити</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
