<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name','ASC')->whereNotIn('id',[env('SUPER_CATEGORY'),env('SUPER_CATEGORY_OFFER'),env('SUPER_CATEGORY_BLOG')])->paginate(env('PAGINATE'));
        return view('dashboard.categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        try {
            $category = new Category($request->only(["name", "parent_id","description"]));
            $saved = $category->save();

            if ($saved) {
                session()->flash('DASH_MSG_SUCCESS', 'Categoria Registrada');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi possível registrar a Categoria');
            }
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('categories.index');
        }
    }

    public function edit($id)
    {
        try {
            $category = Category::find(decrypt($id));
            if(is_null($category))
                throw new \Exception("Categoria Não Encontrada");

            return view('dashboard.categories.edit')->with('category', $category);
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('categories.index');
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $category = Category::find(decrypt($id));
            if(is_null($category))
                throw new \Exception('Categoria Não Encontrada');

            $category->fill($request->all());
            $saved = $category->save();

            if ($saved) {
                session()->flash('DASH_MSG_SUCCESS', 'Categoria Atualizada');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi possível atualizar a Categoria');
            }
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('categories.index');
        }
    }


    public function destroy($id)
    {
        try {
            $id = decrypt($id);

            if(in_array($id, [env('SUPER_CATEGORY_OFFER'), env('SUPER_CATEGORY_BLOG'), env('SUPER_CATEGORY')])) {
                throw new \Exception("Categorias Protegidas");
            }

            $removed = Category::destroy($id);
            if($removed) {
                session()->flash('DASH_MSG_SUCCESS', 'Categoria Removida');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi possível remover a Categoria');
            }
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('categories.index');
        }
    }
}
