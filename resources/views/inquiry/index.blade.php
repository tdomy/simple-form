@extends('layouts.app')

@section('title', 'お問合わせ')

@section('script')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
<script>
  function onClick(e) {
    // ボタンを無効に
    e.currentTarget.disabled = true;

    grecaptcha.ready(function() {
      grecaptcha.execute("{{ config('services.recaptcha.sitekey') }}", {action: "submit"}).then(function(token) {
        // tokenをフォームにセットして送信
        document.getElementById("recaptcha-token").value = token;
        document.getElementById("contactform").submit();
      });
    });
  }
</script>
@endsection

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" id="contactform" action="/inquiry/confirm">
    @csrf
    <table>
      <tr>
        <th>お名前</th>
        <td><input name="name" /></td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td><input type="email" name="email" /></td>
      </tr>
      <tr>
        <th>メッセージ</th>
        <td><textarea name="message" ></textarea></td>
      </tr>
    </table>
    <input type="hidden" name="token" id="recaptcha-token" />
    <button type="button" id="submit-button" onclick="onClick(event)">確認する</button>
  </form>
@endsection
