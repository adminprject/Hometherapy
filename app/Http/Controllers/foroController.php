<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Discussion;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Redirect;
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Clases\Funciones;
use Illuminate\Support\Str;

class foroController extends Controller
{

    public function index($mCategory = ''){

    	if($mCategory == 'login'){
    		return view('foro.auth.login');
    	}else if($mCategory == 'register'){
    		return view('foro.auth.register');
    	}else if ($mCategory == 'logout') {
    		Auth::logout();
	        Session::flush();
	        return redirect('foro');
    	}else if($mCategory == 'registerDiscusion'){
    		$categories = Category::all();

			return view('foro.register',[
				'categories' => $categories
			]);
    	}

    	$categories = Category::all();

    	$pagination_results = config('chatter.paginate.num_of_results');

        if (strlen($mCategory) > 0) {
            $category = Category::where('name', '=', $mCategory)->first();
            if (isset($category->id)) {
                $discussions = Discussion::withoutGlobalScope('user')->withoutGlobalScope('post')->withoutGlobalScope('postsCount')->withoutGlobalScope('category')->where('chatter_category_id', '=', $category->id)->orderBy('created_at', 'DESC')->paginate($pagination_results);
            }
        }else{
        	$discussions = Discussion::withoutGlobalScope('user')->withoutGlobalScope('post')->withoutGlobalScope('postsCount')->withoutGlobalScope('category')->orderBy('created_at', 'DESC')->paginate($pagination_results);
        }

    	\App::register('GrahamCampbell\Markdown\MarkdownServiceProvider');
    	return view('foro.home',
    		[
    			'categories' => $categories,
    			'discussions' => $discussions
    		]
    	);
    }

	public function postLogin(Request $request){

		$validator = Validator::make($request->all(),[
            'email' => 'required|max:255|email',
            'password' => 'required|max:80',
        ]);

		if ($validator->fails()) {
            return redirect('foro/login')->withErrors($validator)->withInput();
        }else {
			$credentials = $request->only('email', 'password');
			echo "ANTES DE ENTRAR AL AUTH ATTEMPT";
		    if (Auth::attempt($credentials))
		    {
		    	return Redirect::to('foro')->with('alert-success', 'You are now logged in.');
		    }
			else
			{
				$errors = new MessageBag(['password' => ['Correo o/y Contraseña incorrectos']]);
				return Redirect::back()->withErrors($errors)->withInput();	
			}
		}
	}


	public function registerUser(){
		return view('foro.auth.register');
	}

	public function postRegisterUser(Request $request){
		$objFun = new Funciones();
		$fecha = date('Y-m-d');

		$validator = Validator::make($request->all(),[
            'name'      => 'required|max:191',
			'email' 	=> 'required|max:255|email|unique:users',
            'password' 	=> 'required|min:6|confirmed',
        ]);

		if ($validator->fails()) {
            return redirect('foro/register')->withErrors($validator)->withInput();
        }else {

			User::create([
				'name'           => $objFun->titleCase($request->name),
				'email'          => $request->email,
				'rol_id'         => 2,
				'avatar'         => '',
				'password' 		 => Hash::make($request->password),
				'remember_token' => $request->_token,
				'created_at'     => $fecha,
				'updated_at'     => $fecha,
			]);

			return redirect('foro/login');
		}

	}

	public function registerDiscusion(){

		$categories = Category::all();

		return view('foro.register',[
			'categories' => $categories
		]);
	}

	public function postRegisterDiscusion(Request $request){

		$request->request->add(['body_content' => strip_tags($request->body)]);

		$rules = [
            'title'               => 'required|min:5|max:255',
            'body_content'        => 'required|min:10',
            'chatter_category_id' => 'required|exists:App\Models\Category,id',
        ];

		$messages = [
		    'title.required' => 'El campo Titulo de la Discusion es requerido.',
		    'title.min' => 'El campo Titulo de la Discusion debe tener menos de 5 caracteres.',
		    'title.max' => 'El campo Titulo de la Discusion debe tener mas de 255 caracteres.',
		    'body_content.required' => 'La Descripcion de la Discusion es requerida.',
		    'body_content.min' => 'La Descripcion de la Discusion no puede tener menos de 10 caracteres.',
		    'chatter_category_id.required' => 'El campo Categoria es requerido.',
		    'chatter_category_id.exists' => 'El Codigo de la Categoria ingresado no existe.',
		];



		$validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user_id = Auth::user()->id;
        $slug = Str::slug($request->title, '-');

        $discussion_exists = Discussion::where('slug', '=', $slug)->count();
        
        if ($discussion_exists) {
        	$mensaje = "El Titulo que intenta ingresar (".$request->title.") ya se encuentra registrado.";

	        Session::flash('duplicate',$mensaje);
            return redirect('foro/registerDiscusion');
        }else{

        	$new_discussion = [
	            'title'               => $request->title,
	            'chatter_category_id' => $request->chatter_category_id,
	            'user_id'             => $user_id,
	            'slug'                => $slug,
	            'color'               => '',
	        ];

	        $discussion = Discussion::create($new_discussion);

	        $new_post = [
	            'chatter_discussion_id' => $discussion->id,
	            'user_id'               => $user_id,
	            'body'                  => $request->body,
            ];

            $post = Post::create($new_post);

            Session::flash('success','Registro creado satisfactoriamente');
            return redirect('foro');
        }
	}

	public function detalleDiscussion($slug){
		$categories = Category::all();
		$discussion = Discussion::where('slug', '=',$slug)->first();
		$posts = Post::where('chatter_discussion_id', '=', $discussion->id)->orderBy('created_at', 'asc')->paginate(10);
		
		return view('foro.detailDiscusion',[
			'discussion' => $discussion,
			'posts'		 => $posts,
			'categories' => $categories
		]);
	}

	public function registerPost(Request $request){
		
		$stripped_tags_body = ['body' => strip_tags($request->body)];

		$validator = Validator::make($stripped_tags_body, [
            'body' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $request->request->add(['user_id' => Auth::user()->id]);
        $request->request->add(['markdown' => 0]);

        $discussion = Discussion::find($request->chatter_discussion_id);
        
        $new_post = Post::create($request->all());

        if ($new_post->id){
        	Session::flash('success','Registro creado satisfactoriamente');
            return redirect('foro/discussion/'.$discussion->slug);
        }
	}
}
