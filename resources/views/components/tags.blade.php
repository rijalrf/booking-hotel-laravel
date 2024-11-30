<div>
    <span
        class="btn 
        @if ($status == 'booked') btn-sm btn-primary
        @elseif ($status == 'checked_in') btn-sm btn-success
        @elseif ($status == 'checked_out') btn-sm btn-danger
        @else btn-sm btn-secondary @endif
        rounded">
        @if ($status == 'checked_out')
            CHECKED OUT
        @elseif ($status == 'checked_in')
            CHECKED IN
        @elseif ($status == 'booked')
            BOOKED
        @elseif ($status == 'cancelled')
            CANCELLED
        @else
            STATUS NOT FOUND
        @endif
    </span>
</div>
