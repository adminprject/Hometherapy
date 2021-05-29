<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
setlocale(LC_ALL,"es_ES");
use Session;
use App\Clases\Funciones;

class categoriesForoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(4);
        return view('categoriasForo.list',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoriasForo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'name'      => 'required|max:191',
            'color'  => 'required|max:10',
        ];

        $messages = [
            'name.required' => 'El campo Nombre es requerido.',
            'color.required' => 'El campo Color es requerido.',
            'name.max' => 'El campo Nombre tiene un limite de 191 caracteres.',
            'color.max' => 'El campo Color tiene un limite de 10 caracteres.',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
            return redirect('admin/categories/forum/create')->withErrors($validator)->withInput();
        }

        $order =Category::max('order');
        $order_last = $order + 1;

        $new_category_add = [
            'order'               => $order_last,
            'name'                => $request->name,
            'color'               => $request->color,
            'slug'                => strtolower($request->name),
            'created_at'          => date('Y/m/d H:i:s'),
            'updated_at'          => date('Y/m/d H:i:s'),
        ];

        $new_category = Category::create($new_category_add);
        
        if ($new_category->id){
            Session::flash('success','Registro creado satisfactoriamente');
            return redirect('admin/categories/forum');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "string"; 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categoriasForo.edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name'      => 'required|max:191',
            'color'  => 'required|max:10',
        ];

        $messages = [
            'name.required' => 'El campo Nombre es requerido.',
            'color.required' => 'El campo Color es requerido.',
            'name.max' => 'El campo Nombre tiene un limite de 191 caracteres.',
            'color.max' => 'El campo Color tiene un limite de 10 caracteres.',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
            return redirect('admin/categories/forum/create')->withErrors($validator)->withInput();
        }

        $objFun = new Funciones();

        $category = Category::find($id);
        $category->name = $objFun->titleCase($request->name);
        $category->color = $request->color;
        $category->save();

        Session::flash('success','Registro Actualizado satisfactoriamente');
        return redirect('admin/categories/forum');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
