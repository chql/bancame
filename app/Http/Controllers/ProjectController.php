<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Project;

class ProjectController extends Controller
{
    public function search(Request $request)
    {
        $projects = Project::all();
        $q = '';

        if($request->query->get('q')) {
            $results = [];
            $q = $request->query->get('q');
            foreach($projects as $p)
                if(stripos($p->title, $q) !== false
                || stripos($p->content, $q) !== false)
                    $results[] = $p;

            $projects = $results;
        }

        return view('project.search',
            [
                'projects' => $projects,
                'q' => $q
            ]);
    }

    public function display($id)
    {
        return view('project.display', ['project' => Project::find($id)]);
    }

    public function create(Request $request)
    {
        $data = $request->post();

        Validator::make($data,
            [
                'title' => 'required|string|min:4',
                'content' => 'required|string|min:32',
                'cost' => 'required|numeric|min:1',
                'deadline' => 'required|date'
            ]
        )->validate();

        $project = Project::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'cost' => (int)($data['cost']*100),
            'deadline' => $data['deadline'],
            'project_author' => Auth::user()->id
        ]);

        return redirect()
            ->route('display', ['id' => $project->id]);
    }

    public function showCreateForm()
    {
        return view('project.create');
    }
}
