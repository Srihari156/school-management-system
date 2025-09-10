<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Fees</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>
    <h2>Redirecting to payment...</h2>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        var options = {
            "key": "{{ env('RAZORPAY_KEY') }}",
            "amount": "{{ $amount * 100 }}",
            "currency": "INR",
            "name": "School Management",
            "description": "Fees Payment",
            "order_id": "{{ $order_id }}",

            // ✅ Instead of callback_url, we use handler
            "handler": function (response) {
                $.ajax({
                    url: "{{ route('payment.callback') }}",   // your Laravel route
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}", // important for Laravel
                        razorpay_payment_id: response.razorpay_payment_id,
                        razorpay_order_id: response.razorpay_order_id,
                        razorpay_signature: response.razorpay_signature
                    },
                    success: function (res) {
                        if (res.status === "success") {
                            Swal.fire({
                                icon: "success",
                                title: "Payment Successful 🎉",
                                html: `<b>Payment ID:</b> ${res.payment_id}<br>
                                   <b>Order ID:</b> ${res.order_id}`,
                                confirmButtonText: "OK"
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Payment Failed ❌",
                                text: res.message || "Something went wrong!"
                            });
                        }
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Server Error ⚠️",
                            text: "Something went wrong. Try again!"
                        });
                    }
                });
            },

            "prefill": {
                "name": "{{ $student->name }}",
                "email" : "{{ $student->email }}",
                "contact" : "{{ $student->mobile_no }}"

            },
            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
    </script>

</body>

</html>