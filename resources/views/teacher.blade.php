@extends('layouts.layouts');
@section('content');


<div id="breadcrumb" style="margin-top: -15px">
    <div class="container">
        <div class="breadcrumb">
            <li>Педагоги</li>
            @if($isAdmin==1)
                <li><a href="/addTeacher">Добавить запись</a></li>
            @endif
        </div>
    </div>
</div>


<br/>
<div class="container">
    <div class="wp-content row">
        <div class="col-md-12">
            <h1>Наша команда</h1>
        </div>

        @foreach($teachers as $teacher)
        <div class="wp-teacher-item col-sm-12">
            <div class="wp-photo-side">
			<span class="img-border-square">
				<div class="shadow-layer"></div>
				<img src="{{$teacher->foto}}">
			</span>
                </a>
            </div>
            <div class="section-title-2">{{$teacher->FIO}}</div>
            <div class="job-title">{{$teacher->specialization}}</div>
            <p>{{$teacher->about}}</p>
            <div>
                @if ($isAdmin)
                    <form action="/teacherDelete/{{$teacher->id}}" method="post" >
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button  class="btn fa" style="margin-top: 5px; width: 100px " value="Удалить запись">Удалить ст.</button>
                    </form>
                @endif

                @if ($isAdmin)
                    <form action="/teacherEdit/{{$teacher->id}}"  >
                        <button   class="btn fa" style="margin-top:5px; width: 100px" value="Редактировать запись">Редактир ст.</button>
                    </form>
                @endif
            </div>

        </div>
        @endforeach

    </div>
</div>




@endsection
