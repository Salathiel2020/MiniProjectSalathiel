<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class AnimesController extends Controller
{
    public function AnimesStore() {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Animes;
        $animeCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $animes = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Animes.Index', ['animes' => $animes, 'animeCount' => $animeCount]);
    }

    // User

    public function AddComment() {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Animes;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $anime = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('animeid')) ]);
        $Comments = $anime->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('animeid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/animes/".request('animeid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Animes;
        $anime = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Animes.Details', [ "anime" => $anime]);
    }

    // Admin

    public function Index() {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Animes;
        $animes = $collection->find();  
        return view('Admin.Animes.Index', ['animes' => $animes]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Animes;
        $anime = $collection->find();
        return view('Admin.Animes.Create', [ "animes" => $anime ]);
    }

    public function Store() {
        $anime = [
            "name" => request("name"),
            "genre" => request("genre"),
            "type" => request("type"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Animes;
        $insertOneResult = $collection->insertOne($anime);
        return redirect("/admin/animes");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Animes;
        $anime = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Animes.Edit', [ "anime" => $anime ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Animes;
        $anime = [
            "name" => request("name"),
            "genre" => request("genre"),
            "type" => request("type"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("animeid"))
        ], [
            '$set' => $anime
        ]);
        return redirect('/admin/animes/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Animes;
        $anime = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Animes.Delete', [ "anime" => $anime ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Animes;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("animeid"))
        ]);
        return redirect('/admin/animes/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->FiveD_Salathiel_Project->Animes;
        $anime = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Animes.Details', [ "anime" => $anime ]);
    }

}