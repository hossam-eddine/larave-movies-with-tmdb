<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
    public function the_main_page_shows_correct_info(){
        Http::fake([
            "https://api.themoviedb.org/3/movie/popular"=>$this->fakePopularMovie(),
            "https://api.themoviedb.org/3/genre/movie/list"=>$this->fakeGenres()
        ]);
        $response=$this->get(route('movies.index'));
        $response->assertSuccessful();
        $response->assertSee("Popular Movies");
        $response->assertSee("Fake Movies");

    }
    public function fakePopularMovie(){
         return Http::response([
            "results"=>[
                [
                  "adult"=> false,
                  "backdrop_path"=> "/620hnMVLu6RSZW6a5rwO8gqpt0t.jpg",
                  "genre_ids"=> [
                    16,
                    35,
                    10751,
                    14
                  ],
                  "id"=> 508943,
                  "original_language"=> "en",
                  "original_title"=> "Fake Movies",
                  "overview"=> "fake movie description and his best friend Alberto experience an unforgettable summer on the Italian Riviera. But all the fun is threatened by a deeply-held secret: they are sea monsters from another world just below the water’s surface.",
                  "popularity"=> 6291.904,
                  "poster_path"=> "/jTswp6KyDYKtvC52GbHagrZbGvD.jpg",
                  "release_date"=> "2021-06-17",
                  "title"=> "Fake Movies",
                  "video"=>false,
                  "vote_average"=> 8.2,
                  "vote_count"=> 2036
                ],
            
            ]
            ]
            ,200);
            
    }

    
     public function fakeGenres()
    {
        return Http::response([
                'genres' => [
                    [
                      "id" => 28,
                      "name" => "Action"
                    ],
                    [
                      "id" => 12,
                      "name" => "Adventure"
                    ],
                    [
                      "id" => 16,
                      "name" => "Animation"
                    ],
                    [
                      "id" => 35,
                      "name" => "Comedy"
                    ],
                    [
                      "id" => 80,
                      "name" => "Crime"
                    ],
                    [
                      "id" => 99,
                      "name" => "Documentary"
                    ],
                    [
                      "id" => 18,
                      "name" => "Drama"
                    ],
                    [
                      "id" => 10751,
                      "name" => "Family"
                    ],
                    [
                      "id" => 14,
                      "name" => "Fantasy"
                    ],
                    [
                      "id" => 36,
                      "name" => "History"
                    ],
                    [
                      "id" => 27,
                      "name" => "Horror"
                    ],
                    [
                      "id" => 10402,
                      "name" => "Music"
                    ],
                    [
                      "id" => 9648,
                      "name" => "Mystery"
                    ],
                    [
                      "id" => 10749,
                      "name" => "Romance"
                    ],
                    [
                      "id" => 878,
                      "name" => "Science Fiction"
                    ],
                    [
                      "id" => 10770,
                      "name" => "TV Movie"
                    ],
                    [
                      "id" => 53,
                      "name" => "Thriller"
                    ],
                    [
                      "id" => 10752,
                      "name" => "War"
                    ],
                    [
                      "id" => 37,
                      "name" => "Western"
                    ],
                ]
            ], 200);
    }
     
}
