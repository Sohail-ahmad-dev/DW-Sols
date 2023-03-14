@extends('layouts.app')

@section('content')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/datatable/css/twitter-bootstrap.min.css') }}">

    <!-- DataTables CSS -->
    <link href="{{ asset('assets/datatable/css/jquery.dataTables.min.css') }}">

    <!-- DataTables Bootstrap 4 CSS -->
    <link href="{{ asset('assets/datatable/css/dataTables.bootstrap4.min.css') }}">

    <!-- DateRangePicker CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/daterangepicker/daterangepicker.css') }}" />

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 shadow py-5 px-4">

          <div class="row my-4">

            <div class="col-md-4 col-sm-6 col-12">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status">
                  <option selected value="">--Select Status--</option>
                  <option value="Incorporated">Incorporated</option>
                  <option value="Reserved">Reserved</option>
                </select>
            </div>

            <div class="col-md-4 col-sm-6 col-12">
                <label for="cro" class="form-label">CRO</label>
                <select class="form-select" id="cro">
                  <option selected value="">--Select CRO--</option>
                  <option value="CRO Lahore">CRO Lahore</option>
                  <option value="CRO Multan">CRO Multan</option>
                  <option value="CRO Karachi">CRO Karachi</option>
                  <option value="CRO Islamabad">CRO Islamabad</option>
                  <option value="CRO Quetta">CRO Quetta</option>
                  <option value="CRO Gilgit">CRO Gilgit</option>
                </select>
            </div>

            <div class="col-md-4 col-sm-6 col-12">
              <label for="date_range" class="form-label">Registration Date</label>
              <input type="text" id="date_range" class="form-control" name="daterange" value="" />
            </div>
          </div>
          
          <table id="companies" class="table table-bordered">
            <thead>
              <tr>
                  <th>Company Name</th>
                  <th>Status</th>
                  <th>CRO</th>
                  <th>Registration No.</th>
              </tr>
          </thead>

          <tbody>
          </tbody>

          </table>

        </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

  <!-- jQuery Validation -->
  <script src="{{ asset('assets/datatable/js/jquery.validate.js') }}"></script>

  <!-- twitter Bootstrap JS -->
  <script src="{{ asset('assets/datatable/js/twitter-bootstrap.min.js') }}"></script>

  <!-- DataTables JS -->
  <script src="{{ asset('assets/datatable/js/jquery.dataTables.min.js') }}"></script>

  <!-- DataTables Bootstrap 4 JS -->
  <script src="{{ asset('assets/datatable/js/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Moment JS -->
  <script type="text/javascript" src="{{ asset('assets/daterangepicker/moment.min.js') }}"></script>

  <!-- DateRangePicker JS -->
  <script type="text/javascript" src="{{ asset('assets/daterangepicker/daterangepicker.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('assets/js/companies.js') }}"></script>
  
@endsection