-- Create the database
CREATE DATABASE CourseManagement;

-- Use the database
USE CourseManagement;

-- Create the Users table
CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('Visitor', 'Student', 'Teacher', 'Admin') NOT NULL,
    is_approved BOOLEAN DEFAULT FALSE, -- For approving Teacher accounts by Admin
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the Courses table
CREATE TABLE Courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    content TEXT, -- Can be a URL to video or document
    category VARCHAR(100) NOT NULL,
    teacher_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES Users(id) ON DELETE CASCADE
);

-- Create the Tags table
CREATE TABLE Tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) UNIQUE NOT NULL
);

-- Create the Course_Tags table (Many-to-Many relationship)
CREATE TABLE Course_Tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    tag_id INT NOT NULL,
    FOREIGN KEY (course_id) REFERENCES Courses(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES Tags(id) ON DELETE CASCADE
);

-- Create the Enrollments table (Students enrolling in courses)
CREATE TABLE Enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES Users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES Courses(id) ON DELETE CASCADE
);

-- Create the Categories table (Optional, for predefined categories)
CREATE TABLE Categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) UNIQUE NOT NULL
);

-- Insert some predefined roles for testing (Optional)
INSERT INTO Users (name, email, password, role, is_approved)
VALUES 
('Admin User', 'admin@example.com', 'adminpasswordhash', 'Admin', TRUE),
('Teacher User', 'teacher@example.com', 'teacherpasswordhash', 'Teacher', FALSE),
('Student User', 'student@example.com', 'studentpasswordhash', 'Student', TRUE);

-- Insert predefined categories (Optional)
INSERT INTO Categories (name)
VALUES ('Programming'), ('Mathematics'), ('Design'), ('Science');

-- Insert predefined tags (Optional)
INSERT INTO Tags (name)
VALUES ('Beginner'), ('Intermediate'), ('Advanced'), ('Project-based');


-- Insert Users
INSERT INTO Users (name, email, password, role, is_approved)
VALUES 
('Admin User', 'admin@example.com', 'hashed_password_admin', 'Admin', TRUE),
('John Doe', 'john.doe@example.com', 'hashed_password_teacher1', 'Teacher', TRUE),
('Jane Smith', 'jane.smith@example.com', 'hashed_password_teacher2', 'Teacher', TRUE),
('Mark Johnson', 'mark.johnson@example.com', 'hashed_password_teacher3', 'Teacher', TRUE),
('Alice Brown', 'alice.brown@example.com', 'hashed_password_student1', 'Student', TRUE),
('Bob White', 'bob.white@example.com', 'hashed_password_student2', 'Student', TRUE),
('Charlie Green', 'charlie.green@example.com', 'hashed_password_student3', 'Student', TRUE);

-- Insert Courses
INSERT INTO Courses (title, description, content, category, teacher_id)
VALUES 
('Introduction to Programming', 'Learn the basics of programming using Python.', 'link_to_python_basics_video', 'Programming', 2),
('Advanced Mathematics', 'Master advanced calculus and algebra techniques.', 'link_to_math_advanced_video', 'Mathematics', 3),
('Graphic Design Essentials', 'Learn the core principles of graphic design.', 'link_to_design_essentials_document', 'Design', 4),
('Data Science with R', 'Get started with data analysis and visualization using R.', 'link_to_r_data_science_video', 'Science', 2),
('Web Development 101', 'Learn the foundations of web development using HTML, CSS, and JavaScript.', 'link_to_web_dev_document', 'Programming', 3);

-- Insert Tags
INSERT INTO Tags (name)
VALUES 
('Beginner'), 
('Intermediate'), 
('Advanced'), 
('Project-based'), 
('Data Analysis'), 
('Frontend'), 
('Backend');

-- Insert Course_Tags (Many-to-Many Relationship)
INSERT INTO Course_Tags (course_id, tag_id)
VALUES 
(1, 1), -- 'Introduction to Programming' is tagged as 'Beginner'
(1, 5), -- 'Introduction to Programming' is tagged as 'Data Analysis'
(2, 3), -- 'Advanced Mathematics' is tagged as 'Advanced'
(3, 2), -- 'Graphic Design Essentials' is tagged as 'Intermediate'
(4, 5), -- 'Data Science with R' is tagged as 'Data Analysis'
(4, 3), -- 'Data Science with R' is tagged as 'Advanced'
(5, 6), -- 'Web Development 101' is tagged as 'Frontend'
(5, 7); -- 'Web Development 101' is tagged as 'Backend'

-- Insert Enrollments
INSERT INTO Enrollments (student_id, course_id)
VALUES 
(5, 1), -- Alice Brown enrolled in 'Introduction to Programming'
(6, 2), -- Bob White enrolled in 'Advanced Mathematics'
(5, 3), -- Alice Brown enrolled in 'Graphic Design Essentials'
(7, 4), -- Charlie Green enrolled in 'Data Science with R'
(6, 5), -- Bob White enrolled in 'Web Development 101'
(7, 1), -- Charlie Green enrolled in 'Introduction to Programming'
(5, 5); -- Alice Brown enrolled in 'Web Development 101'

-- Insert Categories
INSERT INTO Categories (name)
VALUES 
('Programming'), 
('Mathematics'), 
('Design'), 
('Science'), 
('Data Analysis'), 
('Web Development');
