<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $playerImage = $request->file('player_image')->store('image', ['disk' => 'public']);

        Player::create(
            [
                'player_name' => $request->player_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'player_note' => $request->player_note,
                'player_image' => $playerImage,
                'team_id' => $request->team_id,
            ]
        );


        return redirect()->route('player.showAll')->with('success', 'Player Added Successfully!');
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
        if ($request->hasFile('player_image')) {
            if ($request->oldImage) {
                Storage::disk('public')->delete($request->oldImage);
            }

            $playerImage = $request->file('player_image')->store('image', ['disk' => 'public']);
        } else {
            $playerImage = $request->oldImage;
        }

        $player->update(
            [
                'player_name' => $request->player_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'player_note' => $request->player_note,
                'team_id' => $request->team,
                'player_image' => $playerImage
            ]
        );

        return redirect()->route('player.showAll');
    }

    public function destroyPlayer(Player $player)
    {
        if ($player->player_image) {
            Storage::disk('public')->delete($player->player_image);
        }

        $player->delete();

        return redirect()->route('player.showAll');
    }
}
