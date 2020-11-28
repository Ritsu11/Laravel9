@extends('layouts.helloapp')

@section('title', 'Add')
@section('menubar')
    @parent
    更新ページ
@endsection
@section('content')
    <table>
       <form action="/hello/edit" method="POST">
        {{ csrf_field() }}
           <tr>
               <tr><th>id: </th><td><input type="number" name="id"" min="0"></td></tr>
               <tr><th>name: </th><td><input type="text" name="name"></td></tr>
               <tr><th>mail: </th><td><input type="text" name="mail"></td></tr>
               <tr><th>age: </th><td><input type="number" name="age" min="0"></td></tr>
               <tr><th></th><td><input type="submit" value="send"></td></tr>
           </tr>
       </form>
    </table>
@endsection
@section('footer')
    copyright 2020
@endsection
