<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexTeams(Request $request)
    {
        if ($request->has('search')) {
            $team = Team::where('team_name', 'like', '%' . $request->search . '%')->orWhere('team_note', 'like', '%' . $request->search . '%')->paginate(5);
        } else {
            $team = Team::paginate(5);
        }

        return view(
            'main',
            [
                "pageTitle" => "Show All Teams",
                "mainTitle" => "E-sport Teams",
                "isActiveShowTeams" => "active",
                "teams" => $team
            ]
        );
    }

    public function indexPlayers(Request $request)
    {
        if ($request->has('search')) {
            $player = Player::where('player_name', 'like', '%' . $request->search . '%')->orWhere('player_note', 'like', '%' . $request->search . '%')->paginate(5);
        } else {
            $player = Player::paginate(5);
        }

        return view(
            'showAllPlayer',
            [
                "pageTitle" => "Show All Players",
                "mainTitle" => "E-sport Player",
                "isActiveShowPlayers" => "active",
                "players" => $player
            ]
        );
    }
}
