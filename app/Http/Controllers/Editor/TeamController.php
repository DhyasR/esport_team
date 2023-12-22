<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $team = Team::where('team_name', 'like', '%' . $request->search . '%')->orWhere('team_note', 'like', '%' . $request->search . '%')->paginate(5);
        } else {
            $team = Team::paginate(5);
        }

        return view(
            'main',
            [
                "pageTitle" => "HOME",
                "mainTitle" => "E-sport Teams",
                "isActive" => "active",
                "teams" => $team
            ]
        );
    }

    public function showDetailTeam(Team $team)
    {
        return view(
            'showTeamDetail',
            [
                'pageTitle' => 'Team',
                'mainTitle' => 'Team Data',
                'team' => $team
            ]
        );
    }

    public function addTeam()
    {
        $teams = Team::all();

        return view('addTeam', [
            "pageTitle" => "Add Team",
            "mainTitle" => "Add E-Sport Team",
            "isActiveAddTeam" => "active"
        ], compact('teams'));
    }

    public function storeTeam(Request $request)
    {
        Team::create(
            [
                'team_name' => $request->team_name,
                'team_note' => $request->team_note,
                'game' => $request->game,
            ]
        );

        return redirect()->route('home');
    }

    public function editTeam(Team $team)
    {
        $teamEdit = Team::where('id', $team->id)->first();
        $teams = Team::all();

        return view('editteam', [
            "pageTitle" => "Edit Team",
            "mainTitle" => "Edit E-Sport Team Data"
        ], compact('teamEdit', 'teams'));
    }

    public function updateTeam(Request $request, Team $team)
    {
        $team->update(
            [
                'team_name' => $request->team_name,
                'team_note' => $request->team_note,
                'game' => $request->game,
            ]
        );

        return redirect()->route('home');
    }
}
