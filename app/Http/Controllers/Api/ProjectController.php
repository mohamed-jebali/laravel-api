<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;


class ProjectController extends Controller
{
    public function index (Request  $request){

    
            if ($request->has('search')){
                $projects = Project::with('technologies', 'type')->where('title', 'LIKE', '%' . $request->search . '%')->paginate(20);

            }
             else {
                $projects = Project::with('technologies','type')->paginate(20);
            }

        return response()->json(
            [
                'success'=> true,
                'results' => $projects,
            ]
        );
    }
    public function show (string $slug){


        $project = Project::with('technologies','type')->findOrFail($slug);

        return response()->json(
            [
                'success'=> true,
                'results' => $project,
            ]
        );
    }
}
