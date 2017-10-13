<h2>У вас новое сообщение на сайте of.kg</h2>

@if($data['name'])
    <h4>Имя</h4>
    <p>{{ $data['name'] }}</p>
    <p>&nbsp;</p>
@endif

@if($data['phone'])
    <h4>Телефон</h4>
    <p>{{ $data['phone'] }}</p>
    <p>&nbsp;</p>
@endif

@if(isset($data['email']) && $data['email'])
    <h4>Email</h4>
    <p>{{ $data['email'] }}</p>
    <p>&nbsp;</p>
@endif

@if($data['message'])
    <h4>Сообщение</h4>
    <p>{!! nl2br($data['message']) !!}</p>
    <p>&nbsp;</p>
@endif