<?php

namespace App\Http\Controllers\Admin;

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
        dd($_POST);
        $validatedData = $request->validate(
            [
                'player_name' => 'required|unique:players|max:125',
                'email' => 'required|email',
                'phone' => 'required',
                'player_note' => 'required',
                'player_image' => 'image',
                'team_id' => 'required'
            ]
        );

        if ($request->file('player_image')) {
            $validatedData['player_image'] = $request->file('player_image')->store('image');
        }

        Player::create(
            [
                'player_name' => $validatedData['player_name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'player_note' => $validatedData['player_note'],
                'player_image' => $validatedData['player_image'] ?? null,
                'team_id' => $validatedData['team_id'],
            ]
        );

        return redirect('home')->with('success', 'Player Added Successfully!');
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

    public function destroyPlayer(Player $player)
    {
        $player->delete();

        return redirect()->route('home');
    }
}
