@component('mail::message')
# Hello,

{{ $replyContent }}

Thanks,<br>
{{ $supportName ?? 'Your Support Team' }}<br>
Your ClickSpark Support
@endcomponent
