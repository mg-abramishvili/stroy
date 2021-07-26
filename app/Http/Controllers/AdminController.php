<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function file($type)
    {

        switch ($type) {
            case 'upload':
                return $this->upload();
        }

        return \Response::make('success', 200, [
            'Content-Disposition' => 'inline',
        ]);
    }

    public function upload()
    {
        if (request()->file('gallery')) {
            $file1 = request()->file('gallery');
            for ($i = 0; $i < count($file1); $i++) {
                $file = $file1[$i];
                $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/uploads', $filename);

                return \Response::make('/uploads/' . $filename, 200, [
                    'Content-Disposition' => 'inline',
                ]);
            }
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gallery' => 'required',
            'score' => 'required',
        ]);
        
        $data = request()->all();
        $type = new Type();
        $type->name = $data['name'];
        $type->score = $data['score'];

        if (!isset($data['gallery'])) {
            $data['gallery'] = [];
        }
        $type->gallery = $data['gallery'];
        
        $type->save();
        return redirect('/types');
    }

    public function edit($id)
    {
        $type = Type::find($id);
        return view('types.edit', compact('type'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gallery' => 'required',
            'score' => 'required',
        ]);

        $data = request()->all();
        $type = Type::find($data['id']);
        $type->name = $data['name'];
        $type->score = $data['score'];

        if (!isset($data['gallery'])) {
            $data['gallery'] = [];
        }
        $type->gallery = $data['gallery'];
        
        $type->save();
        return redirect('/types');
    }
}
