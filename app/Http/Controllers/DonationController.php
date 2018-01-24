<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function donate($id, Request $request)
    {
        $data = $request->post();

        $validator = Validator::make($data,
            [
                'value' => 'required|numeric|min:1'
            ]
        );

        $validator->validate();

        $project = Project::find($id);

        $donation = Donation::create([
            'project' => $project->id,
            'value'   => (int)($data['value']*100),
            'user'    => \Auth::user()->id,
        ]);

        return redirect()
            ->route('display', ['id' => $donation->project])
                ->with('donation', $donation);
    }
}

