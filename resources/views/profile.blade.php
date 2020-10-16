@extends('layouts.index')
@section('content')

<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">How students feel about you:</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
      <div class="card-body">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Excellent students:</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $BestStudentsMessage}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>

                </div>
              </div>
            </div>
          </div>
          <div class="card border-left-success my-4 shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Good Students</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $GoodStudentsmessage}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>

                </div>
              </div>
            </div>
          </div>
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Weak Students</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $WeakStudentsmessage}}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
     
      </div>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Rate in %</h6>
    </div>
    <div class="card-body">
      <h4 class="small font-weight-bold">Excellent Students:<span class="float-right">{{$BestStudents * 20 ?? 'no data'}}%</span></h4>
      <div class="progress mb-4">
        <div class="progress-bar {{$BColor}}" role="progressbar" style="width: {{$BestStudents * 20}}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <h4 class="small font-weight-bold">Good Students:<span class="float-right">{{$GoodStudents * 20 ?? 'no data'}}%</span></h4>
      <div class="progress mb-4">
        <div class="progress-bar {{$GColor}} " role="progressbar" style="width: {{$GoodStudents * 20}}%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <h4 class="small font-weight-bold">Weak Students:<span class="float-right">{{$WeakStudents * 20 ?? 'no data'}}%</span></h4>
      <div class="progress mb-4">
        <div class="progress-bar {{$WColor}}" role="progressbar" style="width:{{$WeakStudents * 20}}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      
    </div>
  </div>
@endsection