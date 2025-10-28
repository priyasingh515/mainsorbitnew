<!DOCTYPE html>
<html>
<head>
    <title>New Answer Sheet Assigned</title>
</head>
<body>
    <h2>Dear Evaluator,</h2>

    <p>You have been assigned a new answer sheet for evaluation.</p>

    <p><strong>Answer Sheet ID:</strong> {{ $answerSheetId }}</p>
    <p><strong>Student Name:</strong> {{ $studentName ?? 'Demo' }}</p>
    {{-- <p><strong>Student Email:</strong> {{ $studentEmail }}</p> --}}

    <p>Please log in to your dashboard at your earliest convenience to review and provide your evaluation.</p>

    <p>Thank you for your time and support.</p>

    <p>Best Regards,<br>    
    The Mains Orbit Team</p>
</body>
</html>
