<form action="/foo/bar" method="POST">
  {{ csrf_field() }}
  {{ method_field("PATCH") }}
</form>
