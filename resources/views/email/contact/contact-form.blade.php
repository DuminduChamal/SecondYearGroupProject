@component('mail::message')
#Thank you for your messege

<strong>Name</strong> {{$data['name']}}
<strong>Email</strong> {{$data['email']}}
<strong>Messege</strong> 

{{$data['messege']}}
@endcomponent
