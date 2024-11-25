-- Criação da tabela
CREATE TABLE IF NOT EXISTS contacts (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Inserção dos dados
INSERT INTO contacts (name, email, phone, title, created) VALUES
('John Doe', 'johndoe@example.com', '2026550143', 'Lawyer', '2019-05-08 17:32:00'),
('David Deacon', 'daviddeacon@example.com', '2025550121', 'Employee', '2019-05-08 17:28:44'),
('Sam White', 'samwhite@example.com', '2004550121', 'Employee', '2019-05-08 17:29:27'),
('Colin Chaplin', 'colinchaplin@example.com', '2022550178', 'Supervisor', '2019-05-08 17:29:27'),
('Ricky Waltz', 'rickywaltz@example.com', '7862342390', '', '2019-05-09 19:16:00'),
('Arnold Hall', 'arnoldhall@example.com', '5089573579', 'Manager', '2019-05-09 19:17:00'),
('Toni Adams', 'alvah1981@example.com', '2603668738', '', '2019-05-09 19:19:00'),
('Donald Perry', 'donald1983@example.com', '7019007916', 'Employee', '2019-05-09 19:20:00'),
('Joe McKinney', 'nadia.doole0@example.com', '6153353674', 'Employee', '2019-05-09 19:20:00'),
('Angela Horst', 'angela1977@example.com', '3094234980', 'Assistant', '2019-05-09 19:21:00'),
('James Jameson', 'james1965@example.com', '4002349823', 'Assistant', '2019-05-09 19:32:00'),
('Daniel Deacon', 'danieldeacon@example.com', '5003423549', 'Manager', '2019-05-09 19:33:00');

