
 
CREATE TABLE IF NOT EXISTS requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    issue_type VARCHAR(50) NOT NULL,          
    description TEXT,                         
    employee_name VARCHAR(100) NOT NULL,     
    department ENUM('رجال', 'نساء') NOT NULL, 
    request_date DATE NOT NULL,               
    administration VARCHAR(100) NOT NULL,    
    office_number INT NOT NULL,               
    phone VARCHAR(20) NOT NULL,               
    email VARCHAR(100) NOT NULL,
    status VARCHAR(50) DEFAULT 'قيد التنفيذ'
);
 