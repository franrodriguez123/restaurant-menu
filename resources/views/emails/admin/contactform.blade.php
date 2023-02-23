<p>Hola {{ $company->name }}</p>
<p>Has recibido un email de contacto:</p>
<p>Nombre: {{ $data['name'] }}</p>
<p>Email: {{ $data['email'] }}</p>
<p>Teléfono: @if(!empty($data['phone'])) {{ $data['phone'] }} @endif</p>
<p>Mensaje: {!! nl2br($data['email']) !!}</p>