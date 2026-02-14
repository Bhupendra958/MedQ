<?php
header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);
$message = isset($input['message']) ? trim($input['message']) : '';
if ($message === '') {
    echo json_encode(['reply' => 'Please type a message.']);
    exit;
}
// Basic stub reply (no API key required)
$replies = [
    'Hi! How can I help you with appointments or MedQueue today?',
    'You can book a doctor from the Doctors page after logging in.',
    'For support, use the Feedback page. Thank you!',
];
$reply = $replies[array_rand($replies)];
echo json_encode(['reply' => $reply]);
?>
