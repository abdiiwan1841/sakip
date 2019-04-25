
		<option value="">--Pilih Sub Kegiatan--</option>	
			@foreach($subkegiatan as $row)
				<option value="{{$row->id_sub_kegiatan}}" sub_name="{{$row->nama_sub_kegiatan}}({{$row->id_sub_kegiatan}})">{{$row->nama_sub_kegiatan}} | {{$row->id_sub_kegiatan}}</option>
			@endforeach		
