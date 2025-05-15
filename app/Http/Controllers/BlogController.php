<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return response()->json($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->titulo = $request->titulo;
        $blog->slug = $this->generarSlug($request->titulo);
        $blog->contenido = $request->contenido;
        $blog->save();

        return response()->json(['blog' => $blog], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return response()->json($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if ($request->has('titulo')) {
            $blog->slug = $this->generarSlug($request->titulo);
        }
        $blog->update($request->post());
        return response()->json(['blog' => $blog], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(['message' => 'Blog eliminado'], 200);
    }

    private function generarSlug(string $titulo): string
    {
        // 1. Convertir el título a minúsculas
        $slug = strtolower($titulo);

        // 2. Reemplazar caracteres especiales y espacios por guiones
        $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);

        // 3. Eliminar guiones duplicados
        $slug = preg_replace('/-+/', '-', $slug);

        // 4. Eliminar guiones al principio y al final
        $slug = trim($slug, '-');

        return $slug;
    }
}
