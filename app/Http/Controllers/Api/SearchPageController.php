<?php

namespace BookStack\Http\Controllers\Api;

use BookStack\Http\Controllers\Controller;
use Illuminate\Http\Request;
use BookStack\Entities\Models\Page;

class SearchPageController extends ApiController
{
    public function  search(Request $request): \Illuminate\Http\JsonResponse
    {
        $class = $request['class'];
        $type  = $request['type'];
        $word  = $request['word'];

        $output = [];
        $result = [];
        $output['input']= [
            'class' => $request['class'],
            'type'  => $request['type'],
            'word'  => $request['word'],
        ];
        $i =  0 ;

        foreach (Page::all() as $page) {

          //  $output[$i] = $page->name;

            $output['result'][$i] = [
                'page_title' => $page->name,
                'page_id'   => $page->id,
                'data' => [],

            ];

            $i++;
        }

//dd($output);


       return response()->json($output);

    }
}
