<h1>Parabéns {{ $user->name }} por garantir sua vaga na turma LaraDev</h1>
<p>Para fazer login na plataforma utilize o seu e-mail {{ $user->email }}junto com a senha de cadastro.</p><br>
<p>Para garantir a sua vaga, você tem até o dia {{ date('d--m-Y', strtotime($order->due_at)) }} para conseguir o seu desconto e pagar somente R${{$order->value}} e ter acesso completo ao curso.</p>
