<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Http\Requests\Admin\PublicationRequest;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::latest()->paginate(15);
        return view('admin.publication.index', compact('publications'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Publication::categories;

        return view('admin.publication.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicationRequest $request)
    {
        $publication_data = $request->safe()->except(['image', 'file']);

        if ($request->hasfile('image')) {
            $get_file = $request->file('image')->store('images/publication');
            $publication_data['image'] = $get_file;
        }

        if ($request->hasfile('file')) {
            $get_file = $request->file('file')->store('pdfs/publication');
            $publication_data['file'] = $get_file;
        }

        $publication = Publication::create($publication_data);

        return to_route('admin.publication.index')->with('message', trans('admin.publication_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        $categories = Publication::categories;

        return view('admin.publication.edit', compact('publication', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        $publication_data = $request->safe()->except(['image', 'file']);

        if ($request->hasfile('image')) {
            $get_file = $request->file('image')->store('images/posts');
            $publication_data['image'] = $get_file;
        }

        if ($request->hasfile('file')) {
            $get_file = $request->file('file')->store('pdfs/publication');
            $publication_data['file'] = $get_file;
        }

        $publication->update($publication_data);

        return to_route('admin.publication.index')->with('message', trans('admin.publication_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();

        return back()->with('message', trans('admin.publication_deleted'));
    }
}
