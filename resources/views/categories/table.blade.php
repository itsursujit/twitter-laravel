<style>
    table .collapse.in {
        display:table-row;
    }
    table {
        width:100%;
        clear: both;
        margin-top: 6px !important;
        margin-bottom: 6px !important;
        max-width: none !important;
    }
    table>thead>tr>th {
        vertical-align: bottom;
        border-bottom: 2px solid #ddd;
    }
    table>tbody>tr>td,table>thead>tr>th {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
    }
    table .collapse {
        background-color: rgba(146, 186, 194, 0.34);
    }

    table .collapse>td:first-child {
        text-align: center;
    }
</style>
<table class="table-responsive table-hover" id="categories-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Parent Category</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $count = 1;
    ?>
    @foreach($categories as $key => $cat)
        <tr class="clickable" data-toggle="collapse" id="row{{$key}}" data-target=".row{{$key}}">
            <td> @if(count($cat->childCategory)>0) <i class="glyphicon glyphicon-plus"></i> @endif</td>
            <td>{!! $cat->title !!}</td>
            <td>Main Category</td>
            <td></td>
        </tr>
        @foreach($cat->childCategory as $i => $category)
            <tr class="collapse row{{$key}}">
                <td>{{ $count }}</td>
                <td>{!! $category->title !!}</td>

                <td>{!! $cat->title !!}</td>
                <td>
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('categories.show', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('categories.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            <?php
                $count++;
            ?>
        @endforeach

    @endforeach
    </tbody>
</table>