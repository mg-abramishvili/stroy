<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Roof;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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

    public function index()
    {
        $types = Type::all();
        $roofs = Roof::all();
        return view('index', compact('types', 'roofs'));
    }

    public function type_create()
    {
        return view('types.create');
    }

    public function type_edit($id)
    {
        $type = Type::find($id);
        return view('types.edit', compact('type'));
    }

    public function type_store(Request $request)
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
        return redirect('/admin');
    }

    public function type_update(Request $request)
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
        return redirect('/admin');
    }

    public function roof_create()
    {
        return view('roofs.create');
    }

    public function roof_edit($id)
    {
        $roof = Roof::find($id);
        return view('roofs.edit', compact('roof'));
    }

    public function roof_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gallery' => 'required',
            'score' => 'required',
        ]);
        
        $data = request()->all();
        $roof = new Roof();
        $roof->name = $data['name'];
        $roof->score = $data['score'];

        if (!isset($data['gallery'])) {
            $data['gallery'] = [];
        }
        $roof->gallery = $data['gallery'];
        
        $roof->save();
        return redirect('/admin');
    }

    public function roof_update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gallery' => 'required',
            'score' => 'required',
        ]);

        $data = request()->all();
        $roof = Roof::find($data['id']);
        $roof->name = $data['name'];
        $roof->score = $data['score'];

        if (!isset($data['gallery'])) {
            $data['gallery'] = [];
        }
        $roof->gallery = $data['gallery'];
        
        $roof->save();
        return redirect('/admin');
    }
}
