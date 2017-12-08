@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        @if ($message['level'] == 'danger')
            <flash-message
                    level="error"
                    message="{!! $message['message'] !!}"
            ></flash-message>
        @else
            <flash-message
                    level="{{ $message['level'] }}"
                    message="{!! $message['message'] !!}"
            ></flash-message>
        @endif
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
