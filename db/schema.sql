CREATE TABLE IF IF NOT EXISTS activity_logs(
    activity_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id varchar(255),
    user_email varchar(255),
    activity_log_action varchar(50) NOT NULL,
    activity_log_status ENUM('success', 'failed') DEFAULT 'SUCCESS',

    -- Client Parameters

    activity_log_ip_address varchar(45),
    activity_log_user_agent varchar(255),

    -- Timestamps
    activity_log_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
