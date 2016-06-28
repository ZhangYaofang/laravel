<h2>Dear {{ $firstname }}</h2>
<p>
  You have received a new message from your website information form.</p><p>
  Here are the details:
</p>
<ul>
  <li><strong>Firstname:</strong> {{ $firstname }}</li>
  <li><strong>Email:</strong> {{ $email }}</li>
  <li><strong>Check Box: </strong>{{ $check_box }}</li>
  <li><strong>Dropdown: </strong>{{ $dropdown }}</li>
</ul>

<p>
You can find the file you inputted in the attachement.
</p>
<br>
<p>Regards</p>
<hr>
<p>
  @foreach ($messageLines as $messageLine)
    {{ $messageLine }}<br>
  @endforeach
</p>
<hr>
