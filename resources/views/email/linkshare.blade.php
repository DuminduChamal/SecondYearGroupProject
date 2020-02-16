@component('mail::message')
#Please visit the below URL to connect with tutor....

<strong>Link :</strong>

<a href="">{{$session_link}}</a>

{{-- <strong>Name</strong> {{$data['name']}}
<strong>Email</strong> {{$data['email']}}
<strong>Messege</strong>  --}}

{{-- {{$data['messege']}} --}}
@endcomponent
