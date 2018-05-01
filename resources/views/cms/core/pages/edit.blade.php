@extends('cms.master')

@section('content')
<div id="app">
    <section class="content-header">
      <h1> Pagina {{$page->name }} <small>U bent deze pagina aan het aanpassen.</small> </h1>

      <!--  breadcrumbs -->
      <ol class="breadcrumb">
        <li><a href="{{ URL::to("cms/") }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pagina {{ $page->name }}</a></li>
      </ol>

    </section>

    <section class="content">
      <div class="row">

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Secties</h3>

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
            <table class="table table-hover">
              <tbody>
                @foreach($page->sections as $section)
                  {{$section->title}}
                @endforeach


                @if($page->sections->isEmpty())
                <tr>
                  <td><strong>Er zijn nog geen secties toegevoegd.</strong></td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
      </div>

    </div>
  </section>

<!--  adding sections -->
<section class="content">
      <div class="row">

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Secties toevoegen</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">

                </div>
              </div>
            </div>

            <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <form method="POST" action="{{ URL::to('cms/section') }}">
            {{csrf_field()}}
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>
                      <!-- title -->
                      <div class="form-group">
                        <label>Titel</label>
                        <input type="text" id="titel" class="form-control" name="title">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <!-- description -->
                      <div class="form-group">
                        <label>De tekst die op de website wordt weergegeven.</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                      </div>
                    </td>
                  </tr>
                  <!-- page position -->
                  <tr>
                    <td>
                      <div class="form-group">
                        <label>Positie op de pagina</label>
                        <select name="page_position" class="form-control">
                          @foreach($page_positions as $value => $name )
                            <option value="{{ $value }}"> {{ $name }} </option>
                          @endforeach
                        </select>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button class="btn btn-success" type="submit">Toevoegen</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
            <!-- /.box-body -->
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