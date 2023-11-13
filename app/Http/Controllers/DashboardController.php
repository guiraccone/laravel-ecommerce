<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /* public function __construct(){
        $this->middleware('auth')->only('index');
    } */

    public function index()
    {
        $usuarios = User::all()->count();

        // grafico 1 - usuários
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
            ->groupBy('ano')
            ->orderBy('ano', 'asc')
            ->get();

        // preparar arrays
        foreach ($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        //formatar para chartJS
        $userLabel = "'Comparativo de cadastro de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        //grafico 2 - categorias
        $catData = Categoria::with('produtos')->get();

        // preparar array 
        foreach ($catData as $cat) {
            $catNome[] = "'" . $cat->nome . "'";
            $catTotal[] = $cat->produtos->count();
        }

        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);


        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
