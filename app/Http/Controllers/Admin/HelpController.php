<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreHelpRequest;
use App\Http\Requests\Admin\UpdateHelpRequest;
use App\Models\Help;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helps = Help::latest()->paginate(10);
        return view('admin.help.index', compact('helps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.help.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHelpRequest $request)
    {
        $input = $request->all();
        $input['image'] = $this->fileUpload($request, 'image');

        $help =  Help::create($input);
        $help->update(['slug' => Str::slug($request->title)]);
        return redirect()->route('admin.helps.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Help $help)
    {
        return view('admin.help.edit', compact('help'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHelpRequest $request, Help $help)
    {
        $old_image = $help->image;
        $input = $request->all();

        $image = $this->fileUpload($request, 'image');

        if ($image) {
            $this->removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        $input['slug'] = Str::slug($request->title);
        $help->update($input);
        return redirect()->route('admin.helps.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Help $help)
    {
        $this->removeFile($help->image);
        $help->delete();
        return redirect()->route('admin.helps.index')->with('message', 'Delete Successfully');
    }

    public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/images/help';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }

    public function removeFile($file)
    {
        $path = public_path() . '/admin/images/help/' . $file;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}