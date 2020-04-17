<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use DB;


class TypeController extends Controller
{
    public function create(Request $request) {
        $type = new Type();

        $type->libelle = $request->post('nom');
        $type->couleur = $request->post('couleur');
        $type->couleurTxt = $request->post('couleur-txt');

        $type->save();

        return redirect('/admin/read-type');
    }

    public function generate() {
        $types = array(
            array("nom" => "normal", "couleur" => "#7D796B"),
            array("nom" => "plante", "couleur" => "#56AC41"),
            array("nom" => "feu", "couleur" => "#DB8823"),
            array("nom" => "eau", "couleur" => "#2186EB"),
            array("nom" => "electrique", "couleur" => "#FEBD2C"),
            array("nom" => "vol", "couleur" => "#95A3FD"),
            array("nom" => "insecte", "couleur" => "#99BC58"),
            array("nom" => "roche", "couleur" => "#9D8678"),
            array("nom" => "sol", "couleur" => "#BC9E7E"),
            array("nom" => "psy", "couleur" => "#EE7499"),
            array("nom" => "poison", "couleur" => "#9E4DCB"),
            array("nom" => "spectre", "couleur" => "#514068"),
            array("nom" => "ténèbres", "couleur" => "#313131"),
            array("nom" => "acier", "couleur" => "#959595"),
            array("nom" => "combat", "couleur" => "#DE3C37"),
            array("nom" => "glace", "couleur" => "#8AD4F6"),
            array("nom" => "dragon", "couleur" => "#404D92"),
            array("nom" => "fée", "couleur" => "#CD58C0")
        );

        foreach ($types as $t) {
            $type = new Type();
        
            $type->libelle = ucfirst($t['nom']);
            $type->couleur = $t['couleur'];
            $type->couleurTxt = 'white';

            $type->save();
        }

        return redirect('/admin/read-type');
    }

    public function read() {
        $data['data'] = DB::table('types')->get();
        $pokes['pokes'] = DB::table('pokemon')->get();
        return view('create-type',$data, $pokes);
    }

    public function delete($id) {
        $delete = Type::where('id', $id)->get();
        foreach($delete as $d) {
            $d->delete();
        }

        return redirect('/admin/read-type');
    }

    public function deleteAll() {
        DB::table('types')->delete();

        return redirect('/admin/read-type');
    }
}
