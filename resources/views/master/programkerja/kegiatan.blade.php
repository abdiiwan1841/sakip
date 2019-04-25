<select class="form-control" name="kegiatan" id="kegiatan"  >
    <option  value="">-- Pilih Kegiatan --</option>
    @foreach($kegiatan as $row)
        <option kot="{{$row->nama_kegiatan}}" value="{{$row->id_kegiatan}}">{{$row->nama_kegiatan}}</option>
    @endforeach
</select>
