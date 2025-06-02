@php $number = 1; @endphp
@foreach ($attendances as $attendances)
    <tr class="btn-reveal-trigger">
        <td class="order py-2">{{ $number++ }}</td>
        <td class="address py-2 date-cell" data-date="{{ $attendances->created_at }}">
            {{ $attendances->created_at->format('d M Y, h:i A') }}
        </td>
        <td class="order py-2">{{ $attendances->rfid_tag }}</td>
        <td class="date py-2">
            <a href="{{ url('detail_student/' . $attendances->student->id) }}">
                {{ $attendances->student->full_name }}
            </a>
        </td>
        <td class="school py-2">{{ $attendances->student->school->name }}</td>
        <td class="address py-2 d-none d-md-table-cell">{{ $attendances->student->address }}</td>
        <td hidden class="rate py-2" data-rate="{{ $attendances->student->rate_id }}">
            {{ $attendances->student->rate_id }}
        </td>
        <td class="align-middle">
            @if ($attendances->status == 'In')
                <span class="badge badge rounded-pill d-block py-2 badge-soft-success">
                    In <span class="fas fa-check" data-fa-transform="shrink-2"></span>
                </span>
            @else
                <span class="badge badge rounded-pill d-block p-2 badge-soft-secondary">
                    Out <span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span>
                </span>
            @endif
        </td>
    </tr>
@endforeach