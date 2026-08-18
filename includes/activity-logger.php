<?php
function logActivity($pdo, $user_id, $user_email, $action, $status='success'){
    try{
        // get client IP address
        $ip= $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
        if (strpos($ip, ',') !== false) {
            $ip = trim(explode(',' , $ip)[0]); // Get the first IP if there are multiple
        }

        // get user agent (browser )

        $user_agent = substr($_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN', 0, 255);
        // query
        $stmt = pdo-> prepare("
            INSERT INTO activity_log (user_id, 
            user_email, 
            activity_log_action, 
            activity_log_status, 
            activity_log_ip_address, 
            activity_log_user_agent, 
            )
            VALUES (?,?,?,?,?,?)
            ");

    }catch(PDOException $e){
        error_log("Activity Log Error: " . $e->getMessage());
        return false;
    }
}

?>