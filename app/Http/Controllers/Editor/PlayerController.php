<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function showDetailPlayer(Player $player)
    {
        return view(
            'showPlayerDetail',
            [
                'pageTitle' => 'Player',
                'mainTitle' => 'Player Data',
                'player' => $player
            ]
        );
    }

    public function addPlayer()
    {
        $teams = Team::all();

        return view('addplayer', [
            "pageTitle" => "Add Player",
            "mainTitle" => "Add E-Sport Player",
            "isActiveAddPlayer" => "active"
        ], compact('teams'));
    }

    public function storePlayer(Request $request)
    {
        Player::create(
            [
                'player_name' => $request->player_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'player_note' => $request->player_note,
                'team_id' => $request->team,
            ]
        );

        return redirect()->route('home');
    }

    public function editPlayer(Player $player)
    {
        $playerEdit = Player::where('id', $player->id)->first();
        $players = Player::all();
        $teams = Team::all();

        return view('editplayer', [
            "pageTitle" => "Edit Player",
            "mainTitle" => "Edit E-Sport Player Data"
        ], compact('playerEdit', 'players', 'teams'));
    }

    public function updatePlayer(Request $request, Player $player)
    {
        $player->update(
            [
                'player_name' => $request->player_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'player_note' => $request->player_note,
                'team_id' => $request->team,
            ]
        );

        return redirect()->route('home');
    }
}
