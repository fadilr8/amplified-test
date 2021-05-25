<div class="p5 pagination flex list-none p-0 mb-3 rounded" id="pagination" data-length="{{ $length }}">
    <ul>
        @for ($i = 0; $i < $len; $i++)
            <a href="#" class="pagination-bullet" style="width:{{ $width }}%"><li></li></a>
        @endfor
    </ul>
</div>