  <nav class=" light-blue lighten-1">
    <div class="nav-wrapper container">
      <a href="{{route('index')}}" class="brand-logo">Expired Things</a>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#modal1" class="modal-trigger"><i class="fa fa-cog"></i> Setting</a></li>
        <li><a class='dropdown-button' href='#' data-activates='dropdown2'><i class="fa fa-globe"></i> Notification @if($notif)<span class="new badge rounded red">{{$notif}}</span> @endif </a></li>
      </ul>
    </div>
  </nav>
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h5>Setting Expired Date</h5>
      <form action="{{route('set_session')}}" method="POST" class="form-modal">
      	{{csrf_field()}}
      	 <div class="input-field col s12">
		    <select name="days">
		      <option value="3">3 Days</option>
          <option value="1">1 Days</option>
          <option value="2">2 Days</option>
		      <option value="7">7 Days</option>
		      <option value="14">14 Days</option>
		    </select>
		    <label>Select Days</label>
		  </div>
		  <button class="btn blue right" type="submit">Apply</button>
      </form>
    </div>
  </div>

   <!-- Dropdown Structure -->
  <ul id='dropdown2' class='dropdown-content custom'> 
    @if (count($isi) > 0)
      @foreach($isi as $show)
        <li><a href="{{url('data-expired/view/')}}/{{$show->id}}"><span class="center left15"> {{$show->nama}}</span> <img src="{{url('dist/img/')}}/{{$show->foto}}" width="30" class="left" height="30"> </a></li>
      @endforeach
    @else
      <li><a href="#">Tidak Ada</a></li>
    @endif
  </ul>
 <ul id="slide-out" class="side-nav">
    <li><a href="#!" class="  center">Menu Utama</a></li>
    <li class=" divider"></li>
    <li><a href="#modal1" class="modal-trigger"><i class="fa fa-cog"></i> Setting</a></li>
    <li><a class='dropdown-button' href='#' data-activates='dropdown1'><i class="fa fa-globe"></i> Notification<span class="new badge rounded red">{{$notif}}</span></a></li>
  </ul>