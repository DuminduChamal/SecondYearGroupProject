@component('mail::message')
#Thank you for your messege

<strong>Name</strong> {{$data['name']}} <br>
<strong>Email</strong> {{$data['email']}} <br>
<strong>Messege</strong> <br>

{{$data['messege']}}
@endcomponent
