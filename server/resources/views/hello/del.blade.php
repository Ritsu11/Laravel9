@extends('layouts.helloapp')

@section('title', 'Del')
@section('menubar')
    @parent
    削除ページ
@endsection
@section('content')
    <table>
       <form action="/hello/del" method="POST">
        {{ csrf_field() }}
           <tr>
               <tr><th>id: </th><td><input type="number" name="id"></td></tr>
               <tr><th></th><td><input type="submit" value="send"></td></tr>
           </tr>
       </form>
    </table>
@endsection
@section('footer')
    copyright 2020
@endsection
