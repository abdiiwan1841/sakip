 
 	@foreach($kegiatan as $value)
 	<option value="{{$value->id_kegiatan}}" kegiatan_name="{{$value->nama_kegiatan}}">{{$value->nama_kegiatan}} | {{$value->id_kegiatan}}</option>
 	@endforeach
 
