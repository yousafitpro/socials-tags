<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class iframeController extends Controller
{
    public function iframe(Request $request)
    {

        $query=post::query();
        if($request->has("searchText"))
        {
            $query=$query->where(function ($q)use ($request){
              $q->where ( 'content', 'LIKE', '%' . $request->searchText. '%' );
            });
            $query=$query->paginate(5);
        }
        else
        {
            $query=$query->paginate(3);
        }


        foreach ($query->items() as $p)
        {
          $p->image_url=asset($p->image);
          $p->created_at_readable=\Carbon\Carbon::parse($p->created_at)->diffForhumans();
        }

       if (Request::capture()->expectsJson())
       {
           if ($request->has('type') && $request->type=='web')
           {
               return view('iframe.Ajax-posts',['posts'=>$query->items(),'total'=>$query->total(),'lastPage'=>$query->lastPage(),'perPage'=>$query->perPage(),'currentPage'=>$query->currentPage()]);

           }
           return response()->json(['items'=>$query->items(),'total'=>$query->total(),'lastPage'=>$query->lastPage(),'perPage'=>$query->perPage(),'currentPage'=>$query->currentPage()]);
       }

        return view('iframe.iframe',['posts'=>$query->items(),'total'=>$query->total(),'lastPage'=>$query->lastPage(),'perPage'=>$query->perPage(),'currentPage'=>$query->currentPage()]);
    }
}
