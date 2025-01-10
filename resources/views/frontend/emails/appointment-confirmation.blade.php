<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <p>Hello {{ $appointment->name }},</p>
    <p>Your appointment has been confirmed for the following details:</p>
    <ul>
        <li><strong>Name:</strong> {{ $appointment->name }}</li>
        <li><strong>Email:</strong> {{ $appointment->email }}</li>
        <li><strong>Date & Time:</strong> {{ $appointment->date_time }}</li>
    </ul>
    <p>Thank you for choosing our services. We look forward to seeing you at the scheduled time.</p>
</body>
</html>
