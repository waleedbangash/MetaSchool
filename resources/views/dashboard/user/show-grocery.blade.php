@extends('layouts.master')

@section('content')
<section class="content">
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
              <div class="box-header">
                 <h3 class="box-title">Racks</h3>
              </div><!-- /.box-header -->
             <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Required Time</th>
                                <th>timezone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grocery as $grocery)
                              <tr>
                                  <td>{{$grocery->id}}</td>
                                  <td>{{$grocery->title}}</td>
                                  <td>{{$grocery->description}}</td>
                                  <td>

                                    @php
                                    $date = Carbon\Carbon::parse( $grocery->deadline)->timezone(get_local_time());
                                    echo($date);
                                    @endphp
                                   <input type="hidden" name="getTime" value="{{$grocery->deadline}}">
                                    @php
                                //     $dt = Carbon\Carbon::parse($grocery->deadline)->timezone(get_local_time());
                                //    echo $dt;
                                    // $toDay = $dt->format('d');
                                    // $toMonth = $dt->format('m');
                                    // $toYear = $dt->format('Y');
                                    // $dateUTC = Carbon\Carbon::createFromDate($toYear, $toMonth, $toDay, 'UTC');
                                    // $datePST = Carbon\Carbon::createFromDate($toYear, $toMonth, $toDay,get_local_time());
                                    // $difference = $dateUTC->diffInHours($datePST);
                                    // echo $date = $dt->addHours($difference);
                                                                    @endphp
                                  </td>
                                  <td>{{get_local_time()}}</td>
                                  {{-- <td class="timezone"></td> --}}
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div><!-- /.box-body -->
        </div>
    </div>
    </div>

</section>
@endsection
@section('custom-scripts')
<script>
    $('.timezone').html(moment.tz.guess());
</script>
@endsection
