@if ($cui->deleted_at)
    <a href="{{ route('dash.cui.edit', $cui->id) }}" class="btn  btn-primary btn-flat btn-sm" data-toggle="tooltip"
        data-placement="top" title="edit"><span class="fa fa-edit"></span></a>
    
    <form action="{{ route('dash.cui.restore', $cui->id) }}" method="post" class="d-inline">
        @method('PATCH')
        @csrf
        <button type="submit" class="btn btn-success btn-flast btn-sm" data-toggle="tootlip" data-placement="top"
            title="restore"><span class="fa fa-undo"></span></button>
    </form>
    <form action="{{ route('dash.cui.forceDelete', $cui->id) }}" method="post" class="d-inline"
        onsubmit="return confirm('apakah anda yakin?')">
        @csrf
        <input type="hidden" name="_method" value="delete" />
        <button type="submit" class="btn btn-dark btn-flat btn-sm delete" data-toggle="tooltip" data-placement="top"
            title="delete permanent"><span class="fa fa-x"></span></button>
    </form>
@else

    <a href="{{ route('dash.cui.edit', $cui->id) }}" class="btn  btn-primary btn-flat btn-sm" data-toggle="tooltip"
        data-placement="top" title="edit"><span class="fa fa-edit"></span></a>
    @if ($cui->isActive)
        <a href="" class="btn  btn-success btn-flat btn-sm" data-toggle="tooltip"
        data-placement="top" title="toggle-on"><span class="fa fa-toggle-on"></span></a>
        
    @else
    <a href="{{ route('dash.cui.active', $cui->id) }}" class="btn  btn-warning btn-flat btn-sm" data-toggle="tooltip"
        data-placement="top" title="toggle-off"><span class="fa fa-toggle-off"></span></a>
    @endif
    
    
    <form action="{{ route('dash.cui.destroy', $cui->id) }}" method="post" class="d-inline"
        onsubmit="return confirm('apakah anda yakin?')">
        @csrf
        <input type="hidden" name="_method" value="delete" />
        <button type="submit" class="btn btn-danger btn-flat btn-sm delete" data-toggle="tooltip" data-placement="top"
            title="delete"><span class="fa fa-trash"></span></button>
    </form>
@endif
