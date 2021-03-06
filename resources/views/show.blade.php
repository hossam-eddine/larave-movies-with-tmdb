@extends("layoutes.app")
@section("title","movies")
@section("content")
<div class="movie-info  border-b border-gray-800 ">
    <div class="container mx-auto px-4  py-16 flex flex-col md:flex-row">
<img src={{"https://image.tmdb.org/t/p/w500/".$movie["poster_path"]}} alt="" class=" w-64 md:w-96">
<div class="md:ml-24">
    <h2 class="text-4xl font-semibold">{{$movie['title']}}</h2>
    <div class="flex flex-wrap items-center text-gray-400 text-sm ">
        <svg class="fill-current text-yellow-500 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27z" /></svg>                
        <span class="ml-1">{{$movie["vote_average"]*10 .'%'}}</span>
        <span class="mx-2">|</span>
        <span>{{\Carbon\Carbon::parse($movie["release_date"])->format('M d,Y')}}</span>
        <span class="mx-2">|</span>
        <span class="">
            @foreach ($movie["genres"] as $genre )
            {{$genre["name"]}} @if (!$loop->last), @endif
            @endforeach
        </span>

    </div>
    <p class="text-gray-300 mt-8">
        {{$movie["overview"]}}
    </p>
    <div class="mt-12 ">
        <h4 class="text-white font-semibold">Featured Cast</h4>
        <div class="flex mt-4">
            @foreach ($movie["credits"]["crew"] as $crew )
               @if ($loop->index<2)
                   <div class="mr-8">
                    <div class="">{{$crew["name"]}}</div>
                    <div class="text-sm text-gray-400">{{$crew["job"]}}</div>
                </div>
               @endif
               
            
            @endforeach
            
            
            
        </div>

    </div>
    @if (count($movie["videos"]["results"])>0)
        
 
    <div class="mt-12">
        <a target="blank" href="https://www.youtube.com/watch?v={{$movie['videos']['results'][0]['key']}}" class="inline-flex items-center bg-yellow-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-600 transition ease-in-out duration-150">
            <svg class="w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" /></svg>
         <span class="ml-2">Play Trailer</span>
        </a>
    </div>
    @endif

</div>
</div>
</div>
<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Cast</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5  gap-16">
    
            @foreach ($movie["credits"]["cast"] as $cast )
              @if ($loop->index<5)
                
              
         
         <div class="mt-8">
            <a href="">
                <img src={{"https://image.tmdb.org/t/p/w300/".$cast["profile_path"]}} alt="" class="hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="mt-2">
                <a href=" #" class="text-lg hover:text-gray-300 ">{{$cast["name"]}}</a>
               
            </div>
            <div class="text-gray-400 ">
                {{$cast["character"]}}
            </div>

        </div>
        @endif
        @endforeach
        
     </div>
    </div>
</div>
<div class="movie-Images border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Images</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3  gap-16">
    
           @foreach ($movie["images"]["backdrops"] as $image )
               @if ($loop->index<9)
                  
              
               
           <div class="mt-8">
            <a href="">
                <img src={{"https://image.tmdb.org/t/p/w500/".$image["file_path"]}} alt="" class="hover:opacity-75 transition ease-in-out duration-150">
            </a>
            
            
        </div>
        @endif
           @endforeach
        
       
         
       
        
     </div>
    </div>
</div>
@endsection