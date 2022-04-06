Hello <i>{{ $demo->receiver }}</i>,
<p>New email from customer.</p>
 <br>
<p>Name&nbsp;: {{ $contactMail->name }}</p>
<p>Email: {{ $contactMail->email }}</p>
 
<p>value:</p>
 
<div>
<p>{{ $contactMail->message }}</p>

</div>
 
Thank You,
<br/>
<i>{{ $contactMail->sender }}</i>