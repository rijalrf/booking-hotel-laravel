<div>
    <span
        class="btn 
        @if ($status == 'booked') btn-primary
        @elseif ($status == 'checked_in') btn-success
        @elseif ($status == 'checked_out') btn-danger
        @else btn-secondary @endif
        badge rounded-pill p-2">
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
