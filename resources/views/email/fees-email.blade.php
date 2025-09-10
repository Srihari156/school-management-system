<h1>School Management System</h1>
<p><b>Student:</b> {{ $student->name }}</p>
<p><b>Email:</b> {{ $student->email }}</p>
<p><b>Mobile:</b> {{ $student->mobile_no }}</p>
<p><b>Class:</b> {{ $class }}</p>
<p><b>Section:</b> {{ $section }}</p>
<p><b>Amount:</b> ₹{{ $amount }}</p>
<p>Please pay your fees using the following link:</p>

<p>
    <a href="{{ url('/pay/' . $order_id) }}" 
       target="_blank"
       style="background:#0d6efd;color:#fff;padding:10px 20px;text-decoration:none;border-radius:5px;">
       Pay Now (UPI Only)
    </a>
</p>

