<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Nota;
use Illuminate\Http\Request;

class NotasController extends Controller {

	public function __construct()
	{
		$this->middleware("auth");
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$notas = Nota::orderBy('id', 'desc')->paginate(10);

		return view('notas.index', compact('notas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('notas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$nota = new Nota();
		$nota->title = $request->input("title");
        $nota->body = $request->input("body");
		$nota->save();

		return redirect()->route('notas.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$nota = Nota::findOrFail($id);

		return view('notas.show', compact('nota'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$nota = Nota::findOrFail($id);

		return view('notas.edit', compact('nota'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$nota = Nota::findOrFail($id);

		$nota->title = $request->input("title");
        $nota->body = $request->input("body");

		$nota->save();

		return redirect()->route('notas.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$nota = Nota::findOrFail($id);
		$nota->delete();

		return redirect()->route('notas.index')->with('message', 'Item deleted successfully.');
	}

}
