@extends('cms.master')

@section('content')
<div id="app">
    <section class="content-header">
      <h1> Activiteiten <small></small> </h1>

      <!--  breadcrumbs -->
      <ol class="breadcrumb">
        <li><a href="{{ URL::to("cms/") }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Activiteiten</a></li>
      </ol>

    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        </div>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Aanpassen</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div> -->
                </div>
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <form method="POST" action="/cms/event/{{$event->id}}" >
                {{csrf_field()}}
                {{ method_field('PUT') }}
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                      <td>
                        <label>Naam</label>
                        <input type='text' value="{{ $event->title }}" class='form-control' name='titel'/>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Locatie</label>
                        <input type='text' value="{{ $event->location }}"  class='form-control' name='locatie'/>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <label>Prijs</label>
                        <input type='text' value="{{ $event->price }}"  class='form-control' name='prijs'/>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Datum</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type='text' value="{{ $event->date }}"  name='datum' class='form-control datepicker' />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Beschrijving</label>
                        <textarea class='form-control' name='beschrijving'>{{ $event->description }}</textarea>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Genre</label>

                        @if(!empty($selected[0]))
                          <p><b>Geselecteerde tags:</b></p>
                        @endif

                        @foreach($selected as $genre)

                          <!-- Reeds gekozen genres -->


                          <input type='checkbox' name='tag[]' value='{{ $genre->id }}' checked /> {{ $genre->name }}
                          <div style='clear:both;'></div>

                        @endforeach

                        @if(!empty($not_selected[0]))
                          <p><b>Niet-geselecteerde tags:</b></p>
                        @endif
                        
                        @foreach($not_selected as $genre)

                          <!-- Nog niet gekozen genres -->

                          <input type='checkbox' name='tag[]' value='{{ $genre->id }}'/> {{ $genre->name }}
                          <div style='clear:both;'></div>
                          

                        @endforeach

                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Starttijd</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type='text' name='starttijd' value="{{ $event->time_start }}"  class='form-control timepicker' />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Eindtijd</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type='text' name='eindtijd' value="{{ $event->time_end }}"  class='form-control timepicker' />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group">
                          <button class="btn btn-success" type="submit" >Aanpassen</button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div id="app">
                @if($photo != null)
                <image-display
                    id="{{$photo->id}}"
                    model_id="{{$photo->model_id}}"
                    type="{{$photo->type}}"
                    filename="{{$photo->filename}}">
                </image-display>

                @endif
                <image-uploader route="photo" model_id="{{$event->id}}" type="event" >
                    <cropper route="cropper" aspectheight="11" aspectwidth="16" > </cropper>
                </image-uploader>
            </div>

          </div>
          <!-- /.box -->
        </div>
        </div>
    </section>
</div>
@stop
@section('scripts')
  <script type="text/javascript" src="/js/vue.js" ></script>
@stop