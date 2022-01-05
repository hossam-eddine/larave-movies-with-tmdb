@extends("layoutes.app")
@section("title","home")
@section("content")
<div class="container mx-auto px-4 pt-16">
<div class="popular-movies">
<h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Popular Movies  </h2>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5  gap-16">
    
        
   @foreach ($popularMovies as $movie )
       
   
       <div class="mt-8">
        <a href="{{ route('movies.show',$movie['id']) }}">
            <img src={{"https://image.tmdb.org/t/p/w500/".$movie["poster_path"]}} alt="" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="mt-2">
            <a href=" #" class="text-lg hover:text-gray-300 ">{{$movie["title"]}}</a>
            <div class="flex items-center text-gray-400 text-sm mt-1">
                <svg class="fill-current text-yellow-500 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27z" /></svg>           
               <span class="ml-1">{{$movie["vote_average"]*10 .'%'}}</span>
                <span class="mx-2">|</span>
                <span>{{\Carbon\Carbon::parse($movie["release_date"])->format('M d,Y')}}</span>
            </div>
        </div>
        <div class="text-gray-400 ">
           @foreach ($movie["genre_ids"] as $genre )
               {{$genres->get($genre)}} @if (!$loop->last),@endif @endforeach </div>
    </div>
   
    @endforeach
    
    
  
   
</div>
</div>
</div>

@endsection