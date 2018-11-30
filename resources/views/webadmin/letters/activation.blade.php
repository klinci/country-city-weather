@extends('webadmin.letters.layout')
@section('content')
  <table cellpadding="0" cellspacing="0" class="full-width">

    <!-- start logo -->
    <tr>
      <td class="bg-white">
        <center>
          @include('webadmin.letters.activation.logo')
        </center>
      </td>
    </tr>
    <!-- end logo -->

    <!-- start head title -->
    <tr>
      <td class="bg-grey">
        <center>
          @include('webadmin.letters.activation.head')
        </center>
      </td>
    </tr>
    <!-- end head title -->

    <!-- start content block -->
    <tr>
      <td>
        <center>
          @include('webadmin.letters.activation.content')
        </center>
      </td>
    </tr>
    <!-- end content block -->

    <!-- start footer -->
    <tr>
      <td class="footer-td">
        <center>
          @include('webadmin.letters.activation.footer')
        </center>
      </td>
    </tr>
    <!-- end footer -->

  </table>
@endsection