<?php
	
	namespace App\Http\Controllers;
	
	use App\Models\Post;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class PostsController extends Controller
	{
		public function __construct()
		{
			$this->middleware('auth')->only('create');
		}
		
		/**
		 * Show posts.
		 */
		public function index()
		{
			return view('posts', ['posts' => Post::all()]);
		}
		
		/**
		 * Show a specific post
		 */
		public function show(Post $post)
		{
			return view('post')->withPost($post);
		}
		
		/**
		 * Persist post to database
		 *
		 * @param Request $request
		 * @return RedirectResponse
		 */
		public function create(Request $request)
		{
//			dd($request);
			$post = Auth::user()->posts()->create($request->validate([
				'title' => 'required|array',
				'body' => 'required|array',
			]));
			
			return redirect()->route('post', $post);
		}
	}
