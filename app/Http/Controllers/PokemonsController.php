<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class PokemonsController extends Controller
{
    public function PokemonsStore() {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Pokemons;
        $pokemonCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $pokemons = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Pokemons.Index', ['pokemons' => $pokemons, 'pokemonCount' => $pokemonCount]);
    }

    // User

    public function AddComment() {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Pokemons;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $pokemon = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('pokemonid')) ]);
        $Comments = $pokemon->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('pokemonid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/pokemons/".request('pokemonid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Pokemons;
        $pokemon = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Pokemons.Details', [ "pokemon" => $pokemon]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Pokemons;
        $pokemons = $collection->find();  
        return view('Admin.Pokemons.Index', ['pokemons' => $pokemons]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Pokemons;
        $pokemon = $collection->find();
        return view('Admin.Pokemons.Create', [ "pokemons" => $pokemon ]);
    }

    public function Store() {
        $pokemon = [
            "Name" => request("Name"),
            "Type_1" => request("Type_1"),
            "Type_2" => request("Type_2"),
            "Generation" => request("Generation"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Pokemons;
        $insertOneResult = $collection->insertOne($pokemon);
        return redirect("/admin/pokemons");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Pokemons;
        $pokemon = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Pokemons.Edit', [ "pokemon" => $pokemon ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Pokemons;
        $pokemon = [
            "Name" => request("Name"),
            "Type_1" => request("Type_1"),
            "Type_2" => request("Type_2"),
            "Generation" => request("Generation"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("pokemonid"))
        ], [
            '$set' => $pokemon
        ]);
        return redirect('/admin/pokemons/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Pokemons;
        $pokemon = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Pokemons.Delete', [ "pokemon" => $pokemon ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Pokemons;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("pokemonid"))
        ]);
        return redirect('/admin/pokemons/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Pokemons;
        $pokemon = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Pokemons.Details', [ "pokemon" => $pokemon ]);
    }

}