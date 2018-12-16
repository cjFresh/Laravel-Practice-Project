<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('posts')
                        ->leftJoin('users', 'users.id', '=', 'posts.user_id')
                        ->select('posts.title','posts.body','users.name')
                        ->get();
    }
}
