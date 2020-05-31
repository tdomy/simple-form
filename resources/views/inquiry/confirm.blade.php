@extends('layouts.app')

@section('title', 'お問合わせ確認')

@section('content')
  <form method="POST" action="/inquiry/finish">
    @csrf
    <table>
      <tr>
        <th>お名前</th>
        <td>{{ $name }}</td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{ $email }}</td>
      </tr>
      <tr>
        <th>メッセージ</th>
        <td>{{ $message }}</td>
      </tr>
    </table>
    <button type="submit">送信する</button>
  </form>
@endsection
