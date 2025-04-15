<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
    $raw_data = file_get_contents("php://input");
    $data = json_decode($raw_data, true);
    
    if (isset($data['userId'])) {
        $user_id = sanitize_input($data['userId']);
        
        $sql = "SELECT u.*, 
                sc.class_id,
                pw.student_id as ward_id,
                pw.relationship,
                GROUP_CONCAT(DISTINCT tp.subject_id) as subjects
                FROM users u
                LEFT JOIN student_class sc ON u.id = sc.student_id
                LEFT JOIN parent_ward pw ON u.id = pw.parent_id
                LEFT JOIN teacher_permissions tp ON u.id = tp.teacher_id
                WHERE u.id = ?
                GROUP BY u.id";
                
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($user = $result->fetch_assoc()) {
            header('Content-Type: application/json');
            echo json_encode($user);
            exit();
        }
    }
}

http_response_code(400);
echo json_encode(['error' => 'Invalid request']);
?>
