<?php
// Health check for Render / load balancers. No DB, no session.
header('Content-Type: application/json');
http_response_code(200);
echo json_encode(['status' => 'ok', 'app' => 'MedQueue', 'time' => date('c')]);
