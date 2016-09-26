<table class="table table-bordered">
    <tr>
        <th>Category:</th>
        <th>{!! $category->title !!}</th>
    </tr>
    <tr>
        <th>Parent Category:</th>
        <th>{!! $category->parentCategory->title !!}</th>
    </tr>
</table>
