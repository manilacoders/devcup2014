<<<<<<< Updated upstream
CREATE TABLE profiles (id BIGINT AUTO_INCREMENT, type VARCHAR(50), first_name VARCHAR(50), middle_name VARCHAR(50), last_name VARCHAR(50), email VARCHAR(50), password VARCHAR(50), section_id BIGINT, status VARCHAR(50), email_token VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX type_idx (type), INDEX first_name_idx (first_name), INDEX middle_name_idx (middle_name), INDEX last_name_idx (last_name), INDEX email_idx (email), INDEX email_token_idx (email_token), INDEX section_id_idx (section_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sections (id BIGINT AUTO_INCREMENT, name VARCHAR(50), profile_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE profiles ADD CONSTRAINT profiles_section_id_sections_id FOREIGN KEY (section_id) REFERENCES sections(id);
=======
CREATE TABLE answers (id BIGINT AUTO_INCREMENT, student_id BIGINT, question_id BIGINT, answer VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX answer_idx (answer), INDEX student_id_idx (student_id), INDEX question_id_idx (question_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE exams (id BIGINT AUTO_INCREMENT, name VARCHAR(50), profile_id BIGINT, active_at DATETIME, end_at DATETIME, subject_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX profile_id_idx (profile_id), INDEX subject_id_idx (subject_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE exam_results (id BIGINT AUTO_INCREMENT, student_id BIGINT, exam_id BIGINT, correct_count BIGINT, question_count BIGINT, score BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX student_id_idx (student_id), INDEX exam_id_idx (exam_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE profiles (id BIGINT AUTO_INCREMENT, type VARCHAR(50), first_name VARCHAR(50), middle_name VARCHAR(50), last_name VARCHAR(50), email VARCHAR(50), password VARCHAR(50), section_id BIGINT, is_active TINYINT(1), email_token VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX type_idx (type), INDEX first_name_idx (first_name), INDEX middle_name_idx (middle_name), INDEX last_name_idx (last_name), INDEX email_idx (email), INDEX email_token_idx (email_token), INDEX is_active_idx (is_active), INDEX section_id_idx (section_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE questions (id BIGINT AUTO_INCREMENT, type VARCHAR(50), question TEXT, metadata LONGTEXT, answer VARCHAR(50), exam_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX type_idx (type), INDEX exam_id_idx (exam_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sections (id BIGINT AUTO_INCREMENT, name VARCHAR(50), profile_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE students (id BIGINT AUTO_INCREMENT, first_name VARCHAR(50), middle_name VARCHAR(50), last_name VARCHAR(50), email VARCHAR(50), password VARCHAR(50), section_id BIGINT, is_active TINYINT(1), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX first_name_idx (first_name), INDEX middle_name_idx (middle_name), INDEX last_name_idx (last_name), INDEX email_idx (email), INDEX is_active_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE student_section (id BIGINT AUTO_INCREMENT, student_id BIGINT, section_id BIGINT, INDEX section_id_idx (section_id), INDEX student_id_idx (student_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE subjects (id BIGINT AUTO_INCREMENT, name VARCHAR(50), profile_id BIGINT, section_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX name_idx (name), INDEX profile_id_idx (profile_id), INDEX section_id_idx (section_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE answers ADD CONSTRAINT answers_student_id_students_id FOREIGN KEY (student_id) REFERENCES students(id);
ALTER TABLE answers ADD CONSTRAINT answers_question_id_questions_id FOREIGN KEY (question_id) REFERENCES questions(id);
ALTER TABLE exams ADD CONSTRAINT exams_subject_id_subjects_id FOREIGN KEY (subject_id) REFERENCES subjects(id);
ALTER TABLE exams ADD CONSTRAINT exams_profile_id_profiles_id FOREIGN KEY (profile_id) REFERENCES profiles(id);
ALTER TABLE exam_results ADD CONSTRAINT exam_results_student_id_students_id FOREIGN KEY (student_id) REFERENCES students(id);
ALTER TABLE exam_results ADD CONSTRAINT exam_results_exam_id_exams_id FOREIGN KEY (exam_id) REFERENCES exams(id);
ALTER TABLE profiles ADD CONSTRAINT profiles_section_id_sections_id FOREIGN KEY (section_id) REFERENCES sections(id);
ALTER TABLE questions ADD CONSTRAINT questions_exam_id_exams_id FOREIGN KEY (exam_id) REFERENCES exams(id);
ALTER TABLE student_section ADD CONSTRAINT student_section_student_id_students_id FOREIGN KEY (student_id) REFERENCES students(id);
ALTER TABLE student_section ADD CONSTRAINT student_section_section_id_sections_id FOREIGN KEY (section_id) REFERENCES sections(id);
ALTER TABLE subjects ADD CONSTRAINT subjects_section_id_sections_id FOREIGN KEY (section_id) REFERENCES sections(id);
ALTER TABLE subjects ADD CONSTRAINT subjects_profile_id_profiles_id FOREIGN KEY (profile_id) REFERENCES profiles(id);
>>>>>>> Stashed changes
