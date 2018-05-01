@extends('cms.master')

@section('content')
<div id="app">
    <section class="content-header">
      <h1> Activiteiten <small>Beheer de agendaitems.</small> </h1>

      <!--  breadcrumbs -->
      <ol class="breadcrumb">
        <li><a href="{{ URL::to("cms/") }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Activiteiten</a></li>
      </ol>

    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Activiteiten</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                </div>
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th></th>
                  <th></th>
                  <th>#</th>
                  <th>Titel</th>
                  <th>Locatie</th>
                  <th>Prijs</th>
                  <th>Datum</th>
                  <th>Beschrijving</th>
                  <th>Starttijd</th>
                  <th>Eindtijd</th>
                </tr>
                @foreach($events as $object)

                    <tr>
                      <!-- edit form -->
                      <td>
                        @include('cms.core.partials.edit_button', [
                          'type' => 'event',
                          'id' => $object->id
                        ])
                      </td>
                      <!-- Verwijderen form -->
                      <td>
                        @include('cms.core.partials.delete_button', [
                          'type' => 'event',
                          'id' => $object->id
                        ])
                      </td>
                      <td>
                        {{ $object->id }}
                      </td>
                      <td>
                        {{ $object->title }}
                      </td>
                      <td>
                        {{ $object->location }}
                      </td>
                      <td>
                        {{ $object->price }}
                      </td>
                      <td>
                        {{ $object->date }}
                      </td>
                      <td>
                        {{ $object->description }}
                      </td>
                      <td>
                        {{ $object->time_start }}
                      </td>
                      <td>
                        {{ $object->time_end }}
                      </td>
                    </tr>

                  @endforeach
                </tbody>
              </table>
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