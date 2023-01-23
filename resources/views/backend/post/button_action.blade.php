@if ($Jadwal->deleted_at)
    <form action="{{route('admin.manage-jadwal.restore',$Jadwal->id)}}" method="post" class="d-inline">
        @method('PATCH')
        @csrf
        <button type="submit" class="btn btn-success btn-flast btn-sm" data-toggle="tootlip" data-placement="top"
                title="restore"><span class="fa fa-undo"></span></button>
    </form>
@else

    <a href="{{route('admin.manage-jadwal.edit',$Jadwal->id)}}" class="btn  btn-primary btn-flat btn-sm" data-toggle="tooltip"
       data-placement="top" title="edit"><span class="fa fa-edit"></span></a>
    <a href="{{$Jadwal->link}}" class="btn  btn-warning btn-flat btn-sm" data-toggle="tooltip"
       data-placement="top" title="Link Zoom"><span class="fa fa-external-link-alt text-light"></span></a>
    <a href="{{route('absen',$Jadwal->id)}}" class="btn  btn-success btn-flat btn-sm" data-toggle="tooltip"
        data-placement="top" title="Link Absensi"><span class="fa fa-pencil-alt text-light"></span></a>
    <form action="{{route('admin.manage-jadwal.destroy',$Jadwal->id)}}" method="post" class="d-inline"
          onsubmit="return confirm('apakah anda yakin?')">
        @csrf
        <input type="hidden" name="_method" value="delete" />
        <button type="submit" class="btn btn-danger btn-flat btn-sm delete" data-toggle="tooltip"
                data-placement="top" title="delete"><span class="fa fa-trash"></span></button>
    </form>
@endif
 