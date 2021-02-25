<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->id)) {
            $param = ['id' => $request->id];
            $items = DB::select('select * from people where id = :id', $param);
        } else {
            $items = DB::select('select * from people');
        }
        return view('hello.index2', compact('items'));
    }

    public function post(Request $request)
    {
        $items = DB::table('people')->get();
        return view('hello.index2', compact('items'));
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values(:name, :mail, :age)', $param);
        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        return view('hello.edit');
    }

    public function update(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
            'id' => $request->id
        ];
        DB::update('update people set name = :name, mail = :mail, age = :age  where id = :id ', $param);
        return redirect('/hello');
    }

    public function del(Request $request)
    {
        return view('hello.del');
    }

    public function remove(Request $request)
    {
        DB::table('people')
            ->where('id', $request->id)
            ->delete();
        return redirect('/hello');
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('people')
            ->offset($page * 3)
            ->limit(3)
            ->get();
        return view('hello.show', ['items' => $items]);
    }
}
