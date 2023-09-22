@extends('layout.appTheme')
@section('css')
@endsection
@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    {{-- <iframe src="http://127.0.0.1:8000/upload-documents/{{$token}}" width="100%" height="800"></iframe> --}}
    <iframe src="http://127.0.0.1:8000/documents/view/{{$contact_id}}?token={{$token}}&hide-header=true" width="100%" height="800"></iframe>


    
</div>
@endsection

@section('script')

<script>
  

</script>

@endsection
